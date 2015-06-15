<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ref extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function AddRef($data) {
        $this->db->insert('ref', $data);
        return $this->db->affected_rows();
    }
    
    
    public function UpdateRef($data){
        $this->db->where('user_id',$data["user_id"]);
        $this->db->update('ref',$data);
        return $this->db->affected_rows();
        
    }
    
    /**
     * Get user by ID if get ref_id
     * get all ref if not send ref_id
     * @param type $ref_id
     * @return type
     */
    
    public function getRef($user_id = NULL){
        if($user_id <> NULL){
            $this->db->where('user_id',$user_id);
        }
        $this->db->where_not_in('status',"-1");
        $query = $this->db->get('ref');
        return $query;
    }

}

?>
