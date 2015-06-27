<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserPanel extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $user_data['user_id'] = "1";
        $user_data['username'] = "test";
        $user_data['detail'] = "ทดสอบ";
        $user_data['level'] = "1";
        $this->session->set_userdata('user_data', $user_data);
        // Your own constructor code
    }

    public function index() {
        
    }

    public function master_sar_All() {
        // getdata form database
        $this->load->model('composition');
        $this->load->model('master_sar');
        $query = $this->master_sar->getAllmaster_sar();
        $data['master_sar'] = $query->result();

        $this->load->view('user_template/header');
        $this->load->view('user_template/navigationbar');
        $this->load->view('user_template/sidebar');
        $this->load->view('User/Usermaster', $data);
        $this->load->view('user_template/footer');
    }

    public function ShowComposit($master_id = NULL) {


        $this->load->model('master_sar');
        if ($master_id != NULL) {
            // for regis master_sar to session
            $this->session->set_userdata('master_id', $master_id);
            $result = $this->master_sar->getmaster_sarById($master_id);
            $data_master = $result->result();
            $this->session->set_userdata('data_master', $data_master);
        } else {
            // for check master_sar session
            if ($this->session->userdata('master_id')) {
                $master_id = $this->session->userdata('master_id');
                $result = $this->master_sar->getmaster_sarById($master_id);
                $data_master = $result->result();
                $this->session->set_userdata('data_master', $data_master);
            } else {
                redirect('index.php/UserPanel/master_sar_All');
            }
        }

        $data_all = array();
        // get composit all same master_id
        $this->load->model('composition');
        $query = $this->composition->getAllCompositionByMaster($master_id);
        $result_composit = $query->result();

        // get indicator in composit and some level
        $this->load->model('indicator');
        foreach ($result_composit as $value) {
            $user_data = $this->session->userdata('user_data');
            $level = $user_data['level'];
            $query = $this->indicator->getAllIndicatorBycompositSomeLevel($value->id, $level);
            $result_indicator = $query->result();
            $data_sub["composit"] = $value;
            $data_sub["indicator"] = $result_indicator;
            array_push($data_all, $data_sub);
        }


        $data['data_master'] = $data_master;
        $data['data_all'] = $data_all;

        $this->load->view('user_template/header');
        $this->load->view('user_template/navigationbar');
        $this->load->view('user_template/sidebar');
        $this->load->view('User/Usercomposit', $data);
        $this->load->view('user_template/footer');
    }

    public function ShowIndicator($indicator_id = NULL) {
        if ($indicator_id == NULL) {
            redirect("index.php/UserPanel/master_sar_All");
            return false;
        } else {
            $this->load->model("subindicator");
            $this->load->model("indicator");
            $query = $this->indicator->getIndicatorById($indicator_id);
            $result = $query->result();
            $data['indicator'] = $result;
            
            $query = $this->subindicator->getAllSubindicatorByindicator($indicator_id);
            $result = $query->result();
            $data['subindicator'] = $result;
            
            $this->load->view('user_template/header');
            $this->load->view('user_template/navigationbar');
         //   $this->load->view('user_template/sidebar');
            $this->load->view('User/userindicator', $data);
            $this->load->view('user_template/footer');
        }
    }

    /** insert description of Subindicator
     * param : id of subindicator
     * param : id of user
     * param : detail of subindicator
     */
    public function addDocumentSubindicator(){
        $data = $this->input->post();
        print_r($data);
        //$this->load->model("subindicator_doc");
        
        
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


