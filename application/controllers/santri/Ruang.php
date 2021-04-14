<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends Render_Controller
{
    function __construct()
    {
        parent::__construct();
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
        $this->title                     = 'Santri Ruang';
        $this->content                     = 'santri-ruang';
        $this->navigation                 = ['santri', 'Ruang'];
        $this->plugins                     = ['datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Santri';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Ruang';
        $this->breadcrumb_3_url         = '#';

        // // Send data to view
        $this->data['Ruang'] = $this->Ruang->getData();
        $this->render();
    }

    // Delete data
    public function delete()
    {
        $id = $this->input->post('id');

        $exe = $this->Ruang->delete($id);

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
        $exe = $this->Ruang->insert($nama);
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
        $exe                         = $this->Ruang->update($id, $nama);

        $this->output_json(
            [
                'id'             => $id,
                'nama'             => $nama,
            ]
        );
    }
}
