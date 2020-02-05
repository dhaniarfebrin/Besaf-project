<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Tournament extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tournament_model');
	}

	public function show_post()
	{
		$request = $this->Tournament_model->show($this->post());
		return $this->response($request);
	}

}

/* End of file Tournament.php */
/* Location: ./application/controllers/Tournament.php */