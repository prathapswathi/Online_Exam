<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css " rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
<div class='right-button-margin'>
    <a href='' class='btn btn-default pull-right' style='background-color:lightblue'>Create Product</a>
</div>

  <form method="post" action="<?php echo base_url() ?>AdminController/add_topics">
    <table class='table table-hover table-responsive table-bordered'>
        <tr style='background-color:green'>
            <th>Course Id</th>
            <th>Course Name</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
 
        <tr>
                <td></td>
                <td></td>
                <td>
                    
				<a href='' class='btn btn-primary left-margin'>
    			<span class='glyphicon glyphicon-list'></span> Read
				</a>
 
				<a href='' class='btn btn-info left-margin'>
    			<span class='glyphicon glyphicon-edit'></span> Edit
				</a>
 
				<a class='btn btn-danger delete-object'>
    			<span class='glyphicon glyphicon-remove'></span> Delete
				</a> 
                
    			
               
                </td>
 
            </tr>
 
        
 
    
  </form>

 </body>