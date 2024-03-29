<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TunjanganKaryawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tunjangan_model','tunjangan');
	}

	public function index()
	{

		$data = [
			'content' => 'pages/tunjangan/list_tunjangan',
			'data' => $this->tunjangan->listing()->result_array()
		];
		$data['title'] = "E-Penggajian|Ikeda";
		
		$this->load->view('layout/main', $data);
	}

	public function tambah($id=''){

		$data = [
			'content' =>'pages/tunjangan/tambah',
			'data' =>[]
		];
		if (@$id) {
			$data['data']=$this->tunjangan->listing(['id_tunjangan'=>$id])->row();
		}
			
		$this->load->view('layout/main', $data, FALSE);
	}

	public function action($id='')
	{
		$this->form_validation->set_rules('jenis', '', 'trim|required');
		$this->form_validation->set_rules('tipe', '', 'trim|required');
		$this->form_validation->set_rules('total', '', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			redirect('tunjangankaryawan/tambah/'.$id,'refresh');
		} else {
			$data = array(
				'jns_tunjangan' => $this->input->post('jenis'), 
				'tipe_tunjangan' => $this->input->post('tipe'),
				'total_tunjangan' => $this->input->post('total')
				);
			if (!$id) {
				$row=$this->tunjangan->tambah($data);

			}
			else{
				$row=$this->tunjangan->edit($data,['id_tunjangan'=>$id]);
			}
			redirect('tunjangankaryawan','refresh');
		}
	}

	public function deleteTunjangan($id)
	{
		if (!$id) {
			redirect('tunjangankaryawan','refresh');
		}
		$where = ['id_tunjangan' => $id];
		$delete = $this->tunjangan->delete($where);
		if ($delete) {
			$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Success!</strong> Berhasil menghapus Record Tunjangan.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			$this->session->set_flashdata('notif', $alert);
			redirect('tunjangankaryawan','refresh');
		}else{
			$alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Warning!</strong> Gagal menghapus record tunjangan.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			$this->session->set_flashdata('notif', $alert);
			redirect('tunjangankaryawan','refresh');
		}
	}
}

/* End of file TunjanganKaryawan.php */
/* Location: ./application/controllers/TunjanganKaryawan.php */