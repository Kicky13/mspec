<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultModel extends CI_Model {
	protected $table = 'ljk_header', $tchild = 'ljk', $mEvent = 'events_master', $mUser = 'user_master', $mPart = 'participant_master', $event = 'events', $mSheet = 'qsheet_master';

	public function __construct()
	{
		parent::__construct();
	}

	function getSemuaResult() {
		$data = $this->db->select($this->mEvent . '.*, ' . $this->mUser . '.NAME as NAMA_PENGUJI, ' . $this->mUser . '.ID as ID_PENGUJI, ')
			->join($this->mUser, $this->mUser . '.ID = ' . $this->mEvent . '.EXAMINER_ID')
			->get($this->mEvent)
			->result_array();
		for ($i = 0; $i < count($data); $i++) {
			$cekResult = $this->db->where('EVENT_ID', $data[$i]['ID'])->get($this->table)->result_array();
			$data[$i]['RESULTCOUNT'] = count($cekResult);
		}
		$response = array(
			"status" => 200,
			"message" => '',
			"data" => $data
		);
		return $response;
	}

	function getSemuaResultTest($id) {
		$headResult = $this->db->select($this->event . '.*, ' . $this->mPart . '.NAME, ' . $this->mEvent . '.ENCODE, ' . $this->mSheet . '.METHOD, ' . $this->mEvent . '.EVENT_DATE')
			->join($this->mPart, $this->mPart . '.ID = ' . $this->event . '.PARTICIPANT_ID')
			->join($this->mEvent, $this->mEvent . '.ID = ' . $this->event . '.EVENT_ID')
			->join($this->mSheet, $this->mSheet . '.ID = ' . $this->event . '.SHEET_ID')
			->where($this->event . '.EVENT_ID = ' . $id)
			->group_by($this->event . '.EVENT_ID')
			->get($this->event)
			->result_array();
		for ($i = 0; $i < count($headResult); $i++) {
			$ljk = $this->db->select($this->table . '.*, ' . $this->mSheet . '.SHEET_NO')
				->join($this->mEvent, $this->mEvent . '.ID = ' . $this->table . '.EVENT_ID')
				->join($this->mSheet, $this->mSheet . '.ID = ' .$this->table . '.SHEET_ID')
				->where($this->table . '.PARTICIPANT_ID', $headResult[$i]['PARTICIPANT_ID'])
				->where($this->table . '.EVENT_ID', $headResult[$i]['EVENT_ID'])
				->get($this->table)
				->result_array();
			$headResult[$i]['LJK'] = $ljk;
		}
		$response = array(
			'status' => 200,
			'msg' => 'Get Data Success',
			'data' => $headResult
		);
		return $response;
	}
}
