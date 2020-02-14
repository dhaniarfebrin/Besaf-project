<?php

class Profile_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	/* start model Show games and role game in select */
	public function Show_games()
	{
		$show_games = $this->db->query("
			SELECT 
				id,
				name as game_name
			FROM
				game
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Game is not exist.";
		$notif['data'] = array();

		$no = 0;
		foreach ($show_games->result_array() as $key) {
			$notif['error'] = false;
			$notif['message'] = "Success.";
			$notif['data'][$no++] = $key;
		}
		return $notif;

	}
	public function Role_game($isi)
	{
		$game_id = $isi['game_id'];

		$role = $this->db->query("
			SELECT 
				id,
				name
			FROM 
				role_game
			WHERE
				game_id = '$game_id'
			");

		$no = 0;
		foreach ($role->result_array() as $key) {
			$hasil[$no++] = $key;
		}
		return $hasil;
	}
	/* end model Show games and role game in select */





	// add photo models
	public function Add_photo($isi)
	{
		function get_guid()
		{
			$data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}

		$photo = $isi['photo'];

		mkdir(FCPATH . 'img/', 0777);
		mkdir(FCPATH . 'img/user_profile/', 0777);

		$img = str_replace("data:image/jpeg;base64", "", $photo);
		$img = str_replace("data:image/jpg;base64", "", $img);
		$img = str_replace("data:image/png;base64", "", $img);

		$base64 = base64_decode($img);

		$photo_name = get_guid() . '.jpeg';

		file_put_contents(FCPATH . 'img/user_profile/' . $photo_name, $base64);

		$id = $isi['id'];

		if (empty($id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... The id column is required.'
			);
			goto output;
		} else if (empty($photo_name)) {
			$notif = array(
				'error' => true,
				'message' => 'Please upload your profile!!!.'
			);
			goto output;
		}

		$this->db->update('user', array(
			'image' => $photo_name
		), array(
			'id' => $id
		));
		$notif = array(
			'error' => false,
			'message' => 'Success!!!... Your photo has been uploaded.'
		);
		goto output;

		output: return $notif;
	}
	// add photo models





	// setting models
	public function Change_password($isi)
	{
		$id = $isi['id'];
		$current_password = $isi['current_password'];
		$new_password = $isi['new_password'];
		$confirm_password = $isi['confirm_password'];

		if (empty($id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... The id column is required.'
			);
			goto output;
		} else if (empty($current_password)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your cunrrent_password.'
			);
			goto output;
		}

		$data = $this->db->query("SELECT password FROM user WHERE id = '$id'");
		foreach ($data->result_array() as $key) {
			if (password_verify($current_password, $key['password'])) {
				if (empty($new_password)) {
					$notif = array(
						'error' => true,
						'message' => 'Sorry!!!... Please insert your new_password.'
					);
					goto output;
				} else if (empty($confirm_password)) {
					$notif = array(
						'error' => true,
						'message' => 'Sorry!!!... Please insert your confirm_password.'
					);
					goto output;
				}
			} else {
				$notif = array(
					'error' => true,
					'message' => "Wrong password."
				);
				goto output;
			}
		}
		if ($confirm_password != $new_password) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!...The confirm_password is not matches.'
			);
			goto output;
		}

		$this->db->update('user', array(
			'password' => password_hash($new_password, PASSWORD_DEFAULT)
		), array(
			'id' => $id
		));
		$notif = array(
			'error' => false,
			'message' => 'Congrats!!!... Your password has been changed.'
		);
		goto output;

		output: return $notif;
	}
	// end of setting models





	// Player Info model
	public function Read_Player_info($isi)
	{
		$id = $isi['id'];

		if (empty($id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The id Column is required."
			);
			goto output;
		}

		$info = $this->db->query("
			SELECT 
				id,
				full_name,
				username,
				country,
				birth_date,
				gender,
				city,
				phone_number,
				email,
				adress,
				image
			FROM  
				user
			WHERE
				id = '$id'
		
		");
		$notif['error'] = true;
		$notif['message'] = "Data not exist...Sorry!!!";
		$notif['data'] = array();

		$no = 0;
		foreach ($info->result_array() as $val) {
			$notif['error'] = false;
			$notif['message'] = "Success.";
			$notif['data'][$no++] = $val;
		}
		goto output;

		output: return $notif;
	}
	public function Update_Player_info($isi)
	{
		$id = $isi['id'];
		$full_name = $isi['full_name'];
		$country = $isi['country'];
		$birth_date = $isi['birth_date'];
		$gender = $isi['gender'];
		$city = $isi['city'];
		$adress = $isi['adress'];
		$phone_number = $isi['phone_number'];
		$email = $isi['email'];

		if (empty($id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The id Column is required."
			);
			goto output;
		} else if (empty($full_name)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The full_name Column is required."
			);
			goto output;
		} else if (empty($country)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The country Column is required."
			);
			goto output;
		} else if (empty($birth_date)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... This birth_date Column is required."
			);
			goto output;
		} else if (empty($gender)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The gender Column is required."
			);
			goto output;
		} else if (empty($city)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The city Column is required."
			);
			goto output;
		} else if (empty($adress)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The adress Column is required."
			);
			goto output;
		} else if (empty($phone_number)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The phone_number Column is required."
			);
			goto output;
		} else if (empty($email)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The email Column is required."
			);
			goto output;
		}

		$this->db->update('user', array(
			'full_name' => $full_name,
			'country' => $country,
			'birth_date' => $birth_date,
			'gender' => $gender,
			'city' => $city,
			'adress' => $adress,
			'phone_number' => $phone_number,
			'email' => $email
		), array(
			'id' => $id
		));

		$notif = array(
			'error' => false,
			'message' => 'Congrats!!!...Data has been Updated.',
		);
		goto output;

		output: return $notif;
	}
	// end model of player info





	// About me Model
	public function Read_About_me($isi)
	{

		$user_id = $isi['id'];
		
		if (empty($user_id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... The id column is required.'
			);
			goto output;
		}

		$Read = $this->db->query("
			SELECT
				id,
				about_me
			FROM
				user
			WHERE
				id = '$user_id'
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Data not Exist.";
		$notif['data'] = array();

		foreach ($Read->result_array() as $key) {
		$notif['error'] = false;
		$notif['message'] = "Success.";
		$notif['data'] = $key;
		}
		goto output;

		output: return $notif;
	}

	public function Update_About_me($isi)
	{
		$id = $isi['id'];
		$about_me = $isi['about_me'];

		if (empty($id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The id Column is required."
			);
			goto output;
		} else if (empty($about_me)) {
			$notif = array(
				'error' => true,
				'message' => "Please insert description about Yourself(about_me)!!!..."
			);
			goto output;
		}

		$this->db->update('user', array(
			'about_me' => $about_me
		), array(
			'id' => $id
		));
		$notif = array(
			'error' => false,
			'message' => "Congrats!!!... Your desciption is confirmed."
		);
		goto output;

		output: return $notif;
	}
	// end of about me Model





	// start model of Skill and role
	public function Read_skill_role($isi)
	{
		$user_id = $isi['id'];

		if (empty($user_id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... The id column is required."
			);
			goto output;
		}

		$skill = $this->db->query("
			SELECT
				user_skill.id,
				user_skill.game_id,
				user_skill.role_game_id,
				user_skill.user_id,
				user_skill.info,
				user_skill.image as image,
				game.name as game_name,
				role_game.name as role_name,
				user.username as user_name
			FROM
				user_skill
			LEFT JOIN
				game on game.id = user_skill.game_id
			LEFT JOIN
				role_game on role_game.id = user_skill.role_game_id
			LEFT JOIN
				user on user.id = user_skill.user_id
			WHERE
				user_skill.user_id = '$user_id' 
		");

		$notif['error'] = false;
		$notif['message'] = "Sorry!!!... Data is not exist.";
		$notif['data'] = array();

		$no = 0;
		foreach ($skill->result_array() as $key) {
			$notif['error'] = false;
			$notif['message'] = "Success.";
			$notif['data'][$no++] = $key;
		}
		goto output;

		output: return $notif;
	}
	public function Insert_skill_and_role($isi)
	{
		function get_guid(){
			$data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
			return vsprintf("%s%s-%s-%s-%s-%s%s%s", str_split(bin2hex($data), 4));
		}

		$image = $isi['image'];

		mkdir(FCPATH.'img/', 0777);
		mkdir(FCPATH.'img/skill_and_role_image/', 0777);

		$img = str_replace("data:image/jpeg;base64", "", $image);
		$img = str_replace("data:image/jpg;base64", "", $img);
		$img = str_replace("data:image/png;base64", "", $img);
 
		$base64 = base64_decode($img);

		$image_name = get_guid().'.jpeg';

		file_put_contents(FCPATH.'img/skill_and_role_image/'.$image_name, $base64);


		$game_id = $isi['game'];
		$role_game_id = $isi['role'];
		$user_id = $isi['id'];

		if (empty($game_id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please select your game."
			);
			goto output;
		}
		else if (empty($role_game_id)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please select your role."
			);
			goto output;	
		}
		else if (empty($image_name)) {
			$notif = array(
				'error' => true,
				'message' => "Sorry!!!... Please change your image and upload it."
			);
			goto output;
		}

		$this->db->insert('user_skill', array(
			'game_id' => $game_id,
			'role_game_id' => $role_game_id,
			'image' => $image_name,
			'user_id' => $user_id
		));	
		$notif = array(
			'error' => false,
			'message' => "Congrats!!!... Your skill has been Added."
		);
		goto output;

		output: 
		return $notif;
	}
	// start model of Skill and role





	// start model career experience
	public function Insert_Career_experience($isi)
	{
		function get_guid()
		{
			$data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}

		$image = $isi['image'];

		mkdir(FCPATH.'img/', 0777);
		mkdir(FCPATH.'img/career/', 0777);

		$img = str_replace("data:image/jpeg;base64,", "", $image);
		$img = str_replace("data:image/jpg;base64,", "", $img);
		$img = str_replace("data:image/png;base64,", "", $img);

		$base64 = base64_decode($img);

		$image_name = get_guid() . '.jpeg';

		file_put_contents(FCPATH.'img/career/'.$image_name, $base64);
		$type = $isi['type'];
		$team_name_or_solo_id = $isi['team_name_or_solo_id'];
		$game_id = $isi['game'];
		$career_months = $isi['months'];
		$career_years = $isi['years'];
		$user_id = $isi['user_id'];

		if (empty($type)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your Career type!!!.'
			);
			goto output;
		} else if (empty($team_name_or_solo_id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your team_name_or_solo_id!!!.'
			);
			goto output;
		} else if (empty($game_id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please Change your game!!!.'
			);
			goto output;
		} else if (empty($career_months)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your Career months!!!.'
			);
			goto output;
		} else if (empty($career_years)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your Career years!!!.'
			);
			goto output;
		} else if (empty($image_name)) {
			$notif = array(
				'error' => true,
				'message' => 'Please upload your Career image!!!.'
			);
			goto output;
		} else if (empty($user_id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... The user_id column is required.'
			);
			goto output;
		}

		$this->db->insert('user_career', array(
			'type' => $type,
			'teamname_or_solo_id' => $team_name_or_solo_id,
			'game_id' => $game_id,
			'career_months' => $career_months,
			'career_years' => $career_years,
			'image' => $image_name,
			'user_id' => $user_id
		));
		$notif = array(
			'error' => false,
			'message' => 'Congrarts!!!... Data has been Added.'
		);
		goto output;

		output: return $notif;
	}
	public function Read_Career_experience($isi)
	{
		$user_id = $isi['user_id'];

		if (empty($user_id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... The id column is required.'
			);
			goto output;
		}

		$career = $this->db->query("
			SELECT 
				user_career.id, 
				user.full_name as full_name,
				type,
				game.id as game_id,
				game.name as game_name,
				teamname_or_solo_id,
				user_career.image as image,
				game.name as game_name,
				career_months,
				career_years,
				user_id 
			FROM
				user_career
			LEFT JOIN 
				user on user.id = user_career.user_id
			LEFT JOIN 
				game on game.id = user_career.game_id
			WHERE 
				user_id = '$user_id'
		");

		$notif['error'] = true;
		$notif['message'] = "Sorry!!!... Data not exist.";
		$notif['data'] = array();

		$no = 0;
		foreach ($career->result_array() as $key) {
			$notif['error'] = false;
			$notif['message'] = "Success.";
			$notif['data'][$no++] = $key;
		}
		goto output;

		output: return $notif;
	}

	public function Update_Career_experience($isi)
	{
		function get_guid()
		{
			$data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}

		$image = $isi['image'];

		mkdir(FCPATH.'img/', 0777);
		mkdir(FCPATH.'img/career/', 0777);

		$img = str_replace("data:image/jpeg;base64,", "", $image);
		$img = str_replace("data:image/jpg;base64,", "", $img);
		$img = str_replace("data:image/png;base64,", "", $img);

		$base64 = base64_decode($img);

		$image_name = get_guid() . '.jpeg';

		file_put_contents(FCPATH.'img/career/'.$image_name, $base64);
		
		$id = $isi['id'];

		$type = $isi['type'];
		$team_name_or_solo_id = $isi['team_name_or_solo_id'];
		$game_id = $isi['game'];
		$career_months = $isi['months'];
		$career_years = $isi['years'];
		$user_id = $isi['user_id'];

		if (empty($type)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your Career type!!!.'
			);
			goto output;
		} else if (empty($team_name_or_solo_id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your team name or solo id!!!.'
			);
			goto output;
		} else if (empty($game_id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please Change your game!!!.'
			);
			goto output;
		} else if (empty($career_months)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your Career months!!!.'
			);
			goto output;
		} else if (empty($career_years)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... Please insert your Career years!!!.'
			);
			goto output;
		} else if (empty($image_name)) {
			$notif = array(
				'error' => true,
				'message' => 'Please upload your Career image!!!.'
			);
			goto output;
		} else if (empty($user_id)) {
			$notif = array(
				'error' => true,
				'message' => 'Sorry!!!... The user_id column is required.'
			);
			goto output;
		}

		if (empty($image)) {
			$this->db->update('user_career', array(
			'type' => $type,
			'teamname_or_solo_id' => $team_name_or_solo_id,
			'game_id' => $game_id,
			'career_months' => $career_months,
			'career_years' => $career_years,
			'user_id' => $user_id
			), array(
				'id' => $id
			));	
			$notif = array(
				'error' => false,
				'message' => 'Congrarts!!!... Data has been Updated.'
			);
			goto output;		
		}
		else{
			$this->db->update('user_career', array(
				'type' => $type,
				'teamname_or_solo_id' => $team_name_or_solo_id,
				'game_id' => $game_id, 
				'career_months' => $career_months,
				'career_years' => $career_years,
				'image' => $image_name,
				'user_id' => $user_id
			), array(
				'id' => $id
			));
			$notif = array(
				'error' => false,
				'message' => 'Congrarts!!!... Data has been Updated.'
			);
			goto output;
		}


		output: return $notif;
	}
	public function Delete_Career_experience($isi)
	{
		$career_id = $isi['id'];

		if (empty($career_id)) {
			$notif = array(
				'error'=> true,
				'message' => "Sorry!!!... The id column is required."
			);
			goto output;
		}

		$this->db->delete('user_career', array('id' => $career_id));
		$notif = array(
			'error' => false,
			'message' => "Congrats!!!... Data has been deleted."
		);
		goto output;

		output: return $notif;
	}
	// end model of career experience

}
