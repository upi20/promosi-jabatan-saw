<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputNilai extends Render_Controller
{
	public function index()
	{
		// Page Settings
		$this->title 					= 'Input Nilai';
		$this->content 					= 'spk-inputnilai';
		$this->navigation 				= ['SPK', 'Input Nilai'];
		$this->plugins 					= ['datatables'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'SPK';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Input Nilai';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->inputnilai->getAllData();

		$this->render();
	}

	public function simpan()
	{
		$this->output_json($this->inputnilai->simpan($this->input->post()));
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('spk/inputNilaiModel', 'inputnilai');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}
}

/* End of file Level.php */
/* Location: ./application/controllers/pengaturan/Level.php */
