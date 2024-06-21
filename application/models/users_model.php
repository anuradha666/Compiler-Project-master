<?php
class Users_model extends CI_model{
	public function isUserValid($email,$password){
	  $this->db->select('*')->from('users');
	  $this->db->where('email',$email);
	  $this->db->where('password',$password);
	  $user_data = $this->db->get()->row(); 
	  if($user_data){
	  	$this->user_data = $user_data;
	  	return true;
	  }
	  else{
	  	return false;
	  }
	}
	public function getValidUserdata(){
		return $this->user_data;
	}
	public function saveuserdata($formdata){
		if($this->db->insert('users',$formdata)){
			return true;

		}
		else{
			return false;
		}

	}
	public function getAllUsers(){
		$users = $this->db->select('*')->form('users');
		return $users;
	}
}

?>