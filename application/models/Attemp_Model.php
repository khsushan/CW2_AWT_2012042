<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Attemp_Model
 *
 * @author Ushan
 */
class Attemp_Model {
    
    public function __construct() {
        $this->load->database();
    }
    
    /*
     * This method will add a new attemp to the database 
     * @param userid
     * @param score
     *         
     * */
    public function addAttemp($user_id,$score){
         $data = array(
                'user_id' => $user_id,
                'score' => $score
         );
         $this->db->insert('attemp', $data);
    }
    
    /*
     * This method will return attemp detils regarding to give user id 
     * @param userid
     *         
     * */
    public function getAttempByUserID($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('attemp');
        $attmps = array_values($query->result_array());
        return $attmps;
    }
    
    
    
}
