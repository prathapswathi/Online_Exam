<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css " rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<style>
ul.tsc_pagination li a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
}
ul.tsc_pagination li
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
}
ul.tsc_pagination li a
{
color:black;
display:block;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#0A7EC5;
border-color:#8DC5E6;
background:#F8FCFF;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #388DBE;
border-color:#3390CA;
background:#58B0E7;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}
Copy

</style>
<body>

<div class='right-button-margin'>
            <a id="add_topics" href="#add_topics"  class='btn btn-default pull-right' style='background-color:lightblue'>Create Product</a>
            </div>
  <form method="post" action="">
  <table class='table table-hover table-bordered' style="width: 100%;white-space: nowrap;
">
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
				<a href="<?php echo base_url().'/AdminController/read_topics/'.$row->id?>" id='read_topics' class='btn btn-primary left-margin'>
    			<span class='glyphicon glyphicon-list'></span> Read
				</a>
 
				<a href='<?php echo base_url().'/AdminController/edit_topics/'.$row->id?>' id='edit_topics' class='btn btn-info left-margin'>
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
 <div id="pagination">
<ul class="tsc_pagination">

<!-- Show pagination links -->
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
</div>
  </form>

 </body>