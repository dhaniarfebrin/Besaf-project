<?php
 
require APPPATH.'libraries/REST_Controller.php';
require APPPATH.'libraries/Format.php';

use Restserver\libraries\REST_Controller;

class Super_admin extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Super_admin_model", "Super_admin");
	}
	// controller game site
	public function Add_game_post()
	{
		$req = $this->Super_admin->Add_game($this->post());
		return $this->response($req);
	}
	public function Read_game_post()
	{
		$req = $this->Super_admin->Read_game($this->post());
		return $this->response($req);
	}
	public function Game_details_post()
	{
		$req = $this->Super_admin->Game_details($this->post());
		return $this->response($req);
	}
	public function Delete_game_post()
	{
		$req = $this->Super_admin->Delete_game($this->post());
		return $this->response($req);
	}
	// end controller game site



	// start controller of Super admin Profile
	public function Update_avatar_post()
	{
		$req = $this->Super_admin->Update_avatar($this->post());
		return $this->response($req);
	}
	public function Read_avatar_post()
	{
		$req = $this->Super_admin->Read_avatar($this->post());
		return $this->response($req);
	}
	public function Read_info_post()
	{
		$req = $this->Super_admin->Read_info($this->post());
		return $this->response($req);
	}
	public function Update_info_post()
	{
		$req = $this->Super_admin->Update_info($this->post());
		return $this->response($req);
	}
	public function Update_about_me_post()
	{
		$req = $this->Super_admin->Update_about_me($this->post());
		return $this->response($req);
	}
	// start controller of Super admin Profile




	// start controller of user site
	public function Read_users_post()
	{
		$req = $this->Super_admin->Read_users($this->post());
		return $this->response($req);
	}
	public function Users_detail_post()
	{
		$req = $this->Super_admin->Users_detail($this->post());
		return $this->response($req);
	}
	public function Read_super_admin_post()
	{
		$req = $this->Super_admin->Read_super_admin($this->post());
		return $this->response($req);
	}
	public function Delete_user()
	{
		$req = $this->Super_admin->Delete_user($this->post());
		return $this->response($req);
	}
	// start controller of user site


}