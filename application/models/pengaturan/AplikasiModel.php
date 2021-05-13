<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AplikasiModel extends Render_Model
{


	public function getAllData()
	{
		$result = ['app_name' => '', 'copyright' => '', 'template_type' => '', 'page_setting' => ''];

		try {
			$exe = $this->db->get('pengaturan');
			$exe = $exe->result_array();
			foreach ($exe as $e) {
				if ($e['nama'] == 'app_name') $result['app_name'] = $e['nilai'];
				if ($e['nama'] == 'copyright') $result['copyright'] = $e['nilai'];
				if ($e['nama'] == 'template_type') $result['template_type'] = $e['nilai'];
				if ($e['nama'] == 'page_setting') $result['page_setting'] = $e['nilai'];
			}
		} catch (\Throwable $th) {
			//throw $th;
		}
		return $result;
	}


	public function getDataDetail($id)
	{
		$exe = $this->db->get_where('level', ['lev_id' => $id]);

		return $exe->row_array();
	}


	public function insert($nama, $keterangan, $status)
	{
		$data['lev_nama'] = $nama;
		$data['lev_keterangan'] = $keterangan;
		$data['lev_status'] = $status;

		$exe = $this->db->insert('level', $data);
		$exe = $this->db->insert_id();

		return $exe;
	}


	public function set_app_name($nilai)
	{
		$query = $this->db->query("SELECT nilai FROM pengaturan WHERE nama='app_name'");
		$exe = null;
		if ($query->row_array()) {
			$exe = $this->db->set('nilai', $nilai)->where('nama', 'app_name')->update('pengaturan');
		} else {
			$exe = $this->db->insert('pengaturan', ['nama' => 'app_name', 'keterangan' => '', 'nilai' => $nilai]);
		}
		return $exe;
	}
	public function set_copyright($nilai)
	{
		$query = $this->db->query("SELECT nilai FROM pengaturan WHERE nama='copyright'");
		$exe = null;
		if ($query->row_array()) {
			$exe = $this->db->set('nilai', $nilai)->where('nama', 'copyright')->update('pengaturan');
		} else {
			$exe = $this->db->insert('pengaturan', ['nama' => 'copyright', 'keterangan' => '', 'nilai' => $nilai]);
		}
		return $exe;
	}
	public function set_page_setting($nilai)
	{
		$query = $this->db->query("SELECT nilai FROM pengaturan WHERE nama='page_setting'");
		$exe = null;
		if ($query->row_array()) {
			$exe = $this->db->set('nilai', $nilai)->where('nama', 'page_setting')->update('pengaturan');
		} else {
			$exe = $this->db->insert('pengaturan', ['nama' => 'page_setting', 'keterangan' => '', 'nilai' => $nilai]);
		}
		return $exe;
	}
	public function set_template_type($nilai)
	{
		$query = $this->db->query("SELECT nilai FROM pengaturan WHERE nama='template_type'");
		$exe = null;
		if ($query->row_array()) {
			$exe = $this->db->set('nilai', $nilai)->where('nama', 'template_type')->update('pengaturan');
		} else {
			$exe = $this->db->insert('pengaturan', ['nama' => 'template_type', 'keterangan' => '', 'nilai' => $nilai]);
		}
		return $exe;
	}
}

/* End of file LevelModel.php */
/* Location: ./application/models/pengaturan/LevelModel.php */
