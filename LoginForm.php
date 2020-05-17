<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>

</head>

<body>
<?php include('Header.php'); ?>

<div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3" style="padding: 30px 0px 10px 10px;">
            <ul class="nav nav-tabs nav-justified">
            	<li class="active"><a href="#login" name="login" data-toggle="tab" role="tab">LOG IN</a></li>
                <li><a href="#signup" name="signup" data-toggle="tab" role="tab">REGISTRATION</a></li>	
            </ul>
            <div class="tab-content">
                <div id="login" class="tab-pane fade in active">
                    <div class="col-sm-12">
                    	<form action="SelectFunction.php?action=login" method="post" name="Login" onsubmit="return LoginValidation();">
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
                        	<p class="text-success"><?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==3)){
                        	echo $_SESSION['FirstName']; echo' Login Success!'; } ?>
                            </p>
                            <p class="text-danger"><?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==4)){
                        	echo 'Error Login!'; }	?>                          
                            </p>
                        </div>
                        <div class=" form-group pull-right" style="margin-top:30px; margin-right:50px; margin-bottom:20px;">
                            <a href="Forget.php"> * Forgotten your password   </a>
                        </div> 
                        </form>                                
                    </div>
                </div>
                <div id="signup" class="tab-pane fade">
                    <div class="col-sm-12">
                    <p class="text-center"><em><strong>It's free and always will be.</strong></em></p>        
                    <form action="SelectFunction.php?action=signup" method="post" name="Reg" onsubmit="return RegValidation();">
                    <div class="form-horizontal" style="margin-left:35px;">
                        <div class="form-group">
                        	<label class="col-sm-4 control-label">First Name</label>
                            <div class="col-sm-7">
                                <input type="text" name="FName" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Last Name</label>
                            <div class="col-sm-7">
                            <input type="text" name="LName" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">User Name</label>
                            <div class="col-sm-7">
                        	<input type="text" name="UName" class="form-control" placeholder="User name">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-7">
                        	<input type="password" name="Pass" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-7">
                        	<input type="text" name="Email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Telephone</label>
                            <div class="col-sm-7">
                        	<input type="text" name="TpNo" class="form-control" placeholder="Telephone">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Address</label>
                            <div class="col-sm-7">
                        	<textarea name="Address" rows="3" class="form-control" placeholder="Your Personal Address..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-sm-5 col-sm-offset-7">
                        		<input name="submit" type="submit" class="btn btn-default" value="Sign Up"/>
                            </div>
                        </div>
                        <div class="form-group">
                        	<p class="text-success"><?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==1)){
                        echo 'Registration is Success!';
                        } ?></p>
                        	<p class="text-danger"><?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==2)){
                        echo 'Registration is Failed!';
                        } ?></p>
                            <p class="text-danger"><?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==5)){
                        echo 'User Name Allready exist!';
                        } ?></p>
                        </div>
                    	
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<?php include('Footer.php'); ?>

</body>
</html>
