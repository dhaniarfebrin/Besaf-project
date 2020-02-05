<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament_model extends CI_Model {

	public function show($input)
	{
		$draw = $input['draw'];
		$start = $input['start'];
		$length = $input['length'];
		$search = $input['search']['value'];
		$column = $input['order'][0]['column'];
		$dir = $input['order'][0]['dir'];

		$limit = '';
		if (!empty($length)) {
			$limit = "LIMIT $start, $length";
		}

		$where = '';
		if (!empty($search)) {
			$where = "WHERE tournament.nama LIKE '%$search%' OR game.nama LIKE '%$search%'";
		}

		if ($column=='1') {
			$order = "ORDER BY tournament.nama $dir";
		} else if ($column=='2') {
			$order = "ORDER BY game.nama $dir";
		} else if ($column=='3') {
			$order = "ORDER BY tournament.date_end $dir";
		}

		$tournament = $this->db->query("
			SELECT 
				tournament.id as tournament_id,
				tournament.nama as tournament_nama,
				hadiah,
				rules,
				informasi,
				how_to_join,
				venue,
				mode,
				tournament.image as tournament_image,
				slots,
				time,
				entry,
				winner,
				date_start,
				date_end,
				komunitas_id,
				cookies,
				game.id as game_id,
				game.nama as game_nama,
				game.image as game_image
			FROM 
				tournament
			INNER JOIN 
				game ON game.id = tournament.game_id
			$where
			$order 
			$limit
			");

		$hasil['error'] = false;
		$hasil['message'] = "data ditemukan.";
		$hasil['data'] = array();
		$hasil['draw'] = $draw;
		$hasil['recordsTotal'] = $this->db->query("SELECT id FROM tournament")->num_rows();
		$hasil['recordsFiltered'] = $this->db->query("
			SELECT 
				tournament.id
			FROM 
				tournament
			INNER JOIN 
				game ON game.id = tournament.game_id
			$where
			")->num_rows();

		$no = 0; 
		foreach ($tournament->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "data ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

}

/* End of file Tournament_model.php */
/* Location: ./application/models/Tournament_model.php */