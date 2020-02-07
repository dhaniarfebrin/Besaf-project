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
				$where = "WHERE date_end >= '".date('Y-m-d')."'";
			} 
			//telah selesai
			else if ($jadwal == '2') {
				$where = "WHERE date_end < '".date('Y-m-d')."'";
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
				tournament.id,
				tournament.nama as nama,
				game.nama as game_nama,
				rules,
				hadiah,
				informasi,
				how_to_join,
				venue,
				mode,
				tournament.image,
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
			INNER JOIN 
				game ON game.id = tournament.game_id
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

	public function create($input)
	{
		$nama 		= $input['nama'];
		$game_id 	= $input['game_id'];
		$hadiah 	= $input['hadiah'];
		$cookies 	= $input['cookies'];
		$image 		= $input['image'];
		$venue 		= $input['venue'];
		$informasi 	= $input['informasi'];
		$entry 		= $input['entry'];
		$mode 		= $input['mode'];
		$slots 		= $input['slots'];
		$time 		= $input['time'];
		$date_start = $input['date_start'];
		$date_end 	= $input['date_end'];
		$rules 		= $input['rules'];
		$komunitas_id 	= $input['komunitas_id'];

		function get_guid() {
		    $data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
		    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // Set version to 0100
		    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // Set bits 6-7 to 10
		    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}

		mkdir(FCPATH.'img',0777);
		mkdir(FCPATH.'img/turnamen',0777);

		$img = str_replace("data:image/jpeg;base64,", "", $image);
		$img = str_replace("data:image/png;base64,", "", $img);
		$img = str_replace("data:image/jpg;base64,", "", $img);

		$base64 = base64_decode($img);

		$foto_tournament = get_guid().'.jpeg';

		file_put_contents(FCPATH.'img/turnamen/'.$foto_tournament, $base64);

		if (empty($nama)) {
			$hasil = array(
				'error' => true,
				'message' => "nama harus diisi."
			);
			goto output;
		} else if (empty($game_id)) {
			$hasil = array(
				'error' => true,
				'message' => "game_id harus diisi."
			);
			goto output;
		} else if (empty($hadiah)) {
			$hasil = array(
				'error' => true,
				'message' => "hadiah harus diisi."
			);
			goto output;
		} else if (empty($cookies)) {
			$hasil = array(
				'error' => true,
				'message' => "cookies harus diisi."
			);
			goto output;
		} else if (empty($foto_tournament)) {
			$hasil = array(
				'error' => true,
				'message' => "foto_tournament harus diisi."
			);
			goto output;
		} else if (empty($venue)) {
			$hasil = array(
				'error' => true,
				'message' => "venue harus diisi."
			);
			goto output;
		} else if (empty($informasi)) {
			$hasil = array(
				'error' => true,
				'message' => "informasi harus diisi."
			);
			goto output;
		} else if (empty($entry)) {
			$hasil = array(
				'error' => true,
				'message' => "entry harus diisi."
			);
			goto output;
		} else if (empty($mode)) {
			$hasil = array(
				'error' => true,
				'message' => "mode harus diisi."
			);
			goto output;
		} else if (empty($slots)) {
			$hasil = array(
				'error' => true,
				'message' => "slots harus diisi."
			);
			goto output;
		} else if (empty($time)) {
			$hasil = array(
				'error' => true,
				'message' => "time harus diisi."
			);
			goto output;
		} else if (empty($date_start)) {
			$hasil = array(
				'error' => true,
				'message' => "date_start harus diisi."
			);
			goto output;
		} else if (empty($date_end)) {
			$hasil = array(
				'error' => true,
				'message' => "date_end harus diisi."
			);
			goto output;
		} else if (empty($rules)) {
			$hasil = array(
				'error' => true,
				'message' => "rules harus diisi."
			);
			goto output;
		} else if (empty($komunitas_id)) {
			$hasil = array(
				'error' => true,
				'message' => "komunitas_id harus diisi."
			);
			goto output;
		}

		$this->db->insert('tournament', array(
			'nama' => $nama,
			'game_id' => $game_id,
			'hadiah' => $hadiah,
			'rules' => $rules,
			'informasi' => $informasi,
			'how_to_join' => "belum tersedia.",
			'venue' => $venue,
			'mode' => $mode,
			'image' => $foto_tournament,
			'slots' => $slots,
			'time' => $time,
			'entry' => $entry,
			'winner' => "null",
			'date_start' => $date_start,
			'date_end' => $date_end,
			'komunitas_id' => $komunitas_id,
			'cookies' => $cookies
		));

		$hasil = array(
			'error' => false,
			'message' => "berhasil menambah tournament."
		);

		output:
		return $hasil;
	}
}

/* End of file Turnamen_model.php */
/* Location: ./application/models/Turnamen_model.php */