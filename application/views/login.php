<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Login form</title>
<style type="text/css">
body {
		background-repeat: no-repeat;
		height: 500px;
		background-position: center;
		background-size: cover;
		position: relative;
		margin: 40px;
		font: 20px/50px normal Helvetica, Arial, sans-serif;
       
	}
#image{
    float:left;
}
#login-form{
    float:right;
}
.form-control {
    min-height: 41px;
    background: #fff;
    box-shadow: none !important;
    border-color: #e3e3e3;
}
.form-control:focus {
    border-color: #70c5c0;
}
.form-control, .btn {        
    border-radius: 2px;
}
.login-form {
    width: 350px;
    margin: 0 auto;
    padding: 100px 0 30px;		
}
.login-form form {
    color: #7a7a7a;
    border-radius: 2px;
    margin-bottom: 15px;
    font-size: 13px;
    background: #ececec;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;	
    position: relative;	
}
.login-form h2 {
    font-size: 22px;
    margin: 35px 0 25px;
}
.login-form .avatar {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -50px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #70c5c0;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.login-form .avatar img {
    width: 100%;
}
</style>
</head>
<body>

<div class="login-form">

    <form action="" method="post">
		<div class="avatar" style="background-color:white;border:1px solid gray" >
		<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQZrwZDGrkr-jgVLE-Z8U3xPhL4MxOoiUPv3J1qTyOQUh5W5EGW" alt="Avatar">
	  
        </div>
        
        <h2 class="text-center">Admin Login</h2>   
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="login">Sign in</button>
        </div>
		<div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>
    </form>
 
</div>


</body>

</html>                            