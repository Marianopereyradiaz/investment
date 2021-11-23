<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	protected $data=array();

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata("userid")){
			redirect("auth");
		}

		$this->data["logged_user"]=$this->session->userdata("user");
		$this->data["role"]=$this->session->userdata("role");
		$this->load->model("users_model");
	}

	public function index()
	{
		$this->data["users"]=$this->users_model->list();
		$this->load->view('admin/adminusers',$this->data);
	}

	public function delete($id_user=""){
		$id_user=$this->data["id_user"];
		$this->load->model("users_model");
		$this->load->model("funds_model");
		
		$funds_list=$this->funds_model->list_by_user($id_user);
		foreach($funds_list as $fl){
		    if($fl["id_user"]==$id_user){
		        $this->funds_model->delete($fl["id_fund"]);
		    }
		}
		$this->users_model->delete($id_user);

        redirect("admin");
	}

	public function ban($id_user=""){	
		$this->users_model->ban_by_id($id_user);
		redirect("admin");
	}

	public function permit($id_user=""){
		$this->users_model->permit_by_id($id_user);
		redirect("admin");
	}

	public function set_admin($id_user=""){
		$this->users_model->set_admin_by_id($id_user);
		redirect("admin");
	}

	public function set_client($id_user=""){
		$this->users_model->set_client_by_id($id_user);
		redirect("admin");
	}
}
