<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('ScheduleModel', 'event');
	}

	function index() {
		$this->load->view('ScheduleView');
	}

	function examiner() {
		$data = $this->event->examiner();
		echo json_encode($data);
	}
}
