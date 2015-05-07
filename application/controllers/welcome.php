<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('template/navigationbar');
        $this->load->view('template/Sidebar');
        $this->load->view('welcome_message');
        $this->load->view('template/footer');
        $this->load->view('template/header');
    }

    public function login() {
        $this->load->view('Test');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */