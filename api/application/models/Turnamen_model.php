<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turnamen_model extends CI_Model {

	public function show($input)
	{
		$jadwal = $input['jadwal'];

		$where = '';
		if (!empty($jadwal)) {
			//sedang berlangsung.
			if ($jadwal == '1') {
				$where = "WHERE date_end <= ".date('Y-m-d');
			} 
			//telah selesai
			else if ($jadwal == '2') {
				$where = "WHERE date_end > ".date('Y-m-d');
			}
		}

		$turnamen = $this->db->query("
			SELECT 
				id,
				nama,
				game_id,
				rules,
				hadiah,
				informasi,
				how_to_join,
				venue,
				mode,
				image,
				slots,
				time,
				entry,
				winner,
				date_start,
				date_end,
				komunitas_id,
				cookies
			FROM 
				tournament
			$where
			");

		$hasil['error'] = true;
		$hasil['message'] = "turnamen tidak ditemukan.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($turnamen->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "turnamen ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

	public function terlaris()
	{
		$turnamen = $this->db->query("
			SELECT 
				id,
				nama,
				game_id,
				rules,
				hadiah,
				informasi,
				how_to_join,
				venue,
				mode,
				image,
				slots,
				time,
				entry,
				winner,
				date_start,
				date_end,
				komunitas_id,
				cookies
			FROM 
				tournament
			ORDER BY slots DESC
			LIMIT 0,3
			");

		$hasil['error'] = true;
		$hasil['message'] = "turnamen belum tersedia.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($turnamen->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "turnamen terlaris ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

	public function info($input)
	{
		$turnamen_id = $input['turnamen_id'];

		if (empty($turnamen_id)) {
			$hasil = array(
				'error' => true,
				'message' => "'turnamen_id' tidak ditemukan."
			);
			goto output;
		}

		$query = $this->db->query("
			SELECT 
				id,
				nama,
				game_id,
				rules,
				hadiah,
				informasi,
				how_to_join,
				venue,
				mode,
				image,
				slots,
				time,
				entry,
				winner,
				date_start,
				date_end,
				komunitas_id,
				cookies
			FROM 
				tournament
			WHERE 
				tournament.id = '$turnamen_id'
			");

		foreach ($query->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = 'data komunitas ditemukan.';
			$hasil['data'] = $key;
		}

		output:
		return $hasil;
	}
}

/* End of file Turnamen_model.php */
/* Location: ./application/models/Turnamen_model.php */