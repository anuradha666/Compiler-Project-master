<?php

class Dashboard extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model(array('users_model'));
	}
	public function index()
	{
		$sessiondata = $this->session->userdata('user_info');
		$data = [
			'email' => $sessiondata->email,

		];

		$this->load->view('admin/dashboard',$data);
	}
	public function create_user(){
		$this->load->view('admin/user/create_form');
	}
	public function save_user()
	{
		$this->form_validation->set_rules('user_type','user type','required');
		$this->form_validation->set_rules('user_name','user name','required');
		$this->form_validation->set_rules('user_email','user email','required');
		$this->form_validation->set_rules('user_password','user password','required');
		$this->form_validation->set_rules('user_mobile','user mobile','required');
		if($this->form_validation->run() == false)
		{
			$this->form_validation->set_error_delimiters("<span style='color:red;'>","</span");
			$this->load->view('admin/user/create_form');


		}
        else{
		    $formdata = [
			'type'=> $this->input->post('user_type'),
			'name'=> $this->input->post('user_name'),
			'email'=> $this->input->post('user_email'),
			'password'=> $this->input->post('user_password'),
			'mobile'=> $this->input->post('user_mobile'),
			

		];
		if($this->users_model->saveUserdata($formdata)){
			$this->session->set_flashdata('message',success_alert('user created successfully !!'));
			return redirect(base_url('index.php/admin/dashboard/create_user'));	
     }
     else{
	$this->session->set_flashdata('message',error_alert('OOps try later!!!'));
	return redirect(base_url('index.php/admin/dashboard/create_user'));


}


}

}
}












		

			

		


	

?>

