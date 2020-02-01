<?php

defined('BASEPATH') or exit('No direct script access allowed');

class S_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'welcome super admin';
    }
}
        
    /* End of file  S_admin.php */
