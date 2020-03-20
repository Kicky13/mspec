<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('UserModel', 'user');
	}

	function index() {
		$this->load->view('UserView');
	}

	function getSemuaPeserta() {
		$data = $this->user->getSemuaPeserta();
		echo json_encode($data);
	}

	function insertPeserta() {
		$data = $this->user->insertPeserta($this->input->post());
		echo json_encode($data);
	}
}
