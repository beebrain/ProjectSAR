<?php

class master_sar extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function addmaster_sar($data){
        $this->db->insert('master_sar', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }
    
    public function getmaster_sarById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('master_sar');
        return $query;
    }
     public function getAllmaster_sar(){
        $query = $this->db->get('master_sar');
        return $query;
    }
   
}
?>