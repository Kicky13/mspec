<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('ResultModel', 'result');
	}

	function index() {
		$this->load->view('ResultView');
	}

	function getSemuaResult() {
		$data = $this->result->getSemuaResult();
		echo json_encode($data);
	}

	function detailResultPage($id) {
		$this->load->view('detailResultView', compact('id'));
	}

	function getSemuaResultTest($id) {
		$data = $this->result->getSemuaResultTest($id);
		echo json_encode($data);
	}
}
