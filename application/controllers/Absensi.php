<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api','api');
	}

	public function index($id='')
	{
		$date = [];
		if (@$this->input->get()) {
			$date['tgl_from'] = date('Y-m-d', strtotime($this->input->get('from')));
			$date['tgl_at'] = date('Y-m-d', strtotime($this->input->get('at')));
		}else{
			$month = date('Y-m');

			$date1 = date_create($month.'-15');
			$date2 = date_create($month.'-15');
			date_add($date1,date_interval_create_from_date_string("-1 month"));

			$date['tgl_from'] = date_format($date1,"Y-m-d");
			$date['tgl_at'] = date_format($date2,"Y-m-d");
		}

		$data = [
			'content' => 'pages/absen/vabsensi',
			'data' => $this->api->getApi('Absensi/'.$id,$date),
			'date' => $date
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}

	public function generate($id='')
	{
		$date = [];
		if (@$this->input->get()) {
			$date['tgl_from'] = date('Y-m-d', strtotime($this->input->get('from')));
			$date['tgl_at'] = date('Y-m-d', strtotime($this->input->get('at')));
		}else{
			$month = date('Y-m');

			$date1 = date_create($month.'-15');
			$date2 = date_create($month.'-15');
			date_add($date1,date_interval_create_from_date_string("-1 month"));

			$date['tgl_from'] = date_format($date1,"Y-m-d");
			$date['tgl_at'] = date_format($date2,"Y-m-d");
		}

		$absen = $this->api->getApi('Absensi/'.$id,$date)['data'];
		$generate = [];
		// foreach ($absen as $val) {
		// 	$i = [''];
		// }
	}

	public	function lembur()
	{
		$data = [
			'content' => 'pages/absen/vlembur'
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}
}

/* End of file Absensi.php */
/* Location: ./application/controllers/Absensi.php */