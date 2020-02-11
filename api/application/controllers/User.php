<?
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
// require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

// use chriskacerguis\RestServer\RestController;

class User extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user', 'user');
	}

	public function Login_post()
	{
		$response = $this->user->login($this->post());

		$this->response($response);
	}

	public function Registrasi_post()
	{
		$response = $this->user->registrasi($this->post());

		$this->response($response);
	}

	public function Verify_post()
	{
		$response = $this->user->verify($this->post());

		$this->response($response);
	}

	public function Forgotpassword_post()
	{
		$response = $this->user->forgotpassword($this->post());

		$this->response($response);
	}
}
