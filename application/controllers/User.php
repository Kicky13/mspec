<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('UserModel', 'user');
	}

	function index() {
		$this->load->view('UserView');
	}

	function getSemuaPeserta() {
		$data = $this->user->getSemuaPeserta();
		echo json_encode($data);
	}

	function insertPeserta() {
		$avatar = $_FILES['AVATAR']['name'];
		$config['file_name'] = $avatar;
		$config['upload_path']          = './uploads/avatar/';
		$config['allowed_types']        = 'jpg|png|gif';
		$config['max_size']             = 100000;
		$config['overwrite']			= true;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('AVATAR')) {
			$filename = base_url() . 'uploads/avatar/' . $this->upload->data('client_name');
			$inputData = $this->input->post();
			$inputData['AVATAR'] = $filename;
			$data = $this->user->insertPeserta($inputData);
		} else {
			$message = array(
				'title' => 'ERROR!',
				'content' => 'Upload Failed, Something went wrong',
				'type' => 'error'
			);
			$data = array(
				'message' => $message,
				'status' => 'error',
			);
		}
		echo json_encode($data);
	}

	function updatePeserta() {
		$update = $this->input->post();
		$avt = (isset($_FILES['AVATAR']) ? true : false);
		if ($avt) {
			$avatar = $_FILES['AVATAR']['name'];
			$config['file_name'] = $avatar;
			$config['upload_path']          = './uploads/avatar/';
			$config['allowed_types']        = 'jpg|png|gif';
			$config['max_size']             = 100000;
			$config['overwrite']			= true;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('AVATAR')) {
				$filename = base_url() . 'uploads/avatar/' . $this->upload->data('client_name');
				$update['AVATAR'] = $filename;
			} else {
				$message = array(
					'title' => 'ERROR!',
					'content' => 'Upload Failed, Something went wrong',
					'type' => 'error'
				);
				$data = array(
					'message' => $message,
					'status' => 'error',
				);
				echo json_encode($data);
				die();
			}
		}
		$res = $this->user->updatePeserta($update);
		echo json_encode($res);
	}

	function deletePeserta($id) {
		$data = $this->user->deletePeserta($id);
		echo json_encode($data);
	}
}
