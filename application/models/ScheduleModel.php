<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleModel extends CI_Model {
	protected $table = 'events_master';
	protected $userTable = 'user_master';
	protected $participant = 'participant_master';
	protected $paket = 'qsheet_master';
	protected $abs = 'events';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}

	function examiner() {
		$data = $this->db->where('ROLE', 'PENGUJI')->get($this->userTable)->result();
		$response = array(
			'status' => 200,
			'message' => 'success',
			'data' => $data
		);
		return $response;
	}

	function getEncode($id) {
		$data = $this->db->where('ID', $id)->get($this->table)->row_array();
		$event = $data['ENCODE'];
		return $event;
	}

	function insertPesertaTest($inputData) {
		$event = $this->db->where('ID', $inputData['EVENT'])->get($this->table)->row_array();
		$peserta = $this->db->where('ID', $inputData['PESERTA'])->get($this->participant)->row_array();
		$paket = $this->db->where('ID', $inputData['PAKET'])->get($this->paket)->row_array();
		$check = $this->db->where('EVENT_ID', $inputData['EVENT'])->where('PARTICIPANT_ID', $inputData['PESERTA'])->get($this->abs);
		if ($check->num_rows() == 0) {
			$input = array(
				"EVENT_ID" => $inputData['EVENT'],
				"PARTICIPANT_ID" => $inputData['PESERTA'],
				"SHEET_ID" => $inputData['PAKET']
			);
			$insert = $this->db->insert($this->abs, $input);
			if ($insert) {
				$data = array(
					"ID" => $this->db->insert_id(),
					"NAME" => $peserta['NAME'],
					"SHEET_NO" => $paket['SHEET_NO'],
					"ENCODE" => $event["ENCODE"]
				);
				$message = array(
					'title' => 'SUCCESS!',
					'content' => 'Insert Success',
					'type' => 'success'
				);
			} else {
				$data = array(
					"ID" => 'none',
					"NAME" => $peserta['NAME'],
					"SHEET" => $paket['SHEET_NO'],
					"ENCODE" => $event
				);
				$message = array(
					'title' => 'FAILED!',
					'content' => 'Insert Failed, Internal Server Error',
					'type' => 'error'
				);
			}
			$response = array(
				"status" => 200,
				"message" => $message,
				"data" => $data
			);
		} else {
			$message = array(
				'title' => 'FAILED!',
				'content' => 'Data Already Exist',
				'type' => 'error'
			);
			$response = array(
				"status" => 200,
				"message" => $message,
				"data" => $check->num_rows()
			);
		}
		return $response;
	}

	function deletePesertaUjian($id) {
		$this->db->where('ID', $id);
		$this->db->delete($this->abs);
		$response = array(
			"status" => 200,
			"message" => "Data has been deleted"
		);
		return $response;
	}

	function getSemuaPesertaTest($id) {
		$encode = $this->getEncode($id);
		$data = $this->db->select($this->abs . '.*,' . $this->table . '.ENCODE, ' . $this->participant . '.NAME, ' .$this->paket . '.SHEET_NO')
			->join($this->abs, $this->abs . '.EVENT_ID = ' . $this->table . '.ID')
			->join($this->participant, $this->participant . '.ID = '. $this->abs . '.PARTICIPANT_ID')->join($this->paket, $this->paket . '.ID = ' . $this->abs . '.SHEET_ID')
			->where($this->table . '.ENCODE', $encode)
			->get($this->table)
			->result();
		$response = array(
			"status" => 200,
			"message" => '',
			"data" => $data
		);
		return $response;
	}

	function getSemuaTest() {
		$data = $this->db->select($this->table . '.*, ' . $this->userTable . '.NAME as NAMA_PENGUJI, ' . $this->userTable . '.ID as ID_PENGUJI, ')
			->join($this->userTable, $this->userTable . '.ID = ' . $this->table . '.EXAMINER_ID')
			->get($this->table)
			->result();
		$response = array(
			"status" => 200,
			"message" => '',
			"data" => $data
		);
		return $response;
	}

	function insertJadwalTest($data) {
		$startTime = $this->timeFormat($data['EVENT_START']);
		$endTime = $this->timeFormat($data['EVENT_END']);
		$penguji = explode('-', $data['EXAMINER']);
		$date = $this->dateFormat($data['EVENT_DATE']);
		$encode = $this->encodeGenerator();
		$inputData = array(
			"ENCODE" => $encode,
			"EVENT_TITLE" => $data['EVENT_TITLE'],
			"EVENT_DATE" => $date,
			"EVENT_START" => $startTime,
			"EVENT_END" => $endTime,
			"EXAMINER_ID" => $penguji[0]
		);
		$insert = $this->db->insert($this->table, $inputData);
		if ($insert) {
			$inputData['ID'] = $this->db->insert_id();
			$inputData['ID_PENGUJI'] = $penguji[0];
			$inputData['NAMA_PENGUJI'] = $penguji[1];
			$message = array(
				"title" => "SUCCESS",
				"content" => "Data berhasil di inputkan",
				"type" => "success"
			);
		}
		$response = array(
			"status" => 200,
			"message" => $message,
			"data" => $inputData
		);
		return $response;
	}

	function updateJadwalTest($data) {
		$startTime = $this->timeFormat($data['EVENT_START']);
		$endTime = $this->timeFormat($data['EVENT_END']);
		$penguji = explode('-', $data['EXAMINER']);
		$date = $this->dateFormat($data['EVENT_DATE']);
		$id = $data['ID'];
		$inputData = array(
			"EVENT_TITLE" => $data['EVENT_TITLE'],
			"EVENT_DATE" => $date,
			"EVENT_START" => $startTime,
			"EVENT_END" => $endTime,
			"EXAMINER_ID" => $penguji[0]
		);
		$update = $this->db->where('ID', $id)->update($this->table, $inputData);
		if ($update) {
			$message = array(
				"title" => "SUCCESS",
				"content" => "Data berhasil di inputkan",
				"type" => "success"
			);
		}
		$response = array(
			"status" => 200,
			"message" => $message,
			"data" => $inputData
		);
		return $response;
	}

	function timeFormat($time) {
		$count = strlen($time);
		$ampm = substr($time, -2);
		if ($count == 7) {
			$hour = substr($time, 0, 1);
			$min = substr($time, 2, 2);
		} else {
			$hour = substr($time, 0, 2);
			$min = substr($time, 3, 2);
		}
		if ($ampm == 'PM') {
			$hour = $hour + 12;
		}
		$fulltime = $hour . ':' . $min;
		return $fulltime;
	}

	function encodeGenerator() {
		$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		return substr(str_shuffle($permitted_chars), 0, 10);
	}

	function dateFormat($date) {
		$parts = explode('/', $date);
		$day = $parts[0];
		$month = $parts[1];
		$year = $parts[2];
		$newdate = $year . '/' . $month . '/' . $day;
		return $newdate;
	}

	function countUjianPeserta() {
		$total = $this->db->select($this->table . '.*, ' . $this->userTable . '.NAME as NAMA_PENGUJI, ' . $this->userTable . '.ID as ID_PENGUJI, ')
			->join($this->userTable, $this->userTable . '.ID = ' . $this->table . '.EXAMINER_ID')
			->get($this->table)->num_rows();
		$response = array(
			"status" => 200,
			"message" => "Success",
			"total" => $total
		);
		return $response;
	}

	function deleteJadwalTest($id) {
		$message = array(
			"title" => "ERROR!",
			"content" => "Unknown Error",
			"type" => "error"
		);
		$deleteChild = $this->db->where('EVENT_ID', $id)->delete($this->abs);
		if ($deleteChild) {
			$delete = $this->db->where('ID', $id)->delete($this->table);
			if ($delete) {
				$message = array(
					"title" => "SUCCESS",
					"content" => "Data berhasil di hapus",
					"type" => "success"
				);
			}
		}
		$response = array(
			"status" => 200,
			"message" => $message,
		);
		return $response;
	}

}
