<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends Render_Controller
{
	public function index()
	{
		$this->hasil->hitung();
		// Page Settings
		$this->title 					= 'Hitung Hasil';
		$this->content 					= 'spk-hasil';
		$this->navigation 				= ['SPK', 'Hitung Hasil'];
		$this->plugins 					= ['datatables'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';
		$this->breadcrumb_2 			= 'SPK';
		$this->breadcrumb_2_url 		= '#';
		$this->breadcrumb_3 			= 'Hitung Hasil';
		$this->breadcrumb_3_url 		= '#';

		// Send data to view
		$this->data['records'] 			= $this->hasil->getAllData();
		$this->data['result'] 			= $this->hasil->hitung();
		$this->data['status'] 			= $this->hasil->status();
		$this->render();
	}

	public function simpan()
	{
		$this->output_json($this->hasil->simpan(1));
	}

	public function buka()
	{
		$this->output_json($this->hasil->simpan(0));
	}

	public function reset()
	{
		$this->output_json($this->hasil->reset());
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('spk/HasilModel', 'hasil');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}
}

/* End of file Level.php */
/* Location: ./application/controllers/pengaturan/Level.php */
