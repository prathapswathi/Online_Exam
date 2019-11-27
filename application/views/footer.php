<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/js/adminlte.min.js"></script>

<script type="text/javascript">
 $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>



<script>
            document.addEventListener("DOMContentLoaded", function(event) { 

              $('#login').submit(function(event) {

                var u = $('#uname').val();
                var p = $('#pass').val();
                if (u == "" || p == "") {
                $('#success-message').show().html('All Fields are required');
                 } else {
                $('#success-message').html("").hide();
                  $.ajax({
                      url : "http://localhost/Online_Exam/LoginController/login_validation", 
                      type : "POST",
                      dataType : "json",
                      data : {
                          username : u, 
                          password : p
                          },
                      success : function(data) {
                        data = $.parseJSON(data); 
                          alert('logged in successfully');
                      },
                      error : function() {
                          alert('Something went wrong');
                          window.location.href = http://localhost/Online_Exam/LoginController/login
                      }
                  });
                 }
                  return false;
              });
            }); 
        </script>
<script>
$(document).ready(function(){
  $("#profile").click(function(){$("#data").load("<?php echo base_url().'AdminController/profile';?>")});
   $("#topics").click(function(){$("#data").load("<?php echo base_url().'AdminController/topics';?>")});
   $("#add_topics").click(function(){$("#data").load("<?php echo base_url().'AdminController/add_topics';?>")});
   $("#add_questions").click(function(){$("#data").load("<?php echo base_url().'AdminController/add_questions';?>")});
//   $("#Subb").click(function(){$("#posts").load("chapters/Subb.php")});
});
</script>

</body></html>