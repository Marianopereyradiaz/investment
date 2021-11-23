<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	protected $data=array();

    public function __construct(){

        parent::__construct();
    
        $this->load->model("topics_model");
        $this->load->model("comments_model");
    
        if(!$this->session->userdata("userid")){
            redirect("auth");
        }

        $this->data["logged_user"]=$this->session->userdata("user");
		$this->data["role"]=$this->session->userdata("role");
	}

	public function index()
	{
        $this->data["topics"]=$this->topics_model->list();
		$this->load->view('forum',$this->data);
	}

	public function add_topic(){

        $this->load->library('Form_validation');

		$this->form_validation->set_rules('name', 'Titulo', 'required|max_length[50]');
		$this->form_validation->set_rules('content', 'Contenido', 'required|max_length[300]');

		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post()){
				$data["OP"]="WRONG";
			}			
		}
		else
		{
            $this->load->model("topics_model");

			$name=set_value("name");
			$content=set_value("content");
            $user=$this->session->userdata("userid");
            $this->topics_model->add($name,$content,$user);
            redirect("forum");
		}
        $this->load->view('create_topic',$this->data);
    }

    public function delete_topic($id_topic=""){
        
        $this->topics_model->delete($id_topic);
        redirect("forum");
    }

    public function see_topic($id_topic=""){
        
        $this->data["comments"]=$this->comments_model->list_by_topic($id_topic);
        $this->data["topic"]=$this->topics_model->get_by_id($id_topic);
        $this->load->view('see_topic',$this->data);

    }

    public function add_comment($id_topic=""){
        
        $this->load->library('Form_validation');

		$this->form_validation->set_rules('message', 'Titulo', 'required|max_length[300]');

		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post()){
				$data["OP"]="WRONG";
			}			
		}
		else
		{
            $this->load->model("comments_model");
			$message=set_value("message");
            $user=$this->session->userdata("user");
            $this->comments_model->add($message,$user,$id_topic);
            redirect("forum");
		}
        $this->load->view('create_message',$this->data);
    }
}
