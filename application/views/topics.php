<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css " rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>

<div class='right-button-margin'>
            <a id="add_topics" href="#add_topics"  class='btn btn-default pull-right' style='background-color:lightblue'>Create Product</a>
            </div>
  <form method="post" action="">
  <table class='table table-hover table-bordered' style="width: 100%;">
            <tr style='background-color:green'>
            <th>Course Id</th>
            <th>Course Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Modify</th>
        </tr>
       
        <?php 
        if(!empty($h)){

         foreach ($h as $row)  
         {  
         ?>
        <tr>
                <td><?php echo $row->course_id;?></td>
                <td><?php echo $row->course_name;?></td>
                <td><?php echo $row->description;?></td>
                <td><img style="width:110px;height:110px" alt="image" src="<?php echo base_url().'/images/'.$row->image?>" class="img-responsive"></td>
                <td>    
				<a href='' class='btn btn-primary left-margin'>
    			<span class='glyphicon glyphicon-list'></span> Read
				</a>
 
				<a href='' class='btn btn-info left-margin'>
    			<span class='glyphicon glyphicon-edit'></span> Edit
				</a>
 
				<a href='<?php echo base_url().'/AdminController/delete/'.$row->id?>' onclick="return confirm('Are you sure?')" class='btn btn-danger delete-object'>
    			<span class='glyphicon glyphicon-remove'></span> Delete
				</a> 
                </td>
        </tr>
            <?php }  
        }
        else
       { 
         ?> 
      <tr><td colspan='5'>   
 <div style="color:red" class='alert alert-info'> Topics does not exists!!! Please add the topics </div></td></tr>
       <?php } ?>     
 </table>
 <div style="color:red"> <?php echo $this->session->flashdata("error");?></div>
  </form>

 </body>