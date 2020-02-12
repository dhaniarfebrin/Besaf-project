<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Besaf extends CI_Controller
{

	public function index()
	{
		$this->load->view('index');
	}

	public function logIN()
	{
		// $emailUsername = $this->input->post('emailUsername');
		// $password = $this->input->post('pass');

		// $user = $this->db->get_where('tb_user', ['username' => $emailUsername]);
		// $user1 = $this->db->get_where('tb_user', ['email' => $emailUsername]);

		// if ($user) {

		// }

		redirect('Besaf/admin');
	}

	public function reg()
	{
		// $nama = $this->input->post('nama');
		// $username = $this->input->post('username');
		// $email = $this->input->post('email');
		// $region = $this->input->post('region');
		// $password = $this->input->post('pass');
		// $confirmpass = $this->input->post('confirmpass');
		// $role_id = 1;
		// $foto = null;

		// if ($password == $confirmpass){
		// 	$data = [
		// 		'nama' => $nama,
		// 		'username' => $username,
		// 		'email' => $email,
		// 		'region' => $region,
		// 		'password' => password_hash($password, PASSWORD_BCRYPT),
		// 		'role_id' => $role_id,
		// 		'foto' => $foto
		// 	];

		// 	$this->db->insert('tb_user', $data);
		// 	redirect('besaf/loginPage');
		// } else {
		// 	redirect('besaf/loginPage');
		// }
		redirect('Besaf/admin');
	}

	public function loginPage()
	{
		// $this->load->view('loginpage');
	}

	public function admin()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('Tampilan_sidebar/Dashboard');
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	public function community()
	{
		$this->session->set_userdata('id', '3');
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
