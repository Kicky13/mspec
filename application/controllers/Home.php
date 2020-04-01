<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'user')
			->model('PaketModel', 'paket')
			->model('ScheduleModel', 'ujian');
	}

	public function index() {
		$this->load->view('HomeView');
	}

	public function countActivePeserta() {
		$data = $this->user->countActivePeserta();
		echo json_encode($data);
	}

	public function countPaketSoal() {
		$data = $this->paket->countPaketSoal();
		echo json_encode($data);
	}

	public function countUjianPeserta() {
		$data = $this->ujian->countUjianPeserta();
		echo json_encode($data);
	}
}
