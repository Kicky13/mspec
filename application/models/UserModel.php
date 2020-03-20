<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
	protected $table = 'participant_master';
	protected $userTable = 'user_master';

	public function __construct()
	{
		parent::__construct();
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
				$message = array(
					'title' => 'SUCCESS!',
					'content' => 'Insert Success',
					'type' => 'success'
				);
				$response = array(
					'message' => $message,
					'status' => 'success',
					'id' => $insertPesertaID
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
}
