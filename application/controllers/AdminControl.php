<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminControl extends CI_Controller {

    public function ShowFormAdduser() {
        // Call View
        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/FormAddUser');
        $this->load->view('template/footer');
    }
    
    public function ShowFormAddRef() {
        // Call View
        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/FormAddRef');
        $this->load->view('template/footer');
    }

    /**
     * For Adduser Ajax Method
     */
    public function AddUser() {
        $this->load->model('user');
        $data = $this->input->post();
        $data['password'] = md5($data['password']);
        echo $this->user->AddUser($data);
    }

    /**
     * Ajax Method UpdateUser
     */
    public function UpdateUser() {
        $this->load->model('user');
        $data = $this->input->post();
        if ($data["password2"] <> "") {
            $data["password"] = md5($data["password2"]);
        }
        unset($data["password2"]);
        echo $this->user->UpdateUser($data);
    }

    /**
     * For Json data
     */
    public function getAllUser() {
        $level_detail = array("ระดับมหาวิทยาลัย", "ระดับคณะ", "ระดับหลักสูตร");
        $this->load->model('user');
        $result = $this->user->getUser();
        $data = $result->result();

        for ($i = 0; $i < sizeof($data); $i++) {
            $data[$i]->level_detail = $level_detail[$data[$i]->level];
        }
        //print_r($data);
        $output = array(
            "Data" => array()
        );
        $output["Data"] = $data;
        echo json_encode($output);
    }

    
    public function getListLevel(){
         $this->load->model('user');
         $data = $this->input->post();
         $result = $this->user->getUserLevel($data);
         $data = $result->result();
         echo json_encode($data);
    }
    /**
     * Display function
     */
    public function ShowAllUser() {
        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/ShowAllUser');
        $this->load->view('template/footer');
    }

}
