<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api','api');
		$this->load->model('GajiModel','gaji');
		$this->load->model('tunjangan_model','tunjangan');
		// $this->load->model('Detil_tunjangan_model','tunjGaji');
		$this->load->model('LemburanModel','lembur');
	}

	public function index()
	{
		$data = [
			'content' => 'pages/Gaji/daftargaji',
			'tunjangan' => $this->tunjangan->listing()->result_array(),
			'data' => []
		];
		$data['title'] = "E-Penggajian|Ikeda";
		$today = date("Y-m-d");

		if (@$this->input->post('month') && @$this->input->post('year')) {
			$now = date('d').'-'.$this->input->post('month').'-'.$this->input->post('year');
			$today = date("Y-m-d", strtotime($now));
		}
		$first = date('Y-m-01', strtotime($today));
		$last = date('Y-m-t', strtotime($today));

		$whereGaji = [
			'tgl_terima_gaji >= ' => $first,
			'tgl_terima_gaji <= ' => $last,
		];
		$gaji = $this->gaji->show($whereGaji)->result_array();
		$gajinew = [];

		foreach ($gaji as $val) {
			$val['emp'] = $this->api->getApi('Employee/'.$val['nip'])['data'];
			$val['tunj'] = $this->tunjangan->show(['id_gaji' => $val['id_gaji']])->result_array();
			$val['lembur'] = $this->lembur->showSum(['id_gaji' => $val['id_gaji']])->row()->total_jam_lembur;
			$gajinew[] = $val;
		}
		$data['data'] = $gajinew;
		$this->load->view('layout/main', $data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */