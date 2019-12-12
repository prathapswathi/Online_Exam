<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Read Topics</title>
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
<a href="<?=base_url()?>/AdminController/dashboard#topics" id="topics"><input type="button" class='btn btn-default pull-right'  value="Topics"></a>
<form name="myform" enctype="multipart/form-data" method="post" id="myform" > 
<div class="row">
<div class="col-sm-6 ">
<div class="form-group">
   
<?php

foreach ($get_topics as $row)  
         { 
             $img = $row->image;
           
             ?>
<label for="id">Course id:</label>
        <span style="color:red"> *</span>
       
        <input type='text' name='course_id' class='form-control' value="<?php echo $row->course_id ?>" readonly/>
    
    </div>
    <div class="form-group">

        <label for="name">  Course Name:</label>
        <span style="color:red"> *</span>
        
        <input type='text' name='course_name' class='form-control' value="<?php echo $row->course_name ?>" readonly/>
    
    </div>
    <div class="form-group">

    <label for="desc">  Description:</label>
    <span style="color:red"> *</span>
    
    <input type='text' name='desc' class='form-control' value="<?php echo $row->description ?>" readonly/>
   
    </div>
   </div>
   <div class="col-sm-6 ">
    <div class="form-group">
    <img style="width:300px;height:300px" src="<?php echo base_url('images/'. $img )?>" />
    </div >
    </div>
    <div id="success-message" style="color:red"> 
         <?php } ?>
          </div>
  
</form>

</div>


