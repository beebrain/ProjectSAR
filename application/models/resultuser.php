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
        if ($num_inserts < 1) {
            $num_inserts = $this->updateIndicator($data);
        }
        $error = $this->db->last_query();
        return $num_inserts;
    }

    public function updateIndicator($data) {
        $this->db->where('user_id', $data["user_id"]);
        $this->db->where('indicator_id', $data["indicator_id"]);
        $this->db->update('resultuser', $data);
        return $this->db->affected_rows();
    }

}
