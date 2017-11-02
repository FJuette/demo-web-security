<?php header('X-XSS-Protection:0'); //disable browser xss protection features ?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo web security</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="FJuette">
	
	<link rel="stylesheet" href="../vendor/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">

      <!-- Static navbar -->
       <nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="../index.php">Demo web security</a>
			</div>
			<ul class="nav navbar-nav">
			  <li><a href="#">Home</a></li>
			  <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">XSS
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="/xss/xss1.php?name=Fabian">Non-Persistent</a></li>
				  <li><a href="#">Demo 2</a></li>
				  <li><a href="#">Demo 3</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">SQL-Injection
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="#">Demo 1</a></li>
				  <li><a href="#">Demo 2</a></li>
				  <li><a href="#">Demo 3</a></li>
				</ul>
			  </li>
			  <li><a href="#">LFI</a></li>
			  <li><a href="#">RFI</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="../config.php"><span class="glyphicon glyphicon-cog"></span> Config</a></li>
			</ul>
		  </div>
		</nav> 
