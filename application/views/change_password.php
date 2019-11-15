<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>

.pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 

top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 
.pass_show .ptxt:hover{color: #333333;} 

	.col-sm-4{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}

    .col-sm-4 form{
		color:  #1d2124;
		border-radius: 3px;
    	margin-bottom: 15px;
        background:white;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
        border:1px solid gray;
        margin-top:20px;
    }
  
</style>
<script>
      
$(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
  

$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
</script>
</head>
<body>
<center><h1 style="color:Gray">Change Your Password</h1></center> 
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		    <form action="" method="post">
            
            <div class="text-center">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTY1cbCEtZg8H-hNWBYohJ8m7Kq-AJJz-c6TLGQIVW0p2HsycVJ" alt="Image" class="img-fluid">
            </div>
            <div class="move">
		    <label>Old Password</label>
		    <div class="form-group pass_show"> 
                <input type="password" class="form-control" placeholder="Old Password"> 
            </div> 
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password"  class="form-control" placeholder="New Password"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" class="form-control" placeholder="ReEnter">
            </div>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="login">Change Password</button>
        </div>
            </form>
		</div>  
	</div>
</div>
</body>
