<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api','api');
		$this->load->model('Detil_tunjangan_model','tunjangan');
		$this->load->model('PendapatanKaryawanModel','pendapatan');

		// For Insert
		$this->load->model('GajiModel','gaji');
		$this->load->model('LemburanModel','lembur');
		$this->load->model('Tunjangan_model','tunj');
	}

	public function index($id='')
	{
		$date = [];
		if (@$this->input->get()) {
			$date['tgl_from'] = date('Y-m-d', strtotime($this->input->get('from')));
			$date['tgl_at'] = date('Y-m-d', strtotime($this->input->get('at')));
		}else{

			if (date('d') >= 16) {
				$month = date('Y-m');

				$date1 = date_create($month.'-16');
				$date2 = date_create($month.'-15');
				date_add($date2,date_interval_create_from_date_string("+1 month"));
			}else{
				$month = date('Y-m');

				$date1 = date_create($month.'-16');
				$date2 = date_create($month.'-15');
				date_add($date1,date_interval_create_from_date_string("-1 month"));
			}

			$date['tgl_from'] = date_format($date1,"Y-m-d");
			$date['tgl_at'] = date_format($date2,"Y-m-d");
		}

		$today = date("Y-m-d");
		$first = date('Y-m-01', strtotime($today));
		$last = date('Y-m-t', strtotime($today));

		$whereGaji = [
			'tgl_terima_gaji >= ' => $first,
			'tgl_terima_gaji <= ' => $last,
		];
		$selectGaji = $this->gaji->show($whereGaji);
		$resultGaji = false;
		if ($selectGaji->num_rows() > 0) {
			$resultGaji = true;
		}

		$data = [
			'content' => 'pages/absen/vabsensi',
			'data' => $this->api->getApi('Absensi/'.$id,$date),
			'date' => $date,
			'gaji' => $resultGaji
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

			$date1 = date_create($month.'-16');
			$date2 = date_create($month.'-15');
			date_add($date1,date_interval_create_from_date_string("-1 month"));

			$date['tgl_from'] = date_format($date1,"Y-m-d");
			$date['tgl_at'] = date_format($date2,"Y-m-d");
		}

		$today = date("Y-m-d");
		$first = date('Y-m-01', strtotime($today));
		$last = date('Y-m-t', strtotime($today));

		$whereGaji = [
			'tgl_terima_gaji >= ' => $first,
			'tgl_terima_gaji <= ' => $last,
		];
		$selectGaji = $this->gaji->show($whereGaji);
		if ($selectGaji->num_rows() > 0) {
			$alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Warning!</strong> Gaji pada bulan '.date('F').' sudah di proses.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			$this->session->set_flashdata('notif', $alert);
			redirect('Absensi','refresh');
		}

		$absen = $this->api->getApi('Absensi/'.$id,$date)['data'];
		$generate = [];

		
		foreach ($absen as $val) {
			$p = [];
			$emp = $this->api->getApi('Employee/'.$val['nip_karyawan'])['data'];
			$lembur = $this->api->getApi('Lemburan/'.$val['nip_karyawan'])['data'];

			$i = ['id_jabatan' => $emp['id_jabatan']];
			$ip = ['nip' => $val['nip_karyawan']];
			$pendapatan = $this->pendapatan->show($ip)->row_array();
			$tunjangan = $this->tunjangan->showView($i)->result_array();
			$totalTunjangan = 0;
			$totalTunjanganTetap = 0;

			$totalTunjShift2 = 0;
			$totalTunjShift3 = 0;
			$totalAbsen = $val['total_shift1']+$val['total_shift2']+$val['total_shift3']-$val['total_tidak_masuk'];
			foreach ($tunjangan as $tunj) {
				if ($tunj['id_tunjangan'] == 4) {
					$ttj = $val['total_shift2']*$tunj['total_tunjangan'];
				}elseif ($tunj['id_tunjangan'] == 5) {
					$ttj = $val['total_shift3']*$tunj['total_tunjangan'];
				}elseif ($tunj['id_tunjangan'] == 3) {
					if ($val['total_tidak_masuk'] == 0 && $totalAbsen >= 22) {
						$ttj = $tunj['total_tunjangan'];
					}else{
						$ttj = 0;
					}
				}
				else{
					$ttj = $tunj['total_tunjangan'];
				}

				$totalTunjangan += $ttj;

				if ($tunj['tipe_tunjangan'] == 'tetap') {
					$totalTunjanganTetap += $tunj['total_tunjangan'];
				}
			}

			$totalLemburan = ($val['total_lemburan']*(($pendapatan['total_gp']+$totalTunjanganTetap)*1/173));

			$generate = [
				'id_gaji' => random_string('numeric', 8),
				'id_pendapatan' => $pendapatan['id_pendapatan'],
				'tgl_terima_gaji' => date('Y-m-d'),
				'gp' => $pendapatan['total_gp'],
				'total_tunjangan' => $totalTunjangan,
				'total_lemburan' => $totalLemburan,
				'total_gaji' => round($pendapatan['total_gp']+$totalLemburan+$totalTunjangan)
			];
			
			$this->gaji->insert($generate);

			foreach ($tunjangan as $tunj) {
				if ($tunj['id_tunjangan'] == 4) {
					$ttj = $val['total_shift2']*$tunj['total_tunjangan'];
				}elseif ($tunj['id_tunjangan'] == 5) {
					$ttj = $val['total_shift3']*$tunj['total_tunjangan'];
				}elseif ($tunj['id_tunjangan'] == 3) {
					if ($val['total_tidak_masuk'] == 0 && $totalAbsen >= 22) {
						$ttj = $tunj['total_tunjangan'];
					}else{
						$ttj = 0;
					}
				}
				else{
					$ttj = $tunj['total_tunjangan'];
				}
				
				$tunjEmp = [
					'id_gaji' => $generate['id_gaji'],
					'id_tunjangan' => $tunj['id_tunjangan'],
					'total_tunjangan' => $ttj
				];
				$this->tunj->insert_tunjangan($tunjEmp);
			}

			foreach ($lembur as $l) {
				$lemburan = [
					'id_gaji' => $generate['id_gaji'],
					'id_lemburan' => $l['id'],
					'total_jam' => $l['adj_act_time']
				];
				$this->lembur->insert($lemburan);
			}
		}

		redirect('Laporan','refresh');
	}

	public	function lembur()
	{
		$data = [
			'content' => 'pages/absen/vlembur',
			'data' => $this->api->getApi('Lemburan/')['data']
		];

		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}
}

/* End of file Absensi.php */
/* Location: ./application/controllers/Absensi.php */