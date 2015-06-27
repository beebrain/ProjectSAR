<?php

class indicator extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @param type $id
     * @return Dataset
     */
    public function getAllIndicatorBycomposit($id) {
        $this->db->where('composition_id', $id);
        $this->db->order_by('indicator_id');
        $query = $this->db->get('indicator');
        return $query;
    }

    /**
     * 
     * @param type $id
     * @return Dataset
     */
    public function getAllIndicatorBycompositSomeLevel($id,$level) {
        $this->db->where('composition_id', $id);
        $this->db->where('lv'.$level,"1");
        $this->db->order_by('indicator_id');
        $query = $this->db->get('indicator');
        return $query;
    }

    /*
     *  jirapa/getIndicatorById
     */

    public function getIndicatorById($indicator_id) {
        $this->db->where('indicator_id', $indicator_id);
        $this->db->order_by('indicator_id');
        $query = $this->db->get('indicator');
        return $query;
    }

    /**
     * 
     * @param type $data
     * @return type
     * @auther jirapa /editIndictor
     */
    public function editIndicator($data) {
        $this->db->where('indicator_id', $this->input->post('indicator_id'));
        $this->db->update('indicator', $data);
        $num_updates = $this->db->affected_rows();
        return $num_updates;
    }

    public function updateIndicatorWithComposition($data) {
        $this->db->where('composition_id', $data['composition_id']);
        $this->db->update('indicator', $data);
        $num_updates = $this->db->affected_rows();
        return $num_updates;
    }

    public function updateIndicatorWithIndicatorId($data) {
        $this->db->where('indicator_id', $data['indicator_id']);
        $this->db->update('indicator', $data);
        $num_updates = $this->db->affected_rows();
        return $num_updates;
    }

    /**
     * 
     * @param type $data
     * @return int
     * @author Pisit Nakjai
     */
    public function addIndicator($data) {
        $this->db->insert('indicator', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    /**
     * Delete indicator by id
     * @author Pisit Nakjai
     */
    public function DeleteIndicator($id) {
        $this->db->where('indicator_id', $id);
        $this->db->delete('indicator');
    }

}

?>