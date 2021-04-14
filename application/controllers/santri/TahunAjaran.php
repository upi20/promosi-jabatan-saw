<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TahunAjaran extends Render_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('santri/TahunAjaranModel', 'TahunAjaran');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }

    public function index()
    {
        // Page Settings
        $this->title                     = 'Santri Tahun Ajaran';
        $this->content                     = 'santri-tahun_ajaran';
        $this->navigation                 = ['santri', 'Tahun Ajaran'];
        $this->plugins                     = ['datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Santri';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Tahun Ajaran';
        $this->breadcrumb_3_url         = '#';

        // // Send data to view
        $this->data['tahun_ajaran'] = $this->TahunAjaran->getData();
        $this->render();
    }

    // Delete data
    public function delete()
    {
        $id = $this->input->post('id');

        $exe = $this->TahunAjaran->delete($id);

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
        $exe = $this->TahunAjaran->insert($nama);
        $this->output_json(
            [
                'id' => $exe['id'],
                'nama'  => $nama
            ]
        );
    }

    // Update data
    public function update()
    {
        $id                         = $this->input->post('id');
        $nama                         = $this->input->post('nama');
        $exe                         = $this->TahunAjaran->update($id, $nama);

        $this->output_json(
            [
                'id'             => $id,
                'nama'             => $nama,
            ]
        );
    }
}
