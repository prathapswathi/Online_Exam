<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1>Online examination system</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
   
      <!-- <form action="<?php echo base_url() ?>LoginController/new_password".$email_new; method="post"> -->
      <form id="formChangePassword" name="ChangePassword" onsubmit="return false;" >
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" onclick="validateChangePassword();">Change password</button>
          </div>
          <div id="success-message" style="color:red"> <?php echo $this->session->flashdata("error");?>
          <?php echo validation_errors(); ?></div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?php echo base_url() ?>">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
 function validateChangePassword(){
   $.post("<?= base_url();?>LoginController/ajax_changePassword",$("#formChangePassword").serialize(),function(response){
     console.log(response);
     if(response.status == 'SUCCESS'){
      alert("Successfully change the password");
         window.location.href= "<?= base_url()?>";
       }
       else{
        $("#success-message").html(response.message);
       }
       
   })
 }
</script>