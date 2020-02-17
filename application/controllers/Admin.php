<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->dashboard();
	}

	public function dashboard()
	{
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/dashboard');
		$this->load->view('Admin/template/footer');
	}

	public function game()
	{
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/game');
		$this->load->view('Admin/template/footer');
	}

	public function game_details($id)
	{
		$this->session->set_userdata('game_id', $id);
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/game_details');
		$this->load->view('Admin/template/footer');
	}

	public function community()
	{
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/community');
		$this->load->view('Admin/template/footer');
	}
	
	public function community_details($id) {
		$this->session->set_userdata('komunitas_id',$id);
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/community_details');
		$this->load->view('Admin/template/footer');
	}

	public function tournament()
	{
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/tournament');
		$this->load->view('Admin/template/footer');
	}

	public function profile()
	{
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/profile');
		$this->load->view('Admin/template/footer');
	}

	public function team()
	{
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/teams');
		$this->load->view('Admin/template/footer');
	}

	public function team_details($team_id)
	{
		$this->session->set_userdata('team_id', $team_id);
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/teams_details');
		$this->load->view('Admin/template/footer');
	}

	public function user()
	{
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/users');
		$this->load->view('Admin/template/footer');
	}

	public function user_details($user_id)
	{
		$this->session->set_userdata('user_id', $user_id);
		$this->load->view('Admin/template/header'); 
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/users_details');
		$this->load->view('Admin/template/footer');
	}

	public function tournament_details($tournament_id)
	{
		$this->session->set_userdata('tournament_id', $tournament_id);
		$this->load->view('Admin/template/header');
		$this->load->view('Admin/template/sidebar');
		$this->load->view('Admin/tournament_details');
		$this->load->view('Admin/template/footer');
	}
}
