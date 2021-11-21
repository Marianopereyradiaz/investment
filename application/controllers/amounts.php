<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class amounts extends CI_Controller {

	protected $data=array();

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata("userid")){
			redirect("auth");
		}

		$this->data["logged_user"]=$this->session->userdata("user");
		$this->data["role"]=$this->session->userdata("role");
		$this->load->model("amounts_model");
	}

	public function index()
	{
		$id_fund=$this->session->userdata("id_fund");
		$this->load->library("form_validation");
		$this->form_validation->set_rules('amount', 'Monto', 'trim|required|numeric');

		if ($this->form_validation->run() == TRUE) {
			$this->amounts_model->add(set_value("amount"),$id_fund);
			redirect("amounts");
		}

		$this->data["accumulated"]=$this->amounts_model->calculate_accumulated($id_fund);
		$amounts_array =$this->amounts_model->list($id_fund);
		$this->data["amounts"]=$amounts_array;



        foreach($amounts_array as $aa) {
			$chart_array[] =array(
			'date'   => $aa['date'],
			'amount' => floatval($aa['amount'])
			);
        }
        
        $this->data['chart_array'] = ($chart_array); 

		$this->load->view('client/investment',$this->data);
	}

	public function delete($id_amount=""){
		$id_fund=$this->session->userdata("id_fund");
		$this->amounts_model->delete($id_amount, $id_fund);
		redirect("amounts");
	}

	public function return(){
		unset($_SESSION['id_fund']); 
		redirect("funds");
	}
}
