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

    public function getDocument_sync($subindicator_id, $user_id, $master_id) {
        $this->db->where('subindicator_id', $subindicator_id);
        $this->db->where('master_id', $master_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('doc_syn_indicator');
        return $query;
    }

    public function delete($doc_id = null) {
        if ($doc_id != null) {
            $this->db->where('doc_id', $doc_id);
            $this->db->delete('doc_syn_indicator');
        }
    }
    
     public function deleteSyn($doc_syn_id = null) {
        if ($doc_syn_id != null) {
            $this->db->where('doc_syn_id', $doc_syn_id);
            $this->db->delete('doc_syn_indicator');
        }
    }

}
