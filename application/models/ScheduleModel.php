<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleModel extends CI_Model {
	protected $table = 'events_master';
	protected $userTable = 'user_master';
	protected $abs = 'events';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}

	function examiner() {
		$data = $this->db->where('ROLE', 'PENGUJI')->get($this->userTable)->result();
		$response = array(
			'status' => 200,
			'message' => 'success',
			'data' => $data
		);
		return $response;
	}

}
