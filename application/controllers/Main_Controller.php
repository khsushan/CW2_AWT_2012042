<?php

/**
* This class will act as main controller to route home view,admin view and  deafault user view
*
 * @author Ushan
*/
class Main_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public  function index(){
        if(isset($_SESSION['user']) != null){
            $user = $this->session->userdata('user');
            $data["user"] = $user;
            if($user[0]["privilages"] == 1 ){
                $this->load->view('adminview.php', $data);
            }else{
                $this->load->view('question_view', $data);
            }
        }else{
            $this->load->view('home', "");
        }

    }




}