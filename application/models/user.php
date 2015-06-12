<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function AddUser($data) {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
    
    
    public function UpdateUser($data){
        $this->db->where('user_id',$data["user_id"]);
        $this->db->update('user',$data);
        return $this->db->affected_rows();
        
    }
    
    public function getUserLevel($data){
        $this->db->where('level',$data['level']);
        $query = $this->db->get('user');
        return $query;
    }
    
    /**
     * Get user by ID if get user_id
     * get all user if not send user_id
     * @param type $user_id
     * @return type
     */
    public function getUser($user_id = NULL){
        if($user_id <> NULL){
            $this->db->where('user_id',$user_id);
        }
        $this->db->where_not_in('status',"-1");
        $query = $this->db->get('user_ref');
        //echo $this->db->last_query();
        return $query;
    }

}

?>
