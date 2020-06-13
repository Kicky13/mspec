<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIModel extends CI_Model {
	protected $user = 'user_master';
	protected $peserta = 'participant_master';
	protected $event = 'events_master';
	protected $abs = 'events';
	protected $soal = 'qsheet_master';
	protected $ljkheader = 'ljk_header';
	protected $ljk = 'ljk';
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
		$testID = $this->encryption->decrypt($data->testId);
		$userID = $this->encryption->decrypt($data->userId);
		$peserta = $this->db->where('USER_ID', $userID)->get($this->peserta)->row_array();
		$partID = $peserta['ID'];
		$kunci = $data->answers;
		$paket = $this->db->where($this->soal . '.SHEET_NO = "' . $data->questionNo . '"')
			->get($this->soal)
			->row_array();
		$right = $data->right;
		$wrong = $data->wrong;
		$totalquest = count($this->db->where('QSHEET_ID', $paket['ID'])->get($this->pack)->result_array());
		$answered = $totalquest - $data->unanswered;
		$score = $right / $totalquest * $paket['MAX_SCORE'];
		$duration = $this->timeFormat($data->timeSpent);
		$this->db->trans_start();
		$header = array(
			'EVENT_ID' => $testID,
			'PARTICIPANT_ID' => $partID,
			'SHEET_ID' => $paket['ID'],
			'TIME_FINISHED' => $duration,
			'ANSWERED' => $answered,
			'FALSE_ANSWER' => $wrong,
			'TRUE_ANSWER' => $right,
			'SCORE' => $score
		);
		$insertHeader = $this->db->insert($this->ljkheader, $header);
		// Inserting LJK
		if ($insertHeader) {
			$headerID = $this->db->insert_id();
			foreach ($kunci as $item) {
				$ljk = array(
					'HEADER_ID' => $headerID,
					'QUESTION_ID' => $item->questionId,
					'QUESTION_NO' => $item->questionNumber,
					'ANSWER' => isset($item->answerCode) ? $this->getAlphabetical($item->answerCode) : null
				);
				$this->db->insert($this->ljk, $ljk);
			}
			$events = array(
				'COMPLETED_STATUS' => 1
			);
			// Updating Status
			$this->db->where('EVENT_ID', $testID)->where('PARTICIPANT_ID', $partID)->where('SHEET_ID', $paket['ID'])->update($this->abs, $events);
			$this->db->trans_complete();
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				$res = array(
					'status' => 500,
					'message' => 'Submit failed',
					'errorMessage' => '',
					'data' => $data
				);
			} else {
				$this->db->trans_commit();
				$res = array(
					'status' => 200,
					'message' => 'Submit success',
					'errorMessage' => '',
					'data' => $data
				);
			}
		} else {
			$this->db->trans_complete();
			$this->db->trans_rollback();
			$res = array(
				'titlemsg' => 'ERROR',
				'contentmsg' => 'Something went wrong, please try again',
				'typemsg' => 'error'
			);
		}
		return $res;
	}

	function timeFormat($mils) {
		$seconds = floor($mils/1000);
		$minutes = floor($seconds/60);
		$hours = floor($minutes/60);
		if ($hours > 0) {
			$time = $hours . ' Hours ' . $minutes . ' minutes ' . $seconds . ' seconds';
		} else {
			$time = $minutes . ' minutes ' . $seconds . ' seconds';
		}
		return $time;
	}

	function getAlphabetical($value) {
		switch ($value) {
			case 'a':
				$newvalue = 0;
				break;
			case 'b':
				$newvalue = 1;
				break;
			case 'c':
				$newvalue = 2;
				break;
			case 'd':
				$newvalue = 3;
				break;
			case 'e':
				$newvalue = 4;
				break;
			case 'f':
				$newvalue = 5;
				break;
			case 'g':
				$newvalue = 6;
				break;
			case 'h':
				$newvalue = 7;
				break;
			case 'i':
				$newvalue = 8;
				break;
			case 'j':
				$newvalue = 9;
				break;
			case 'k':
				$newvalue = 10;
				break;
			case 'l':
				$newvalue = 11;
				break;
			case 'm':
				$newvalue = 12;
				break;
			case 'n':
				$newvalue = 13;
				break;
			case 'o':
				$newvalue = 14;
				break;
			case 'p':
				$newvalue = 15;
				break;
			case 'q':
				$newvalue = 16;
				break;
			case 'r':
				$newvalue = 17;
				break;
			case 's':
				$newvalue = 18;
				break;
			case 't':
				$newvalue = 19;
				break;
			case 'u':
				$newvalue = 20;
				break;
			case 'v':
				$newvalue = 21;
				break;
			case 'w':
				$newvalue = 22;
				break;
			case 'x':
				$newvalue = 23;
				break;
			case 'y':
				$newvalue = 24;
				break;
			case 'z':
				$newvalue = 25;
				break;
			default:
				$newvalue = '';
				break;
		}
		return $newvalue;
	}
}
