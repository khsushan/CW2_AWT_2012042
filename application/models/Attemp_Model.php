<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Handeling all attemp table data in database
 *
 * @author Ushan
 */
class Attemp_Model extends  CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    /*
     * This method will add a new attemp to the database 
     * @param userid
     * @param score
     *         
     * */
    public function addAttemp($user_id, $result)
    {
        $data = array(
            'user_id' => $user_id,
            'score' => $result["score"],
            'time'=>"00.00"
        );
        $this->db->insert('attemp', $data);
        $last_id = $this->db->insert_id();
        $feedbackArray = $result["feedbaks"];
        for($i = 0; $i <count($feedbackArray);$i++){
            $data = array(
                'question_id' => $feedbackArray[$i]["question_id"],
                'attempt_id' => $last_id,
                'isCorrect' => ($feedbackArray[$i]["correct_answer"] == $feedbackArray[$i]["user_answer"])
            );
            $this->db->insert('question_attempt', $data);
        }
    }

    /*
     * This method will return attemp detils regarding to give user id 
     * @param userid
     *         
     * */
    public function getAttempByUserID($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('attemp');
        $attmps = array_values($query->result_array());
        return $attmps;
    }


}
