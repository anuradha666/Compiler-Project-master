<?php 

class workspace extends CI_controller{
	public function __construct(){
	parent::__construct();

	}
	public function index(){

		$user_id = $this->session->userdata('user_info')->id;
		$wps = [];
		$data = [
			'wps' => $this->db->select('*')->from('workspace')->where('user_id',$user_id)->get()->result(),
		];

		$this->load->view('student/workspace/forms',$data);
	}

	public function create(){
		$wp_name = $this->input->post('wp_name');
		$token = md5(uniqid(time()));
		$formdata = [
			'name' =>$wp_name,
			'token' => $token,
             'user_id'=> $this->session->userdata('user_info')->id,

		];

		$workspace_path = BASEPATH.'../workspace/';
		$user_email = $this->session->userdata('user_info')->email;
		//echo $user_email;

		$workspace_folders = scandir($workspace_path);
		unset($workspace_folders[0],$workspace_folders[1]);

		$token_path = "$workspace_path/$user_email/$token";
		$final_path ="$token_path-$wp_name";

		$status = false;
		if(count($workspace_folders)>0) {
			foreach($workspace_folders as $wp_user){

				if($wp_user == $user_email){

					if(mkdir($final_path)){
						$status = true;
					}
				}else{
					mkdir("$workspace_path/$user_email");
					if(mkdir($final_path)){
						$status = true;
					}
				}

				

			}


		}else{

			mkdir("$workspace_path/$user_email");
				if(mkdir($final_path)){
						$status = true;
				}

		} 


		$assets_folder = ['css','js','images','fonts','others'];
				if($status){
					foreach($assets_folder as $asset){
						mkdir("$final_path/$asset");
			}
		}
		

		if($this->db->insert('workspace',$formdata)){
			$this->session->set_flashdata('message',success_alert('workspace created successfully'));
			return redirect(base_url('index.php/student/workspace/index'));


	}else{
		$this->session->set_flashdata('message',error_alert('OOps Try again'));
		return redirect(base_url('index.php/student/workspace/index'));



	}


		}
}








?>
