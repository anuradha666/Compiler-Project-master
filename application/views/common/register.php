<style type="text/css">
	.o{
	min-height:500px;
  
	border:1px solid black;
}
.m{
  margin-left: 110px;
  border-radius: 10px;
}
</style>
<div class="container-fluid o ">
  <?php 

    if($this->session->flashdata('message')){
      echo $this->session->flashdata('message');
    }
    
  ?>
  <h1>Student Register Here</h1>
  <form action="<?php echo base_url('index.php/welcome/save'); ?>" method
    ="post">
  <p>Student Name :<input type="text" name="std_name" required> </p>
  <p>Student Email:<input type="email" name="std_email" required> </p>
  <p>Student Password :<input type="text" name="std_pass" required> </p>
  <p>Student Mobile :<input type="text" name="std_mobile" required> </p>
  
    <input type="submit" value="Register" />
  </form>

</div>
</div>
