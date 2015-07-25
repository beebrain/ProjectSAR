<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserControl extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Check that the user is logged in
        if ($this->session->userdata('user_data') == null) {
            // Prevent infinite loop by checking that this isn't the login controller  
        
            if ($this->router->class != 'UserControl') {
                redirect("index.php/UserControl/loginPage");
            }
        }
        // Your own constructor code
    }

    public function loginPage() {
        // getdata form database
        $this->session->unset_userdata('user_data');
        $this->load->view('User/LoginUser');
    }
    
    public function testPage(){
        echo "logined";
        
    }
    public function loginProcess() {
        $user_data['user_id'] = "1";
        $user_data['username'] = "test";
        $user_data['detail'] = "ทดสอบ";
        $user_data['level'] = "3";
        $this->session->set_userdata('user_data', $user_data);
        redirect("index.php/UserControl/testPage");
    }
    
    public function logoutProcess(){
        $this->session->unset_userdata('user_data');
        redirect("index.php/UserControl/loginPage");
    }

}
?>

