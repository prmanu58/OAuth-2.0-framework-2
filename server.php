<?php

    require 'config.php';

    session_start();

   
    
?>

<!DOCTYPE html>
<html>
<head>
    <title> OAUTH 2.0 (SSS assignment) </title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"> </script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>

    <style>

        body{
            background: linear-gradient(to left, #5499c7, #2471a3);
        }

        h3{
            color:white;
            border-bottom:1px solid red;
            padding-bottom:3px;
        }

        h4{
            padding:6px;
            border-radius:6px;
        }

        .fbdet{
            border-right: 2px solid black;
            padding-right: 7px;
        }

        .well{
            background: linear-gradient(to left,#d4e6f1,#e8daef );
        }

        .btns{
            padding-top:7px;
        }

        .bg-info{
            padding:4px;
            border-radius:8px;
        }

        .msg_head{
            border-bottom:1px solid white;
            color: #e5e7e9;
        }

        .form-group{
            padding: 6px;
            background: #884ea0;
            color:white;
        }

    </style>

<script>

        function open()
        {
            alert("Save?");
        }

</script>

</head>
<body onbeforeunload="return open()">
<div class="container-fluid">

  <div class="row">

     <!-- Right side tab -->
    <div class="col-md-4"> 
    <div class="fbdet">
        <div class="row">
            <div class="col-md-12">
                <h3> Facebook OAUTH 2.0 </span> </h3> <br/>
                <div class="well well-sm"> <?php user(); ?> <p> <img src="<?php echo userBasics()->picture->data->url;?>" width="60" height="60" />  </p>
                                            <p> Name : <?php echo user()->name; ?> </p> 
                                            <p> E-Mail : <?php echo userBasics()->email; ?> </p>
                                            <p> Birthday : <?php echo userBasics()->birthday; ?> </p>
                                            <p> FB Link : <a href="<?php echo userBasics()->link; ?>" target="_blank" class="btn btn-info"> Visit Now </a> </p>
                </div>
                

            </div>
        </div>
     <!-- End of right side first block -->

            <div class="row">

                <div class="col-md-12">

                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
                    <div class="form-group">
                        <label for="comment">Send Message to your Facebook: </label>
                        <textarea class="form-control" rows="7" name="comment"></textarea> <br/>
                        <input type="submit" name="sbmt" class="btn btn-primary" value="POST TO FACEBOOK"/> 
                        <label for="hint" style="color:white;"> If Facebook review and approved your POST premission for your app this will work </label> 
                    </div>
                    </form>
                </div>

            </div> <!--end of right side second block-->

            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm"> Visit <a href="https://devilsheaven58.blogspot.com/" target="_blank"> The Devil's Heaven ;</div>
                    <div class="well well-sm"> Say goobye to login <a href="http://localhost/Facebook-Social-OAUTH-2.0/login.php" target="_self">Save Cookies </a> Now </div>
                </div>
            </div>
    </div>
    </div> 
    <!-- Body -->
    <div class="col-md-8">
     <h4 class="text-danger bg-warning">Profile Contents </h4>
      <div class="row">
        <div class="col-md-4">
            <p class="msg_head"> Latest Messages <span class="glyphicon glyphicon-envelope"></span> </p>
            
                <?php
                    //display 10 messages in wall
                    for($i=0; $i<=10; $i++)
                    {
                        echo '<p class="bg-info">';
                        echo get_posts()->posts->data[$i]->message; echo "<br/>";
                        echo "Time Created : ".get_posts()->posts->data[$i]->created_time;
                        echo "</p>";
                        echo "<br/> <br/>";
                    }
                ?>   
        </div>

        <div class="col-md-8">
                <p class="msg_head"> Albums / Latest uploaded photos <span class="glyphicon glyphicon-search"></span> </p>
                <?php 
                
                        //echo json_decode(get_photo($_COOKIE['access_token'],get_pID()->photos->data[0]->id))->data->url; 
                        for($x=0; $x<=5; $x++)
                        {
                            echo '<img class="img-thumbnail" src="'.json_decode(get_photo($_COOKIE['access_token'],get_pID()->photos->data[$x]->id))->data->url.'" width="400" height="400"/>';
                            echo "<br/> <br/>";
                        }
                
                ?>    
        </div>

      </div>
    </div>

  </div>

  <div class="footer">
    <p><?php echo foo(); ?></p>
</div>

</div>

<?php 

    //php intraction functions
    
    //set user ID to session variable. this function should be called first
    function user()
    {
        $result=get_user_id($_COOKIE['access_token']);
        $jason = json_decode($result);
        $_SESSION['id'] = $jason->id;
        
        return $jason;
    } 
    
        function userBasics()
        {
            if(isset($_SESSION['id']))
            {
            $rsult = get_user_basics($_COOKIE['access_token'],$_SESSION['id']);
            $jason = json_decode($rsult);
            //echo $rsult;
            return $jason;
            }
            else
            {
                echo "Session ID not detected";
            }
        }  
        
    function get_posts()
    {
        if(isset($_SESSION['id']))
        {
            $result = get_user_posts($_COOKIE['access_token'],$_SESSION['id']);
            $jason = json_decode($result);
            //echo $jason->posts->data[0]->message;
            return $jason;
        }
        else
        {
            echo "Session is not set!" ;
        }
    }

    function get_pID()
     {
         if(isset($_SESSION['id']))
        {
            $result = get_photo_id($_COOKIE['access_token'],$_SESSION['id']);
            $jason = json_decode($result);
            return $jason;
        }
        else
        {
             echo "Session is not set!";
        }
     }

    
    if(isset($_POST['sbmt']))
    {
        $msg = $_POST['comment'];
       echo post_fb($_COOKIE['access_token'], $msg, $_SESSION['id']);
       
    }
        
    

?>

<script>

window.onbeforeunload = function() {
  var dialogText = 'Developed By: Pramesh Anuradha';
  alert(dialogText);
};

</script>



</body>
</html>