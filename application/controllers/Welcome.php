<?php

class Welcome extends CI_controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('layout/common/header');
		$this->load->view('common/index');
		$this->load->view('layout/common/footer');
	}
	public function about(){
		$this->load->view('layout/common/header');
		$this->load->view('common/about');
		$this->load->view('layout/common/footer');
	}
	public function contact(){
		$this->load->view('layout/common/header');
		$this->load->view('common/contact');
		$this->load->view('layout/common/footer');
	}
	public function register(){
		$this->load->view('layout/common/header');
		$this->load->view('common/register');
		$this->load->view('layout/common/footer');
	}
	public function login(){
		$this->load->view('layout/common/header');
		$this->load->view('common/login');
		$this->load->view('layout/common/footer');
	}

	public function save(){

		if($this->db->insert('users',[
			'name'=> $this->input->post('std_name'),
			'email'=> $this->input->post('std_email'),
			'password'=> md5($this->input->post('std_pass')),
			'mobile'=> $this->input->post('std_mobile'),
		])){

			$this->session->set_flashdata('message',success_alert('Created Successfully'));
			return redirect(base_url('index.php/welcome/register'));

		}else{
			$this->session->set_flashdata('message',error_alert('Oops cannot be created'));
			return redirect(base_url('index.php/welcome/register'));
		}
	}
} 
?>

