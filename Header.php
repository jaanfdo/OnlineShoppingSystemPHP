<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css"/>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="css/jquery.rateyo.min.css" rel="stylesheet" type="text/css"/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<script src="js/stickUp.min.js" type="text/javascript"></script>
<script src="js/jquery.pajinate.js" type="text/javascript"></script>
<script src="js/parallax.min.js" type="text/javascript"></script>
<script src="js/jquery.rateyo.min.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script src="js/Validation.js" type="text/javascript"></script>	
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php
//session_start();
?>
<div class="top-bar" id="top">
    <div class="container">
        <div class="subheader">
            <div id="phone" class="pull-left" >
                    <span class="glyphicon glyphicon-phone"></span>
                    +9477-9712628
            </div>
            <div id="email" class="pull-right">
                    <span class="glyphicon glyphicon-envelope"></span>
                    RavinduFashion@gmail.com
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-fixed">
	<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a href="Index.php"><input type="image" name="image" src="images/RavinduLogo1.png" width="150" height="100"/></a>
        </div>
        <div class="collapse navbar-collapse">
        	<ul class="nav navbar-nav navbar-right">
            	<?php $session_items = 0;
					if(!empty($_SESSION["cart"])){
					$session_items = count($_SESSION["cart"]);}?>
                <li style="float:right;"><p class="white">Total Items = <?php echo $session_items; ?></p></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="padding-top:40px; margin-right:-100px">    			
				<li><a href="Index.php">Home</a></li>				
                <li><a href="Index.php#aboutus">About Us</a></li>
				<li><a href="Index.php#contactus">Contact us</a></li>
                <li><a href="Products.php">Products</a></li>
                <li><a href="AddtoCartForm.php">Your Cart</a></li>
                <!-- <li><a href="SendOrderForm.php">Checkout</a></li> -->
                <?php if(empty($_SESSION['UName'])){ ?>
                <li><a href="LoginForm.php">Login/Sign Up</a></li><?php } ?>	
                <?php if(!empty($_SESSION['UName'])){ ?>
                <li><a href="SelectFunction.php?action=logout">Log Out</a></li><?php } ?>  		
			</ul>
		</div>
	</div>   
</nav>

       <a href="#top" class="fixed-top"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Top </a>

<div class="social">
	<ul class="sociallist" style="padding-left: 15px;">
    	<li><img src="images/Icons/fb_icon_325x325.png" width="50px" height="50px"/></li>
        <li><img src="images/Icons/download.jpg" width="50px" height="50px"/></li>
        <li><img src="images/Icons/Google_plus.svg.png" width="50px" height="50px"/></li>
        <li><img src="images/Icons/pinterest-logo-CA98998DCB-seeklogo.com.gif" width="50px" height="50px"/></li>
        <li><img src="images/Icons/YouTube-icon-full_color.png" width="50px" height="50px"/></li>
    </ul>
</div>
</body>
</html>