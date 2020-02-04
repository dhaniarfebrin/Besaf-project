<?

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//! cek login
		if ($this->session->userdata('role_id') == 1) {
			// user
			redirect('user');
		} elseif ($this->session->userdata('role_id') == 2) {
			// admin
			redirect('admin');
		}
		$this->load->view('index');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function session($role_id, $username, $id)
	{
		$this->session->set_userdata([
			'user_id' => $id,
			'role_id' => $role_id,
			'username' => $username
		]);
		cek_session($role_id);
	}

	// ================================================= Update 4 februari ===========================================================
	public function Tournament()
	{
		//! cek login
		if ($this->session->userdata('role_id') == 1) {
			// user
			redirect('user');
		} elseif ($this->session->userdata('role_id') == 2) {
			// admin
			redirect('admin');
		}
		//user tanpa login bisa melihat tournament dengan view di bawah
		$this->load->view('Front/Tournament');
		$this->load->view('Front/template/footer');
	}

	public function Tournament_details()
	{
		//! cek login
		if ($this->session->userdata('role_id') == 1) {
			// user
			redirect('user');
		} elseif ($this->session->userdata('role_id') == 2) {
			// admin
			redirect('admin');
		}
		//user tanpa login bisa melihat tournament detail dengan view di bawah
		$this->load->view('Front/template/header');
		$this->load->view('Front/Tournament_details');
		$this->load->view('Front/template/footer');
	}
	// =====================================================-=========================================================

	public function Login()
	{
		//! cek login
		if ($this->session->userdata('role_id') == 1) {
			// user
			redirect('user');
		} elseif ($this->session->userdata('role_id') == 2) {
			// admin
			redirect('admin');
		}
		$this->load->view('Front/template/header');
		$this->load->view('Front/Login_page');
		$this->load->view('Front/template/footer');
	}

	public function Forgot_password()
	{
		//! cek login
		if ($this->session->userdata('role_id') == 1) {
			// user
			redirect('user');
		} elseif ($this->session->userdata('role_id') == 2) {
			// admin
			redirect('admin');
		}
		$this->load->view('Front/template/header');
		$this->load->view('Front/Forgot_password');
		$this->load->view('Front/template/footer');
	}
}


/* End of file Auth.php */
