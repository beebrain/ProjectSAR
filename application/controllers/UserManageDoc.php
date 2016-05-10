<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserManageDoc extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('user_data') == null) {
            // Prevent infinite loop by checking that this isn't the login controller  

            if ($this->router->class != 'UserControl') {
                redirect("index.php/UserControl/loginPage");
            }
        } else {
            $user_data = $this->session->userdata('user_data');
        }
    }

    public function ShowManageDoc($master_id = "") {
        $this->load->model("master_sar");
        $data_master_sar = $this->master_sar->getAllmaster_sar();
        $data['data_master_sar'] = $data_master_sar->result();
        $data['master_id'] = $master_id;
        $this->load->view('user_template/header');
        $this->load->view('user_template/navigationbar');
        $this->load->view('user_template/sidebar');
        $this->load->view('User/UserDoc', $data);
        $this->load->view('user_template/footer');
    }

    public function getAllDocMember($master_id = null) {
        $user_data = $this->session->userdata('user_data');
        $user_id = $user_data['user_id'];
        
        $this->load->model('user');
        $result = $this->user->getUserRef($user_id);
        $result = $result->result();


        $this->load->model('document');
        $result = $this->document->GetAllDocumentwithMaster($user_data['user_id'], $master_id);
        $result_doc = $result->result();

        $output["data"] = $result_doc;
        echo json_encode($output);
    }

    public function getAllDoc($master_id = null) {

        $user_data = $this->session->userdata('user_data');
        $this->load->model('document');
        $result = $this->document->GetAllDocumentwithMaster($user_data['user_id'], $master_id);
        $result_doc = $result->result();
        //echo $result;
        $output["data"] = $result_doc;
        echo json_encode($output);
    }

    public function deletedoc() {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
        $data = $this->input->post();

        // Delete in document Table
        $this->load->model('document');
        $this->document->delete($data["doc_id"]);

        // Delete all in Doc Sync Table
        $this->load->model('doc_sync_indicator');
        $this->doc_sync_indicator->delete($data["doc_id"]);

        if ($data["type"] == "FILE") {
            $file_name = $data["full_path"];
            if ($file_name != null) {
                unlink($file_name); // delete file
            }
        }

        echo json_encode($data);
    }

}
?>

