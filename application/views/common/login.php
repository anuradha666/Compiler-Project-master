
<style type="text/css">
	.o{
  min-height: 550px;
 background:url('img/login-bg.png');
}
.p
{
max-height:300px;
background:transparent;
margin:10%;
} 
</style>

<div class="container-fluid o ">
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-5 p mx-auto ">

  
<?php 
if ($this->session->flashdata('message')){
  echo $this->session->flashdata('message');
}



?>




          <form style="border: 1px solid white;padding: 40px;" method="post" action="<?php echo base_url('index.php/login/checkuser'); ?> ">
          
            <h1 class="text-center text-primary">LOGIN HERE</h1>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
  <input type="text" class="form-control" placeholder="Your username" aria-label="Username" aria-describedby="basic-addon1" name="email">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
  <input type="number" class="form-control" placeholder="Your password" aria-label="password" aria-describedby="basic-addon1" name="password">
</div>
<input type="submit" value="LOGIN" class="bg-primary form-control text-light rounded"/>

</form>
</div>
      </div>
    </div>
  </div>