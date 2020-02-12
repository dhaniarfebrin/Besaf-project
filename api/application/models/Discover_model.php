<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discover_model extends CI_Model {

	public function show()
	{
		$discover = $this->db->query("
			SELECT 
				user_post.id AS id,
				user.username AS user_nama,
				user.image AS user_image,
				caption,
				user_post.image AS image,
				likes,
				comment,
				create_date,
				end_date,
				komunitas.nama AS komunitas_nama
			FROM 
				user_post
			INNER JOIN 
				user ON user.id = user_post.user_id
			INNER JOIN 
				komunitas ON komunitas.id = user_post.komunitas_id
			");

		$hasil['error'] = false;
		$hasil['message'] = "postingan tidak tersedia.";
		$hasil['data'] = array();

		$no = 0;
		foreach ($discover->result_array() as $key) {
			$hasil['error'] = false;
			$hasil['message'] = "postingan tersedia.";
			$hasil['data'][$no++] = $key;
		}

		return $hasil;
	}

	public function create($input)
	{
		function get_guid()
		{
			$data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // Set version to 0100
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // Set bits 6-7 to 10
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}

		$caption = $input['caption'];
		$image = $input['image'];
		$user_id = $input['user_id'];
		$komunitas_id = $input['komunitas_id'];

		if (empty($image)) {
			$hasil = array(
				'error' => true,
				'message' => "image tidak boleh kosong."
			);
			goto output;
		} else if (empty($user_id)) {
			$hasil = array(
				'error' => true,
				'message' => "user_id tidak ditemukan."
			);
			goto output;
		} else if (empty($komunitas_id)) {
			$hasil = array(
				'error' => true,
				'message' => "komunitas_id tidak boleh kosong."
			);
			goto output;
		} else if (empty($image)) {
			$hasil = array(
				'error' => true,
				'message' => "silahkan insert gambar."
			);
			goto output;
		}

		mkdir(FCPATH . 'img/',0777);
		mkdir(FCPATH . 'img/discover/',0777);

		$img = str_replace("data:image/jpeg;base64,", "", $image);
		$img = str_replace("daa:image/png;base64,", "", $img);
		$img = str_replace("daa:image/jpg;base64,", "", $img);

		$base64 = base64_decode($img);

		$image_name = get_guid() . '.jpeg';

		file_put_contents(FCPATH . 'img/discover/' . $image_name, $base64);

		$this->db->insert('user_post', array(
			'caption' => $caption,
			'image' => $image_name,
			'user_id' => $user_id,
			'komunitas_id' => $komunitas_id
		));

		$hasil = array(
			'error' => false,
			'message' => "sukses."
		);

		output:
		return $hasil;
	}

	public function delete($input)
	{
		$id = $input['id'];

		if (empty($id)) {
			$hasil = array(
				'error' => true,
				'message' => "id tidak ditemukan."
			);
			goto output;
		}

		$this->db->delete('user_post', array(
			'id' => $id
		));

		$hasil = array(
			'error' => false,
			'message' => "postingan berhasil dihapus"
		);

		output: 
		return $hasil;
	}

	public function likes($input)
	{
		$id = $input['id'];

		if (empty($id)) {
			$hasil = array(
				'error' => true,
				'message' => "id tidak ditemukan."
			);
			goto output;
		}

		$this->db->query("
			UPDATE 
				user_post
			SET 
				likes = (likes + 1)
			WHERE 
				id = '$id'
			");

		$hasil = array(
			'error' => false,
			'message' => "sukses."
		);

		output:
		return $hasil;
	}

}

/* End of file Discover_model.php */
/* Location: ./application/models/Discover_model.php */