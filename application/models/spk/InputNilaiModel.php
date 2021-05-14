<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inputNilaiModel extends Render_Model
{


	public function getAllData()
	{
		$exe = $this->db->select("b.user_id, b.user_nama, d.masa_kerja, d.kinerja, d.prilaku")
			->from("role_users a")
			->join("users b", "a.role_user_id = b.user_id")
			->join("level c", "c.lev_id = a.role_lev_id")
			->join("nilai d", "a.role_user_id = d.id_user", "left")
			->where("a.role_lev_id", "6")
			->get();

		return $exe->result_array();
	}

	public function simpan($data)
	{
		$exe = null;
		$num = $this->db->get_where("nilai", ["id_user" => $data['id_user']])->num_rows();
		if ($num) {
			$exe = $this->db->set($data)->where(["id_user" => $data['id_user']])->update('nilai');
		} else {
			$exe = $this->db->insert("nilai", $data);
		}
		return $exe ? $data : $exe;
	}
}

/* End of file LevelModel.php */
/* Location: ./application/models/pengaturan/LevelModel.php */
