<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class will act as controller to handle questions
 *
 * @author Ushan
 */
class Quiz_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->model('category_model');
        $data = array();
        $data["category"] =$this->category_model->getAllCategories();
        $this->load->view('question_view', $data);
    }
     /**
     * add question according to the given details.
    **/
    public  function addQuestion(){
        $this->load->model('quiz_model');
        $quiz_model =  new Quiz_Model();
        $question =  array();
        $question["question_value"] = "test";
        $question["category_id"] = 2;
        $answers =  array();
        $answers[0] = array("answer_value"=>"test1","status"=>1);
        $answers[1] = array("answer_value"=>"test2","status"=>0);
        $answers[2] = array("answer_value"=>"test3","status"=>0);
        $answers[3] = array("answer_value"=>"test4","status"=>0);
        $question["answers"] = $answers;
        $quiz_model->addQuestion($question);
    }
     /**
     *update question from according to the given details
    **/
    public function updateQuestion(){
        $this->load->model('quiz_model');
        $quiz_model =  new Quiz_Model();
        $question =  array();
        $question["question_id"] = 38;
        $question["question_value"] = "test";
        $question["category_id"] = 2;
        $answers =  array();
        $answers[0] = array("answer_id"=>150,"answer_value"=>"test11","status"=>0);
        $answers[1] = array("answer_id"=>151,"answer_value"=>"test22","status"=>1);
        $answers[2] = array("answer_id"=>152,"answer_value"=>"test33","status"=>0);
        $answers[3] = array("answer_id"=>153,"answer_value"=>"test44","status"=>0);
        $question["answers"] = $answers;
        $quiz_model->updateQuestion($question);
    }
    
    /**
     * delete questions from according to the given details
    **/
    public function deleteQuestion(){
        $this->load->model('quiz_model');
        $quiz_model =  new Quiz_Model();
        $quiz_model->deleteQuestion(38);
    }

    /**
     * retrive questions from according to the given category
    **/
    public function getQuestionFromCategory()
    {
        $category = $this->input->post("category_name");
        $this->load->model('quiz_model');
        $questions = $this->quiz_model->getQuestions($category);
        $this->session->set_userdata('questions', $questions);
        $this->session->set_userdata('question_count', 0);
        $this->getNextQuestions(true);
    }
    
     /**
     * retrive attemps according to the given user
    **/
    public function getAttemps(){
        $this->load->model('Attemp_Model');
        $attempModel = new Attemp_Model();
        $attempModel->getAttempByUserID($user_id);
    }

    /**
     * @param bool $isFirstQuestion
     *      A boolean that use to check whether request come from getQuestionFromCategory
     * itterate selected ten questions
     **/
    public function getNextQuestions($isFirstQuestion = FALSE)
    {
        //inizializing models
        $this->load->model('quiz_model');
        $this->load->model('answer_model');
        $this->load->model('Attemp_Model');
        $attempModel = new Attemp_Model();
        
        //$this->load->model('feedback_model');
        $data = array();
        if ($isFirstQuestion) {
            $data["question"] = $this->buildQuestionData(0);
            $this->load->view('question_view', $data);
        } else {
            $count = $this->session->userdata('question_count');
            $answer = $this->input->post("answer");
            if ($answer != NULL) {
                if ($count == 0) {
                    //intializing answer array
                    $answers = array();
                } else {
                    $answers = $this->session->userdata('answers');
                }
                $answers[$count] = $answer;
                $this->session->set_userdata('answers', $answers);
                //check whether quiz is completed
                if ($count == 9) {
                    //end of the 10 question
                    $questions = $this->session->userdata('questions');
                    $answers = $this->session->userdata("answers");
                    $results = $this->quiz_model->calculateScore($questions, $answers);
                    $attempModel->addAttemp($user_id, $results);
                    $this->clearSession();
                    $data["results"] = $results;
                    $this->load->view('question_view', $data);
                } else {
                    //itterate  question
                    $count = $count + 1;
                    $this->session->set_userdata('question_count', $count);
                    $data["question"] = $this->buildQuestionData($count);
                    $this->load->view('question_view', $data);
                }
            } else {
                //if user didnt input any answer
                $data["question"] = $this->buildQuestionData($count);
                $data["error"] = true;
                $this->load->view('question_view', $data);
            }
        }
    }

    /**
     * bulid question according to the given index
     * @param index -  question number
    **/
    private function buildQuestionData($index)
    {
        $this->load->model('quiz_model');
        $this->load->model('answer_model');
        $questions = $this->session->userdata('questions');
        $question = $this->quiz_model->getQuestion($questions[$index]["question_id"]);
        $question_answers = $this->answer_model->getAnswer($questions[$index]["question_id"]);
        shuffle($question_answers);
        $question[0]["answers"] = $question_answers;
        $question[0]["question_number"] = $index+1 ;
        return $question;
    }


    /**
     * clear session details
     **/
    private function clearSession()
    {
        $this->session->unset_userdata("questions");
        $this->session->unset_userdata("question_count");
        $this->session->unset_userdata("answers");
    }

}
