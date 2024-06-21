<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style>
.outer{
	min-height: 600px;
	background-color: blue;

}
.center{
	height: 400px;
	width: 400px;
	border: 2px solid black;
	padding : 100px;
	margin-left: 300px;
	background-color: white;
}		
</style>
<body>
<center><h1>Add User Information</h1></center></h1>
<hr/>
<?php

if($this->session->flashdata('message')){
	echo $this->session->flashdata('message');
}
?>
<div class="outer">
	<div class="center"> 
<form action="<?php echo base_url('index.php/admin/dashboard/save_user'); ?>" method="post">
	Select User Type :
	 <select name="user_type">
		<option value="" <?php ($this->input->post('user_type') == set_value('user_type'))?print("selected"):""; ?>>
		Select</option>
		<option value="trainer"  <?php ($this->input->post('user_type') == set_value('user_type'))?print("selected"):""; ?>>
		trainer</option>
		<option value="student"  <?php ($this->input->post('user_type') == set_value('user_type'))?print("selected"):""; ?>>
		student</option>
	</select>
	<?php echo form_error('user_type'); ?>



	
	<br/><br/>
	Enter Name : <input type="text" name="user_name" value="<?php echo set_value('user_name');?>" />
	<?php echo form_error('user_name'); ?>
	


	<br/><br/>
	Enter Email: <input type="text" name="user_email" value="<?php echo set_value('user_email');?>"  />
	<?php echo form_error('user_email'); ?>

	<br/><br/>
	Enter Mobile : <input type="number" name="user_mobile"  value="<?php echo set_value('user_mobile');?>"  />
	<?php echo form_error('user_mobile'); ?>

	<br/><br/>
	Enter Password : <input type="password" name="user_password"  value="<?php echo set_value('user_password');?>"  />
	<?php echo form_error('user_password'); ?>

	<br/><br/>
	<input type="submit" value="create User" />

</form>
</div>
</div>
</body>
</html>

