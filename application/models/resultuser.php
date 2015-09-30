<?php

class resultuser extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getResult($dataWare) {
        $this->db->where($dataWare);
        $query = $this->db->get('resultuser');
        return $query;
    }

    public function addIndicator($data) {
        $this->db->insert('resultuser', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

}
