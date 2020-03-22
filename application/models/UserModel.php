<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
	protected $table = 'participant_master';
	protected $userTable = 'user_master';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}

	function getSemuaPeserta() {
		$data = $this->db->query('SELECT pm.*, um.USERNAME, um.PASSWORD FROM ' . $this->table . ' pm
		JOIN ' . $this->userTable . ' um ON pm.USER_ID = um.ID');
		return $data->result();
	}

	function insertPeserta($data) {
		$username = str_replace(' ', '', strtolower($data['NAME']));
		$dataUser = array(
			'USERNAME' => $username,
			'PASSWORD' => $data['PASSWORD'],
			'NAME' => $data['NAME'],
			'ROLE' => 'PESERTA'
		);
		$insertUser = $this->db->insert($this->userTable, $dataUser);
		if ($insertUser) {
			$insertUserID = $this->db->insert_id();
			$dataPeserta = array(
				'USER_ID' => $insertUserID,
				'NAME' => $data['NAME'],
				'AVATAR' => $data['AVATAR'],
				'COMPANY' => $data['COMPANY'],
				'COMPANY_LOCATION' => $data['COMPANY_LOCATION'],
				'STATUS' => 'ACTIVE'
			);
			$insertPeserta = $this->db->insert($this->table, $dataPeserta);
			if ($insertPeserta) {
				$insertPesertaID = $this->db->insert_id();
				$dataPeserta['ID'] = $insertPesertaID;
				$message = array(
					'title' => 'SUCCESS!',
					'content' => 'Insert Success',
					'type' => 'success'
				);
				$response = array(
					'message' => $message,
					'status' => 'success',
					'data' => $dataPeserta
				);
			} else {
				$message = array(
					'title' => 'ERROR!',
					'content' => 'Insert Failed, Something went wrong when inserting participant',
					'type' => 'error'
				);
				$response = array(
					'message' => $message,
					'status' => 'error',
				);
			}
		} else {
			$message = array(
				'title' => 'ERROR!',
				'content' => 'Insert Failed, Something went wrong',
				'type' => 'error'
			);
			$response = array(
				'message' => $message,
				'status' => 'error',
			);
		}
		return $response;
	}

	function updatePeserta($inputData) {
		$peserta = $this->db->query('SELECT * FROM participant_master WHERE ID = ' . $inputData['ID'])->row_array();
		$usernameExist = $this->db->query('SELECT * FROM user_master WHERE USERNAME = "' . $inputData['USERNAME'] . '"');
		if ($usernameExist->num_rows() == 0) {
			$update = true;
		} else {
			$thisUser = $usernameExist->row_array();
			if ($thisUser['ID'] == $peserta['USER_ID']) {
				$update = true;
			} else {
				$update = false;
			}
		}
		if ($update) {
			$updatePeserta = array(
				'NAME' => $inputData['NAME'],
				'COMPANY' => $inputData['COMPANY'],
				'COMPANY_LOCATION' => $inputData['COMPANY_LOCATION']
			);
			$updateUser = array();
			if (isset($inputData['AVATAR'])) {
				$updatePeserta['AVATAR'] = $inputData['AVATAR'];
			}
			if ($this->db->query('SELECT * FROM ' .$this->userTable . ' WHERE USERNAME = "' . $inputData['USERNAME'] . '"')->num_rows() == 0) {
				$updateUser['USERNAME'] = $inputData['USERNAME'];
			}
			if (isset($inputData['PASSWORD'])) {
				$updateUser['PASSWORD'] = $inputData['PASSWORD'];
			}
			if (isset($updateUser['USERNAME']) || isset($updateUser['PASSWORD'])) {
				$this->db->where('ID', $peserta['USER_ID'])->update($this->userTable, $updateUser);
			}
			$this->db->where('ID', $inputData['ID'])->update($this->table, $updatePeserta);
			$message = array(
				'title' => 'SUCCESS!',
				'content' => 'Update Success!!!',
				'type' => 'success'
			);
			$response = array(
				'message' => $message,
				'status' => 'success',
			);
		} else {
			$message = array(
				'title' => 'ERROR!',
				'content' => 'Update Failed, Username must be unique',
				'type' => 'error'
			);
			$response = array(
				'message' => $message,
				'status' => 'error',
			);
		}
		return $response;
	}

	function deletePeserta($id) {
		$peserta = $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ID = ' . $id)->row_array();
		$this->db->where('ID', $id);
		$this->db->delete($this->table);
		$this->db->where('ID', $peserta['USER_ID']);
		$this->db->delete($this->userTable);
		$message = array(
			'title' => 'DELETED!',
			'content' => 'Data Has Been Deleted',
			'type' => 'error'
		);
		$response = array(
			'message' => $message,
			'status' => 'success',
		);
		return $response;
	}
}
