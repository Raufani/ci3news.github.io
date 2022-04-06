<?php
 
class Admin extends Front_end{
 
    function __construct(){
        parent::__construct();

        $this->load->model('news_model');
        $this->lang->load('news');


        if($this->session->userdata('logged_in') != 1){
            $user_data = $this->session->userdata('logged_in');
            echo $user_data[logged_in];
        }
    }

    function index(){
        $data['news'] = $this->news_model->get_all();
        $this->view('theme/dashboard', $data);
    }

    
}