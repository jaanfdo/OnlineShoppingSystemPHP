<?php 
require_once 'Functions.php';
$class = new functions();	

$UName= "";
if(isset($_POST['submit'])){
	$UName= $_POST['UName'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forget Password</title>
</head>
<body>

<?php 
include('Header.php');
?>
<div class="container" style="min-height:400px;">
	<div class="col-sm1-12">
        <div class="col-sm-offset-1">
            <h1>Forgot your password?</h1>
        </div>
        <hr/>
    </div>
    <div class="col-sm-12">
    	<p><strong> * Enter Your user name below and we'll send you password</strong></p>
    </div>
    <div class="col-sm-6">
        <form name="Forget" action="Forget.php" method="POST" onsubmit="return validation()">
        	<div class="form-horizontal">
            	<div class="form-group">
                    <label class="col-sm-4 control-label">User Name : </label>
                    <div class="col-sm-7">
                        <input type="text" name="UName" class="form-control">
                    </div>
            	</div>
                <div class="form-group">
                	<div class="col-sm-offset-8">
                		<input  type="submit" name="submit" value="FIND" class="btn btn-default"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <?php
		$sql=$class->ForgotPassword($UName);
    	$value= mysqli_fetch_array($sql); 
		if(!empty($value)){
		?>
    <div class="col-sm-6">
    	<div class="form-horizontal">
            <div class="form-group">
    			<label class="col-sm-4 control-label">User name : </label>
                <div class="col-sm-8">
            		<input name="UName" type="text" class="form-control" value="<?php echo $value['UName']; ?>">
                </div>
            </div>
        </div>
        
        <div class="form-horizontal">
            <div class="form-group">       
				<label class="col-sm-4 control-label">Password : </label>
                <div class="col-sm-8">
                	<input name="Pass" type="text" class="form-control" value="<?php echo $value['Pass']; ?>">
                </div>
        	</div>
        </div>
    </div>
    <?php } ?>
</div>

    		        
<?php
include('Footer.php');
?>

</body>
</html>