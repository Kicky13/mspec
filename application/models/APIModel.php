<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIModel extends CI_Model {
	protected $table = 'user_master';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}

	public function authLogin(array $data) {
		$sql = $this->db->where('USERNAME', $data['username'])->get($this->table)->result_array();
		if (count($sql)) {
			if ($data['password'] == $this->encryption->decrypt($sql[0]['PASSWORD'])) {
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
