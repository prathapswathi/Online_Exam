<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Add Topics</title>
<!-- Bootstrap core CSS-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<style>
    #myform{
        border:1px solid gray;
        padding:10px;
    }
    </style>
</head>

<div class="container">
<input type="button" class='btn btn-default pull-right'  value="Add Topics">
<form name="myform" enctype="multipart/form-data" method="post" id="myform" action="<?php echo base_url() ?>AdminController/add_topics_action"> 
<div class="form-group">
<label for="id">Course id:</label>
        <span style="color:red"> *</span>
       
        <input type='text' name='course_id' class='form-control' />
    
    </div>
    <div class="form-group">

        <label for="name">  Course Name:</label>
        <span style="color:red"> *</span>
        
        <input type='text' name='course_name' class='form-control' />
    
    </div>
    <div class="form-group">

    <label for="desc">  Description:</label>
    <span style="color:red"> *</span>
    
    <input type='text' name='desc' class='form-control' />
   
    </div >
   
    <div class="form-group">
    
    <label for="image"> Image:</label>
    <span style="color:red"> *</span>
    
    <input type="file" name="image" id="image" class='form-control' >
    </div >
    <div id="success-message" style="color:red"> <?php echo $this->session->flashdata("error");
          ?>
          <?php echo validation_errors(); ?>
          
          </div>
     <button type="submit" class="btn btn-primary" >Create</button>
  
</form>

</div>

