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
		cek_session($this->session->userdata('role_id'));
	}

	public function Verify($verificationcode)
	{
		$data['verificationcode'] = $verificationcode;
		$this->load->view('Front/template/header');
		$this->load->view('Front/Login_page', $data);
		$this->load->view('Front/template/footer');
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
		$this->load->view('Front/template/header');
		$this->load->view('Front/Tournament');
		$this->load->view('Front/template/footer');
	}

	public function Tournament_details($id)
	{
		//! cek login
		if ($this->session->userdata('role_id') == 1) {
			// user
			redirect('user');
		} elseif ($this->session->userdata('role_id') == 2) {
			// admin
			redirect('admin');
		}
		$this->session->set_userdata('tournament_id', $id);
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

	public function Forgotpassword()
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

	public function Resetpassword($email)
	{

		$data['email'] = base64_decode(urldecode($email));
		$this->load->view('Front/template/header');
		$this->load->view('Front/Create_password', $data);
		$this->load->view('Front/template/footer', $data);
	}

	public function blocked()
	{
		$this->load->view('404');
	}

	public function forbidden()
	{
		$this->load->view('403');
	}
}


/* End of file Auth.php */
