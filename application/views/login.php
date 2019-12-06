
<body class="login-page" style="min-height: 512.8px;
background-image: url('http://4liberty.eu/wp-content/uploads/2016/08/8314929977_4d7e817d68_h-1125x749.jpg');
		background-repeat: no-repeat;
		/* height: 500px; */
		background-position: center;
		background-size: cover;
		position: relative;
" >

 <center> <h1 style="color:yellow">Welcome to Online Examination System</h1></center>
<div class="login-box">
  <!-- <div class="login-logo">
  
  </div> -->
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <!-- <form id="login" action="<?php echo base_url() ?>LoginController/login_validation" method="post"> -->
      <!-- <form id="login" name="login" method="post" action="<?php echo base_url() ?>LoginController/login_validation">       -->
    <form id="formLogin" name="login" onsubmit="return false;" >
      
        <div class="input-group mb-3" >
          <input type="email" id="uname" name="username" class="form-control" placeholder="Email" value="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" id="show_hide_password">
          <input type="password" id="pass" name="password" class="form-control" placeholder="Password" value="">
          <div class="input-group-append">
            <div class="input-group-text">
              <!-- <span class="fas fa-lock"></span> -->
              <a href=""><i class="fa fa-eye-slash" aria-hidden="false"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="chkremember" id="remember" value="Remember me" <?php if (get_cookie('userToken')) { ?> checked="checked" <?php } ?> >
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4" >
            <button type="submit" class="btn btn-primary btn-block" onclick="validateLogin();">Sign In</button>
          </div>
          <div id="success-message" style="color:red"> <?php echo $this->session->flashdata("error");
          ?>
          <?php echo validation_errors(); ?>
          
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?php echo base_url() ?>LoginController/reset">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url() ?>LoginController/sign_up" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script>
 function validateLogin(){
   $.post("<?= base_url();?>LoginController/ajax_login",$("#formLogin").serialize(),function(response){
     console.log(response);
     if(response.status == 'SUCCESS'){
       if(response.user_type == 'admin'){
         alert("welcome to admin dashboard");
         window.location.href= "<?= base_url()?>AdminController/dashboard";
       }
      else{
         alert("welcome to user dashboard");
         window.location.href= "<?= base_url()?>UserController/dashboard";
       }
     }
     else{
      $("#success-message").html(response.message);
      // window.location.href= "<?= base_url()?>LoginController/login";
     }
   })
 }
</script>