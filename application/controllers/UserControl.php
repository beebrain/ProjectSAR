<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data') == null) {
            // Prevent infinite loop by checking that this isn't the login controller  

            if ($this->router->class != 'UserControl') {
                redirect("index.php/UserControl/loginPage");
            }
        }
    }

    public function loginPage($message = NULL) {
        // getdata form database
        $this->session->unset_userdata('user_data');
        $data['message'] = $message;
        $this->load->view('User/LoginUser', $data);
    }

    public function loginProcess() {
        $this->load->model('user');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $user_data = $this->user->checkuser($user, $pass);
        if ($user_data <> NULL) {
            $this->session->set_userdata('user_data', $user_data);
            //To Main User Page
            redirect('index.php/UserPanel/master_sar_All');
        } else {
            $this->loginPage("Username หรือ Password ผิดพลาด กรุณาทดลองใหม่");
        }
    }

    public function logoutProcess() {
        $this->session->unset_userdata('user_data');
        redirect("index.php/UserControl/loginPage");
    }

}
?>

