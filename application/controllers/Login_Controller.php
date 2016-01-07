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
        $json_data = json_decode(file_get_contents('php://input'));
        $email = $json_data->{'email'};
        $password = $json_data->{'password'};
        $user_details = $user_model->getUserDetials($email, $password);
        if($user_details != NULL){
            $user_details[0]["error"] = false;
            echo json_encode($user_details[0]);
        }  else {
            $data = array("error"=>true,"message"=>"invalid username or password");
            echo json_encode($data);
        }
    }

}
