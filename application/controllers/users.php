<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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

		$this->form_validation->set_rules('confirmpassword', 'Confirmar Password', 'trim|required|matches[newpassword]');
		$this->form_validation->set_rules('newpassword', 'Nuevo Password', 'required|min_length[6]|max_length[20]');

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
			$newpassword=md5($this->input->post("newpassword"));
			$this->users_model->changepassword($id_user,$newpassword);
			$this->data["OP"]="CORRECT";				
		}
		$this->load->view('client/userinfo',$this->data);
	}

	
	public function quotations(){
		$this->load->view('client/quotations',$this->data);
	}

	public function currency_converter(){
		$this->load->view('currency_converter',$this->data);
	}
	
	public function delete(){
		$this->load->model("funds_model");
		$this->load->model("amounts_model");
		
		$funds_list=$this->funds_model->list_by_user($this->session->userdata("userid"));
		foreach($funds_list as $fl){
		    if($fl["id_user"]==$this->session->userdata("userid")){
		        $this->amounts_model->delete_from_fund($fl["id_fund"]);
		        $this->funds_model->delete_real($fl["id_fund"]);
		    }
		}
		$this->users_model->delete($this->session->userdata("userid"));
		$this->session->sess_destroy();
		redirect("home");
	}
}