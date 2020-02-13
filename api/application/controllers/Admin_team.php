<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Admin_team extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_team_model');
	}

	public function show_post()
	{
		$request = $this->Admin_team_model->show($this->post());
		return $this->response($request);
	}

	public function details_post()
	{
		$request = $this->Admin_team_model->details($this->post());
		return $this->response($request);	
	}

}

/* End of file Admin_team.php */
/* Location: ./application/controllers/Admin_team.php */