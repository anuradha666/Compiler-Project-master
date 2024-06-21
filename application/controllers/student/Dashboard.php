<?php

class Dashboard extends CI_controller{

	public function __construct(){
		parent::__construct();
	
	}
	
	public function index(){

		$sessiondata = $this->session->userdata('user_info');
		$data=[
			'email'=> $sessiondata->email,
		];
		$this->load->view('student/dashboard',$data);
	
	}
}
?>

