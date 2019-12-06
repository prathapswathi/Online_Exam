<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Dashboard</title>
<!-- Bootstrap core CSS-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/Online_Exam/css/admin.css"/>
</head>
<!-- <body class="fixed-nav sticky-footer bg-dark" id="page-top"> -->

<body >
<div class="row" id="header">

<a href="<?php echo base_url() ?>"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQeKWZufcuUnVBTEkA8Tl8-Uth6AYWZ_jTy4U3AuXGfq5J2h6Zw" class="img-circle" alt="admin_logo" id="admin-logo"></a>
<br>
<!-- <label>&nbsp;Welcome to Admin Dashboard</label> -->
</div>
<div class="row" id="side-bar">
<ul>
<a href="<?php echo base_url() ?>UserController/profile"><li>Profile</li></a>
<a href=""><li>Browse Test</li></a>
<a href=""><li>Attend Exam</li></a>
<a href=""><li>Result</li></a>
<a href=""><li>History</li></a>
<a href="<?php echo base_url() ?>LoginController/logout"><li>Logout</li></a>
</ul>
</div>
<div class="row" id="data">

</div>
</body>
</html>
<script>
$("#side-bar a").click(function(e){
    e.preventDefault();
    $(".toggle").hide();
    var toShow = $(this).attr('href');
    $(toShow).show();
});
</script>