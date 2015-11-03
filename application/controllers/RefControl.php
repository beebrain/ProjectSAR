<?php

class RefControl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('ref_data') == null) {
            redirect("index.php/UserControl/loginPage");
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
        $this->session->sess_destroy();
        redirect("index.php/UserControl/loginPage");
    }

    public function changePass() {
        $ref_data = $this->session->userdata('ref_data');
        $this->load->model('ref');
        $result = $this->ref->getRef($ref_data['ref_id'])->result();
        $result = $result[0];
        $id = $ref_data["ref_id"];
        $data = $this->input->post();
        $data['nn'] = md5($data['password']);
        // $data['old'] = $result->password;
        $data['message'] = "True";
        if (md5($data['password']) == $result->password) {
            $datainsert['ref_id'] = $id;
            $datainsert['password'] = md5($data['newpassword']);
            $this->ref->UpdateRef($datainsert);
        } else {
            $data['message'] = "False";
        }
        echo json_encode($data);
    }

}
