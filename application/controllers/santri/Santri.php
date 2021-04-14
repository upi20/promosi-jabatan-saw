<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends Render_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('santri/SantriModel', 'Santri');
        $this->load->model('santri/KelasModel', 'Kelas');
        $this->load->model('santri/TahunAjaranModel', 'TahunAjaran');
        $this->load->model('santri/TingkatModel', 'Tingkat');
        $this->load->model('santri/RuangModel', 'Ruang');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }

    public function index()
    {
        // Page Settings
        $this->title                     = 'Santri';
        $this->content                     = 'santri-santri';
        $this->navigation                 = ['santri', 'Santri'];
        $this->plugins                     = ['datatables'];

        // // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'santri';
        $this->breadcrumb_2             = 'Santri';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Santri';
        $this->breadcrumb_3_url = '#';

        // // Send data to view
        $this->data['records'] = $this->Santri->getData();
        $this->data['Kelas'] = $this->Kelas->getData();
        $this->data['TahunAjaran'] = $this->TahunAjaran->getData();
        $this->data['Tingkat'] = $this->Tingkat->getData();
        $this->data['Ruang'] = $this->Ruang->getData();
        $this->render();
    }

    // Delete data
    public function delete()
    {
        $id                             = $this->input->post('id');

        $exe                             = $this->Santri->delete($id);

        $this->output_json(
            [
                'id'             => $id
            ]
        );
    }

    public function insert()
    {
        $tingkat_id = $this->input->post('tingkat_id');
        $kelas_id = $this->input->post('kelas_id');
        $ruang_id = $this->input->post('ruang_id');
        $tahun_ajaran_id = $this->input->post('tahun_ajaran_id');
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_hp = $this->input->post('no_hp');

        $exe = $this->Santri->insert($tingkat_id, $kelas_id, $ruang_id, $tahun_ajaran_id, $nama, $jenis_kelamin, $alamat, $status, $tanggal_lahir, $no_hp);

        $this->output_json($this->Santri->getData($exe['id']));
    }

    public function update()
    {
        $id_santri = $this->input->post('id_santri');
        $tingkat_id = $this->input->post('tingkat_id');
        $kelas_id = $this->input->post('kelas_id');
        $ruang_id = $this->input->post('ruang_id');
        $tahun_ajaran_id = $this->input->post('tahun_ajaran_id');
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_hp = $this->input->post('no_hp');

        $exe = $this->Santri->update($id_santri, $tingkat_id, $kelas_id, $ruang_id, $tahun_ajaran_id, $nama, $jenis_kelamin, $alamat, $status, $tanggal_lahir, $no_hp);

        $this->output_json($this->Santri->getData($exe['id']));
    }

    public function getDataDetail()
    {
        $this->output_json($this->Santri->getData($this->input->post('id')));
    }
}
