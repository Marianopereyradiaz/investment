<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

    var $data=array();

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata("userid")){
			redirect("auth");
		}

        $this->datos["id_user"]=$this->session->userdata("userid");
		$this->datos["logged_user"]=$this->session->userdata("user");       
	}

	public function index(){

		redirect("users/changepassword");
	}

	public function principal(){

		redirect("client/investment");
	}

	public function changepassword(){
		$data=array();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('confirmpassword', 'Confirmar Password', 'required');
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
			$id_user=$this->datos["id_user"];
			$newpassword=$this->input->post("newpassword");
			$confirmpassword= $this->input->post("confirmarpassword");
			if ($newpassword!=$confirmpassword){
				$this->data["OP"]="INCORRECT";
			}else{
			$this->users_model->changepassword($id_user,$newpassword);
			$this->data["OP"]="CORRECT";	
			}
		}
		$this->load->view('users/infouser',$this->data);
	}
}
