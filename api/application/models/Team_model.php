<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

	public function create($input)
	{
		$user_id = $input['user_id'];
		$nama = $input['nama'];
		$gambar = $input['gambar'];
		$alias = $input['alias'];
		$game_id = $input['game_id'];

		if (empty($nama)) {
			$hasil = array(
				'error' => true,
				'message' => "nama harus diisi."
			);
			goto output;
		} else if (empty($gambar)) {
			$hasil = array(
				'error' => true,
				'message' => "gambar harus diisi."
			);
			goto output;
		} else if (empty($alias)) {
			$hasil = array(
				'error' => true,
				'message' => "alias harus diisi."
			);
			goto output;
		} else if (empty($game_id)) {
			$hasil = array(
				'error' => true,
				'message' => "game_id harus diisi."
			);
			goto output;
		} else if (empty($user_id)) {
			$hasil = array(
				'error' => true,
				'message' => "user_id tidak ditemukan."
			);
			goto output;
		}

		function get_guid()
		{
			$data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // Set version to 0100
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // Set bits 6-7 to 10
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}

		$img = str_replace("data:image/jpeg;base64,", "", $gambar);
		$img = str_replace("data:image/jpg;base64,", "", $img);
		$img = str_replace("data:image/png;base64,", "", $img);

		$base64 = base64_decode($img);

		$gambar_name = get_guid() . '.jpeg';

		file_put_contents(FCPATH . 'img/team/' . $gambar_name, $base64);

		$this->db->insert('team', array(
			'nama' => $nama,
			'gambar' => $gambar_name,
			'alias' => $alias,
			'game_id' => $game_id
		));

		$this->db->insert('team_member', array(
			'user_id' => $user_id,
			'team_id' => $this->db->insert_id(),
			'role' => '1'
		));

		$hasil = array(
			'error' => false,
			'message' => "team sukses dibuat"
		);

		output:
		return $hasil;
	}

	public function myteam($input)
	{
		$user_id = $input['user_id'];

		if (empty($user_id)) {
			$hasil = array(
				'error' => true,
				'message' => "user_id tidak diketahui."
			);
			goto output;
		}

		$myteam = $this->db->query("
			SELECT 
				team_member.id,
				user.username AS user_username,
				team.id AS team_id,
				team.nama AS team_nama,
				team.gambar AS team_gambar,
				team.alias AS team_alias
			FROM 
				team_member
			LEFT JOIN
				team ON team.id = team_member.team_id
			LEFT JOIN 
				user ON user.id = team_member.user_id
			WHERE 
				user_id = '$user_id'
			");

		$hasil['error'] = false;
		$hasil['message'] = "team belum ada.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($myteam->result_array() as $key) {
			$hasil['message'] = "team ditemukan.";
			$hasil['data'][$no++] = $key; 
		}

		output:
		return $hasil;
	}

	public function info($input)
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
				id,
				nama,
				gambar,
				alias
			FROM 
				team
			WHERE 
				id = '$id'
			");

		$hasil['error'] = false;
		$hasil['message'] = "belum tersedia.";
		$hasil['data'] = array();

		foreach ($team->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "sukses.";
			$hasil['data'] = $key;
		}

		output:
		return $hasil;
	}

	public function member($input)
	{
		$id = $input['id'];

		if (empty($id)) {
			$hasil = array(
				'error' => true,
				'message' => "id tidak ditemukan."
			);
			goto output;
		}

		$member = $this->db->query("
			SELECT
				team_member.id,
				team_member.role,
				user.id AS user_id,
				user.username AS user_username,
				user.phone_number AS user_phone,
				user.image AS user_image
			FROM 
				team_member
			LEFT JOIN 
				user ON user.id = team_member.user_id
			WHERE 
				team_id = '$id'
			ORDER BY 
				team_member.role ASC
			");

		$no = 0;

		$hasil['error'] = false;
		$hasil['message'] = "data tidak tersedia.";
		$hasil['data'] = array();

		foreach ($member->result_array() as $key) {
			$hasil['message'] = "member team ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		output:
		return $hasil;
	}

	public function kick($input)
	{
		$id = $input['id'];

		if (empty($id)) {
			$hasil = array(
				'error' => true,
				'message' => "id tidak diketahui."
			);
			goto output;
		}

		$this->db->delete('team_member', array(
			'id' => $id
		));

		$hasil = array(
			'error' => false,
			'message' => "member berhasil dihapus."
		);
		goto output;

		output:
		return $hasil;
	}

	public function cari_member($input)
	{
		$data = $input['data'];
		$team_id = $input['team_id'];

		$where = '';
		if (!empty($data)) {
			$where = "WHERE user.username LIKE '%$data%' AND (user.role_id != '2' OR team_member.team_id != '$team_id')";
		}

		$user = $this->db->query("
				SELECT 
					user.id,
					user.username,
					user.image
				FROM
					user
				LEFT JOIN
					team_member ON team_member.user_id = user.id
				$where
				GROUP BY user.id
				LIMIT 0,5
			");

		$hasil['error'] = false;
		$hasil['message'] = "user tidak ditemukan.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($user->result_array() as $key) {
			$hasil['message'] = "user ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

	public function undang($input)
	{
		
	}
}

/* End of file Team_model.php */
/* Location: ./application/models/Team_model.php */