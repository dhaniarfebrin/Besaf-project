<?php 

require APPPATH.'libraries/Format.php';
require APPPATH.'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Profile extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model', 'Profile');
	}
	// show game and role game in select contorller
	public function Show_games_post()
	{
		$req = $this->Profile->Show_games();
		return $this->response($req);
	}
	public function Role_game_post()
	{
		$req = $this->Profile->Role_game($this->post());
		return $this->response($req);
	}
	// show game and role game in select contorller




	// add photo controllers
	public function Add_photo_post()
	{
		$req = $this->Profile->Add_photo($this->post());
		return $this->response($req);
	}
	// end photo controllers

	

	

	// Setting Controllers
	public function Change_password_post()
	{
		$req = $this->Profile->Change_password($this->post());
		return $this->response($req);
	}
	// end of Setting controllers





	// Player info Controller
	public function Read_Player_info_post()
	{
		$req = $this->Profile->Read_Player_info($this->post());
		return $this->response($req);
	}
	public function Update_Player_info_post()
	{
		$req = $this->Profile->Update_Player_info($this->post());
		return $this->response($req);
	}
	// End Controller of player info





	// about me Controller
	public function Read_About_me_post()
	{
		$req = $this->Profile->Read_About_me($this->post());
		return $this->response($req);
	}
	public function Update_About_me_post()
	{
		$req = $this->Profile->Update_About_me($this->post());
		return $this->response($req);
	}
	// end controller of about me





	// skill and role contoller
	public function Read_skill_role_post()
	{
		$req = $this->Profile->Read_skill_role($this->post());
		return $this->response($req);
	}
	public function Insert_skill_and_role_post()
	{
		$req = $this->Profile->Insert_skill_and_role($this->post());
		return $this->response($req);
	}
	/*public function Update_skill_and_role_post()
	{
		$req = $this->Profile->Update_skill_and_role($this->post());
		return $this->response($req);
	}*/
	public function Delete_skill_and_role_post()
	{
		$req = $this->Profile->Delete_skill_and_role($this->post());
		return $this->response($req);
	}
	
	// skill and role contoller





	// Career Experience Controller
	public function Insert_Career_experience_post()
	{
		$req = $this->Profile->Insert_Career_experience($this->post());
		return $this->response($req);
	}
	public function Read_Career_experience_post()
	{
		$req = $this->Profile->Read_Career_experience($this->post());
		return $this->response($req);
	}
	public function Update_Career_experience_post()
	{
		$req = $this->Profile->Update_Career_experience($this->post());
		return $this->response($req);
	}
	public function Delete_Career_experience_post()
	{
		$req = $this->Profile->Delete_Career_experience($this->post());
		return $this->response($req);
	}
	// end Controller of Career Experience

}