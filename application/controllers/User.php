<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		//! cek login
		if (!$this->session->userdata('user_id')) {
			redirect('auth');
		} elseif ($this->session->userdata('role_id') == 2) {
			// s_admin
			redirect('admin');
		}
	}

	public function index()
	{
		// $this->load->view('index');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('Tampilan_sidebar/Dashboard');
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	public function community()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('community_view');
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	public function tournament()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('tournament_view');
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	public function discover()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('discover_view');
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	public function lucky_draw()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('lucky_draw_view');
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	public function market()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('market_view');
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	public function faq()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('faq_view');
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	public function profile()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('Tampilan_sidebar/Profile');
		$this->load->view('template/footer');
		$this->load->view('template/script');
		$this->load->view('script/User_profile');
	}
}

/* End of file imsyak.php */
/* Location: ./application/controllers/imsyak.php */
