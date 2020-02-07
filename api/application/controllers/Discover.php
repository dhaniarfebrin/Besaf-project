<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Discover extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Discover_model');
	}

	public function show_post()
	{
		$request = $this->Discover_model->show();
		return $this->response($request);
	}

	public function create_post()
	{
		$request = $this->Discover_model->create($this->post());
		return $this->response($request);
	}

	public function delete_post()
	{
		$request = $this->Discover_model->delete($this->post());
		return $this->response($request);
	}

}

/* End of file Discover.php */
/* Location: ./application/controllers/Discover.php */