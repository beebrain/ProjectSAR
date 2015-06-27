<?php

class subindicator_doc extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addSubindicator_doc($data) {
        $this->db->insert('subindicator', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    public function updateSubindicator($data) {
        $this->db->where('subindicator_id',$data['subindicator_id']);
        $this->db->update('subindicator', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

}

?>