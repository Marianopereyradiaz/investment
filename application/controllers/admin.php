<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

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
        $this->users_model->delete($id_user);
        redirect("admin");
	}
}
