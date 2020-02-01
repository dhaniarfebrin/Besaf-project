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
}


/* End of file Auth.php */
