<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Online Examination System</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-image: url("images/back.jpg");
		background-repeat: no-repeat;
		height: 500px;
		background-position: center;
		background-size: cover;
		position: relative;
		margin: 40px;
		font: 20px/50px normal Helvetica, Arial, sans-serif;
		color: skyblue;
	}
    h1{
		float:right;
		padding-left:39%;
		color:yellow;
		width:auto;
	}
	 #container {
		margin: 100px;
		
	} 
	#admin {
		/* margin: 10px;
		border: 1px solid blue; */
		float: right;
	/*
		margin:20px;
		margin-left:70px;
		background-color:skyblue; */
	}
	 #user {
		/* margin: 10px;
		border: 1px solid blue; */
		float: right;
/* 		
		background-color:skyblue;
		margin:20px; */
	}
	</style>
</head>
<body>

<div id="container">
<center><h1>Welcome to Online Examination System</h1></center>

<div id="admin">
<a href="" id="bottle" ><img src="images/admin.png" alt="Welcome"></a>
</div>
<div id="user">
<a href="" id="bottle" ><img src="images/user.png" alt="Welcome"></a>
</div>

</div>

</body>
</html>