<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminPanel extends CI_Controller {

    public function index() {
        
    }

    public function showCompositAll() {

        $this->load->model('composition');
        $this->load->model('indicator');

        $result = $this->composition->getAllComposition();
        $dataJson['allData'] = array();
        foreach ($result->result() as $row) {
            $result_indicator = $this->indicator->getAllIndicatorBycomposit($row->id);
            array_push($dataJson['allData'], array($row, $result_indicator->result()));
        }

        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/ShowComposition', $dataJson);
        $this->load->view('template/footer');
    }

    /**
     * Show Form add composit
     */
    public function ShowFormAddcomposit() {
        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/FormAddComposit');
        $this->load->view('template/footer');
    }

    /**
     * Show Form add composit
     */
    public function showFormAddIndicator($composition_id) {
        $this->load->model('composition');
        $query = $this->composition->getCompositionById($composition_id);
        $result = $query->result();
        $data['result'] = $result[0];
        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/FormAddIndicator', $data);
        $this->load->view('template/footer');
    }

    public function AddComposition() {
        $this->load->model('composition');
        $data['maintitle'] = $this->input->post('maintitle');
        $data['title'] = $this->input->post('title');
        $this->composition->addComposition($data);
        redirect('index.php/AdminPanel/showCompositAll');
    }

    public function AddIndicator() {
        $this->load->model('indicator');
        $data['indicator_num'] = $this->input->post('number');
        $data['indicator_title'] = $this->input->post('title');
        $data['indicator_type'] = $this->input->post('type');
        $data['year'] = $this->input->post('year');
        $data['detail'] = $this->input->post('detail');
        $data['composition_id'] = $this->input->post('composition_id');
        $data['data_use'] = $this->input->post('used');
        $data['citeria'] = $this->input->post('citeria');
        $number = $this->indicator->addIndicator($data);
        if ($number == 0) {
            show_404();
        }
        redirect('index.php/AdminPanel/showCompositAll');
    }

    /**
     * 
     *
     * @return type
     * @auther jirapa /showFormEditIndicator
     */
    public function showFormEditIndicator($indicator_id) {

        $this->load->model('indicator');
        $this->load->model('composition');
        $query = $this->indicator->getIndicatorById($indicator_id);
        $result = $query->result();
        $comid = $result[0]->composition_id;
        $composition = $this->composition->getCompositionById($comid);
        $composition = $composition->result();
        $data['composition'] = $composition[0];
        $data['indicator'] = $result[0];

        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/FormEditIndicator', $data);
        $this->load->view('template/footer');
    }

    /**
     * @return type
     * @auther jirapa /EditIndicator
     * 
     */
    public function EditIndicator() {
        $this->load->model('indicator');
        $data['indicator_num'] = $this->input->post('number');
        $data['indicator_title'] = $this->input->post('title');
        $data['indicator_type'] = $this->input->post('type');
        $data['year'] = $this->input->post('year');
        $data['detail'] = $this->input->post('detail');
        $data['composition_id'] = $this->input->post('composition_id');
        $data['data_use'] = $this->input->post('used');
        $data['citeria'] = $this->input->post('citeria');
        $data['indicator_id'] = $this->input->post('indicator_id');
        $number = $this->indicator->editIndicator($data);
        redirect('index.php/AdminPanel/showCompositAll');
    }

    /*
     * jirapa/showFormAddSubindicator
     */

    public function showFormAddSubindicator($indicator_id) {
        $this->load->model('indicator');
        $query = $this->indicator->getIndicatorById($indicator_id);
        $result = $query->result();
        $data['indicator'] = $result[0];

        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/FormAddSubindicator', $data);
        $this->load->view('template/footer');
    }

    /*
     * jirapa/AddSubindicator
     */

    public function AddSubindicator() {
        $this->load->model('subindicator');
        $data['detail'] = $this->input->post('detail');
        $data['indicator_id'] = $this->input->post('indicator_id');
        $number = $this->subindicator->addSubindicator($data);
        if ($number == 0) {
            show_404();
        }
        redirect('index.php/AdminPanel/ShowDetailIndicator/' . $data['indicator_id']);
    }

    /**
     * 
     *
     * @return type
     * @auther jirapa /showDetailIndicator แก้เพิ่มเติ่ม ของ subindicator
     */
    public function showDetailIndicator($indicator_id) {
        $this->load->model('composition');
        $this->load->model('indicator');
        $this->load->model('subindicator');
        $query = $this->indicator->getIndicatorById($indicator_id);
        $result = $query->result();
        /* composition */
        $comid = $result[0]->composition_id;
        $composition = $this->composition->getCompositionById($comid);
        $composition = $composition->result();

        $subindicator = $this->subindicator->getAllSubindicatorByindicator($result[0]->indicator_id);
        $subindicator = $subindicator->result();

        $data['composition'] = $composition[0];
        $data['indicator'] = $result[0];
        $data['subindicator'] = $subindicator;

        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/ShowDetailIndicator', $data);
        $this->load->view('template/footer');
    }

    /**
     * For Update Composition 
     * @author  Pisit Nakjai 
     */
    public function UpdateComposition() {
        $this->load->model('composition');
        $data['maintitle'] = $this->input->post('maintitle');
        $data['title'] = $this->input->post('title');
        $data['id'] = $this->input->post('composit_id');

        $this->composition->UpdateComposition($data);
    }

    /**
     * Delete Indicator
     * @author Pisit
     */
    public function DeleteIndicator() {
      
        $this->load->model('indicator');
        $id = $this->input->post('id');
        $check = $this->input->post('check');
        if ($check == "true") {
            $this->indicator->DeleteIndicator($id);
        }

    }

    public function DeleteComposition() {
        $this->load->model('composition');
        $id = $this->input->post('id');
        $check = $this->input->post('check');
        if ($check == "true") {
            $this->composition->DeleteComposition($id);
        }
    }

    public function login() {
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }
    
    public function ShowAllMaster(){
        $this->load->model("master_sar");
        $query = $this->master_sar->getAllmaster_sar();
        $result = $query->result();
        $data["master_sar"] = $result;
        
        // Call View
        $this->load->view('template/header');
        $this->load->view('template/navigationbar');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/ManageComposit', $data);
        $this->load->view('template/footer');
    }
    
     public function AddMaster_sar(){
         
        $this->load->model("master_sar");
        $data['desc'] = $this->input->post('desc');
        $num_inserts = $this->master_sar->addmaster_sar($data);
       echo $num_inserts;
    }
    
}

?>
