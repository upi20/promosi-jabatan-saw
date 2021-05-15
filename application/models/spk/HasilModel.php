<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilModel extends Render_Model
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

	public function hitung()
	{
		$nilai = $this->getAllData();
		// 4. Rating kecocokan
		$rating_kecocokan = [];

		// kriteria
		$masa_kerja_f = [];
		$kinerja_f = [];
		$prilaku_f = [];

		// 5. Normalisasi Matriks Untuk Kriteria
		$normalisasi = [];

		// 6. Menentukan Rangking
		$rangking = [];

		// 4. Rating kecocokan
		foreach ($nilai as $n) {
			$masa_kerja = $n['masa_kerja'];
			$kinerja = round($n['kinerja']);
			$prilaku = round($n['prilaku']);

			$masa_kerja_c = (float)($masa_kerja > 5) ?  1 : (($masa_kerja == 5) ? 0.8 : (($masa_kerja == 4) ? 0.6 : (($masa_kerja == 3) ? 0.4 : (($masa_kerja == 2) ? 0.2 : 0))));
			$kinerja_c = (float)($kinerja == 6) ?  1 : (($kinerja == 5) ? 0.8 : (($kinerja == 4) ? 0.7 : (($kinerja == 3) ? 0.5 : (($kinerja == 2) ? 0.3 : (($kinerja == 1) ? 0.2 : 0)))));
			$prilaku_c = (float)($prilaku == 6) ?  1 : (($prilaku == 5) ? 0.8 : (($prilaku == 4) ? 0.7 : (($prilaku == 3) ? 0.5 : (($prilaku == 2) ? 0.3 : (($prilaku == 1) ? 0.2 : 0)))));

			$masa_kerja_f[] = $masa_kerja_c;
			$kinerja_f[] = $kinerja_c;
			$prilaku_f[] = $prilaku_c;

			$rating_kecocokan[] = [
				'user_id' => $n['user_id'],
				'user_nama' => $n['user_nama'],
				'masa_kerja' => $masa_kerja_c,
				'kinerja' => $kinerja_c,
				'prilaku' => $prilaku_c,
			];
		}

		// 5. Normalisasi Matriks Untuk Kriteria
		foreach ($rating_kecocokan as $r) {
			$normalisasi[] = [
				'user_id' => $r['user_id'],
				'user_nama' => $r['user_nama'],
				'masa_kerja' => max($masa_kerja_f) ? round($r['masa_kerja'] / max($masa_kerja_f), 2) : 0,
				'kinerja' => max($masa_kerja_f) ? round($r['kinerja'] / max($kinerja_f), 2) : 0,
				'prilaku' => max($masa_kerja_f) ? round($r['prilaku'] / max($prilaku_f), 2) : 0
			];
		}

		// 6. Menentukan Rangking
		foreach ($normalisasi as $n) {
			$nilai = (0.25 * $n['masa_kerja']) + (0.5 * $n['kinerja']) + (0.25 * $n['prilaku']);
			$rangking[] = [
				'user_id' => $n['user_id'],
				'user_nama' => $n['user_nama'],
				'nilai' => $nilai,
				'presentase' => round($nilai * 100, 2)
			];
		}

		$keys = array_column($rangking, 'nilai');
		array_multisort($keys, SORT_DESC, $rangking);

		for ($i = 0; $i < count($rangking); $i++) {
			$rangking[$i]['rangking'] = $i + 1;
		}

		return [
			'rating_kecocokan' => $rating_kecocokan,
			'normalisasi' => $normalisasi,
			'rangking' => $rangking
		];
	}

	public function status()
	{
		$result = $this->db->get_where("pengaturan", ["nama" => "pengumuman"])->row_array();
		return (int) ($result ? $result['nilai'] : 0);
	}

	public function reset()
	{
		return $this->db->query('DELETE FROM `nilai`');
	}

	public function simpan($data)
	{
		$data = ['nama' => "pengumuman", 'nilai' => $data];

		$exe = null;
		$num = $this->db->get_where("pengaturan", ["nama" => "pengumuman"])->num_rows();
		if ($num) {
			$exe = $this->db->set($data)->where(["nama" => "pengumuman"])->update('pengaturan');
		} else {
			$exe = $this->db->insert("pengaturan", $data);
		}
		return $exe ? $data : $exe;
	}
}

/* End of file LevelModel.php */
/* Location: ./application/models/pengaturan/LevelModel.php */
