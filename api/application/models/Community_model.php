<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Community_model extends CI_Model
{

	public function show($input)
	{
		$draw = $input['draw'];
		$start = $input['start'];
		$length = $input['length'];
		$search = $input['search']['value'];
		$column = $input['order'][0]['column'];
		$dir = $input['order'][0]['dir'];

		$where = '';
		if (!empty($search)) {
			$where = "WHERE komunitas.nama LIKE '%$search%' OR game.name LIKE '%$search%'";
		}

		$limit = '';
		if (!empty($length)) {
			$limit = "LIMIT $start, $length";
		}

		if ($column == '1') {
			$order = "ORDER BY komunitas.nama $dir";
		} else if ($column == '2') {
			$order = "ORDER BY game.name $dir";
		}

		$community = $this->db->query("
			SELECT 
				komunitas.id as komunitas_id,
				komunitas.nama as komunitas_nama,
				game.name as game_nama
			FROM 
				komunitas 
			LEFT JOIN 
				game ON game.id = komunitas.game_id
			$order
			$where
			$limit
			");

		$recordsTotal = $this->db->query("SELECT id FROM komunitas")->num_rows();

		$recordsFiltered = $this->db->query("
			SELECT 
				komunitas.id 
			FROM
				komunitas 
			LEFT JOIN 
				game ON game.id = komunitas.game_id
			$where
			")->num_rows();

		$no = 0;

		$hasil['error'] = false;
		$hasil['message'] = "komunitas tidak ditemukan.";
		$hasil['draw'] = $draw;
		$hasil['recordsTotal'] = $recordsTotal;
		$hasil['recordsFiltered'] = $recordsFiltered;
		$hasil['data'] = array();

		foreach ($community->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "komunitas ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

	public function details($input)
	{
		$komunitas_id = $input['komunitas_id'];

		if (empty($komunitas_id)) {
			$hasil = array(
				'error' => true,
				'message' => "komunitas_id tidak ditemukan."
			);
			goto output;
		}

		$query = $this->db->query("
			SELECT 
				komunitas.id,
				komunitas.nama,
				kategori,
				game.name AS game_nama,
				komunitas.foto_identitas
			FROM 
				komunitas 
			LEFT JOIN 
				game ON game.id = komunitas.game_id
			WHERE 
				komunitas.id = '$komunitas_id'
			");

		$hasil['error'] = false;
		$hasil['message'] = "data tidak ditemukan.";
		$hasil['data'] = array();

		foreach ($query->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "komunitas berhasil ditemukan.";
			$hasil['data'] = array(
				'komunitas_id' => $key['id'],
				'komunitas_nama' => $key['nama'],
				'komunitas_kategori' => $key['kategori'],
				'komunitas_game' => $key['game_nama'],
				'komunitas_foto' => $key['foto_identitas'],
				'komunitas_member' => $this->_member_komunitas($key['id'])
			);
		}

		output: return $hasil;
	}

	private function _member_komunitas($komunitas_id)
	{
		$query = $this->db->query("
			SELECT 
				member_komunitas.id AS member_komunitas_id,
				user.username AS user_username,
				user_role.name AS role_name
			FROM 
				member_komunitas 
			INNER JOIN 
				user ON user.id = member_komunitas.user_id
			INNER JOIN 
				user_role ON user_role.id = member_komunitas.role_id
			WHERE 
				member_komunitas.komunitas_id = '$komunitas_id'
			");

		$no = 0;
		foreach ($query->result_array() as $key) {
			$hasil[$no++] = $key;
		}

		return $hasil;
	}
}

/* End of file Community_model.php */
/* Location: ./application/models/Community_model.php */
