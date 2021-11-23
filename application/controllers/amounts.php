<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amounts extends CI_Controller {

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
		$this->form_validation->set_rules('amount', 'Monto', 'required|numeric');

		if ($this->form_validation->run() == TRUE) {
			$this->amounts_model->add(set_value("amount"),$id_fund);
			redirect("amounts");
		}

		$this->data["accumulated"]=$this->amounts_model->calculate_accumulated($id_fund);
		$amounts_array =$this->amounts_model->list($id_fund);
		$this->data["amounts"]=$amounts_array;
		$this->session->set_userdata("amounts", $amounts_array);
		$this->session->set_userdata("accumulated",$this->data["accumulated"]);
		$this->load->model("funds_model");
		$fund=$this->funds_model->get_by_id($id_fund);
		$this->session->set_userdata("fund_name",$fund["name"]);
		$this->session->set_userdata("fund_currency",$fund["currency"]);
		$amounts_by_date=$this->amounts_model->list_by_date($id_fund);

		if(count($amounts_by_date)>0){
			foreach($amounts_by_date as $aa) {
				$chart_array[] =array(
				'date'   => $aa['date'],
				'amount' => floatval($aa['amount'])
				);
			}
        
        	$this->data['chart_array'] = $chart_array; 

            $first=$this->amounts_model->get_first($id_fund);
			foreach($amounts_by_date as $aa) {
				$chart_array_perc[] =array(
				'date'   => $aa['date'],
				'perc' => floatval((($aa['amount']/$first["amount"])*100)-100)
				);
			}

			$this->data['chart_array_perc'] = $chart_array_perc; 

			$this->load->model("funds_model");

			if($i=count($chart_array_perc)>1){
				$last=end($chart_array_perc);
				$perc=$last["perc"];
				$this->funds_model->update($id_fund,$perc,$this->data["accumulated"]);
			}

		}else{
			$this->data['chart_array'] = false; 
			$this->data['chart_array_perc'] = false; 
		}

		$this->data["fund_name"]=$fund["name"];
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