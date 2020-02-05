<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turnamen extends CI_Controller {

	public function info($id)
	{
		$this->session->set_userdata('turnamen_id',$id);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('turnamen/view-1');
		$this->load->view('template/footer');
		$this->load->view('template/script');
		$this->load->view('script/tournament');
	}

	public function create()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('turnamen/create');
		$this->load->view('template/footer');
		$this->load->view('template/script');
		$this->load->view('script/create');	
	}

}

/* End of file turnamen.php */
/* Location: ./application/controllers/turnamen.php */