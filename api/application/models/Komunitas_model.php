<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas_model extends CI_Model
{

	public function create($input)
	{
		$user_id = $input['user_id'];

		if (empty($user_id)) {
			$hasil = array(
				'error' => true,
				'message' => "'user_id' tidak boleh kosong."
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
		
		$nama = $input['nama'];
		$deskripsi = $input['deskripsi'];
		$kategori = $input['kategori'];
		$game_id = $input['game_id'];
		$nomor_telpon = $input['nomor_telpon'];
		$nomor_identitas = $input['nomor_identitas'];

		$foto_identitas = $input['foto_identitas'];

		mkdir(FCPATH . 'img/', 0777);
		mkdir(FCPATH . 'img/komunitas/', 0777);

		$img = str_replace("data:image/jpeg;base64,", "", $foto_identitas);
		$img = str_replace("data:image/png;base64,", "", $img);
		$img = str_replace("data:image/jpg;base64,", "", $img);

		$base64 = base64_decode($img);

		$nama_foto = get_guid() . '.jpeg';

		file_put_contents(FCPATH . 'img/komunitas/' . $nama_foto, $base64);

		if (empty($user_id)) {
			$hasil = array(
				'error' => true,
				'message' => "user_id tidak ditemukan."
			);
			goto output;
		} else if (empty($nama)) {
			$hasil = array(
				'error' => true,
				'message' => "'nama' harus diisi."
			);
			goto output;
		} else if (empty($deskripsi)) {
			$hasil = array(
				'error' => true,
				'message' => "'deskripsi' harus diisi."
			);
			goto output;
		} else if (empty($nomor_identitas)) {
			$hasil = array(
				'error' => true,
				'message' => "'nomor identitas' harus diisi."
			);
			goto output;
		} else if (empty($nomor_telpon)) {
			$hasil = array(
				'error' => true,
				'message' => "'nomor telpon' harus diisi."
			);
			goto output;
		} else if (empty($nama_foto)) {
			$hasil = array(
				'error' => true,
				'message' => "'foto identitas' harus diisi."
			);
			goto output;
		}

		$this->db->insert('komunitas', array(
			'nama' => $nama,
			'deskripsi' => $deskripsi,
			'kategori' => $kategori,
			'game_id' => $game_id,
			'nomor_telpon' => $nomor_telpon,
			'nomor_identitas' => $nomor_identitas,
			'foto_identitas' => $nama_foto
		));

		$this->db->insert(
			'member_komunitas',
			array(
				'user_id' => $user_id,
				'komunitas_id' => $this->db->insert_id(),
				'role_id' => 1
			)
		);

		$hasil = array(
			'error' => false,
			'message' => "komunitas berhasil dibuat."
		);

		output: return $hasil;
	}

	public function show()
	{
		$community = $this->db->query("
			SELECT 
				komunitas.id as komunitas_id,
				nama,
				deskripsi,
				kategori,
				game_id,
				nomor_telpon,
				nomor_identitas,
				foto_identitas,
				count(member_komunitas.komunitas_id) as jumlah_member
			FROM 
				komunitas
			LEFT JOIN 
				member_komunitas on member_komunitas.komunitas_id = komunitas.id
			GROUP BY 
				komunitas.id
			");

		$hasil['error'] = true;
		$hasil['message'] = "data belum tersedia.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($community->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "data ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

	public function info($input)
	{
		$id = $input['id'];

		if (empty($id)) {
			$hasil = array(
				'error' => true,
				'message' => "'id' tidak tersedia."
			);
			goto output;
		}

		$community = $this->db->query("
			SELECT 
				komunitas.id as komunitas_id,
				komunitas.nama as komunitas_nama,
				deskripsi,
				kategori,
				game_id,
				nomor_telpon,
				nomor_identitas,
				foto_identitas,
				count(member_komunitas.komunitas_id) as jumlah_member,
				game.name as game_nama
			FROM 
				komunitas
			LEFT JOIN 
				member_komunitas on member_komunitas.komunitas_id = komunitas.id
			LEFT JOIN 
				game on game.id = komunitas.game_id
			WHERE 
				komunitas.id = '$id'
			");

		$hasil['error'] = true;
		$hasil['message'] = "tidak ada.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($community->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "sukses.";
			$hasil['data'][$no++] = $key;
		}

		output: return $hasil;
	}

	public function my($input)
	{
		$id = $input['id'];

		if (empty($id)) {
			$hasil = array(
				'error' => true,
				'message' => "'id' tidak tersedia."
			);
			goto output;
		}

		$community = $this->db->query("
			SELECT 
				member_komunitas.id,
				user_id,
				komunitas_id,
				komunitas.foto_identitas as foto
			FROM 
				member_komunitas
			INNER JOIN 
				user ON user.id = member_komunitas.user_id
			LEFT JOIN 
				komunitas ON komunitas.id = member_komunitas.komunitas_id
			WHERE 
				user_id = '$id'
			");

		$hasil['error'] = false;
		$hasil['message'] = "anda belum punya komunitas.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($community->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "komunitas anda ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		output: return $hasil;
	}

	public function member($input)
	{
		$komunitas_id = $input['komunitas_id'];

		if (empty($komunitas_id)) {
			$hasil = array(
				'error' => true,
				'message' => "'komunitas_id' tidak ditemukan."
			);
			goto output;
		}

		$member = $this->db->query("
			SELECT 
				member_komunitas.id,
				user_id,
				user.username as user_username,
				komunitas_id,
				user.image as user_foto,
				user.full_name as user_nickname,
				member_komunitas.role_id as user_role
			FROM
				member_komunitas
			LEFT JOIN 
				user ON user.id = member_komunitas.user_id
			WHERE 
				komunitas_id = '$komunitas_id'
			");

		$hasil['error'] = true;
		$hasil['message'] = "member tidak ditemukan.";
		$hasil['data'] = array();

		$no = 0;

		foreach ($member->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "success.";
			$hasil['data'][$no++] = $key;
		}

		output: return $hasil;
	}

	public function turnamen($input)
	{
		$komunitas_id = $input['komunitas_id'];

		$turnamen = $this->db->query("
			SELECT 
				tournament.id as id,
				tournament.nama as nama,
				tournament.entry as entry,
				tournament.slots as slots,
				tournament.date_start as date_start,
				tournament.date_end as date_end,
				tournament.cookies as cookies,
				tournament.image as image
			FROM 
				tournament
			INNER JOIN
				komunitas ON komunitas.id = tournament.komunitas_id
			WHERE 
				komunitas_id = '$komunitas_id'
			");

		$hasil['error'] = true;
		$hasil['message'] = "Turnamen belum tersedia.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($turnamen->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "turnamen ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

	public function leaderboard($input)
	{
		$komunitas_id = $input['komunitas_id'];

		$leaderboard = $this->db->query("
			SELECT 
				id,
				foto_identitas,
				nama
			FROM
				komunitas
			WHERE 
				id = '$komunitas_id'
			");

		$hasil['error'] = true;
		$hasil['message'] = "belum tersedia.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($leaderboard->result_array() as $key) {
			$hasil['error'] = true;
			$hasil['message'] = "leaderboard tersedia.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

	public function postingan($input)
	{
		$komunitas_id = $input['komunitas_id'];

		if (empty($komunitas_id)) {
			$hasil = array(
				'error' => true,
				'message' => "'komunitas_id' harus diisi."
			);
			goto output;
		}

		$post = $this->db->query("
			SELECT 
				user_post.id,
				user.full_name,
				caption,
				user_post.image,
				likes,
				comment,
				create_date,
				end_date,
				komunitas_id
			FROM 
				user_post
			RIGHT JOIN 
				user ON user.id = user_post.user_id
			WHERE 
				komunitas_id = '$komunitas_id'
			");

		$hasil['error'] = true;
		$hasil['message'] = "postingan tidak ditemukan.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($post->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "postingan ditemukan.";
			$hasil['data'][$no++] = $key;
		}

		output: return $hasil;
	}

	public function join($input)
	{
		$user_id = $input['user_id'];
		$komunitas_id = $input['komunitas_id'];

		if (empty($user_id)) {
			$hasil = array(
				'error' => true,
				'message' => "'user_id' tidak ditemukan."
			);
			goto output;
		} else if (empty($komunitas_id)) {
			$hasil = array(
				'error' => true,
				'message' => "'komunitas_id' tidak ditemukan."
			);
			goto output;
		}

		$this->db->insert('member_komunitas', array(
			'user_id' => $user_id,
			'komunitas_id' => $komunitas_id
		));

		$hasil = array(
			'error' => false,
			'message' => "berhasil masuk kedalam komunitas."
		);

		output: return $hasil;
	}
}

/* End of file Komunitas_model.php */
/* Location: ./application/models/Komunitas_model.php */
