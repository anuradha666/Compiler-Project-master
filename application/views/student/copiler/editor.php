<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo base_url('assets/'); ?>" >
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>code editor</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="JS/bootstrap.bundle.js"></script>
	<style type="text/css">
		.outer{
			min-height: 500px;
			border: 1px solid black;
		}
		.header{
			height: 50px;
			
		}
		.body{
			height: 500px;
			border: 1px solid black;
		}
		.file{
			height: 500px;
			background: url('img/login-bg.png');
			overflow-y: scroll;

		}
		.ce{
			min-height: 500px;
			background: url('img/login-bg.png');
		}
		.p{
			box-shadow: 1px 1px 2px 2px black ;
		}
		.p:hover{
			background: #0b7af4;
			transition: all ease -1s;
			color: white;
			box-shadow: 1px 1px 2px 2px white ;
		}

		.load_files{
			height: auto;
			width: auto;
			border-left: 2px solid black;
			border-bottom: none;
			border-right: none;
			border-top: none;
			margin-left: 30px;
		}

		.load_folder{
			height: auto;
			width: auto;
			border-left: none;
			border-bottom: none;
			border-right: none;
			border-top: none;
			margin-left: 30px;
		}
		.index_files{
			height: auto;
			width: auto;
			border-left: 2px solid black;
			border-bottom: none;
			border-right: none;
			border-top: none;
			margin-left: -30px;
		}
	</style>
</head>
<body>
	
<?php 

if($this->session->flashdata('message')){
	echo $this->session->flashdata('message');
}

?>
<div class="container-fluid outer">
	<div class="row">
		<div class="col-sm-12 header bg-secondary">
			<div class="row" >
				
				<div class="col-sm-1">
					<input type="button" value="New file" id="new_file_id" class="form-control ms-5 mt-1 p "data-bs-toggle="modal" data-bs-target="#newfile" hidden>  
				</div>
				<div class="col-sm-1">
					<input type="submit" value="Upload " class="form-control ms-5 	mt-1 p" data-bs-toggle="modal" data-bs-target="#uploadfile">  
				</div>
				<div class="col-sm-6"><h1 class="text-center">Editor</h1></div>
				<div class="col-sm-1">
					<input type="submit" value="Export " class="form-control mt-1 p">  
				</div>
				<div class="col-sm-1">
					<input type="submit" value="Save" class="form-control mt-1 p">  
				</div>
				<div class="col-sm-1">
					<input type="submit" onclick="runCode();" value="Run" class="form-control mt-1 p">  
				</div>
			</div>
		</div>
		<div class="col-sm-12 body">
			<div class="row">
				<div class="col-sm-3 file">
				<?php foreach($myprojects as $folder => $assets_dir): ?>
					 <details>
					 			<summary>
					 					<b><?php echo substr(basename($folder),33); ?></b>
					 			</summary>
					 				<div class="load_folder">
					 						<?php foreach($assets_dir as $assets_key => $assets_value):  ?>

					 							<?php  

					 							$path = pathinfo(basename($assets_value)); 
					 							$ext  = @$path['extension'];
			
					 							 ?>
					 							<?php if(in_array(basename($assets_value),['css','js','images','fonts','others'])) : ?>
					 								<details>
					 									<summary>
					 												__<a href="javascript:appendUrl(<?php echo $assets_dir['wp_id']; ?>,'<?php echo basename($assets_value); ?>');"><?php echo basename($assets_value); ?></a> <br/>	 
					 									</summary>
					 									<?php foreach($files as $file):?>		
 														<?php if(pathinfo($file)['extension'] == basename($assets_value)): ?>
					 										<div class="load_files">
					 											    __<a href="#"><?php echo basename($file); ?></a><br/>
					 										    </div>

					 										  <?php endif; ?>

					 									<?php endforeach; ?>

					 								</details>

					 								 <?php elseif(($ext == 'php')): ?>
					 								 		<div class="index_files">
					 										   		__<a href="javascript:loadFiles(<?php echo $assets_dir['wp_id']; ?>,'<?php echo basename($assets_value); ?>','<?php echo basename($assets_value); ?>');"><?php echo basename($assets_value); ?></a> <br/>
					 										 </div>
					 							<?php endif; ?>
					 									
					 							
					 						<?php endforeach; ?>
					 				</div>
					 </details>
				<?php endforeach; ?>


				</div>
				<div class="col-sm-9 ce">
					<form action="<?php echo base_url('index.php/student/compiler/runcode'); ?>" method="post" id="code_form_id">
					<textarea name="code" class="form-control" style=" background: transparent;" rows="18"><?php isset($code)?print($code):"" ?></textarea>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-------new file modal start----->
	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="newfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      	<form action="<?php echo base_url('index.php/student/compiler/new_file'); ?>" 
      		method="post">
      	Enter the file name :
        <input type="text" class="form-control" name="filename" id="newfile_txtbox">
        <input type="hidden" class="form-control" name="wp_id" id="wp_id">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Add File">
      </div>
      
    </div>
  </div>
</div>
	<!-------new file modal end----->
	<!-------upload file modal start----->
	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="uploadfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        Upload file, images,pdf...
        <input type="file" name="" class="form-control">
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	<!-------upload file modal end----->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	function appendUrl(id,title){
		$("#new_file_id").click();
		$("#newfile_txtbox").val(title+"/");
		$("#wp_id").val(id);
	}


	function loadFiles(id,title,path){
		window.location.href = "<?php echo base_url('index.php/student/compiler/index'); ?>" + 
		`/preview/${id}/${title}/${path}`;

	}


	function runCode(){
		document.getElementById('code_form_id').submit();
	}
</script>
</html>
