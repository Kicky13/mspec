<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketModel extends CI_Model
{
	protected $table = 'qsheet_master';

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
}
