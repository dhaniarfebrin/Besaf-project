<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function info($id)
	{
		$this->session->set_userdata('team_id',$id);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('team_view');
		$this->load->view('template/footer');
		$this->load->view('script/team');
	}

}

/* End of file Team.php */
/* Location: ./application/controllers/Team.php */