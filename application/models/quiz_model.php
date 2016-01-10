<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class is handeling all the question based data
 *
 * @author Ushan
 */
class Quiz_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /*
     * This method will add a new questions and answers to the database 
     * @param question array
     *         - This is include the question details with answer
     * */

    public function addQuestion($question) {
        $this->db->where('question_value', $question["question_value"]);
        $query = $this->db->get('question');
        $question_details = array_values($query->result_array());
        if (count($question_details) == 0) {
            $data = array(
                'question_value' => $question["question_value"],
                'category_id' => $question["category_id"]
            );
            $this->db->insert('question', $data);
            $last_id = $this->db->insert_id();
            for ($i = 0; $i < count($question["answers"]); $i++) {
                $data = array(
                    'answer_value' => $question["answers"][$i]["answer_value"],
                    'status' => $question["answers"][$i]["status"],
                    'question_id' => $last_id
                );
                $this->db->insert('answer', $data);
            }
        }
    }

    /*
     * This method will update a questions and answers in the database 
     * @param question array
     *         - This is include the question details with answer
     * */

    public function updateQuestion($data,$question_id) {
        $this->db->where('question_id',$question_id);
        $this->db->update('question', $data);
    }

    /*
     * This method will update an answer in the database
     * @param answer array
     *         - This is include the question details with answer
     * */
    public function updateAnswer($data,$answer_id){
        $this->db->where('answer_id', $answer_id);
        $this->db->update('answer', $data);
    }

    /*
     * This method will delete a questions and answers in the database 
     * @param question_id int
     *         - This is include the question_id which is going to be deleted
     * */

    public function deleteQuestion($question_id) {
        $this->db->where('question_id', $question_id);
        $this->db->delete('question');
    }

    /*
     * This method will return the question according to the given category
     * @param category  String
     *         - This is include the category of question type
     * */

    public function getQuestions($category) {
        $query = $this->db->query("SELECT question_id FROM question WHERE category_id= "
                . "(SELECT categoryid FROM category WHERE category_name='$category')"
                . "ORDER BY RAND() LIMIT 10");
        $array = array_values($query->result_array());
        return $array;
    }

    /*
    * This method will return the question according to the given category
    * @param category  String
    *         - This is include the category of question type
    * */
    public function getQuestionsFROMID($categoryid) {
        $query = $this->db->query("SELECT * FROM question WHERE category_id=".$categoryid);
        $array = array_values($query->result_array());
        return $array;
    }

    /*
     * This method will return questions according to the given id
     * @param $question_id
     *         - This parameter will hold the question id that need retrive from database
     * */

    public function getQuestion($question_id) {
        $query = $this->db->query("SELECT question_value "
                . " FROM question WHERE question_id='$question_id'");
        return $query->result_array();
    }

    /*
     * This question will return calculated result according to the given question and answers
     * @param $questions  Array
     *         - This array will hold the all question which was in the quiz
     * @param $answers  Array
     *         -This array will hold the all the user given answers in the quiz
     * */

    public function calculateScore($questions, $answers) {
        $score = 0;
        $feedbackarray = array();
        $result = array();
        for ($i = 0; $i < count($questions); $i++) {
            $this->db->where('question_id', $questions[$i]["question_id"]);
            $this->db->where('status', 1);
            $query = $this->db->get('answer');
            $correct_answer = array_values($query->result_array());
            if ($correct_answer[0]["answer_value"] == $answers[$i]) {
                $score = $score + 10;
            } else
                $feedbackarray[$i]["correct_answer"] = $correct_answer[0]["answer_value"];
            $feedbackarray[$i]["user_answer"] = $answers[$i];
            $feedbackarray[$i]["question_number"] = $i;
        }
        $result["score"] = $score;
        $result["feedbaks"] = $feedbackarray;
        return $result;
    }

}
