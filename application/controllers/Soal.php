<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Soal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PaketModel', 'paket');
	}

	public function index() {
		$this->load->view('SoalView');
	}

	public function getPaketSoal() {
		$data = $this->paket->getPaketSoal();
		echo json_encode($data);
	}

	public function insertSoal() {
		$data = $this->paket->insertSoal($this->input->post());
		echo json_encode($data);
	}

	public function deletePaket($id) {
		$data = $this->paket->deletePaket($id);
		echo json_encode($data);
	}

	public function editPagePaket($id) {
		$this->load->view('EditPaketView', compact('id'));
	}

	public function getDetailPaket($id) {
		$data = $this->paket->showDetailPaket($id);
		echo json_encode($data);
	}

	public function updatePaket($id) {
		$data = $this->paket->updatePaket($id, $this->input->post());
		echo json_encode($data);
	}

	public function getSoalPerPaket($idPaket) {
		$data = $this->paket->getSoalPerPaket($idPaket);
		echo json_encode($data);
	}

	public function uploadSoal_dr($id) {
		define('SITE_ROOT', realpath(dirname(__FILE__)));
		$path = './uploads/' . basename($_FILES['uploaded']['name']);
		error_reporting(E_ALL ^ E_NOTICE);
		$file = $_FILES['uploaded']['tmp_name'];
		if (move_uploaded_file($file, $path)) {
			try {
				$inputFileType = IOFactory::identify($path);
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($path, PATHINFO_BASENAME) . '": ' . $e->getMessage());
			}
		}
		$response = array(
			'type' => 'error',
			'title' => 'ERROR',
		);
		echo json_encode($path);
	}

	public function uploadSoal($id) {
		$file = $_FILES['uploaded']['name'];
		$config['file_name'] = $file;
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'xls|xlsx';
		$config['max_size']             = 100000;
		$config['overwrite']			= true;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('uploaded')) {
			$path = './uploads/' . $this->upload->data('client_name');
			$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$spreadSheet = $reader->load($path);
			$workSheet = $spreadSheet->getActiveSheet();
			$highestRow = $workSheet->getHighestRow();
			$prevSoal = '';
			$idSoal = 0;
			for ($i = 2; $i <= $highestRow; $i++) {
				$content = $workSheet->getCell('B' . $i)->getValue();
				if ($content !== $prevSoal && $content !== null) {
					$this->db->set('CONTENT', $content);
					$this->db->insert('question_master');
					$idSoal = $this->db->insert_id();
					$paket = array(
						'QSHEET_ID' => $id,
						'QUESTION_ID' => $idSoal
					);
					$this->db->insert('question_package', $paket);
					$prevSoal = $content;
				}
				$option = $workSheet->getCell('C' . $i)->getValue();
				$jawaban= $workSheet->getCell('D' . $i)->getValue();
				$value = ($workSheet->getCell('E' . $i)->getValue() == null) ? 0 : 1;
				$insertJawaban = array(
					'QUESTION_ID' => $idSoal,
					'ALPHA' => $option,
					'ANSWER_TEXT' => $jawaban,
					'VALUE' => $value
				);
				$this->db->insert('qchoice_master', $insertJawaban);
			}
			$response = array(
				'type' => 'success',
				'title' => 'SUCCESS',
				'message' => 'Successfully uploded document',
				'data' => $this->upload->data()
			);
		} else {
			$response = array(
				'type' => 'error',
				'title' => 'ERROR',
				'message' => $this->upload->display_errors()
			);
		}
		echo json_encode($response);
	}
}
