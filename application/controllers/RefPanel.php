<?php

class RefPanel extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('ref_data') == null) {
            // Prevent infinite loop by checking that this isn't the login controller  
            redirect("index.php/UserControl/loginPage");
        } else {
            $ref_data = $this->session->userdata('ref_data');
        }
    }

    public function index() {
        $this->showMaster();
    }

    public function showMaster() {
        // getdata form database
        $this->load->model('composition');
        $this->load->model('master_sar');
        $query = $this->master_sar->getAllmaster_sar();
        $data['master_sar'] = $query->result();

        $this->load->view('ref_template/header');
        $this->load->view('ref_template/navigationbar');
        $this->load->view('ref_template/sidebar');
        $this->load->view('Ref/RefMaster', $data);
        $this->load->view('ref_template/footer');
    }

    public function ShowUser($masterid = null) {
        if ($masterid == null) {
            $this->showMaster();
        } else {
            $this->session->set_userdata('masterid', $masterid);
            $this->load->model('map_user_to_ref');
            $this->load->model('master_sar');

            $ref_data = $this->session->userdata('ref_data');

            $query = $this->master_sar->getmaster_sarById($masterid);
            $data['master_sar'] = $query->result();
            $this->session->set_userdata('master_sar_select', $data['master_sar']);

            $query = $this->map_user_to_ref->searchDetailByref($ref_data['ref_id']);
            $data['user_all'] = $query->result();
        }



        $this->load->view('ref_template/header');
        $this->load->view('ref_template/navigationbar');
        $this->load->view('ref_template/sidebar');
        $this->load->view('Ref/RefShowUser', $data);
        $this->load->view('ref_template/footer');
    }

    public function Composit($user_id_select = null) {

        if ($this->session->userdata('masterid') == null) {
            $this->showMaster();
        }
        // load session masterid
        $master_id = $this->session->userdata('masterid');

        if ($user_id_select == null) {
            $this->ShowUser($master_id);
        } else {
            // Load user Data
            $this->session->set_userdata('user_id_select', $user_id_select);
            $this->load->model('user');
            $result_user = $this->user->getUser($user_id_select);
            $user_data_select = $result_user->result();
            $this->session->set_userdata('user_data_select', $user_data_select[0]);

            $data_all = array();
            // get composit all same master_id
            $this->load->model('composition');
            $query = $this->composition->getAllCompositionByMaster($master_id);
            $result_composit = $query->result();

            // get indicator in composit and some level
            $this->load->model('indicator');
            $this->load->model('user');
            $this->load->model('resultuser');
            $result = $this->user->getUser($user_id_select);
            $result = $result->result();
            $user_data = $result[0];
            //print_r($user_data);


            foreach ($result_composit as $index =>$value) {
                $level = $user_data->level;
                $result_indicator = $this->indicator->getAllIndicatorBycompositSomeLevel($value->id, $level)->result();;
                //$result_indicator = $query->result();

                /// check hear
                if ($result_indicator == null) {
                    unset($result_composit[$index]);
                    continue;
                }
                
                // get score form indicator and user
                foreach ($result_indicator as $key => $value2) {
                    $citeria['user_id'] = $user_id_select;
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


            // $data['data_master'] = $data_master;
            $data['data_all'] = $data_all;
            $this->load->view('ref_template/header');
            $this->load->view('ref_template/navigationbar');
            $this->load->view('ref_template/sidebar');
            $this->load->view('Ref/RefComposit', $data);
            $this->load->view('ref_template/footer');
        }
    }

    public function Showindicator($indicator_id = NULL, $action = NULL, $user_id_select = null, $master_id = null) {

        if ($user_id_select == null || $master_id == null || $action == NULL) {


            if ($this->session->userdata('masterid') == null) {
                $this->showMaster();
            }
            // load session masterid
            $master_id = $this->session->userdata('masterid');

            if ($this->session->userdata('user_id_select') == null) {
                $this->ShowUser($master_id);
            }
            $user_id_select = $this->session->userdata('user_id_select');

            if ($indicator_id == null) {
                $this->Composit($user_id_select);
            }
        }
        // start

        $this->load->model("subindicator");
        $this->load->model("indicator");
        $this->load->model("subindicator_doc");
        $this->load->model("doc_sync_indicator");
        $this->load->model("resultuser");
        $this->load->model("master_sar");
        $this->load->model("user");

        $query = $this->user->getUser($user_id_select)->result();
        $user_data = $query[0];
        $user_data = (array) $user_data;
        $data['user_data'] = $user_data;

        $query = $this->indicator->getIndicatorById($indicator_id);
        $result = $query->result();
        $data['indicator'] = $result;


        $query = $this->subindicator->getAllSubindicatorByindicator($indicator_id);
        $result = $query->result();
        //$data['subindicator'] =;

        $subin_detail = array();

        foreach ($result as $value) {
            $query = $this->subindicator_doc->showSubindicator_doc($user_id_select, $value->subindicator_id);
            $datadetail['subindicator'] = $value;
            if (sizeof($query->result()) > 0) {
                $datadetail['subindicator_doc'] = $query->result()[0];
            } else {
                $datadetail['subindicator_doc'] = NULL;
            }

            // Get Document each subindicator
            $user_id = $user_id_select;
            $subindicator_id = $value->subindicator_id;

            $result_sar = $this->master_sar->getmaster_sarById($master_id);
            $result_sar = $result_sar->result();
            $result_sar = $result_sar[0];
            $data['detail_sar'] = $result_sar;

            $result = $this->doc_sync_indicator->getDocument_sync($subindicator_id, $user_id, $master_id);
            $data_rows = $result->result();
            $datadetail['subindicator_sync_doc'] = $data_rows;


            array_push($subin_detail, $datadetail);
        }
        $data['subindicator'] = $subin_detail;

        // Load Score and Comment user
        $citeria['user_id'] = $user_id_select;
        $citeria['indicator_id'] = $indicator_id;
        $query = $this->resultuser->getResult($citeria);
        $result = $query->result();
        if ($result == null) {
            $result[0] = new stdClass();
            $result[0]->comment_user = "";
            $result[0]->score_user = 0;
            $result[0]->comment_ref = "";
            $result[0]->score_ref = 0;
        }
        $data['Score_indicator'] = $result;

        $this->load->view('ref_template/header');
        $this->load->view('ref_template/navigationbar');
        if ($action == null) {
            $this->load->view('Ref/RefIndicator', $data);
        } else if ($action == "Report") {
            $this->load->view('ref_template/sidebar');
            $this->load->view('Ref/ReportIndicator', $data);
        }

        $this->load->view('ref_template/footer');
    }

    public function saveScore() {
        $comment_ref = $this->input->post("comment_ref");
        $score_ref = $this->input->post("score_ref");
        $user_id_select_id = $this->input->post("user_id_select");
        $ref_id = $this->input->post("ref_id");
        $indicator_id = $this->input->post("indicator_id");

        $this->load->model('resultuser');
        $citeria['user_id'] = $user_id_select_id;
        $citeria['ref_id'] = $ref_id;
        $citeria['indicator_id'] = $indicator_id;
        $citeria['score_ref'] = $score_ref;
        $citeria['comment_ref'] = $comment_ref;

        $result = $this->resultuser->addIndicator($citeria);
        $result = $result->result();
    }

    public function report($master_id = null, $user_id = null) {

        $this->load->model('master_sar');
        $result_sar_all = $this->master_sar->getAllmaster_sar()->result();

        if ($master_id == null || $master_id == "") { // if not select first master
            $master_id = $result_sar_all[0]->id;
        }

        $result_sar = $this->master_sar->getmaster_sarById($master_id);
        $result_sar = $result_sar->result()[0];

        $this->load->model('composition');
        $result_composit = $this->composition->getAllCompositionByMaster($master_id);
        $result_composit = $result_composit->result();

        // get indicator with composit
        $this->load->model('indicator');
        $this->load->model('resultuser');
        $this->load->model('map_user_to_ref');
        $this->load->model('user');
        $ref_data = $this->session->userdata('ref_data');
        $user_result_all = $this->map_user_to_ref->searchDetailByref($ref_data['ref_id'])->result();



        if ($user_id == null) {
            // load user data form session
            $user_id_select = $user_result_all[0];
        } else {
            $user_id_select = $this->user->getUser($user_id)->result();
            $user_id_select = $user_id_select[0];
        }
        $level = $user_id_select->level;
        // End load user data

        foreach ($result_composit as $key => $value) {



            $result_All_indicator = $this->indicator->getAllIndicatorBycompositSomeLevel($value->id, $level);

            if ($result_All_indicator->result() == null) {
                unset($result_composit[$key]);
                continue;
            }

            $result_composit[$key]->indicator = $result_All_indicator->result();


            foreach ($result_composit[$key]->indicator as $key2 => $value2) {
                $citeria['user_id'] = $user_id;
                $citeria['indicator_id'] = $value2->indicator_id;
                $result_score = $this->resultuser->getResult($citeria)->result();
                if ($result_score == null) {
                    $result_score[0] = new stdClass();
                    $result_score[0]->score_ref = "";
                    $result_score[0]->score_user = 0;
                }
                $result_composit[$key]->indicator[$key2]->score = $result_score;
            }
        }

        $data['data_all'] = $result_composit;
        $data['master_sar'] = $result_sar;
        $data['master_sar_all'] = $result_sar_all;

        $data['user_select'] = $user_id_select;
        $data['user_all'] = $user_result_all;
        //  $data['user_data'] = $user_data;

        $this->load->view('ref_template/header');
        $this->load->view('ref_template/navigationbar');
        $this->load->view('ref_template/sidebar');
        $this->load->view('Ref/Report', $data);
        $this->load->view('ref_template/footer');
    }

    public function changePass() {
        $this->load->view('ref_template/header');
        $this->load->view('ref_template/navigationbar');
        $this->load->view('ref_template/sidebar');
        $this->load->view('Ref/ChangePass');
        $this->load->view('ref_template/footer');
    }

}
