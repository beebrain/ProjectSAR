<?php

class RefControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('ref_data') == null) {
            // Prevent infinite loop by checking that this isn't the login controller  

            if ($this->router->class != 'RefControl') {
                redirect("index.php/RefControl/loginPage");
            }
        }
    }

    public function loginPage($message = NULL) {
        // getdata form database
        $this->session->unset_userdata('ref_data');
        $data['message'] = $message;
        $this->load->view('Ref/LoginRef', $data);
    }

    public function loginProcess() {
        $this->load->model('ref');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $ref_data = $this->ref->checkuser($user, $pass);
        if ($ref_data <> NULL) {
            $this->session->set_userdata('ref_data', $ref_data);
            //To Main Ref Page
            redirect('index.php/RefPanel/showMaster');
        } else {
            $this->loginPage("Username หรือ Password ผิดพลาด กรุณาทดลองใหม่");
        }
    }

    public function logoutProcess() {
        $this->session->unset_refdata('ref_data');
        redirect("index.php/RefControl/loginPage");
    }

}
