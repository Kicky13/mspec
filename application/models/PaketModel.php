<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketModel extends CI_Model
{
	protected $table = 'qsheet_master';
	protected $package_table = 'question_package';
	protected $soal_table = 'question_master';
	protected $answer_table = 'qchoice_master';
	protected $events = 'events';
	protected $ljkHeader = 'ljk_header';
	protected $ljk = 'ljk';

	public function __construct()
	{
		parent::__construct();
	}

	public function getPaketSoal()
	{
		$data = $this->db->get($this->table)->result();
		return $data;
	}

	public function showDetailPaket($id)
	{
		$data = $this->db->where('ID', $id)->get($this->table)->row();
		return $data;
	}

	public function insertSoal($data)
	{
		$insert = $this->db->insert($this->table, $data);
		if ($insert) {
			$response = array(
				'message' => 'Item has been inserted',
				'status' => 'success',
				'data' => $insert
			);
		} else {
			$response = array(
				'message' => 'Item failed to insert',
				'status' => 'error',
				'data' => $insert
			);
		}
		return $response;
	}

	public function deletePaket($id)
	{
		$res = $this->db->where('ID', $id)->delete($this->table);
		return $res;
	}

	public function updatePaket($id, $data)
	{
		$check = $this->db->where('SHEET_NO', $data['SHEET_NO'])->get($this->table)->num_rows();
		if ($check > 0) {
			$update = false;
			$find = $this->db->where('ID', $id)->get($this->table)->row();
			if ($find->SHEET_NO == $data['SHEET_NO']) {
				$update = true;
			}
			$res = array(
				'titlemsg' => 'ERROR',
				'contentmsg' => 'Nomor Paket telah digunakan, silahkan coba yang lain',
				'typemsg' => 'error'
			);
		} else {
			$update = true;
		}
		if ($update) {
			$sql = $this->db->where('ID', $id)->update($this->table, $data);
			if ($sql) {
				$res = array(
					'titlemsg' => 'TERSIMPAN',
					'contentmsg' => 'Info Paket berhasil di update',
					'typemsg' => 'success'
				);
			} else {
				$res = array(
					'titlemsg' => 'ERROR',
					'contentmsg' => 'Something went wrong, please check your network',
					'typemsg' => 'error'
				);
			}
		}
		return $res;
	}

	public function getSoalPerPaket($idPaket)
	{
		$query = $this->db->query('SELECT * FROM qsheet_master qs 
		JOIN question_package qp ON qs.ID = qp.QSHEET_ID 
		JOIN question_master qu ON qp.QUESTION_ID = qu.ID
		LEFT JOIN qchoice_master qm ON qu.ID = qm.QUESTION_ID AND qm.VALUE = 1
		WHERE qs.ID = ' . $idPaket);
		return $query->result();
	}

	public function deleteSoal($inputData) {
		$this->db->where('QSHEET_ID', $inputData['PAKET_ID']);
		$this->db->where('QUESTION_ID', $inputData['SOAL_ID']);
		$this->db->delete($this->package_table);
		$this->db->where('ID', $inputData['SOAL_ID']);
		$this->db->delete($this->soal_table);
		$message = array(
			'title' => 'DELETED!',
			'content' => 'Data Deleted!!!',
			'type' => 'success'
		);
		$response = array(
			'message' => $message,
			'status' => 'success',
		);
		return $response;
	}

	public function answerDetail($id) {
		$data = $this->db->query('SELECT * FROM ' . $this->answer_table . ' WHERE QUESTION_ID = ' .$id)->result();
		$response = array(
			'data' => $data,
			'status' => 'success',
		);
		return $response;
	}

	function countPaketSoal() {
		$total = $this->db->query('SELECT * FROM ' . $this->table)->num_rows();
		$response = array(
			'status' => 'success',
			'total' => $total
		);
		return $response;
	}

	function getExamWorkList() {
		$examID = $this->session->userdata('EXAM_ID');
		$partID = $this->session->userdata('PARTICIPANT_ID');
		$sql = $this->db->select($this->events . '.*, ' . $this->table . '.DURATION, ' . $this->table . '.MAX_SCORE, ' . $this->table . '.SHEET_NO')->join($this->table, $this->table . '.ID = ' . $this->events . '.SHEET_ID')->where('EVENT_ID', $examID)->where('PARTICIPANT_ID', $partID)->where('COMPLETED_STATUS', 0)->get($this->events);
		$dataEvent = $sql->result_array();
		for ($i = 0; $i < count($dataEvent); $i++) {
			$sql2 = $this->db->where('QSHEET_ID', $dataEvent[$i]['SHEET_ID'])->get($this->package_table);
			$dataEvent[$i]['TOTALSOAL'] = $sql2->num_rows();
		}
		$msg = array(
			'titlemsg' => 'SUCCESS',
			'contentmsg' => 'Ambil data berhasil',
			'typemsg' => 'success'
		);
		$response = array(
			'status' => 200,
			'data' => $dataEvent,
			'msg' => $msg
		);
		return $response;
	}

	function submitLjk($kunci, $sheet, $event, $participant, $duration, $answered, $isTrue, $isFalse, $maxScore) {
		$kunci = json_decode($kunci);
		// Creating LJK Header
		$totalSoal = count($kunci);
		$score = ($maxScore / $totalSoal) * $isTrue;
		$this->db->trans_start();
		$header = array(
			'EVENT_ID' => $event,
			'PARTICIPANT_ID' => $participant,
			'SHEET_ID' => $sheet,
			'TIME_FINISHED' => $duration,
			'ANSWERED' => $answered,
			'FALSE_ANSWER' => $isFalse,
			'TRUE_ANSWER' => $isTrue,
			'SCORE' => $score
		);
		$insertHeader = $this->db->insert($this->ljkHeader, $header);
		// Inserting LJK
		if ($insertHeader) {
			$headerID = $this->db->insert_id();
			foreach ($kunci as $item) {
				$ljk = array(
					'HEADER_ID' => $headerID,
					'QUESTION_ID' => $item->questionID,
					'QUESTION_NO' => $item->questionNo,
					'ANSWER' => isset($item->answerID) ? $item->answerID : null
				);
				$this->db->insert($this->ljk, $ljk);
			}
			$events = array(
				'COMPLETED_STATUS' => 1
			);
			// Updating Status
			$updateEvent = $this->db->where('EVENT_ID', $event)->where('PARTICIPANT_ID', $participant)->where('SHEET_ID', $sheet)->update($this->events, $events);
			$this->db->trans_complete();
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				$res = array(
					'titlemsg' => 'ERROR',
					'contentmsg' => 'Something went wrong, please try again',
					'typemsg' => 'error'
				);
			} else {
				$this->db->trans_commit();
				$res = array(
					'titlemsg' => 'TERSIMPAN',
					'contentmsg' => 'Jawaban Berhasil Di submit, page allowed to leave',
					'typemsg' => 'success'
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

	function questionUpdate($dataUpdate) {
		$inputData = array(
			'CONTENT' => $dataUpdate['CONTENT'],
			'IMAGE' => $dataUpdate['IMAGE']
		);
		$id = $dataUpdate['ID'];
		$update = $this->db->where('ID', $id)->update($this->soal_table, $inputData);
		if ($update) {
			$alert = array(
				'type' => 'success',
				'header' => 'UPDATED!',
				'body' => 'Data Has been updated'
			);
			$res = array(
				'status' => 200,
				'msg' => 'Update Success',
				'alert' => $alert
			);
		} else {
			$alert = array(
				'type' => 'error',
				'header' => 'FAILED!',
				'body' => 'Data fail to update'
			);
			$res = array(
				'status' => 500,
				'msg' => 'Update Failed, Internal server Error',
				'alert' => $alert
			);
		}
		return $res;
	}

	function answerUpdate($data) {
		$body = array(
			'ANSWER_TEXT' => $data['ANSWER_TEXT']
		);
		$update = $this->db->where('ID', $data['ID'])->update($this->answer_table, $body);
		if ($update) {
			$alert = array(
				'header' => 'UPDATED!',
				'body' => 'Data has been updated',
				'type' => 'success'
			);
			$res = array(
				'status' => 200,
				'msg' => 'Update Success',
				'alert' => $alert
			);
		} else {
			$alert = array(
				'header' => 'FAILED!',
				'body' => 'Data has fail to updated',
				'type' => 'error'
			);
			$res = array(
				'status' => 500,
				'msg' => 'Update Failed',
				'alert' => $alert
			);
		}
		return $res;
	}

	function dataSoal($id) {
		$header = $this->db->where('ID', $id)->get($this->table)->row_array();
		$package = $this->db->select($this->soal_table . '.*, ' . $this->package_table . '.QSHEET_ID')->join($this->soal_table, $this->soal_table . '.ID = ' . $this->package_table . '.QUESTION_ID')->where($this->package_table . '.QSHEET_ID', $id)->get($this->package_table)->result_array();
		for ($i = 0; $i < count($package); $i++) {
			$answer = $this->db->where('QUESTION_ID', $package[$i]['ID'])->order_by('ALPHA', 'ASC')->get($this->answer_table)->result_array();
			$package[$i]['ANSWER'] = $answer;
		}
		$res = array(
			'HEADER' => $header,
			'SOAL' => $package
		);
		return $res;
	}
}
