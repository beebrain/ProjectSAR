<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class document extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Adddocument($data) {
        $this->db->insert('document', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function Updatedocument($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('document', $data);
        return $this->db->affected_rows();
    }

}
