<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	var $data=array();

	public function __construct(){

		parent::__construct();

		$this->load->model("users_model");   
	}

	public function index()
	{
		redirect('auth/login');
	}

	public function login(){
		$data=array();

		$this->load->library('Form_validation');

		$this->form_validation->set_rules('user', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			//mal validado
			if($this->input->post()){
				$data["OP"]="WRONG";
			}			
		}
		else
		{
			$this->load->model("users_model");
			$user=set_value("user");
			$password=md5($this->input->post("password"));
			if($id_user=$this->users_model->verify($user,$password)){
				$u=$this->users_model->get_by_id($id_user);
				$this->session->set_userdata("userid",$u["id_user"]);
				$this->session->set_userdata("user",$u["user"]);
				$this->session->set_userdata("role",$u["role"]);
				redirect("funds");				
			}else{
				$data["OP"]="INCORRECT";
			}		
		}
		$this->load->view('login',$data);
	}

	public function register(){
		$data=array();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('confirmpassword', 'Confirmar Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('password', 'Nuevo Password', 'required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('user', 'Usuario', 'required|is_unique[users.user]');

		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post()){
				$data["OP"]="WRONG";
			}			
		}
		else
		{			
			$this->data["user"]=$this->input->post("user");
			$this->data["confirmpassword"]= md5($this->input->post("confirmpassword"));
			$this->data["password"]= md5($this->input->post("password"));
			$this->data["OP"]=$this->input->post("email");
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => SMTP_HOST,
				'smtp_port' => SMTP_PORT,
				'smtp_user' => SMTP_USER,
				'smtp_pass' => SMTP_PASS,
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from(SMTP_USER, 'Mis Inversiones');
			$this->email->reply_to(set_value("email"));
			$this->email->to(set_value("email"));
			$this->email->cc(set_value("email"));

			$this->email->subject("Codigo de registro");

			$data=array();
			$data["email"]=set_value("email");
			$this->session->set_userdata("email",set_value("email"));
			$this->session->set_userdata("password",$this->data["password"]);
			$this->session->set_userdata("user",$this->data["user"]);
			$code=rand(100000,999999);
			$data["code"]=$code;
			$this->session->set_userdata("code",$code);

			$template=$this->load->view("components/email", $data, TRUE);

			$this->email->message($template);

			$this->email->send(FALSE);

			$this->session->set_userdata("action","register");
			redirect("auth/validate_code");
			$this->data["OP"]="CORRECT";	
		}
        if($this->session->userdata("action") == "registerOK"){
			$this->data["OP"]="CHECK";
		}
		$this->load->view('register',$this->data);
	}

	public function exit(){
		$this->session->sess_destroy();
		redirect("auth");
	}

	public function forgot_password(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if($this->form_validation->run() ==TRUE){
			
			if($this->validate_email(set_value("email"))){
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => SMTP_HOST,
					'smtp_port' => SMTP_PORT,
					'smtp_user' => SMTP_USER,
					'smtp_pass' => SMTP_PASS,
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from(SMTP_USER, 'Mis Inversiones');
				$this->email->reply_to(set_value("email"));
				$this->email->to(set_value("email"));
				$this->email->cc(set_value("email"));

				$this->email->subject("Codigo de validacion");

				$data=array();
				$data["email"]=set_value("email");
				$this->session->set_userdata("email",set_value("email"));
				$code=rand(100000,999999);
				$data["code"]=$code;
				$this->session->set_userdata("code",$code);

				$template=$this->load->view("components/email", $data, TRUE);

				$this->email->message($template);

				$this->email->send(FALSE);

				$this->session->set_userdata("action","reset_password");

				redirect("auth/validate_code");
			}else{
				$this->data["OP"]="INVALID";
			}
		}
		$this->load->view('reset_password', $this->data);
	}

	public function validate_email($email=""){
		return $this->users_model->verify_email($email);
	}

	public function validate_code(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules('code', 'Codigo', 'trim|required|numeric');
 	
		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post()){
				$this->data["OP"]="INVALID";
			}			
		}else {
            if(set_value("code")==$this->session->userdata("code")){
                
    			if($this->session->userdata("action") == "reset_password"){			
    
    				$userrec= $this->users_model->get_by_email($this->session->userdata("email"));
    				$this->session->set_userdata("userid",$userrec["id_user"]);
    				$this->session->set_userdata("user",$userrec["user"]);
    				$this->session->set_userdata("role",$userrec["role"]);
    				$this->session->set_userdata("forgotpass",true);
    
    				$this->data["user"]=$userrec;
    
    				redirect("users/changepassword");
     
    			}
    			if($this->session->userdata("action") == "register"){	
    
    				$this->users_model->new($this->session->userdata("user"),$this->session->userdata("password"),$this->session->userdata("email"));
    				$this->session->set_userdata("action","registerOK");
    				redirect("auth/register");
    			}	
            } else {
                $this->data["OP"]="INVALID";
            }
		}
		$this->load->view('validation', $this->data);
	}	
}