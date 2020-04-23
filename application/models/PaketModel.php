<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketModel extends CI_Model
{
	protected $table = 'qsheet_master';
	protected $package_table = 'question_package';
	protected $soal_table = 'question_master';
	protected $answer_table = 'qchoice_master';
	protected $events = 'events';

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
		$sql = $this->db->select($this->events . '.*, ' . $this->table . '.DURATION, ' . $this->table . '.MAX_SCORE, ' . $this->table . '.SHEET_NO')->join($this->table, $this->table . '.ID = ' . $this->events . '.SHEET_ID')->where('EVENT_ID', $examID)->where('PARTICIPANT_ID', $partID)->get($this->events);
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
}
