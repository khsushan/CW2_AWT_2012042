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
        $categoryModel = new category_model();
        $data = array();
        $data["category"] =$categoryModel->getAllCategories();
        $this->load->view('home', $data);
    }

    /**
     * get all categories
     **/
    public  function getAllCategories(){
        $method = strtolower($this->input->server('REQUEST_METHOD'));
        if($method == "get"){
            $this->load->model('category_model');
            $categoryModel = new category_model();
            $categories =$categoryModel->getAllCategories();
            echo json_encode($categories);
        }else{
            echo json_encode(array("error"=>"invalid resource required"));
        }
    }

     /**
     * add question according to the given details.
    **/
    public  function addQuestion(){
        $json_data = json_decode(file_get_contents('php://input'));
        $this->load->model('quiz_model');
        $quiz_model =  new Quiz_Model();
        $data = array(
            'question_value' => $json_data->{'question_value'},
            'category_id' => $json_data->{'category_id'}
        );
        $question_id = $quiz_model->addQuestion($data);
        if($question_id != null){
            echo json_encode(array("id"=>$question_id));
        }else{
            echo json_encode(array("id"=> null,"error"=>"error while adding to the database duplication question value"));
        }
    }

    /**
     * add answer to the database
     **/
    public  function addAnswer(){
        $json_data = json_decode(file_get_contents('php://input'));
        $this->load->model('quiz_model');
        $quiz_model =  new Quiz_Model();
        $data = array(
            'answer_value' => $json_data->{'answer_value'},
            'status' => $json_data->{'status'},
            'question_id' => $json_data->{'question_id'}
        );
        $answerid = $quiz_model->addAnswer($data);
        if($answerid != null){
            echo json_encode(array("id"=>$answerid));
        }else{
            echo json_encode(array("id"=> null,"error"=>"error while adding to the database"));
        }
    }
     /**
     *update question from according to the given details
    **/
    public function updateQuestion(){
        $json_data = json_decode(file_get_contents('php://input'));
        $this->load->model('quiz_model');
        $quiz_model =  new Quiz_Model();
        $data = array(
            'question_value' => $json_data->{'question_value'}
        );
         $quiz_model->updateQuestion($data,$json_data->{'question_id'});
    }

    /**
     *update answer according to the given details
     **/
    public function updateAnswer(){
        $json_data = json_decode(file_get_contents('php://input'));
        $this->load->model('quiz_model');
        $quiz_model =  new Quiz_Model();
        $data = array(
            'answer_value' => $json_data->{'answer_value'},
            'status' => $json_data->{'answer_status'}
        );
        $quiz_model->updateAnswer($data,$json_data->{'answer_id'});
    }

    
    /**
     * delete questions from according to the given details
    **/
    public function deleteQuestion(){
        $id = $this->uri->segment(4);
        $this->load->model('quiz_model');
        $quiz_model =  new Quiz_Model();
        $result = $quiz_model->deleteQuestion($id);
        echo json_encode(array("delete_question_status"=>$result));
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
     *
     */
     public  function  getQuestionFromCategoryID(){
         $id = $this->uri->segment(5);
         $this->load->model('quiz_model');
         $this->load->model('answer_model');
         $questionModel =  new Quiz_Model();
         $questions = $questionModel->getQuestionsFROMID($id);
         echo json_encode($questions);
     }

    public  function  getAnswersFromID(){
        $id = $this->uri->segment(5);
        $this->load->model('answer_model');
        $answer =  new answer_model();
        $answers = $answer->getAnswer($id);
        echo json_encode($answers);
    }
    
     /**
     * retrive attemps according to the given user
    **/
    public function getAttemps(){
        $this->load->model('Attemp_Model');
        $attempModel = new Attemp_Model();
        //$attempModel->getAttempByUserID($user_id);
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
                    $user_details =   $this->session->userdata("user");
                    $attempModel->addAttemp($user_details[0]["id"], $results);
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
