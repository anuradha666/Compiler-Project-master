<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo base_url('assets/'); ?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</head>
<body>
	<style>
		.header{
			min-height:50px;
		}
	</style>
	<div class="container-fluid">
		<div class="row header bg-dark">
			<div class="col-sm-3 text-light mt-2">
			Have any queston? +123 456 7890
			</div>
			<div class="col-sm-3 text-light mt-2">
				<i class="fa-solid fa-envelope-open"></i> seema633@gmail.com
			</div>
			<div class="col-sm-2 text-light mt-2">
				<i class="fa-solid fa-clock"></i> Sun - Thu 8:00 - 16:00
			</div>
			<div class="col-sm-2 text-light"></div>
			<div class="col-sm-2">
					<div class="input-group flex-nowrap mt-1">
  <span class="input-group-text bg-warning" id="addon-wrapping"><i class="fa-solid fa-pen-to-square"></i></span>
  <input type="button" class="form-control bg-warning" value="APPLY NOW" aria-label="Username" aria-describedby="addon-wrapping">
</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<!---------------------------------logo menu --------------------->
				<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <img src="img/logo.png" class=" me-5	">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto ms-5 mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('index.php/welcome/index'); ?>">HOME</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link" href="<?php echo base_url('index.php/welcome/about'); ?>">ABOUT</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link" href="#">ADVISOR</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link" href="#">EVENT</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link" href="<?php echo base_url('index.php/welcome/contact'); ?>">CONTACT</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link" href="<?php echo base_url('index.php/welcome/register'); ?>">REGISTER</a>
        </li>

        <li class="nav-item dropdown ms-4">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            LOG IN
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url('index.php/welcome/login'); ?>">STUDENT</a></li>
            
          </ul>
        </li>
      </ul>
    
    </div>
  </div>
</nav>
				<!------------------------------------logo menu-------------------------------->
			</div>
		</div>
	</div>
