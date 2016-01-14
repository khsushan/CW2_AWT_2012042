<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of answer
 *
 * @author Ushan
 */
class answer_model extends CI_Model{
    public function __construct() {
        $this->load->database();
    }
    /**
      * This question will return answers available for given question id
     * @param $question_id  int
     *         - question id
     *
     **/
    public function getAnswer($question_id){
        $query = $this->db->get_where('answer', array('question_id' => $question_id),0, 0);
        return $query->result_array();
    }

    /*
    * This method will add a new questions and answers to the database
    * @param data array
    *         - This is include the question details
    * */
    public function addAnswer($data)
    {
        $this->db->insert('answer', $data);
        return $this->db->insert_id();
    }

    /*
     * This method will update an answer in the database
     * @param answer array
     *         - This is include the question details with answer
     * */
    public function updateAnswer($data, $answer_id)
    {
        $this->db->where('answer_id', $answer_id);
        $result = $this->db->update('answer', $data);
        return $result;
    }
    
}
