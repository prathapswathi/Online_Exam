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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="/Online_Exam/css/admin.css"/> -->
<script>
$(document).ready(function(){
  $("#profile").click(function(){$("#data").load("<?php echo base_url().'AdminController/profile';?>")});
   $("#topics").click(function(){$("#data").load("<?php echo base_url().'AdminController/topics';?>")});
//   $("#Suba").click(function(){$("#posts").load("chapters/Suba.php")});
//   $("#Subb").click(function(){$("#posts").load("chapters/Subb.php")});
});
</script>
<style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    .navbar-header {
    display: block;
    margin-left: auto;
    margin-right: auto;
    height:170px;
    }
    #admin-logo{
      border-radius:120px;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: skyblue;
      height: 100%;
    }
  
    p a:hover{
    background:gray;
    color:white;
    padding:10px;
}
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <a href="<?php echo base_url() ?>AdminController/dashbord"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQeKWZufcuUnVBTEkA8Tl8-Uth6AYWZ_jTy4U3AuXGfq5J2h6Zw" class="img-circle" alt="admin_logo" id="admin-logo"></a>
     
    </div>
  </div>
</nav> 
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a id="profile" href="#profile">Profile</a></p><hr>
      <p><a id="topics" href="#topics">Add Topics</a></p><hr>
      <p><a href="#">Add Questions</a></p><hr>
      <p><a href="#">Create Test</a></p><hr>
      <p><a href="#">User Info</a></p><hr>
      <p><a href="<?php echo base_url() ?>LoginController/logout">Logout</a></p><hr>
      
    </div>
    <div class="col-sm-8 text-left" id="data"> 
      <h1>Welcome Admin</h1>
      <p>This is Simple Admin Panel for Online Examination System </p>
      <hr>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Online Examination System</p>
</footer>
</body>
</html>
