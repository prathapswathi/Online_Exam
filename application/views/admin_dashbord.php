<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin Dashboard</title>
<!-- Bootstrap core CSS-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/Online_Exam/css/admin.css"/>
</head>
<!-- <body class="fixed-nav sticky-footer bg-dark" id="page-top"> -->
<body >
<div class="row" id="header">

<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQeKWZufcuUnVBTEkA8Tl8-Uth6AYWZ_jTy4U3AuXGfq5J2h6Zw" class="img-circle" alt="admin_logo" id="admin-logo">
<br>
<!-- <label>&nbsp;Welcome to Admin Dashboard</label> -->
</div>
<div class="row" id="side-bar">
<ul>
<a id="profile" href="#profile" ><li>Profile</li></a>
<a id="topic" href=""><li>Add Topics</li></a>
<a href=""><li>Add Questions</li></a>
<a href=""><li>Create Test</li></a>
<a href=""><li>User Info</li></a>
<a href="<?php echo base_url() ?>LoginController/logout"><li>Logout</li></a>
</ul>
</div>
<div class="row" id="data">
<b><p class="ex1" style="padding-left:350px;font-size:40px;float:right;">Welcome Admin!!!</p></b>
<br><p style="padding-left:260px;font-size:20px">This is Simple Admin Panel for Online Examination System </p>

</div>
</body>
</html>
<script>
$(document).ready(function(){
  $("#profile").click(function(){$("#data").load("<?php echo base_url().'AdminController';?>")});
//   $("#T1").click(function(){$("#posts").load("chapters/T1.php")});
//   $("#Suba").click(function(){$("#posts").load("chapters/Suba.php")});
//   $("#Subb").click(function(){$("#posts").load("chapters/Subb.php")});
});
</script>