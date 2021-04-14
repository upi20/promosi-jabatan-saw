<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SantriModel extends Render_Model
{
    public function getData($id = null)
    {
        $this->db->select('santri.id_santri, santri.nama, santri.tanggal_lahir, santri.jenis_kelamin, santri.tanggal, santri.alamat, santri.no_hp, santri.status, santri_ruang.nama as ruang, santri_ruang.id as id_ruang, santri_tahun_ajaran.nama as tahun_ajaran, santri_tahun_ajaran.id as id_tahun_ajaran, santri_tingkat.nama as tingkat, santri_tingkat.id as id_tingkat, santri_kelas.nama as kelas, santri_kelas.id as id_kelas');
        $this->db->from('santri');
        $this->db->join('santri_tingkat', 'santri_tingkat.id = santri.tingkat_id', 'left');
        $this->db->join('santri_kelas', 'santri_kelas.id = santri.kelas_id', 'left');
        $this->db->join('santri_ruang', 'santri_ruang.id = santri.ruang_id', 'left');
        $this->db->join('santri_tahun_ajaran', 'santri_tahun_ajaran.id = santri.tahun_ajaran_id', 'left');
        if ($id) {
            $this->db->where('santri.id_santri', $id);
            return $this->db->get()->row_array();
        } else {
            return $this->db->get()->result_array();
        }
    }

    public function delete($id)
    {
        $exe = $this->db->where('id_santri', $id);
        $exe = $this->db->delete('santri');

        return $exe;
    }

    public function insert($tingkat_id, $kelas_id, $ruang_id, $tahun_ajaran_id, $nama, $jenis_kelamin, $alamat, $status, $tanggal_lahir, $no_hp)
    {
        $data['tingkat_id'] = $tingkat_id;
        $data['kelas_id'] = $kelas_id;
        $data['ruang_id'] = $ruang_id;
        $data['tahun_ajaran_id'] = $tahun_ajaran_id;
        $data['nama'] = $nama;
        $data['jenis_kelamin'] = $jenis_kelamin;
        $data['alamat'] = $alamat;
        $data['status'] = $status;
        $data['tanggal_lahir'] = $tanggal_lahir;
        $data['no_hp'] = $no_hp;

        $execute                     = $this->db->insert('santri', $data);
        $exe['id']                     = $this->db->insert_id();

        return $exe;
    }

    public function update($id_santri, $tingkat_id, $kelas_id, $ruang_id, $tahun_ajaran_id, $nama, $jenis_kelamin, $alamat, $status, $tanggal_lahir, $no_hp)
    {
        $id = $id_santri;
        $data['tingkat_id'] = $tingkat_id;
        $data['kelas_id'] = $kelas_id;
        $data['kelas_id'] = $kelas_id;
        $data['ruang_id'] = $ruang_id;
        $data['tahun_ajaran_id'] = $tahun_ajaran_id;
        $data['nama'] = $nama;
        $data['jenis_kelamin'] = $jenis_kelamin;
        $data['alamat'] = $alamat;
        $data['status'] = $status;
        $data['tanggal_lahir'] = $tanggal_lahir;
        $data['no_hp'] = $no_hp;

        $execute                     = $this->db->where('id_santri', $id);
        $execute                     = $this->db->update('santri', $data);
        $exe['id']                     = $id;

        return $exe;
    }
}
