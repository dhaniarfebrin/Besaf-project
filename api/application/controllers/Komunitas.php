<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Komunitas extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Komunitas_model');
	}

	public function create_post()
	{
		$request = $this->Komunitas_model->create($this->post());
		return $this->response($request);
	}

	public function show_post()
	{
		$request = $this->Komunitas_model->show();
		return $this->response($request);
	}

	public function info_post()
	{
		$request = $this->Komunitas_model->info($this->post());
		return $this->response($request);
	}

	public function my_post()
	{
		$request = $this->Komunitas_model->my($this->post());
		return $this->response($request);
	}

	public function member_post()
	{
		$request = $this->Komunitas_model->member($this->post());
		return $this->response($request);
	}

	public function turnamen_post()
	{
		$request = $this->Komunitas_model->turnamen($this->post());
		return $this->response($request);
	}

	public function leaderboard_post()
	{
		$request = $this->Komunitas_model->leaderboard($this->post());
		return $this->response($request);
	}

	public function postingan_post()
	{
		$request = $this->Komunitas_model->postingan($this->post());
		return $this->response($request);
	}

	public function join_post()
	{
		$request = $this->Komunitas_model->join($this->post());
		return $this->response($request);
	}

	public function konfirmasiuser_post()
	{
		$request = $this->Komunitas_model->konfirmasi_user($this->post());
		return $this->response($request);	
	}

}

/* End of file Komunitas.php */
/* Location: ./application/controllers/Komunitas.php */