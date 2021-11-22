<?php

class MY_Form_validation extends CI_Form_validation {

    function __construct($config = array()) {
        parent::__construct($config);
        $this->ci =& get_instance();
        $this->set_error_delimiters( '<div class="has-error">', '</div>' );
    }

    public function is_valid_username($user_input){
        $this->ci->load->model("users_model");
        if($this->ci->users_model->verify_username($user_input)){
            return false;
        }else{
            return true;
        }
    }

    public function is_valid_email($email_input){
        $this->ci->load->model("users_model");
        if($this->ci->users_model->verify_email($email_input)){
            return false;
        }else{
            return true;
        }
    }

    public function is_valid_code($user_input){
        $this->ci->load->library('session');
        if($this->ci->session->userdata("code") == $user_input){
            return true;
        }else{
            return false;
        }
    }

} 