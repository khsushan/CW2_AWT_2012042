<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login_Controller
 *
 * @author Ushan
 */
class Login_Controller extends CI_Controller {

    //put your code here
//    function index(){
//        $this->load->model('Vacancy');
//        $vacancy = new Vacancy();
//        $array = $vacancy->getVacancyByUser(1);
//        $data["vacancies"] = $array;
//        $this->load->view('organizerview',$data);   
//    }
    
    /**
     * This method will handle the signup login process
     */
    function login() {
        $this->load->model('User_Model');
        $user_model = new User_Model();
        $email = "khsushan@gmail.com";
        $password = "ushan"; 
//        $email = $this->input->post("email");
//        $password = $this->input->post("password");
        $user_details = $user_model->getUserDetials($email, $password);
        if($user_details != NULL){
            echo 'Login Succses';
        }  else {
            echo 'Login failed';
        }
    }

}
