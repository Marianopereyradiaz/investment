<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect('auth/login');
	}

	public function login(){
		$data=array();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('user', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			//mal validado
			if($this->input->post()){
				$data["OP"]="WRONG";
			}			
		}
		else
		{
			$this->load->model("users_model");
			$user=set_value("user");
			$password=$this->input->post("password");
			if($id_user=$this->users_model->verify($user,$password)){
				$u=$this->users_model->get_by_id($id_user);
				$this->session->set_userdata("userid",$u["id_user"]);
				$this->session->set_userdata("user",$u["user"]);
				redirect("app");				
			}else{
				//error
				$data["OP"]="INCORRECT";
			}		
		}
		$this->load->view('login',$data);
	}

	public function exit(){
		$this->session->sess_destroy();
		redirect("auth");
	}
}
