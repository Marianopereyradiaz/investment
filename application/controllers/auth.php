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

		$this->load->library('form_validation');

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
			$password=$this->input->post("password");
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

		$this->form_validation->set_rules('confirmpassword', 'Confirmar Password', 'required');
		$this->form_validation->set_rules('password', 'Nuevo Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('user', 'Usuario', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post()){
				$data["OP"]="WRONG";
			}			
		}
		else
		{
			$user=$this->input->post("user");
			$confirmpassword= $this->input->post("confirmpassword");
			$password= $this->input->post("password");
			$email= $this->input->post("email");
			if ($password!=$confirmpassword){
				$this->data["OP"]="INCORRECT";
			}else{
			$this->users_model->new($user,$password,$email);
			$this->data["OP"]="CORRECT";	
			}
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
					'smtp_host' => 'mail.maizan.elementfx.com',
					'smtp_port' => 587,
					'smtp_user' => 'mariano@maizan.elementfx.com',
					'smtp_pass' => 'mariano123',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('mariano@maizan.elementfx.com', 'Recuperar Contraseña');
				$this->email->reply_to(set_value("email"));
				$this->email->to(set_value("email"));
				$this->email->cc(set_value("email"));

				$this->email->subject(set_value("asunto"));

				$data=array();
				$data["email"]=set_value("email");
				$this->session->set_userdata("email",set_value("email"));
				$code=rand(100000,999999);
				$data["code"]=$code;
				$this->session->set_userdata("code",$code);

				$plantilla=$this->load->view("components/email", $data, TRUE);

				$this->email->message($plantilla);

				$this->email->send(FALSE);

				redirect("auth/validate_code");
			}else{
				$this->data["OP"]="INVALID";
			}
		}else{

		}

		$this->load->view('reset_password', $this->data);
	}

	public function validate_email($email=""){
		return $this->users_model->verify_email($email);
	}

	public function validate_code(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules('code', 'Codigo', 'trim|required|numeric');

		if($this->form_validation->run() ==TRUE){
			
			if($this->session->userdata("code") == set_value("code")){

				$userrec= $this->users_model->get_by_email($this->session->userdata("email"));
				$this->session->set_userdata("userid",$userrec["id_user"]);
				$this->session->set_userdata("user",$userrec["user"]);
				$this->session->set_userdata("role",$userrec["role"]);
				$this->session->set_userdata("forgotpass",true);

				$this->data["user"]=$userrec;

				redirect("users/changepassword");
			}else{
				$this->data["OP"]="INVALID";
			}
		}else{

		}

		$this->load->view('validation', $this->data);
	}
	
}
