<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Model
 *
 * @author Ushan
 */
class User_Model extends CI_Model {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
     * This method will add new user to database
     * @param email  String
     *         - email 
     * @param password  String
     *         - password
     * @param name String
     *         - name
     * */

    public function addNewUser($email, $password, $name,$privilage) {
        //Check whether email is already available in database
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        $login_details = array_values($query->result_array());
        if (count($login_details) == 0) {
            $hashed_password = crypt($password); // let the salt be automatically generated
            $data = array(
                'email' => $email,
                'name' => $hashed_password,
                'password' => $password,
                'privilages' => $privilage    
            );
            $this->db->insert('user', $data);
            return TRUE;
        }
        //return false if email already available in database
        return FALSE;
    }

    /*
     * This method will validate user input details and if user inputs are
     * valdate  then return  the user details
     * @param email  String
     *         - email 
     * @param password  String
     *         - password
     * @return array - contain user details
     * */

    public function getUserDetials($email, $password) {
        $hashed_password = crypt($password); // let the salt be automatically generated
        $this->db->where('email', $email);
        //$this->db->where('password', $hashed_password);
        $query = $this->db->get('user');
        $user_details = array_values($query->result_array());
        if(hash_equals($hashed_password, crypt($user_details[0]["password"]
                , $hashed_password))){
           return $user_details; 
        }  else {
            return NULL;
        }
        
    }

}