<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Community extends REST_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('Community_model');
	}

	public function show_post()
	{
		$request = $this->Community_model->show($this->post());
		return $this->response($request);
	}

	public function details_post()
	{
		$request = $this->Community_model->details($this->post());
		return $this->response($request);
	}

}

/* End of file Community.php */
/* Location: ./application/controllers/Community.php */