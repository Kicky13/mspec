<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
	protected $table = 'user_master';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}

	public function authLogin(array $data) {
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
}
