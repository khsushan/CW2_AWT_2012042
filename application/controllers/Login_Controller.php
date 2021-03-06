<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This controller will handle the all the loging and logout requests
 *
 * @author Ushan
 */
class Login_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    /**
     * This method will handle the login process
     */
    function login()
    {
        $this->load->model('User_Model');
        $user_model = new User_Model();
        $json_data = json_decode(file_get_contents('php://input'));
        $email = $json_data->{'email'};
        $password = $json_data->{'password'};
        $user_details = $user_model->getUserDetials($email, $password);
        if ($user_details != NULL) {
            $user_details[0]["error"] = false;
            $this->session->set_userdata('user', $user_details);
            echo json_encode($user_details[0]);
        } else {
            $data = array("error" => true, "message" => "invalid username or password");
            echo json_encode($data);
        }
    }

    /**
     * This method will handle the logout process
     */
    function logout(){
        $this->session->unset_userdata("questions");
        $this->session->unset_userdata("question_count");
        $this->session->unset_userdata("answers");
        $this->session->unset_userdata("user");
        $data = array("success" => true, "message" => "user logout sucessfully");
        echo json_encode($data);
    }

}
