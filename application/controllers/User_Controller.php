<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Controller
 *
 * @author Ushan
 */
class User_Controller extends CI_Controller {
    //put your code here
    
    /**
     * This method will handle the signup process
     */
    function signUp(){
        $this->load->model('User_Model');
        $user_model = new User_Model();
//        $email = "khsushan";
//        $password = "ushan";
//        $name = "Ushan";
//        $privilages = 1; 
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $name = $this->input->post("name");
        //If privilage is equal to 1 that user has admin privilages
        //Normal user has privilage value as 0
        $privilage = $this->input->post("privilage");;
        $isAdded = $user_model->addNewUser($email, $password, $name, $privilage);
        echo $isAdded;
    }
}
