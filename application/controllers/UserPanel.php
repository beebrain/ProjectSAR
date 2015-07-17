<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserPanel extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $user_data['user_id'] = "1";
        $user_data['username'] = "test";
        $user_data['detail'] = "ทดสอบ";
        $user_data['level'] = "3";
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
        $user_data = $this->session->userdata('user_data');
        if ($indicator_id == NULL) {
            redirect("index.php/UserPanel/master_sar_All");
            return false;
        } else {
            $this->load->model("subindicator");
            $this->load->model("indicator");
            $this->load->model("subindicator_doc");

            $query = $this->indicator->getIndicatorById($indicator_id);
            $result = $query->result();
            $data['indicator'] = $result;

            $query = $this->subindicator->getAllSubindicatorByindicator($indicator_id);
            $result = $query->result();
            //$data['subindicator'] =;

            $subin_detail = array();
            foreach ($result as $value) {
                $query = $this->subindicator_doc->showSubindicator_doc($user_data['user_id'], $value->subindicator_id);
                $datadetail['subindicator'] = $value;
                if (sizeof($query->result()) > 0) {
                    $datadetail['subindicator_doc'] = $query->result()[0];
                } else {
                    $datadetail['subindicator_doc'] = NULL;
                }

                array_push($subin_detail, $datadetail);
            }
            $data['subindicator'] = $subin_detail;
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
    public function addDocumentSubindicator() {
        $data = $this->input->post();
        $this->load->model("subindicator_doc");
        //$data['create_date'] = 'now()';
        /*
          $data['user_id'] = "1";
          $data['subindicator_id']= "2";
          $data['indicator_id']= "1";
          $data['document']="test";
         */
        $this->subindicator_doc->addSubindicator_doc($data);
        echo json_encode($data);
    }

    public function login() {
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function callUploadPage($id) {
        $data['id'] = $id;
        $this->load->view('User/upload', $data);
    }

    public function uploadfile() {
        $this->load->model('document');
        $this->load->model('doc_sync_indicator');

        $user_data = $this->session->userdata('user_data');
        $master_id = $this->session->userdata('master_id');

        $config['upload_path'] = "upload/";
        $config['allowed_types'] = "jpg|gif|png|doc|docx|pdf|xlsx|xls";
        $config['max_size'] = 2048;
        $config['file_name'] = '768';
        $config['encrypt_name'] = 'true';
        $config['remove_spaces'] = 'true';

        $this->load->library("upload");
        $this->upload->initialize($config);
        $info['status'] = "success";

        if ($this->upload->do_upload("myfile")) {
            // if upload success
            // get upload data
            $data = $this->upload->data();

            // setdata for insert to document table
            $data_db['docname'] = $this->input->post("doc_name");
            $data_db['subindicator_id'] = $this->input->post("subindicator_id");
            $data_db['full_path'] = base_url('upload/') . "/" . $data['file_name'];
            $data_db['size'] = $data['file_size'];
            $data_db['user_id'] = $user_data['user_id'];
            $data_db['master_id'] = $master_id;
            // insert to document table
            $doc_id = $this->document->Adddocument($data_db);

            // set data for insert to doc_sync table
            $data_doc_sync['doc_name'] = $data_db['docname'];
            $data_doc_sync['link_path'] = $data_db['full_path'];
            $doc_sync_id = $this->doc_sync_indicator->Adddocument_sync($data_doc_sync);

            $info['data'] = $data_db;
            $info['data_sync'] = $data_doc_sync;
        } else {
            $info['data'] = $this->upload->display_error();
            $info['statis'] = "error";
        }

        echo json_encode($info);
    }

    public function checksession() {
        
    }

}
?>


