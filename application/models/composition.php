<?php

class composition extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllCompositionByMaster($master_id) {
        $this->db->where('master_id',$master_id);
        $this->db->order_by('id');
        $query = $this->db->get('composition');
        return $query;
    }
    
    /**
     * get group of composition which same master id
     * @param type $master_id
     * @return type
     */
    public function getCompositByMaster_id($master_id){
        $this->db->where('master_id',$master_id);
        $this->db->order_by('id');
        $query = $this->db->get('composition');
        return $query;
    }

    public function getCompositionById($id) {
        if ($id == NULL) {
            show_error("Error");
        } else {
            $this->db->where('id', $id);
            $this->db->order_by('id');
            $query = $this->db->get('composition');
            return $query;
        }
    }

    public function addComposition($data) {
        $this->db->insert('composition', $data);
    }

    /**
     * Updata Table Composition
     * @param type $data
     * @author  Pisit Nakjai
     */
    public function UpdateComposition($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('composition', $data);
        return $this->db->affected_rows();
    }

    public function DeleteComposition($id) {
        $this->db->where('id', $id);
        $this->db->delete('composition');
        return $this->db->affected_rows();
    }

    public function DeleteCompositionbyMaster_sar($data) {
        $this->db->where('Master_id', $data['id']);
        $this->db->delete('composition');
        return $this->db->affected_rows();
    }

}

?>