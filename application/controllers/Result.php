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
		$data = $this->result->getSemuaResultTest($id);
		$colspan = $data['data']['colspan'];
		$tablehead = $data['data']['tablehead'];
		$this->load->view('detailResultView', compact('id', 'colspan', 'tablehead'));
	}

	function getSemuaResultTest($id) {
		$data = $this->result->getSemuaResultTest($id);
		echo json_encode($data);
	}

	function openLJK($id) {
		$main = $this->result->getLJK($id);
//		echo json_encode($main);
		$this->load->view('LJKView', compact('id', 'main'));
	}

	function getJawabanLJK($id) {
		$data = $this->result->getJawabanLJK($id);
		echo json_encode($data);
	}
}
