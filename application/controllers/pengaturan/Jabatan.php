<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends Render_Controller
{


	public function index()
	{
		// Page Settings
		$this->title 					= 'Pengaturan Jabatan';
		$this->content 					= 'pengaturan-jabatan';
		$this->navigation 				= ['Pengaturan', 'Jabatan'];
		$this->plugins 					= ['datatables'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'Pengaturan';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Jabatan';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->jabatan->getAllData();

		$this->render();
	}


	// Get data detail
	public function getDataDetail()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->jabatan->getDataDetail($id);

		$this->output_json(
			[
				'id' 			=> $exe['lev_id'],
				'nama' 			=> $exe['lev_nama'],
				'keterangan' 	=> $exe['lev_keterangan'],
				'status' 		=> $exe['lev_status'],
			]
		);
	}


	// Insert data
	public function insert()
	{
		$nama 							= $this->input->post('nama');
		$keterangan 					= $this->input->post('keterangan');
		$status 						= $this->input->post('status');

		$exe 							= $this->jabatan->insert($nama, $keterangan, $status);

		$this->output_json(
			[
				'id' 			=> $exe,
				'nama' 			=> $nama,
				'keterangan' 	=> $keterangan,
				'status' 		=> $status,
			]
		);
	}


	// Update data
	public function update()
	{
		$id 							= $this->input->post('id');
		$nama 							= $this->input->post('nama');
		$keterangan 					= $this->input->post('keterangan');
		$status 						= $this->input->post('status');

		$exe 							= $this->jabatan->update($id, $nama, $keterangan, $status);

		$this->output_json(
			[
				'id' 			=> $id,
				'nama' 			=> $nama,
				'keterangan' 	=> $keterangan,
				'status' 		=> $status,
			]
		);
	}


	// Delete data
	public function delete()
	{
		$id 							= $this->input->post('id');

		$exe 							= $this->jabatan->delete($id);

		$this->output_json(
			[
				'id' 			=> $id
			]
		);
	}


	function __construct()
	{
		parent::__construct();
		$this->load->model('pengaturan/jabatanModel', 'jabatan');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}
}

/* End of file Level.php */
/* Location: ./application/controllers/pengaturan/Level.php */