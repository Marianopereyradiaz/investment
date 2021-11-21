<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	var $data=array();

	public function __construct(){

		parent::__construct();

		$this->load->model("users_model");   
	}

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
				$this->session->set_userdata("role",$u["role"]);
				redirect("funds");				
			}else{
				$data["OP"]="INCORRECT";
			}		
		}
		$this->load->view('login',$data);
	}

	public function register(){
		$data=array();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('confirmpassword', 'Confirmar Password', 'required');
		$this->form_validation->set_rules('password', 'Nuevo Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('user', 'Usuario', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post()){
				$data["OP"]="WRONG";
			}			
		}
		else
		{
			$user=$this->input->post("user");
			$confirmpassword= $this->input->post("confirmpassword");
			$password= $this->input->post("password");
			$email= $this->input->post("email");
			if ($password!=$confirmpassword){
				$this->data["OP"]="INCORRECT";
			}else{
			$this->users_model->new($user,$password,$email);
			$this->data["OP"]="CORRECT";	
			}
		}
		$this->load->view('register',$this->data);
	}

	public function exit(){
		$this->session->sess_destroy();
		redirect("auth");
	}
}
