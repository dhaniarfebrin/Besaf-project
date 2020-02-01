<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community extends CI_Controller {

	public function info($id)
	{
		$this->session->set_userdata('komunitas_id',$id);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('community/view-1');
		$this->load->view('template/footer');
		$this->load->view('template/script');
		$this->load->view('script/community');
	}

}

/* End of file community.php */
/* Location: ./application/controllers/community.php */