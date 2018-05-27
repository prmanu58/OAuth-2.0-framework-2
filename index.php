<?php 
   require 'config.php';

   session_start();

      

?>


<!DOCTYPE html>
<html>
<head>
<title> Secure Software System Assignment 3 - It16137660 </title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css" />
<link rel="stylesheet" type="text/css" href="style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"> </script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="config.js"> </script>



	<style>
		body {background-color: #74acdf;}
	</style>



</head>
<body>

<div class="middlePage">
<div class="page-header">
    <h1 class="logo">Assignment 3 <small> [ Facebook Social OAUTH 2.0  ] </small> </h1>
</div> 

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"> Please Log In </h3>
    </div>

    <div class ="panel-body">
        <div class="row">

            <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                <form class="form-horizontal" method="POST" action="server.php" >
                    <input name="user_name" type="text" placeholder="Enter User Name" class="form-control input-md"> <br>
                    <input name="user_pswd" type="password" placeholder="Enter your password" class="form-control input-md">
                    <div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"><small> Remember me</small></div>
                    <div class="spacing"><input type="hidden" id="csToken" name="CSR"/></div> <br>
                    <input type="submit" name="sbmt" value="Log In" class="btn btn-info btn-sm pull-right">
                </form>

				<div class="col-md-5"> 
            <a href="<?php echo AUTH_URL("174875303212995","https%3A%2F%2Flocalhost%2FFacebook-Social-OAUTH-2.0%2Fredirect.php"); ?>" onclick="return getCount();"><img src="fb.png" width="200" heigt="100"/></a><br/><br/>
           <br>
		   </div>
				

            </div>

        </div>
    </div>

</div>

<?php

?>


                

<h4>
<p><a href="https://www.facebook.com/prmanu58">Design and Created By Pramesh Anuradha </a>   </p>
<p><a href="#">SSS PROJECT </a> prmanu58@gmail.com  </p>
</h4>

</div>

</body>
</html>