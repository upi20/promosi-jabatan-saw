<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aplikasi extends Render_Controller
{
	public function index()
	{
		// Page Settings
		$this->title = 'Pegaturan Aplikasi';
		$this->content = 'pengaturan-aplikasi';
		$this->navigation = ['Pengaturan', 'Aplikasi'];
		$this->plugins = [''];

		// Breadcrumb setting
		$this->breadcrumb_1 = 'Dashboard';
		$this->breadcrumb_1_url = base_url() . 'dashboard';
		$this->breadcrumb_2 = 'Pengaturan';
		$this->breadcrumb_2_url = '#';
		$this->breadcrumb_3 = 'Aplikasi';
		$this->breadcrumb_3_url = 'aplikasi';

		// Send data to view
		$this->data['display'] = $this->aplikasi->getAllData();
		$this->render();
	}

	// simpan app_name
	public function app_name()
	{
		$this->aplikasi->set_app_name($this->input->post("value"));
		$this->output_json($this->input->post("value"));
	}

	// simpan copyright
	public function copyright()
	{
		$this->aplikasi->set_copyright($this->input->post("value"));
		$this->output_json($this->input->post("value"));
	}

	// simpan page_setting
	public function page_setting()
	{
		$this->aplikasi->set_page_setting($this->input->post("value"));
		$this->output_json($this->input->post("value"));
	}

	// simpan template_type
	public function template_type()
	{
		$this->aplikasi->set_template_type($this->input->post("value"));
		$this->output_json($this->input->post("value"));
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('pengaturan/AplikasiModel', 'aplikasi');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}
}

/* End of file Level.php */
/* Location: ./application/controllers/pengaturan/Level.php */
