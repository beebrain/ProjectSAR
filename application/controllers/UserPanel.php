<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserPanel extends CI_Controller {

    public function index() {
        
    }

    public function compositionAll() {
        // getdata form database
        $this->load->model('composition');
        $result = $this->composition->getAllComposition();
        $data['composit'] = $result;
        
        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('UserPanel', $data);
        $this->load->view('template/footer');
    }

    public function indicatorAll($idcompo = NULL) {
        if ($idcompo == NULL) {
            redirect('/UserPanel/compositionAll');
        } else {
            
        }
    }
    


    public function login() {
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function checksession() {
        
    }

}
?>


