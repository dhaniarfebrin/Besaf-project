<?php 

class Super_admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	// Start modal of model Super_admin game site
 	public function Add_game($isi)
	{
		// image upload
		function get_guid() {
			$data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}

		$image = $isi['image'];
		$nama = $isi['nama'];
		$role = $isi['role'];

		if (empty($nama)) {
			$notif = array(
				'error' => true,
				'message' => "Please insert the Game name!!!."
			);
			goto output;
		}
		else if (empty($role)) {
			$notif = array(
				'error' => true,
				'message' => "Please insert the role in Game!!!."
			);
			goto output;
		}
		// else if (empty($image_name)) {
		// 	$notif = array(
		// 		'error' => true,
		// 		'message' => "Please change your photo and Upload it!!!."
		// 	);
		// 	goto output;
		// }
		else
		{
			$image_name = '';

			if (!empty($image)) {
				mkdir(FCPATH.'img/', 0777);
				mkdir(FCPATH.'img/game/', 0777);

				$img = str_replace("data:image/jpeg;base64", "", $image);
				$img = str_replace("data:image/jpg;base64", "", $img);
				$img = str_replace("data:image/png;base64", "", $img);
				
				$base64 = base64_decode($img);

				$image_name = get_guid().'.jpeg';

				file_put_contents(FCPATH. 'img/game/'.$image_name, $base64);
				// end of image upload
			}

			$add_game = $this->db->insert("game", array(
				'name' => $nama,
				'image'=> $image_name
			));

			$game_id = $this->db->insert_id();

			$jumlah_role = count($role);

			for ($i=0; $i < $jumlah_role; $i++) { 
				$this->db->insert("role_game", array(
					'name' => $role[$i]['name'],
					'game_id' => $game_id
				));
			}
			$notif = array(
				'error' => false,
				'message' => "Success."
			);
			goto output;
		}

		output:
		return $notif;
	}
	public function Read_game()
	{
		$read = $this->db->query("
			SELECT
				game.id,
				game.name as game_name
			FROM 
				game
			INNER JOIN 
				role_game on role_game.game_id = game.id
			GROUP BY 
				game.id
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Data is not exist.";
		$notif['data'] = array();

		$no = 0;
		foreach ($read->result_array() as $key) {
			$notif['error'] = false;
			$notif['message'] = "Success.";
			$notif['data'][$no++] = $key;
		}

		output: 
		return $notif;
	}
	public function Game_details($isi)
	{
		$id = $isi['game_id'];

		if (empty($id)) {
			$notif =  array(
				'error' =>true,
				'message' => "game_id tidak diketahui"
			);
			goto output;
		}

		$details = $this->db->query("
			SELECT 
				role_game.name as role_name,
				game_id,
				created_at,
				game.name as game_name,
				game.image as game_image,
				game.id as id
			FROM	
				role_game
			INNER JOIN
				game on game.id = role_game.game_id
			WHERE
				game_id = '$id'
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Data is not exist.";
		$notif['data'] = array();
		
		foreach ($details->result_array() as $key) {
			$notif['error'] = false;
			$notif['message'] = "Success.";
			$notif['data'] = array(
				'role_name' => $this->role_game($key['game_id']),
				'game_name' => $key['game_name'],
				'created_at' => $key['created_at'],
				'game_image' => $key['game_image']
			);
		}

		output:
		return $notif;
	}
	// function private game details
	function role_game($game_id)
	{
		$data = $this->db->query("
			SELECT 
				name 
			FROM 
				role_game
			WHERE 
				game_id = '$game_id'");
		
		$no = 0;
		foreach ($data->result_array() as $key) {
			$notif[$no++] = $key;
		}
		return $notif;
	}
	// end of function private game details

	public function Delete_game($isi)
	{
		$game_id = $isi['id'];

		if (empty($game_id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The id of the Game is required."
			);
			goto output;
		}
		$this->db->delete('game', array('id' => $game_id));
		$this->db->delete('role_game', array('game_id' => $game_id));
		$notif = array(
			'error' => false,
			'message' => "Success!!!... The Game has been deleted."
		);
		goto output;


		output: 
		return $notif;

	}
	// end of model Super_admin game site



	// start model of Super admin profile
	public function Update_avatar($isi)
	{

		function get_guid()
		{	
			$data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}

		$avatar = $isi['avatar'];
		$user_id = $isi['id'];
		$bio = $isi['bio'];

		if (empty($user_id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The user id column is required."
			);
			goto output;
		}
		else if (empty($bio)) {
			$notif = array(
				'error' => true,
				'message' => "sorry!!!... Please insert your Bio."
			);
			goto output;
		}

		if (empty($avatar)) {
			$this->db->update('user', array(
				'bio' => $bio 
			), array(
				'id' => $user_id
			));

			$notif = array(
				'error' => false,
				'message' => "Congrats"
			);
			goto output;
		}
		else{

			mkdir(FCPATH.'img/', 0777);
			mkdir(FCPATH.'img/Super_admin_profile', 0777);

			$img = str_replace("data:image/jpeg;base64,", "", $avatar);
			$img = str_replace("data:image/jpg;base64,", "", $img);
			$img = str_replace("data:image/png;base64,", "", $img);

			$base64 = base64_decode($img);

			$avatar_name = get_guid().'.jpeg';

			file_put_contents(FCPATH.'img/Super_admin_profile/'.$avatar_name, $base64);

			$this->db->update('user', array(
				'image' => $avatar_name,
				'bio' => $bio
			), array(
				'id' => $user_id
			));
			$notif = array(
				'error' => false,
				'message' => "Congrats"
			);
			goto output;

		}
		output: 
		return $notif;	
	}
	public function Read_avatar($isi)
	{
		$user_id = $isi['id'];

		$avatar = $this->db->query("
			SELECT
				image,
				bio
			FROM
				user
			WHERE
				id = '$user_id'
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Data is not exist.";
		$notif['data'] = array();

		foreach ($avatar->result_array() as $key) {
		$notif['error'] = false;
		$notif['message'] = "Success.";
		$notif['data'] = $key; 
		}

		return $notif;
	}
	public function Read_info($isi)
	{
		$user_id = $isi['id'];

		$info = $this->db->query("
			SELECT
				full_name,
				email,
				country,
				city,
				birth_date,
				gender,
				about_me,
				bio
			FROM
				user
			WHERE
				id = '$user_id'
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Data is not exist.";
		$notif['data'] = array();

		foreach ($info->result_array() as $key) {
		$notif['error'] = false;
		$notif['message'] = "Success.";
		$notif['data'] = $key;
		}
		return $notif;

	}
	public function Update_info($isi)
	{
		$user_id = $isi['id'];
		$full_name = $isi['full_name'];
		$email = $isi['email'];
		$country = $isi['country'];
		$city = $isi['city'];
		$birth_date = $isi['birth_date'];
		$gender = $isi['gender'];

		if (empty($user_id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The user id column is required."
			);
			goto output;
		}
		else if (empty($full_name)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please insert your full name."
			);
			goto output;
		}
		elseif (empty($email)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please insert your email."
			);
			goto output;	
		}
		elseif (empty($country)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please insert your country."
			);
			goto output;	
		}elseif (empty($city)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please insert your city."
			);
			goto output;	
		}
		elseif (empty($birth_date)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please insert your birth date."
			);
			goto output;	
		}
		elseif (empty($gender)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please insert your gender."
			);
			goto output;	
		}

		$this->db->update('user', array(
			'full_name' => $full_name,
			'email' => $email,
			'country' => $country,
			'city' => $city,
			'birth_date' => $birth_date,
			'gender' => $gender
		), array(
			'id' => $user_id
		));
		$notif = array(
			'error' => false,
			'message' => "Success!!!... Your profile has been updated."
		);
		goto output;

		output: 
		return $notif;


	}
	public function Update_about_me($isi)
	{
		$user_id = $isi['id'];
		$about_me = $isi['about_me'];

		if (empty($user_id)) {
			$notif =array(
				'error' => true,
				'message' => "sorry!!!... The user id column is required."
			);
			goto output;
		}
		else if (empty($about_me)) { 
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please write description about yourself."
			);
			goto output;
		}

		$this->db->update('user', array(
			'about_me' => $about_me
		), array(
			'id' => $user_id
		));
		$notif = array(
			'error' => false,
			'message' => "Congrats!!!... Your description as been updated."
		);
		goto output;

		output: 
		return $notif;
	}
	// end model of Super admin profile




	// start model of Super admin user site
	public function Read_users()
	{
		$read_user = $this->db->query("
			SELECT 
				user.id,
				username,
				email,
				full_name,
				role_id,
				user_role.name as role_name
			FROM
				user
			INNER JOIN 
				user_role on user_role.id = user.role_id
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Data is not exist.";
		$notif['data'] = array();

		$no = 0;
		foreach ($read_user->result_array() as $key) {
		$notif['error'] = false;
		$notif['message'] = "Success.";
		$notif['data'][$no++] = $key;	
		}
		return $notif;
	}
	public function Users_detail($isi)
	{
		$user_id = $isi['user_id'];

		$details = $this->db->query("
			SELECT
				username,
				full_name,
				image,
				email,
				country,
				about_me,
				user_role.name as role_name,
				user.full_name as full_name
			FROM 
				user
			LEFT JOIN 
				user_role on user_role.id = user.role_id
			WHERE
				user.id = '$user_id'
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Data is not exist.";
		$notif['data'] = array();
		
		foreach ($details->result_array() as $key) {
		$notif['error'] = false;
		$notif['message'] = "Success.";
		$notif['data'] = $key;
		}
		return $notif;
	}
	public function Delete_user($isi)
	{
		$user_id = $isi['id'];

		$this->db->delete('user', array('id' => $user_id));

		$notif = array(
			'error' => false,
			'message' => "Success!!!... User has been Deleted."
		);
	}
	// start model of Super admin user site

}