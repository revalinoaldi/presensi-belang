<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Api','api');
		$this->load->model('PendapatanKaryawanModel','pdk');
	}

	public function index()
	{	

		$emp = $this->api->getApi('Employee')['data'];
		$newEmp = [];
		foreach ($emp as $val) {
			$where = ['nip' => $val['nip']];
			$row = $this->pdk->show($where)->row();
			$val['gaji_pokok'] = @$row->total_gp ? $row->total_gp : 0;
			$newEmp[] = $val;
		}


		$data = [
			'content' => 'pages/karyawan/list_employee',
			'data'=> $newEmp
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}

	public function updateGajiPokok($nip)
	{
		if (!$nip) {
			redirect('Karyawan','refresh');
		}

		$arr = [
			'total_gp' => $this->input->post('gapok')
		];

		if (@$nip == $this->input->post('nip')) {
			$where = ['nip' => $nip];
			$upd = $this->pdk->update($where, $arr);
		}

		redirect('Karyawan','refresh');
	}

	private function updateGaji()
	{
		$emp = $this->api->getApi('Employee')['data'];

		$result = [];
		foreach ($emp as $val) {

			$date1=date_create(date('Y-m-d', strtotime($val['tgl_awal_bekerja'])));
			$date2=date_create(date('Y-m-d'));

			$diff = date_diff($date1,$date2);
			$lama_bekerja = (int)$diff->format("%m");
			$gp = 0;
			if ($lama_bekerja < 12) {
				if ($val['jabatan'] == "Manager" || $val['jabatan'] == "Ass.Manager") {
					$gp = 7300000;
				}elseif ($val['jabatan'] == "Supervisor") {
					$gp = 6200000;
				}elseif ($val['jabatan'] == "Leader") {
					$gp = 5500000;
				}elseif ($val['jabatan'] == "Admin") {
					$gp = 5120000;
				}else{
					$gp = 5100000;
				}
			}else{
				if ($val['jabatan'] == "Manager" || $val['jabatan'] == "Ass.Manager") {
					$gp = 7800000;
				}elseif ($val['jabatan'] == "Supervisor") {
					$gp = 6600000;
				}elseif ($val['jabatan'] == "Leader") {
					$gp = 5800000;
				}elseif ($val['jabatan'] == "Admin") {
					$gp = 5200000;
				}else{
					$gp = 5150000;
				}
			}

			$insert = [
				'nip' => $val['nip'],
				'total_gp' => $gp
			];

			$this->db->insert('tbl_pendapatan_karyawan', $insert);
			if ($this->db->affected_rows() > 0) {
				$result[] = "oke";
			}else{
				$result[] = "tidak oke";
			}
		}
	}
}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */