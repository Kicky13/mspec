<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('APIModel', 'api');
	}

	function doLogin() {
		$data = $this->api->dologin($this->input->post());
		echo json_encode($data);
	}

	function doLogout() {
		$data = $this->api->doLogout($this->input->post('ID'));
		echo json_encode($data);
	}

	function getTestInfo() {
	    $data = $this->api->getTestInfo($this->input->post());
	    echo json_encode($data);
    }

    function submitLjk() {
		$data = $this->api->submitLjk($this->input->post());
		echo json_encode($data);
	}
}
