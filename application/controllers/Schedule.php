<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('LoginModel', 'login');
	}

	function index() {
		$this->load->view('ScheduleView');
	}
}
