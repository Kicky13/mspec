<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIModel extends CI_Model {
	protected $user = 'user_master';
	protected $peserta = 'participant_master';
	protected $event = 'events_master';
	protected $abs = 'events';
	protected $soal = 'qsheet_master';
	protected $ques = 'question_master';
	protected $ans = 'qchoice_master';
	protected $pack = 'question_package';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}

	public function doLogin($data) {
		$sql = $this->db->select($this->user . '.*, ' . $this->peserta . '.ID as regID')->join($this->peserta, $this->peserta . '.USER_ID = ' . $this->user . '.ID')->where('USERNAME', $data['username'])->where('ROLE', 'PESERTA')->get($this->user)->result_array();
		if (count($sql)) {
		    $user = $sql[0];
			$encode = $data['encode'];
			$ujian = $this->db->join($this->event, $this->event . '.ID = ' . $this->abs . '.EVENT_ID')->where($this->abs . '.PARTICIPANT_ID', $user['regID'])->where($this->event . '.ENCODE', $encode)->get($this->abs)->result_array();
			$queryUjian = $this->db->last_query();
			if (count($ujian)) {
				if ($ujian[0]['EVENT_DATE'] == date('Y-m-d')) {
					if ($data['password'] == $this->encryption->decrypt($sql[0]['PASSWORD'])) {
						$token = $this->tokenGenerator();
						$input = array(
							"LAST_LOGIN" => date('Y-m-d H:i:s'),
							"ACTIVE_TOKEN" => $token
						);
						$this->db->where('ID', $user['ID'])->update($this->user, $input);
						$peserta = $this->db->where('USER_ID', $user['ID'])->get($this->peserta)->row_array();
						$user['ID'] = $this->encryption->encrypt($user['ID']);
						$user['REGISTER_ID'] = $this->encryption->encrypt($peserta['ID']);
						$user['ACTIVE_TOKEN'] = $token;
						$user['STATUS'] = $peserta['STATUS'];
						$user['AVATAR'] = $peserta['AVATAR'];
						$user['COMPANY'] = array(
							"NAME" => $peserta['COMPANY'],
							"ADDRESS" => $peserta['COMPANY_LOCATION']
						);
						$res = array(
							"user" => $user,
						);
						$msg = 'Berhasil mengambil data';
						$err = null;
					} else {
						$err = 'Incorect Password';
						$msg = 'Login Gagal';
						$res = null;
					}
				} else {
					$err = "Not in Test Date, Login again on Test Date";
					$msg = 'Login Gagal';
					$res = null;
				}
			} else {
				$err = "Username hasn't any test yet";
				$msg = 'Login Gagal';
				$res = null;
			}
		} else {
            $err = "Username doesn't exist";
            $msg = 'Login Gagal';
            $res = null;
		}
		return $callback = array(
			'status' => 200,
		    'message' => $msg,
			'errorMessage' => $err,
			'data' => $res
		);
	}

	function tokenGenerator() {
	    $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return $this->encryption->encrypt(substr(str_shuffle($permitted_chars), 0, 6));
    }

    function getTestInfo($postData) {
        $regid = $this->encryption->decrypt($postData['REGISTER_ID']);
        $data = $this->db->select('events_master.ID, events_master.ENCODE, events_master.EVENT_TITLE as TITLE, events_master.EVENT_DATE as date, events_master.EVENT_START as startTime, events_master.EVENT_END as endTime, events_master.EXAMINER_ID, user_master.NAME as EXAMINER_NAME, qsheet_master.SHEET_NO, qsheet_master.METHOD, qsheet_master.EXAM_AREA, qsheet_master.NDE_LEVEL, qsheet_master.DURATION, qsheet_master.EXAM_TYPE, qsheet_master.MAX_SCORE, qsheet_master.RULES, qsheet_master.ID as SHEET_ID')
            ->join($this->abs, $this->abs . '.PARTICIPANT_ID = ' . $this->peserta . '.ID')
            ->join($this->event, $this->event . '.ID = ' . $this->abs . '.EVENT_ID')
            ->join($this->soal, $this->soal . '.ID = ' . $this->abs . '.SHEET_ID')
            ->join($this->user, $this->user . '.ID = ' . $this->event . '.EXAMINER_ID')
            ->where($this->peserta . '.ID = ', $regid)
			->where($this->event . '.EVENT_DATE = CURDATE()')
			->where($this->event . '.ENCODE', $postData['encode'])
            ->get($this->peserta)
            ->result_array();
        $event = array();
        if (count($data)) {
            $event = array(
                "id" => $this->encryption->encrypt($data[0]['ID']),
                "encode" => $data[0]['ENCODE'],
                "title" => $data[0]['TITLE'],
                "date" => $data[0]['date'],
                "startTime" => $data[0]['startTime'],
                "endTime" => $data[0]['endTime'],
            );
            $event['examiner'] = array(
                "id" => $data[0]['EXAMINER_ID'],
                "name" => $data[0]['EXAMINER_NAME']
            );
            $paket = array();
            foreach ($data as $item) {
                $soal = array(
                    "id" => $item['SHEET_ID'],
                    "questionNo" => $item['SHEET_NO'],
                    "method" => $item['METHOD'],
                    "examArea" => $item['EXAM_AREA'],
                    "ndeLevel" => $item['NDE_LEVEL'],
                    "duration" => $item['DURATION'],
                    "type" => $item['EXAM_TYPE'],
                    "maxPossibleScore" => $item['MAX_SCORE'],
                    "rules" => $item['RULES']
                );
                $sqlques = $this->db->join($this->ques, $this->ques . '.ID = ' . $this->pack . '.QUESTION_ID')->where($this->pack . '.QSHEET_ID', $item['SHEET_ID'])->get($this->pack)->result_array();
                $sqlques = $this->shuffle_array($sqlques);
                $ques = array();
                $number = 1;
                foreach ($sqlques as $sqlque) {
                    $que = array(
                        "questionId" => $sqlque['ID'],
                        "number" => $number,
                        "question" => $sqlque['CONTENT'],
                        "image" => $sqlque['IMAGE']
                    );
                    $ans = $this->db->select('ALPHA as code, ANSWER_TEXT as answer, VALUE as value')->where('QUESTION_ID', $sqlque['ID'])->order_by('ALPHA')->get($this->ans)->result_array();
                    $que['answer'] = $ans;
                    array_push($ques, $que);
                    $number++;
                }
                $soal['question'] = $ques;
                array_push($paket, $soal);
            }
            $event['questionPackages'] = $paket;
        }
        $last_query = $this->db->last_query();
        return $callback = array(
            'status' => 200,
            'message' => '',
            'errorMessage' => '',
            'data' => $event
        );
    }

    function shuffle_array($list) {
        if (!is_array($list)) return $list;

        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[$key] = $list[$key];
        }
        return $random;
    }

    function submitLjk($data) {
		$data = json_decode($data['data']);
		return $callback = array(
			'status' => 200,
			'message' => 'Submit success',
			'errorMessage' => '',
			'data' => $data
		);
	}
}
