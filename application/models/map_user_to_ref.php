<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class map_user_to_ref extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function DeleteByRef($ref_id) {
        $this->db->where('ref_id', $ref_id);
        $this->db->delete('map_user_to_ref');
        return $this->db->affected_rows();
    }

    public function DeleteByUser($user_id) {

        $this->db->where('user_id', $user_id);
        $this->db->delete('map_user_to_ref');
        return $this->db->affected_rows();
    }

    public function AddMap($data) {
        $this->db->insert('map_user_to_ref', $data);
        return $this->db->affected_rows();
    }

    public function searchByref($ref_id) {
        $this->db->where('ref_id', $ref_id);
        $query = $this->db->get('map_user_to_ref');
        return $query;
    }

    public function searchByUser($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('map_user_to_ref');
        return $query;
    }

}

?>
