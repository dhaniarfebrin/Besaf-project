<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_team_model extends CI_Model {

	public function show($input)
	{
		$draw = $input['draw'];
		$start = $input['start'];
		$length = $input['length'];
		$search = $input['search']['value'];
		$column = $input['order'][0]['column'];
		$dir = $input['order'][0]['dir'];

		$where = "";
		$limit = "";

		if (!empty($length)) {
			$limit = "LIMIT $start, $length";
		}

		if (!empty($search)) {
			$where = "WHERE team.nama LIKE '%$search%' OR team.alias LIKE '%$search%' OR game.nama LIKE '%$search%'";
		}

		$team = $this->db->query("
			SELECT 
				team.id,
				team.gambar,
				team.nama,
				team.alias,
				game.nama AS game_nama
			FROM 
				team
			LEFT JOIN 
				game ON game.id = team.game_id
			$where
			$limit
			");

		$hasil['error'] = false;
		$hasil['message'] = "tidak tersedia.";
		$hasil['data'] = array();
		$hasil['recordsTotal'] = $this->db->query("SELECT id FROM team")->num_rows();
		$hasil['recordsFiltered'] = $this->db->query("SELECT team.id FROM team LEFT JOIN game ON game.id = team.game_id $where")->num_rows();
		$hasil['draw'] = $draw; 

		$no = 0;
		foreach ($team->result_array() as $key) {
			$hasil['message'] = "team ditemukan.";
			$hasil['data'][$no++] = $key;		
		}

		return $hasil;
	}

	public function details($input)
	{
		$id = $input['id'];

		if (empty($id)) {
			$hasil = array(
				'error' => true,
				'message' => "id tidak ditemukan."
			);
			goto output;
		}

		$team = $this->db->query("
			SELECT
				team.id,
				team.nama,
				team.alias,
				team.gambar,
				game.nama AS game_nama
			FROM
				team 
			LEFT JOIN 
				game ON game.id = team.game_id
			WHERE 
				team.id = '$id'
			");

		$hasil['error'] = false;
		$hasil['message'] = "tidak tersedia";
		$hasil['data'] = array();

		foreach ($team->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "details tim";
			$hasil['data'] = array(
				'id' => $key['id'],
				'nama' => $key['nama'],
				'alias' => $key['alias'],
				'game_nama' => $key['game_nama'],
				'gambar' => $key['gambar'],
				'member' => $this->_member_team($key['id'])
			);
		}

		output:
		return $hasil;
	}

	private function _member_team($team_id)
	{
		$member = $this->db->query("
			SELECT 
				team_member.id,
				team_member.user_id,
				user.username AS user_username,
				team_member.role
			FROM 
				team_member
			INNER JOIN 
				user ON user.id = team_member.user_id
			WHERE 
				team_id = '$team_id'
			");

		$no = 0;
		foreach ($member->result_array() as $key) {
			$hasil[$no++] = $key;
		}

		return $hasil;
	}

}

/* End of file Admin_team_model.php */
/* Location: ./application/models/Admin_team_model.php */