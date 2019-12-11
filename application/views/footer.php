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
$(document).ready(function(){
  $("#profile").click(function(){$("#data").load("<?php echo base_url().'AdminController/profile';?>")});
   $("#topics").click(function(){$("#data").load("<?php echo base_url().'AdminController/topics';?>")});
   $("#add_topics").click(function(){$("#data").load("<?php echo base_url().'AdminController/add_topics';?>")});
   $("#add_questions").click(function(){$("#data").load("<?php echo base_url().'AdminController/add_questions';?>")});
//   $("#read_topics").click(function(){$("#data").load("<?php echo base_url().'AdminController/read_topics/$row->id';?>")});
//   $("#edit_topics/$id").click(function(){$("#data").load("<?php echo base_url().'AdminController/edit_topics/$id';?>")});
});
</script>

</body></html>