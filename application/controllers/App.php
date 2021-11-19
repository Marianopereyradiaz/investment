<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	protected $data=array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model("amounts_model");
	}

	public function index()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('amount', 'Monto', 'trim|required|numeric');

		if ($this->form_validation->run() == TRUE) {
			$this->amounts_model->add(set_value("amount"));
			redirect("app");
		}

		$this->data["accumulated"]=$this->amounts_model->calculate_accumulated();
		$this->data["amounts"]=$this->amounts_model->list();
		$this->load->view('client/investment',$this->data);
	}

	public function delete($id_amount=""){
		$this->amounts_model->delete($id_amount);
		redirect("app");
	}
}
