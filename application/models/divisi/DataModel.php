<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataModel extends Render_Model
{
	public function getData()
	{
		return $this->db->get("divisi")->result_array();
	}

	public function delete($id)
	{
		$exe = $this->db->where('id', $id);
		$exe = $this->db->delete('divisi');

		return $exe;
	}

	public function insert($nama, $keterangan)
	{
		$data['nama']  = $nama;
		$data['keterangan']  = $keterangan;

		$execute = $this->db->insert('divisi', $data);
		$exe['id'] = $this->db->insert_id();

		return $exe;
	}
	public function update($id, $nama, $keterangan)
	{
		$data['nama'] = $nama;
		$data['keterangan'] = $keterangan;

		$execute = $this->db->where('id', $id);
		$execute = $this->db->update('divisi', $data);
		return $execute;
	}
}
