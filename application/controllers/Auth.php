<?

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// gunakan helper untuk cek user access
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function session($role_id, $username)
	{
		$this->session->set_userdata([
			'role_id' => $role_id,
			'username' => $username
		]);
		cek_session($role_id);
	}

	// ================================================ Update 3 februari ===========================================================
	public function Tournament()
	{
		//user tanpa login bisa melihat tournament dengan view di bawah
		$this->load->view('Front/Tournament');
		$this->load->view('Front/template/footer');
	}

	public function Tournament_details()
	{
		//user tanpa login bisa melihat tournament detail dengan view di bawah
		$this->load->view('Front/template/header');
		$this->load->view('Front/Tournament_details');
		$this->load->view('Front/template/footer');
	}
	// =====================================================-=========================================================
}


/* End of file Auth.php */
