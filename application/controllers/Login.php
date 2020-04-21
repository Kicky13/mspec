<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('LoginModel', 'login');
	}

	function index() {
		if ($this->session->has_userdata('ID')) {
			redirect('Home');
		} else {
			$this->load->view('LoginView');
		}
	}

	function participant() {
		$this->load->view('LoginPesertaView');
	}

	public function authLogin() {
		$data = $this->login->authLogin($this->input->post());
		echo json_encode($data);
	}

	function doLogout() {
		$this->session->sess_destroy();
		redirect('Login');
	}
}
