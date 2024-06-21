<?php
   class Login extends CI_controller{

   	public function __construct(){

   		parent::__construct();
   		$this->load->model(array('Users_model'));
   	}
   
    public function checkuser(){
    	
    	$email = $this->input->post('email');
    	//echo $email;

    	echo '<br/>';
    	$password =  md5($this->input->post('password'));
    	//echo $password;
   
    	if($this->Users_model->isUserValid($email,$password))
    	{
    		$userinfo=$this->Users_model->getValidUserdata();
     //session
     $this->session->set_userdata('user_info',$userinfo);
     if($userinfo->type=='student'){
      return redirect(base_url('index.php/student/dashboard/index'));
     }elseif($userinfo-> type =='trainer'){
      return redirect(base_url('index.php/trainer/dashboard/index'));
     } 
     elseif($userinfo-> type == 'admin'){
      return redirect(base_url('index.php/admin/dashboard/index'));

    	}
    }
    	else{
    		echo error_alert('Invalid User Name or password');
    	$this->session->set_flashdata('message',error_alert('Invail User Name or password'));
    		return redirect(base_url('index.php/welcome/login'));
    	}
    }

}





	?>