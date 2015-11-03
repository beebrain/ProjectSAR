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

    public function UpdateUser($data) {
        $this->db->where('user_id', $data["user_id"]);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function getUserLevel($data) {
        $this->db->where('level', $data['level']);
        $this->db->where_not_in('status', "-1");
        $query = $this->db->get('user');
        return $query;
    }

    /**
     * Get user by ID if get user_id
     * get all user if not send user_id
     * @param type $user_id
     * @return type
     */
    public function getUser($user_id = NULL) {
        if ($user_id <> NULL) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->where_not_in('status', "-1");
        $query = $this->db->get('user');
        //echo $this->db->last_query();
        return $query;
    }

    public function getUser_detail($user_id = NULL) {
        if ($user_id <> NULL) {
            $this->db->where('user_id', $user_id);
        }
        $this->db->where_not_in('status', "-1");
        $query = $this->db->get('user');
        //echo $this->db->last_query();
        return $query;
    }

    public function getUserRef($user_id = null) {
        if ($user_id <> NULL) {
            $this->db->where('user_ref', $user_id);
        }

        $this->db->where_not_in('status', "-1");
        $query = $this->db->get('user_ref');
        return $query;
    }

    public function checkuser($user, $password) {
        if ($user <> NULL && $password <> NULL) {
            $this->db->where('username', $user);
            $this->db->where_not_in('status', "-1");
        }
        $query = $this->db->get('user');
        $result = $query->result_array();
        $MD5_password = md5($password);
        if ($result <> NULL && $result[0]['password'] == md5($password)) {
            return $result[0];
        } else {
            return NULL;
        }
    }

    public function checkDupUser($user) {
        if ($user == 'admin') {
            return True;
        }
        $this->db->where('username', $user);
        $query = $this->db->get('user');

        if ($query->num_rows() > 0) {
            return TRUE;
        }

        $this->db->where('username', $user);
        $query = $this->db->get('ref');
        if ($query->num_rows() > 0) {
            return TRUE;
        }

        return FALSE;
    }

    public function getUserRefAll($user_id, $level) {
        $result = null;
        if ($level < 3) {
            $result = $this->getUserRef($user_id)->result();
            foreach ($result as $key => $value) {
                $result[$key]->child = $this->getUserRefAll($value->user_id, $value->level);
            }
        } else {
            $result = $this->getUserRef($user_id)->result();
        }
        return $result;
    }

}

?>
