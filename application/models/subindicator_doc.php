<?php

class subindicator_doc extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function showSubindicator_doc($user_id, $subindicator_id) {
        $this->db->where('subindicator_id', $subindicator_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('subindicator_doc');
        return $query;
    }

    public function addSubindicator_doc($data) {

        $this->db->where('subindicator_id', $data['subindicator_id']);
        $this->db->where('user_id', $data['user_id']);
        $query = $this->db->get('subindicator_doc');


        if ($query->num_rows() > 0) {
            // the line already exists, so update
            $this->db->where('subindicator_id', $data['subindicator_id']);
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('subindicator_doc', $data);
        } else {
            $this->db->insert('subindicator_doc', $data);
        }

        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    public function updateSubindicator($data) {
        $this->db->where('subindicator_id', $data['subindicator_id']);
        $this->db->update('subindicator_doc', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

}

?>