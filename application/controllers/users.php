<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

    var $data=array();

	public function __construct(){

		parent::__construct();

		$this->load->model("users_model");

		if(!$this->session->userdata("userid")){
			redirect("auth");
		}

        $this->data["id_user"]=$this->session->userdata("userid");
		$this->data["logged_user"]=$this->session->userdata("user");    
		$this->data["role"]=$this->session->userdata("role");   
		$this->data["forgotpass"]=$this->session->userdata("forgotpass");   
	}

	public function index(){

		redirect("users/changepassword");
	}

	public function principal(){

		redirect("client/investment");
	}

	public function changepassword(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('confirmpassword', 'Confirmar Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('newpassword', 'Nuevo Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post()){
				$data["OP"]="WRONG";
			}			
		}
		else
		{
			$this->load->model("users_model");
			$id_user=$this->data["id_user"];
			$newpassword=$this->input->post("newpassword");
			$this->users_model->changepassword($id_user,$newpassword);
			$this->data["OP"]="CORRECT";				
		}
		$this->load->view('client/userinfo',$this->data);
	}

	
	public function quotations(){
		$this->load->view('quotations',$this->data);
	}

	public function currency_converter(){
		$this->load->view('currency_converter',$this->data);
	}
}
