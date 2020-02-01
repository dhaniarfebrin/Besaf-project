<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Turnamen extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Turnamen_model');
	}

	public function show_post()
	{
		$request = $this->Turnamen_model->show($this->post());
		return $this->response($request);
	}

	public function terlaris_post()
	{
		$request = $this->Turnamen_model->terlaris();
		return $this->response($request);
	}

	public function info_post()
	{
		$request = $this->Turnamen_model->info($this->post());
		return $this->response($request);
	}
}

/* End of file Turnamen.php */
/* Location: ./application/controllers/Turnamen.php */