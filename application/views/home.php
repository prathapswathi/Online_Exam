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
		margin: 90px;
		
	} 
	#admin {
		
		float: right;
	
	}
	 #user {
		
		float: right;

	}

@media screen and (max-width: 992px) {


}
</style> 
</head>
<body>

<div id="container">
<center><h1>Welcome to Online Examination System</h1></center>

<div id="admin">
<a href="<?php echo base_url() ?>LoginController/admin_login" id="bottle" ><img src="images/admin.png" alt="Welcome"></a>
</div>
<div id="user">
<a href="<?php echo base_url() ?>LoginController/user_login" id="bottle" ><img src="images/user.png" alt="Welcome"></a>
</div>

</div>

</body>
</html>