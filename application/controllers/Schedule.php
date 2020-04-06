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

	function insertJadwalTest() {
		$data = $this->event->insertJadwalTest($this->input->post());
		echo json_encode($data);
	}

	function getSemuaTest() {
		$data = $this->event->getSemuaTest();
		echo json_encode($data);
	}

	function editEventPage($id) {
		$this->load->view('editEventPage', compact('id'));
	}

	function getSemuaPesertaTest($encode) {
		$data = $this->event->getSemuaPesertaTest($encode);
		echo json_encode($data);
	}

	function insertPesertaTest() {
		$data = $this->event->insertPesertaTest($this->input->post());
		echo json_encode($data);
	}

	function deletePeserta($id) {
		$data = $this->event->deletePesertaUjian($id);
		echo json_encode($data);
	}

	function updateSchedule() {
		$data = $this->event->updateJadwalTest($this->input->post());
		echo json_encode($data);
	}

	function deleteSchedule($id) {
		$data = $this->event->deleteJadwalTest($id);
		echo json_encode($data);
	}
}
