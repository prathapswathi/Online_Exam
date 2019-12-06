<body class="register-page" style="min-height: 586.8px;">


<div class="register-box">
  <div class="register-logo">
   <h1>Online examination System</h1>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <!-- <form action="<?php echo base_url() ?>LoginController/register" method="post"> -->
      <form id="formRegister" name="register" onsubmit="return false;" >
        <div class="input-group mb-3">
          <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="lastname" class="form-control" placeholder="Last name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" id="show_hide_password">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
            <a href=""><i class="fa fa-eye-slash" aria-hidden="false"></i></a>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- <div class="input-group mb-3">
          <input type="text" name="utype" class="form-control" placeholder="User Type(Ex. user)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> -->
        <div class="input-group mb-3">
          <select name="utype" class="form-control" value="User Type(Ex. user)">
                        <option value="">Select user type</option>
                        <?php foreach($utype as $row):?>
                        <option value="<?php echo $row->user_type;?>"><?php echo $row->user_type;?></option>
                        <?php endforeach;?>
                    </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" onclick="validateRegister()">Register</button>
          </div>
          <div id="success-message" style="color:red"> <?php echo $this->session->flashdata("error");?>
          <?php echo validation_errors(); ?></div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="<?php echo base_url() ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<script>
 function validateRegister(){
   $.post("<?= base_url();?>LoginController/ajax_register",$("#formRegister").serialize(),function(response){
     console.log(response);
     if(response.status == 'SUCCESS'){
         alert("registered successfully");
         window.location.href= "<?= base_url()?>";
       }
       else{
        $("#success-message").html(response.message);
       }
   })
 }
</script>

