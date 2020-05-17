<?php
//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration Form</title>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css"/>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>

<style>
.control-label{
	color:rgba(255,255,255,1.00);
}
</style>
</head>

<body>

<div class="background four">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3" style="padding:30px 30px 10px 30px; margin-top:70px; margin-bottom:20px; background-color:rgba(0,0,0,0.60); overflow:hidden;">
            	<div class="col-sm-12">
            		<h1 class="white" style="text-align:center;">Administration Login</h1>
                    <hr/>
            	</div>
                <div class="col-sm-12">
                    <form action="SelectFunction.php?action=login" method="post" name="addtocart" onsubmit="return validation();">
                    <div  class="form-horizontal" style="margin-left:35px;">
                        <div class="form-group">
                            <input name="UName" class="form-control input-lg" type="text" autofocus placeholder="User Name..."/>
                        </div>
                        <div class="form-group">
                            <input name="Pass" class="form-control input-lg" type="password" placeholder="Password..." />
                        </div>                        
                        <div class="form-group">
                            <input type="checkbox"> Remember me
                        </div>
                        <div class="form-group">
                            <input name="submit" class="btn btn-default" type="submit" value="Login"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-danger"><?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==5)){
                        echo 'Error Login!'; }	?>                          
                        </p>
                    </div>
                    <div class=" form-group pull-right" style="margin-top:30px; margin-right:50px; margin-bottom:20px;">
                        <a href="Forget.php"> * Forgotten your password   </a>
                    </div> 
                    </form>                                
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
