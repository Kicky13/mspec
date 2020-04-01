<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('APIModel', 'api');
	}

	function doLogin() {
		$data = $this->api->dologin($this->input->post());
	}
}
