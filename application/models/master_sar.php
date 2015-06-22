<?php

class master_sar extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addMaster_sar($data) {
        $this->db->insert('master_sar', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    public function updateMaster_sar($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('master_sar', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    public function deleteMaster_sar($data) {
        $this->db->where('id', $data['id']);
        $this->db->delete('master_sar');
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    public function getmaster_sarById($id) {
        $this->db->order_by("id");
        $this->db->where('id', $id);
        $query = $this->db->get('master_sar');
        return $query;
    }

    public function getAllmaster_sar() {
        $this->db->order_by("id");
        $query = $this->db->get('master_sar');
        return $query;
    }
    
    

}

?>