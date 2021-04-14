<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tingkat extends Render_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('santri/TingkatModel', 'Tingkat');
        $this->default_template = 'templates/dashboard';
        $this->load->library('plugin');
        $this->load->helper('url');

        // Cek session
        $this->sesion->cek_session();
    }

    public function index()
    {
        // Page Settings
        $this->title                     = 'Santri Tingkat';
        $this->content                     = 'santri-tingkat';
        $this->navigation                 = ['santri', 'Tingkat'];
        $this->plugins                     = ['datatables'];

        // Breadcrumb setting
        $this->breadcrumb_1             = 'Dashboard';
        $this->breadcrumb_1_url         = base_url() . 'dashboard';
        $this->breadcrumb_2             = 'Santri';
        $this->breadcrumb_2_url         = '#';
        $this->breadcrumb_3             = 'Tingkat';
        $this->breadcrumb_3_url         = '#';

        // // Send data to view
        $this->data['Tingkat'] = $this->Tingkat->getData();
        $this->render();
    }

    // Delete data
    public function delete()
    {
        $id = $this->input->post('id');

        $exe = $this->Tingkat->delete($id);

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
        $exe = $this->Tingkat->insert($nama);
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
        $exe                         = $this->Tingkat->update($id, $nama);

        $this->output_json(
            [
                'id'             => $id,
                'nama'             => $nama,
            ]
        );
    }
}
