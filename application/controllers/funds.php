<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class funds extends CI_Controller {

	protected $data=array();

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata("userid")){
			redirect("auth");
		}

		$this->data["logged_user"]=$this->session->userdata("user");
		$this->data["role"]=$this->session->userdata("role");
		$this->load->model("funds_model");
	}

	public function index()
	{
        $this->load->model("amounts_model");

		$this->data["funds"]=$this->funds_model->list_by_user($this->session->userdata("userid"));
		$this->load->view('client/funds_view',$this->data);
	}

	public function delete($id_fund=""){
        $this->load->model("amounts_model");

        $this->amounts_model->delete_from_fund($id_fund);
		$this->funds_model->delete($id_fund);
        
		redirect("funds");
	}

    public function see_fund($id_fund=""){
        $this->session->set_userdata("id_fund",$id_fund);        
		redirect("amounts");
	}
}
