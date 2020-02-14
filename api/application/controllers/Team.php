<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Team extends REST_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('Team_model');
	}

	public function create_post()
	{
		$request = $this->Team_model->create($this->post());
		return $this->response($request);
	}

	public function myteam_post()
	{
		$request = $this->Team_model->myteam($this->post());
		return $this->response($request);
	}

	public function info_post()
	{
		$request = $this->Team_model->info($this->post());
		return $this->response($request);
	}

	public function member_post()
	{
		$request = $this->Team_model->member($this->post());
		return $this->response($request);
	}

	public function kick_post()
	{
		$request = $this->Team_model->kick($this->post());
		return $this->response($request);
	}

	public function carimember_post()
	{
		$request = $this->Team_model->cari_member($this->post());
		return $this->response($request);
	}

	public function undang_post()
	{
		$request = $this->Team_model->undang($this->post());
		return $this->response($request);
	}

}

/* End of file Team.php */
/* Location: ./application/controllers/Team.php */