<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class will handle all the signup requests;
 *
 * @author Ushan
 */
class User_Controller extends CI_Controller
{

    public function index()
    {
        $json_data = json_decode(file_get_contents('php://input'));
        $data = array(
            'name' => $json_data->{'username'},
            'email' => $json_data->{'email'},
            'password' => $json_data->{'password'},
            'privilages' => 2
        );
        $this->load->model('User_Model');
        $user_model = new User_Model();
        $isAdded = $user_model->addNewUser($data);
        echo json_encode(array("status" => $isAdded));

    }


    /**
     * This method will handle the signup process
     *
     */
    function signUp()
    {
        $json_data = json_decode(file_get_contents('php://input'));
        $data = array(
            'name' => $json_data->{'username'},
            'email' => $json_data->{'email'},
            'password' => $json_data->{'password'},
            'privilages' => 2
        );
        $this->load->model('User_Model');
        $user_model = new User_Model();
        $isAdded = $user_model->addNewUser($data);
        echo json_encode(array("status" => $isAdded));
    }
}
