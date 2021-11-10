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

	public function report($id='')
	{
		if (!$this->session->userdata('id')) {
			redirect('Login','refresh');
		}
		$data = [
			'tunjangan' => $this->tunjangan->listing()->result_array(),
			'data' => []
		];

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
		if (@$id) {
			$whereGaji['nip'] = $id;
		}
		$gaji = $this->gaji->show($whereGaji)->result_array();
		$gajinew = [];

		foreach ($gaji as $val) {
			$val['absen'] = $this->api->getApi('Absensi/'.$val['nip'],$date)['data'][0];
			$val['emp'] = $this->api->getApi('Employee/'.$val['nip'])['data'];
			$val['tunj'] = $this->tunjangan->show(['id_gaji' => $val['id_gaji']])->result_array();
			$val['lembur'] = $this->lembur->showSum(['id_gaji' => $val['id_gaji']])->row()->total_jam_lembur;
			$gajinew[] = $val;
		}
		$filename = "Slip_Gaji_".date('F_Y', strtotime($today)).".pdf";

		$pdf = new \TCPDF('L', 'cm', 'A5','true');
	    $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetHeaderMargin(false);
		$pdf->SetFooterMargin(false);
		$pdf->setMargins(1, 0.8, 1);
	    $pdf->SetAutoPageBreak(true, 0);

		foreach ($gajinew as $geng) {
			$pdf->AddPage();
			$data['val'] = $geng;
			$pdf->SetFont('helvetica', '', '8');
			// $file = $this->load->view('pages/Report/SlipGaji', $data, TRUE);
			$this->load->view('pages/Report/SlipGajiFix', $data, FALSE);
			// $file = $this->load->view('pages/Report/SlipGajiFix', $data, TRUE);
			// $pdf->writeHTML($file);
		}
		// $pdf->Output($filename, 'I');
	}



}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */