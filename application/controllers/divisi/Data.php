<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends Render_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('divisi/DataModel', 'Data');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}

	public function index()
	{
		// Page Settings
		$this->title = 'Divisi Data';
		$this->content = 'divisi-data';
		$this->navigation = ['Divisi', 'Data'];
		$this->plugins = ['datatables'];

		// Breadcrumb setting
		$this->breadcrumb_1 = 'Dashboard';
		$this->breadcrumb_1_url = base_url() . 'dashboard';
		$this->breadcrumb_2 = 'Divisi';
		$this->breadcrumb_2_url = '#';
		$this->breadcrumb_3 = 'Data';
		$this->breadcrumb_3_url = 'divisi/data';

		// // Send data to view
		$this->data['divisi'] = $this->Data->getData();
		$this->render();
	}

	// Delete data
	public function delete()
	{
		$id = $this->input->post('id');

		$exe = $this->Data->delete($id);

		$this->output_json(
			[
				'id' => $id
			]
		);
	}

	// Insert data
	public function insert()
	{
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$exe = $this->Data->insert($nama, $keterangan);
		$this->output_json(
			[
				'id' => $exe['id'],
				'nama' => $nama,
				'keterangan' => $keterangan
			]
		);
	}

	// Update data
	public function update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$exe = $this->Data->update($id, $nama, $keterangan);

		$this->output_json(
			[
				'id' => $id,
				'nama' => $nama,
				'keterangan' => $keterangan
			]
		);
	}
}
