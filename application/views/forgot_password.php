<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <h1>Online Examination System</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="<?php echo base_url() ?>LoginController/ForgotPassword" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <div style="color:red"> <?php echo $this->session->flashdata("error");?>
          <?php echo validation_errors(); ?></div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?php echo base_url() ?>LoginController/login">Login</a>
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url() ?>LoginController/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>