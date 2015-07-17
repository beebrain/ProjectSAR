<?php

class doc_sync_indicator extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Adddocument_sync($data) {
        $this->db->insert('doc_syn_indicator', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function Updatedocument_sync($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('doc_syn_indicator', $data);
        return $this->db->affected_rows();
    }

}