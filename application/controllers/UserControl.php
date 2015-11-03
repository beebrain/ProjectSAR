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
        $this->session->sess_destroy();
        $data['message'] = $message;
        $this->load->view('User/LoginUser', $data);
    }

    public function loginProcess() {
        $this->load->model('user');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        if ($user == 'Admin' && $pass == '1234') {
            $user_data['detail'] = 'Admin';
            $this->session->set_userdata('Admin_data', $user_data);
            //To Main User Page
            redirect('index.php/AdminPanel/ShowMaster');
        }

        $user_data = $this->user->checkuser($user, $pass);
        if ($user_data <> NULL) {
            $this->session->set_userdata('user_data', $user_data);
            //To Main User Page
            redirect('index.php/UserPanel/master_sar_All');
        }
        $this->load->model('ref');
        $ref_data = $this->ref->checkuser($user, $pass);
        if ($ref_data <> NULL) {
            $this->session->set_userdata('ref_data', $ref_data);
            //To Main Ref Page
            redirect('index.php/RefPanel/showMaster');
        }

        $this->loginPage("Username หรือ Password ผิดพลาด กรุณาทดลองใหม่");
    }

    public function logoutProcess() {
        $this->session->sess_destroy();
        redirect("index.php/UserControl/loginPage");
    }

    public function changePass() {
        $user_data = $this->session->userdata('user_data');
        $this->load->model('user');
        $result = $this->user->getUser_detail($user_data['user_id'])->result();
        $result = $result[0];
        $id = $user_data["user_id"];
        $data = $this->input->post();
        $data['nn'] = md5($data['password']);
       // $data['old'] = $result->password;
        $data['message'] = "True";
        if (md5($data['password']) == $result->password) {
            $datainsert['user_id'] = $id;
            $datainsert['password'] = md5($data['newpassword']);
            $this->user->UpdateUser($datainsert);
        } else {
            $data['message'] = "False";
        }
        echo json_encode($data);
    }
    

}

?>