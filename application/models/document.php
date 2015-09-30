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

    public function GetAllDocument($userid) {
        $this->db->where('user_id', $userid);
//$this->db->where('master_id', $masterid);
        return $this->db->get('document');
    }

    public function GetAllDocumentwithMaster($userid, $masterid = null) {

        $sqlcommand = "select * from";
        $sqlcommand .= "(select * from user where user.user_id = $userid union ";
        $sqlcommand .= " select user2.* from user inner join user as user2 on  ";
        $sqlcommand .= " user.user_ref = user2.user_id where user.user_id = $userid";
        $sqlcommand .= " union ";
        $sqlcommand .= " select user2.* from user inner join user as user2 on  ";
        $sqlcommand .= " user.user_id = user2.user_ref where user2.user_ref = $userid";
        $sqlcommand .= " ";
        $sqlcommand .= " )as Alluser";
        $sqlcommand .= " inner join document";
        $sqlcommand .= " ON Alluser.user_id = document.user_id";
        
        if ($masterid <> NULL) {
            $sqlcommand .= " where master_id = $masterid";
        }

        // $str = $this->db->last_query();
        return $this->db->query($sqlcommand);
    }

    public function getDetailDocWithID($doc_id) {
        $this->db->where('doc_id', $doc_id);
        //$this->db->where('master_id', $masterid);
        return $this->db->get('document');
    }

    public function delete($doc_id = null) {
        if ($doc_id != null) {
            $this->db->where('doc_id', $doc_id);
            $this->db->delete('document');
        }
    }

}
