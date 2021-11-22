<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdf extends CI_Controller {

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
        redirect("pdf/pdf");
	}

    public function pdf()
    {
        $this->load->helper('pdf_helper');

        $this->load->view('client/pdf_report', $this->data);
    }

}