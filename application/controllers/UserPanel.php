<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserPanel extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('user_data') == null) {
            // Prevent infinite loop by checking that this isn't the login controller  

            if ($this->router->class != 'UserControl') {
                redirect("index.php/UserControl/loginPage");
            }
        } else {
            $user_data = $this->session->userdata('user_data');
            // print_r($user_data);
        }
    }

    public function index() {
        $this->master_sar_All();
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


            // get score form indicator and user
            $this->load->model('resultuser');
            foreach ($result_indicator as $key => $value2) {
                $citeria['user_id'] = $user_data['user_id'];
                $citeria['indicator_id'] = $value2->indicator_id;
                $result_score = $this->resultuser->getResult($citeria);
                $result_score = $result_score->result();

                if ($result_score != NULL) {            // check if null score
                    $result_score = $result_score[0];
                } else {
                    $result_score = NULL;
                }

                $result_indicator[$key]->indicator = $value;
                $result_indicator[$key]->score = $result_score;
            }



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
            $this->load->model("doc_sync_indicator");
            $this->load->model("resultuser");


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

                // Get Document each subindicator
                $user_id = $user_data['user_id'];
                $master_id = $this->session->userdata('master_id');
                $subindicator_id = $value->subindicator_id;

                $result = $this->doc_sync_indicator->getDocument_sync($subindicator_id, $user_id, $master_id);
                $data_rows = $result->result();
                $datadetail['subindicator_sync_doc'] = $data_rows;


                array_push($subin_detail, $datadetail);
            }
            $data['subindicator'] = $subin_detail;

            // Load Score and Comment user
            $citeria['user_id'] = $user_data['user_id'];
            $citeria['indicator_id'] = $indicator_id;
            $query = $this->resultuser->getResult($citeria);
            $result = $query->result();
            if ($result == null) {
                $result[0] = new stdClass();
                $result[0]->comment_user = "";
                $result[0]->score_user = 0;
            }
            $data['Score_indicator'] = $result;

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

    // For upload Document Only
    public function callUploadDoc() {
        $this->load->model('master_sar');
        $query = $this->master_sar->getAllmaster_sar();
        $data['master_sar'] = $query->result();

        $this->load->view('User/uploadDoc', $data);
    }

    public function SelectFile() {
        $this->load->model('doc_sync_indicator');
        $this->load->model('document');
        $user_data = $this->session->userdata('user_data');

        $master_id = $this->input->post("master_id");
        $doc_id = $this->input->post("file_id");
        $doc_name = $this->input->post("doc_name");

        $result = $this->document->getDetailDocWithID($doc_id);
        $result = $result->result();
        $data_doc = $result[0];

        $doc_syn['subindicator_id'] = $this->input->post("subindicator_id");
        if ($doc_syn['subindicator_id'] != 0) {
            // set data to doc sync table
            $doc_syn['doc_id'] = $doc_id;
            $doc_syn['docname'] = $doc_name;
            $doc_syn['link_path'] = $data_doc->link_path;
            $doc_syn['master_id'] = $master_id;
            $doc_syn['user_id'] = $user_data['user_id'];

            $doc_sync_id = $this->doc_sync_indicator->Adddocument_sync($doc_syn);


            $info['data'] = $data_db;
            $info['statis'] = "success";
        } else {
            $info['data'] = $this->upload->display_error();
            $info['statis'] = "error";
        }

        echo json_encode($info);
    }

    public function URLFile() {
        $this->load->model('doc_sync_indicator');
        $this->load->model('document');


        $user_data = $this->session->userdata('user_data');
        $master_id = $this->input->post("master_id");
        // $master_id = $this->session->userdata('master_id');

        $info['status'] = "success";

        // setdata for insert to document table
        $urls = $this->input->post("urls");
        //Check http:// is found
        if (!filter_var($urls, FILTER_VALIDATE_URL) === false) {
            $urls = $urls;
        } else {
            $urls = "http://" . $urls;
        }

        // setdata for insert to document table
        $data_db['docname'] = $this->input->post("doc_name");
        $data_db['link_path'] = $urls;
        $data_db['size'] = 0;
        $data_db['user_id'] = $user_data['user_id'];
        $data_db['master_id'] = $master_id;
        $data_db['type'] = "URL";
        $data_db['full_path'] = $urls;

        // insert to document table
        $doc_id = $this->document->Adddocument($data_db);

        /* add Data To doc sync */
        $data_db['doc_id'] = $doc_id;
        $data_db['subindicator_id'] = $this->input->post("subindicator_id");

        if ($data_db['subindicator_id'] != 0) {
            // set data to doc sync table
            $doc_syn['doc_id'] = $doc_id;
            $doc_syn['docname'] = $data_db['docname'];
            $doc_syn['link_path'] = $data_db['link_path'];
            $doc_syn['subindicator_id'] = $this->input->post("subindicator_id");
            $doc_syn['master_id'] = $data_db['master_id'];
            $doc_syn['user_id'] = $data_db['user_id'];
            $doc_sync_id = $this->doc_sync_indicator->Adddocument_sync($doc_syn);
        }
        $info['data'] = $data_db;

        echo json_encode($info);
    }

    public function uploadfile() {
        $this->load->model('document');
        $this->load->model('doc_sync_indicator');

        $user_data = $this->session->userdata('user_data');
        $master_id = $this->input->post("master_id");
        //$master_id = $this->session->userdata('master_id');

        $config['upload_path'] = "upload/";
        $config['allowed_types'] = "jpg|gif|png|doc|docx|pdf|xlsx|xls|txt";
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
            $data_db['link_path'] = base_url('upload/') . "/" . $data['file_name'];
            $data_db['size'] = $data['file_size'];
            $data_db['user_id'] = $user_data['user_id'];
            $data_db['master_id'] = $master_id;
            $data_db['type'] = "FILE";
            $data_db['full_path'] = $data['full_path'];
            // insert to document table

            $doc_id = $this->document->Adddocument($data_db);

            $data_db['doc_id'] = $doc_id;
            $data_db['subindicator_id'] = $this->input->post("subindicator_id");

            if ($data_db['subindicator_id'] != 0) {
                // set data to doc sync table
                $doc_syn['doc_id'] = $doc_id;
                $doc_syn['docname'] = $data_db['docname'];
                $doc_syn['link_path'] = $data_db['link_path'];
                $doc_syn['subindicator_id'] = $this->input->post("subindicator_id");
                $doc_syn['master_id'] = $data_db['master_id'];
                $doc_syn['user_id'] = $data_db['user_id'];
                $doc_sync_id = $this->doc_sync_indicator->Adddocument_sync($doc_syn);
            }
            $info['data'] = $data_db;
            // $info['data_sync'] = $data_doc_sync;
        } else {
            $info['data'] = $this->upload->display_error();
            $info['statis'] = "error";
        }

        echo json_encode($info);
    }

    public function getItemInsubindicator() {
        $this->load->model('doc_sync_indicator');

        $user_data = $this->session->userdata('user_data');
        $master_id = $this->session->userdata('master_id');
        $subindicator_id = $this->input->post("subindicator_id");

        $this->load->model('doc_sync_indicator');
        $result = $this->doc_sync_indicator->getDocument_sync($subindicator_id, $user_data['user_id'], $master_id);
        $data_rows = $result->result();
        echo json_encode($data_rows);
    }

    public function deleteDoc_syn() {
        $this->load->model('doc_sync_indicator');
        $user_data = $this->session->userdata('user_data');
        $master_id = $this->session->userdata('master_id');
        $id_syn = $this->input->post("id_syn");
        $subindicator_id = $this->input->post("subindicator_id");

        $data['id'] = $id_syn;
        $data['subindicator_id'] = $subindicator_id;

        $this->doc_sync_indicator->deleteSyn($id_syn);
        $data['sql'] = $this->db->last_query();
        echo json_encode($data);
    }

    public function saveScore() {
        $user_data = $this->session->userdata('user_data');
        $comment_self = $this->input->post("comment_user");
        $score_self = $this->input->post("score_user");
        $indicator_id = $this->input->post("indicator_id");

        $this->load->model('resultuser');
        $citeria['user_id'] = $user_data['user_id'];
        $citeria['indicator_id'] = $indicator_id;
        $citeria['score_user'] = $score_self;
        $citeria['comment_user'] = $comment_self;

        $result = $this->resultuser->addIndicator($citeria);
        $result = $result->result();
    }

    public function logout() {
        
    }

    public function report($master_id = null) {

        $this->load->model('master_sar');
        $result_sar = $this->master_sar->getmaster_sarById($master_id);
        $result_sar = $result_sar->result()[0];

        $this->load->model('composition');
        $result_composit = $this->composition->getAllCompositionByMaster($master_id);
        $result_composit = $result_composit->result();

        // get indicator with composit
        $this->load->model('indicator');
        $this->load->model('resultuser');
        $user_data = $this->session->userdata('user_data');
        $level = $user_data['level'];
        foreach ($result_composit as $key => $value) {
            $result_All_indicator = $this->indicator->getAllIndicatorBycompositSomeLevel($value->id, $level);
            $result_composit[$key]->indicator = $result_All_indicator->result();
            foreach ($result_composit[$key]->indicator as $key2 => $value2) {
                $citeria['user_id'] = $user_data['user_id'];
                $citeria['indicator_id'] = $value2->indicator_id;
                $result_score = $this->resultuser->getResult($citeria);
                $result_composit[$key]->indicator[$key2]->score = $result_score->result();
            }
        }

        $data['data_all'] = $result_composit;
        $data['master_sar'] = $result_sar;

        $this->load->view('user_template/header');
        $this->load->view('user_template/navigationbar');
        $this->load->view('user_template/sidebar');
        $this->load->view('template/report',$data);
        $this->load->view('user_template/footer');
    }

}
?>


