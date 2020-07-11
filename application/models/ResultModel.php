<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultModel extends CI_Model {
	protected $table = 'ljk_header', $tchild = 'ljk', $mEvent = 'events_master', $mUser = 'user_master', $mPart = 'participant_master', $event = 'events', $mSheet = 'qsheet_master', $package = 'question_package', $key = 'qchoice_master';

	public function __construct()
	{
		parent::__construct();
	}

	function getSemuaResult() {
		$data = $this->db->select($this->mEvent . '.*, ' . $this->mUser . '.NAME as NAMA_PENGUJI, ' . $this->mUser . '.ID as ID_PENGUJI, ')
			->join($this->mUser, $this->mUser . '.ID = ' . $this->mEvent . '.EXAMINER_ID')
			->get($this->mEvent)
			->result_array();
		for ($i = 0; $i < count($data); $i++) {
			$cekResult = $this->db->where('EVENT_ID', $data[$i]['ID'])->get($this->table)->result_array();
			$data[$i]['RESULTCOUNT'] = count($cekResult);
		}
		$response = array(
			"status" => 200,
			"message" => '',
			"data" => $data
		);
		return $response;
	}

	function getSemuaResultTest($id) {
		$headResult = $this->db->select($this->event . '.*, ' . $this->mPart . '.NAME, ' . $this->mEvent . '.ENCODE, ' . $this->mSheet . '.METHOD, ' . $this->mEvent . '.EVENT_DATE')
			->join($this->mPart, $this->mPart . '.ID = ' . $this->event . '.PARTICIPANT_ID')
			->join($this->mEvent, $this->mEvent . '.ID = ' . $this->event . '.EVENT_ID')
			->join($this->mSheet, $this->mSheet . '.ID = ' . $this->event . '.SHEET_ID')
			->where($this->event . '.EVENT_ID = ' . $id)
			->group_by($this->event . '.PARTICIPANT_ID')
			->get($this->event)
			->result_array();
		$countHeader = 0;
		$tableHeader = array();
		for ($i = 0; $i < count($headResult); $i++) {
			$ljk = $this->db->select($this->table . '.*, ' . $this->mSheet . '.SHEET_NO')
				->join($this->mEvent, $this->mEvent . '.ID = ' . $this->table . '.EVENT_ID')
				->join($this->mSheet, $this->mSheet . '.ID = ' .$this->table . '.SHEET_ID')
				->where($this->table . '.PARTICIPANT_ID', $headResult[$i]['PARTICIPANT_ID'])
				->where($this->table . '.EVENT_ID', $headResult[$i]['EVENT_ID'])
				->get($this->table)
				->result_array();
			if (count($ljk) > $countHeader) {
				$countHeader = count($ljk);
				for ($l = 0; $l < count($ljk); $l++) {
					$tableHeader[$l] = array(
						"SHEET_ID" => $ljk[$l]['SHEET_ID'],
						"SHEET_NO" => $ljk[$l]['SHEET_NO']
					);
				}
			}
			$headResult[$i]['LJK'] = $ljk;
			$colspan = count($tableHeader);
			$bundleData = array(
				"result" => $headResult,
				"tablehead" => $tableHeader,
				"colspan" => $colspan
			);
		}
		$response = array(
			'status' => 200,
			'msg' => 'Get Data Success',
			'data' => $bundleData
		);
		return $response;
	}

	function getJawabanLJK($id) {
		$jawaban = $this->db->where('HEADER_ID', $id)->get($this->tchild)->result_array();
		for ($i = 0; $i < count($jawaban); $i++) {
			$answerKey = $this->db->where('QUESTION_ID', $jawaban[$i]['QUESTION_ID'])->where('VALUE', 1)->get($this->key)->row_array();
			if ($jawaban[$i]['ANSWER'] !== null) {
				$value = $this->getIndex(strtolower($answerKey['ALPHA']));
				if ($jawaban[$i]['ANSWER'] == $value) {
					$jawaban[$i]['VALUE'] = true;
				} else {
					$jawaban[$i]['VALUE'] = false;
				}
			} else {
				$jawaban[$i]['VALUE'] = null;
			}
		}
		$response = array(
			'status' => 200,
			'msg' => 'Get Data Success',
			'data' => $jawaban
		);
		return $response;
	}

	function getLJK($id) {
		$ljk = $this->db->select($this->mPart . '.*, ' . $this->mSheet . '.*, ' . $this->mEvent . '.*, ' . $this->table . '.ID AS HEADER_ID, COUNT(*) AS TOTALQUEST, ' . $this->mUser . '.NAME AS EXAMINER, ' . $this->table . '.SCORE, ' . $this->mEvent . '.EVENT_LOCATION')
			->join($this->mSheet, $this->mSheet . '.ID = ' . $this->table . '.SHEET_ID')
			->join($this->mEvent, $this->mEvent . '.ID = ' . $this->table . '.EVENT_ID')
			->join($this->mUser, $this->mUser . '.ID = ' . $this->mEvent . '.EXAMINER_ID')
			->join($this->mPart, $this->mPart . '.ID = ' . $this->table . '.PARTICIPANT_ID')
			->join($this->package, $this->package . '.QSHEET_ID = ' . $this->mSheet . '.ID')->where($this->table . '.ID = ' . $id)->get($this->table)->row_array();
		if ($ljk['TOTALQUEST'] <= 40) {
			$ljk['SIDENUMBER'] = 20;
		} else if ($ljk['TOTALQUEST'] > 40 && $ljk['TOTALQUEST'] <= 100) {
			$ljk['SIDENUMBER'] = 50;
		} else if ($ljk['TOTALQUEST'] > 100 && $ljk['TOTALQUEST'] <= 160) {
			$ljk['SIDENUMBER'] = 80;
		} else {
			$ljk['SIDENUMBER'] = 100;
		}
		$choiceTotal = $this->db->select('MAX(ANSWER) AS TOTALCHOICE')->where('HEADER_ID', $id)->get($this->tchild)->row_array();
		$choice = array();
		if ($choiceTotal['TOTALCHOICE'] <= 5) {
			$count = 5;
		} else {
			$count = $choiceTotal['TOTALCHOICE'];
		}
		for ($i = 0; $i <= $count; $i++) {
			$value = $this->getAlphabetical($i);
			$choice[$i] = $value;
		}
		$ljk['CHOICE'] = $choice;
		$ljk['TOTALCHOICE'] = $count;
		$ljk['EVENT_DATE'] = $this->dateFormat($ljk['EVENT_DATE']);
		return $ljk;
	}

	function getAlphabetical($value) {
		switch ($value) {
			case 0:
				$newvalue = 'A';
				break;
			case 1:
				$newvalue = 'B';
				break;
			case 2:
				$newvalue = 'C';
				break;
			case 3:
				$newvalue = 'D';
				break;
			case 4:
				$newvalue = 'E';
				break;
			case 5:
				$newvalue = 'F';
				break;
			case 6:
				$newvalue = 'G';
				break;
			case 7:
				$newvalue = 'H';
				break;
			case 8:
				$newvalue = 'I';
				break;
			case 9:
				$newvalue = 'J';
				break;
			case 10:
				$newvalue = 'K';
				break;
			case 11:
				$newvalue = 'L';
				break;
			case 12:
				$newvalue = 'M';
				break;
			case 13:
				$newvalue = 'N';
				break;
			case 14:
				$newvalue = 'O';
				break;
			case 15:
				$newvalue = 'P';
				break;
			case 16:
				$newvalue = 'Q';
				break;
			case 17:
				$newvalue = 'R';
				break;
			case 18:
				$newvalue = 'S';
				break;
			case 19:
				$newvalue = 'T';
				break;
			case 20:
				$newvalue = 'U';
				break;
			case 21:
				$newvalue = 'V';
				break;
			case 22:
				$newvalue = 'W';
				break;
			case 23:
				$newvalue = 'X';
				break;
			case 24:
				$newvalue = 'Y';
				break;
			case 25:
				$newvalue = 'Z';
				break;
			default:
				$newvalue = '';
				break;
		}
		return $newvalue;
	}

	function getIndex($value) {
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

	function dateFormat($date) {
		$parts = explode('-', $date);
		$year = $parts[0];
		$month = $parts[1];
		if ($month == '01' || $month == 1) {
			$month = 'January';
		} else if ($month == '02' || $month == 2) {
			$month = 'February';
		} else if ($month == '03' || $month == 3) {
			$month = 'March';
		} else if ($month == '04' || $month == 4) {
			$month = 'April';
		} else if ($month == '05' || $month == 5) {
			$month = 'May';
		} else if ($month == '06' || $month == 6) {
			$month = 'June';
		} else if ($month == '07' || $month == 7) {
			$month = 'July';
		} else if ($month == '08' || $month == 8) {
			$month = 'August';
		} else if ($month == '09' || $month == 9) {
			$month = 'September';
		} else if ($month == '10' || $month == 10) {
			$month = 'October';
		} else if ($month == '11' || $month == 11) {
			$month = 'November';
		} else {
			$month = 'December';
		}
		$day = $parts[2];
		$newdate = $month . ' ' . $day . ', ' . $year;
		return $newdate;
	}
}
