<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
	protected $table = 'user_master', $m_event = 'events_master', $event = 'events', $peserta = 'participant_master';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}

	function authLogin(array $data) {
		$sql = $this->db->where('USERNAME', $data['username'])->where('ROLE', 'ADMIN')->get($this->table)->result_array();
		if (count($sql)) {
			if ($data['password'] == $this->encryption->decrypt($sql[0]['PASSWORD'])) {
				$session = array(
					'USERNAME' => $sql[0]['USERNAME'],
					'ROLE' => $sql[0]['ROLE'],
					'ID' => $sql[0]['ID'],
					'NAME' => $sql[0]['NAME']
				);
				$this->session->set_userdata($session);
				$msg = 'loggedIn';
				$err = false;
				$element = 'none';
			} else {
				$err = true;
				$msg = 'Wrong password';
				$element = 'password';
			}
		} else {
			$err = true;
			$msg = 'Wrong Username';
			$element = 'username';
		}
		return $callback = array(
			'message' => $msg,
			'error' => $err,
			'element' => $element
		);
	}

	public function authLoginPeserta(array $data) {
		$sql = $this->db->select($this->table . '.*, ' . $this->peserta . '.ID AS PART_ID, ' . $this->m_event . '.ENCODE, ' . $this->peserta . '.AVATAR, ' . $this->peserta . '.COMPANY, ' . $this->peserta . '.COMPANY_LOCATION, ' . $this->peserta . '.EMAIL, ' . $this->m_event . '.ID AS EXAM_ID, ' . $this->m_event . '.EVENT_DATE')
			->join($this->peserta, $this->table . '.ID = ' . $this->peserta . '.USER_ID')
			->join($this->event, $this->peserta . '.ID = ' . $this->event . '.PARTICIPANT_ID')
			->join($this->m_event, $this->event . '.EVENT_ID = ' . $this->m_event . '.ID')
			->where('USERNAME', $data['username'])
			->where('ROLE', 'PESERTA')
			->where('ENCODE', $data['examcode'])
			->get($this->table)
			->result_array();
		if (count($sql)) {
			if ($data['password'] == $this->encryption->decrypt($sql[0]['PASSWORD'])) {
				if ($sql[0]['EVENT_DATE'] == date('Y-m-d')) {
					if ($sql[0]['ACTIVE_TOKEN'] == null) {
						$input = array(
							"LAST_LOGIN" => date('Y-m-d H:i:s'),
							"ACTIVE_TOKEN" => $this->tokenGenerator()
						);
						$this->db->where('ID', $sql[0]['ID'])->update($this->table, $input);
						$session = array(
							'USERNAME' => $sql[0]['USERNAME'],
							'ROLE' => $sql[0]['ROLE'],
							'ID' => $sql[0]['ID'],
							'NAME' => $sql[0]['NAME'],
							'EXAM_ID' => $sql[0]['EXAM_ID'],
							'ENCODE' => $sql[0]['ENCODE'],
							'PARTICIPANT_ID' => $sql[0]['PART_ID'],
							'COMPANY' => $sql[0]['COMPANY'],
							'COMPANY_ADDRESS' => $sql[0]['COMPANY_LOCATION'],
							'AVATAR' => $sql[0]['AVATAR'],
							'EMAIL' => $sql[0]['EMAIL']
						);
						$this->session->set_userdata($session);
						$msg = 'loggedIn';
						$err = false;
						$element = 'none';
					} else {
						$err = true;
						$msg = 'This User already logged in another device';
						$element = 'none';
					}
				} else {
					$err = true;
					$msg = 'Not in Test Date';
					$element = 'examcode';
				}
			} else {
				$err = true;
				$msg = 'Wrong password';
				$element = 'password';
			}
		} else {
			$err = true;
			$msg = 'Has no Exam, please try again later';
			$element = 'username';
		}
		return $callback = array(
			'message' => $msg,
			'error' => $err,
			'element' => $element
		);
	}

	function tokenGenerator() {
		$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		return $this->encryption->encrypt(substr(str_shuffle($permitted_chars), 0, 6));
	}

	function doLogout() {
		$userID = $this->session->userdata('ID');
		$input = array(
			"ACTIVE_TOKEN" => null
		);
		$this->db->where('ID', $userID)->update($this->table, $input);
		$this->session->sess_destroy();
	}
}
