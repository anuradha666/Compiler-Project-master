<?php

class Compiler extends CI_controller{

public function __construct(){

	parent::__construct();

}

public function index($mode = '',$wp_id = '',$path=''){

	$user_id = $this->session->userdata('user_info')->id;
	$user_email = $this->session->userdata('user_info')->email;
    $myworkspaces = $this->db->select('*')->from('workspace')->where('user_id',$user_id)->get()->result();

    $myprojects = array();
    $files_project = array();
 
    $wp_path = BASEPATH.'../workspace/'.$user_email."/";
    foreach($myworkspaces as $wp_space)
    {
    	$folder_path = $wp_space->token."-".$wp_space->name;
    	$total_path = $wp_path.$folder_path;

    	if(is_dir($total_path)){
    			$assets_dir = scandir($total_path);
    			unset($assets_dir[0],$assets_dir[1]);	
    	}
    	
    	foreach($assets_dir as $assets){
    		$myprojects[$total_path][] = "$total_path/$assets";
    		$myprojects[$total_path]['wp_id'] = $wp_space->id;

    		//print_r($assets);

    		if(is_dir("$total_path/$assets")){
    				$root_folder = scandir("$total_path/$assets");
    				unset($root_folder[0],$root_folder[1]);
    				
    				foreach($root_folder as $root_files){
    						array_push($files_project, "$total_path/$assets/$root_files");
    				}
    		}
    		
    		
    	}
    }

   

    // echo '<pre>';
    // print_r($data);
    // exit;
	
	if($mode ==  'preview'){

		//file reading logic
		$wp_space = $this->db->select('*')->from('workspace')->where('id',$wp_id)->get()->row();
		$wp_path = BASEPATH.'../workspace/'.$user_email."/";
		$folder_path = $wp_space->token."-".$wp_space->name;
    	$total_path = $wp_path.$folder_path;
    	$editors_files = $total_path.'/'.$path;

    	if(file_exists($editors_files)){

    		$code = "";
    		$fh = fopen($editors_files,'r');
			while ($line = fgets($fh)) {
 			$code .= $line;
		}
			fclose($fh);
    	}


    	$data = [
	    	'myprojects' => $myprojects,
	    	'files' => $files_project,
	    	'code' => $code,
    	];

		$this->load->view('student/copiler/editor',$data);


	}else{


		 $data = [
	    	'myprojects' => $myprojects,
	    	'files' => $files_project,
    	];

		$this->load->view('student/copiler/editor',$data);	
	}          
	


 }


 public function new_file(){

 	$user_email  = $this->session->userdata('user_info')->email;

 	$filename = $this->input->post('filename');
 	$wp_id = $this->input->post('wp_id');

 	$wp_space = $this->db->select("*")->from('workspace')->where('id',$wp_id)->get()->row();
 	$wp_path = dirname(BASEPATH).'/workspace/'.$user_email;
 	$target_path = $wp_path."/".$wp_space->token."-".$wp_space->name."/".$filename;
 	 echo $target_path;
 	
 	if(file_exists($target_path)){

 				$this->session->set_flashdata('message',error_alert('File Already Exist'));
 				return redirect(base_url('index.php/student/compiler/index'));
 	 }else{


 	 $fp = fopen($target_path,"a+");
 	fwrite($fp,"<?php //@filename :".basename($target_path)."  \n\n //workspace code here?>");
 	fclose($fp);


 	 $this->session->set_flashdata('message',success_alert('File created successfully.'));
 	 return redirect(base_url('index.php/student/compiler/index'));

 	 }


}

public function runcode(){
	$code = $this->input->post('code');
	echo eval("?> $code <?php");  
}

}

?>