<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Render_Controller
{
	public function index()
	{
		// Page Settings
		$this->title 					= 'Dashboard';
		$this->navigation 				= ['Dashboard'];
		$this->plugins 					= ['datatables'];

		// Breadcrumb setting
		$this->breadcrumb_1 			= 'Dashboard';
		$this->breadcrumb_1_url 		= base_url() . 'dashboard';

		// Send data to view
		$this->data['status'] 			= $this->dashboard->status();
		if ($this->session->userdata('data')['level'] == "Manajer") {
			$this->data['jml_karyawan'] = $this->dashboard->jmlKaryawan();
			$this->data['sudah_isi'] = $this->dashboard->jmlKaryawanBelumDiIsi();
			$this->data['belum_isi'] = $this->data['jml_karyawan'] - $this->data['sudah_isi'];
			$this->data['jml_admin'] = $this->dashboard->jmlAdmin();
			$this->content = 'home-manajer';
		} elseif ($this->session->userdata('data')['level'] == "Administrator") {
			$this->data['jml_karyawan'] = $this->dashboard->jmlKaryawan();
			$this->data['jml_admin'] = $this->dashboard->jmlAdmin();
			$this->data['jml_manajer'] = $this->dashboard->jmlManajer();
			$this->content = 'home-administrator';
		} elseif ($this->session->userdata('data')['level'] == "Karyawan") {
			$this->content = 'home-karyawan';
			$this->data['result'] = $this->dashboard->hitung();
		}

		$this->render();
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel', 'dashboard');
		$this->default_template = 'templates/dashboard';
		$this->load->library('plugin');
		$this->load->helper('url');

		// Cek session
		$this->sesion->cek_session();
	}
}

/* End of file Level.php */
/* Location: ./application/controllers/pengaturan/Level.php */
