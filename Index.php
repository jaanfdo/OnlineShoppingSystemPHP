<?php
//session_start();
require_once 'Functions.php';
$class = new functions();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ravindu Fashion Online Order System</title>
</head>

<body>
<?php include('Header.php'); ?>

<div class="row" style="margin:0px;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="item active">
        <div class="carousel-caption">
          <h1>Fashion</h1>
          <p style="font-size:20px;">Fashion is about dressing according to what's fashionable. Style is more about being yourself.</p>
          <a class="btn btn-lg btn-default" href="#products" role="button" style="margin: 20px;">View Products</a> 
        </div>
      </div>

      <div class="item">
        <div class="carousel-caption">
          <h1>Fashion</h1>
          <p style="font-size:20px;">Fashion is about dreaming and making other people dream.</p>
            <a class="btn btn-lg btn-default" href="#latest" role="button" style="margin: 20px;">View Products</a>
        </div>
      </div>
    
      <div class="item">
        <div class="carousel-caption">
          <h1>Fashion</h1>
          <p style="font-size:20px;">Be Yourself, Nobody Can do It Better.</p>
            <a class="btn btn-lg btn-default" href="#recommended" role="button" style="margin: 20px;">View Products</a>
        </div>
      </div>
     
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    </a>
    </div>
</div>
<div class="container">
	<h1 class="text-center" style="font-size:42px; color:rgba(0,0,0,1.00);">Welcome to <span class="menuname">Ravindu Fashion</span></h1>
    <p class="text-center">Online shopping on Ravindu Fashion - Lowest prices on all products</p>
</div>
<div class="background one" id="products">
    <div class="container">
    	<div class="col-sm-12">
            <div class="line-header">
            	<div class="text-center">
                    <h1 class="white">OUR PRODUCTS</h1>
                    <h4 class="black">Special Offers</h4>
                </div>
            </div>	
        </div>
        <div class="col-sm-12">
        <div class="frame">
        	<div class="col-sm-3 col-xs-6">
                <div class="img-responsive">
                    <img src="images/Product Slider/Products/Denim1.jpg" width="200" height="220">
                    <h3 class="product-overlay-bar">Denims</h3>
                </div>
                <?php $tbldata = "Denim";
						$latestpro=$class->LatestProduct($tbldata);
						$row= mysqli_fetch_array ($latestpro);?>
                <a href="Products.php?Category=<?php echo $row ['Category']; ?>" class="btn btn-default btn-sm pull-right">See Denims >> </a>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="img-responsive">
                    <img src="images/Product Slider/Products/Tshirt2.jpg" width="200" height="220">    
                    <h3 class="product-overlay-bar">Tshirts</h3>  
                </div>
                <?php $tbldata = "Tshirt";
						$latestpro=$class->LatestProduct($tbldata);
						$row= mysqli_fetch_array ($latestpro);?>
                <a href="Products.php?Category=<?php echo $row ['Category']; ?>" class="btn btn-default btn-sm pull-right">See Tshirts >> </a>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="img-responsive">
                    <img src="images/Product Slider/Products/Shirt2.jpg" width="200" height="220">  
                    <h3 class="product-overlay-bar">Shirts</h3>  
                </div>
                <?php $tbldata = "Shirt";
						$latestpro=$class->LatestProduct($tbldata);
						$row= mysqli_fetch_array ($latestpro);?>
                <a href="Products.php?Category=<?php echo $row ['Category']; ?>" class="btn btn-default btn-sm pull-right">See Shirts >> </a>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="img-responsive">
                    <img src="images/Product Slider/Products/Short1.jpg" width="200" height="220"> 
                    <h3 class="product-overlay-bar">Shorts</h3>   
                </div>
                <?php $tbldata = "Short";
						$latestpro=$class->LatestProduct($tbldata);
						$row= mysqli_fetch_array ($latestpro);?>
                <a href="Products.php?Category=<?php echo $row ['Category']; ?>" class="btn btn-default btn-sm pull-right">See Shorts >> </a>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="container" id="latest"> 
    <div class="col-sm-12"> 
        <div class="line-header">
            <div class="text-center">
                <h1>LATEST PRODUCTS</h1>
            </div>
            <h4 class="text-center col-sm-12 black">Products for Every Occasion</h4>
        </div>
    </div>
    <div class=" col-sm-12">
        <div class="frame">
            <div class="latest-product">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tshirt" name="tshirt" data-toggle="tab" role="tab">T-Shirt</a></li>
                        <li><a href="#shirts" name="shirts" data-toggle="tab" role="tab">Shirts</a></li>
                        <li><a href="#denims" name="denims" data-toggle="tab" role="tab">Denims</a></li>
                        <li><a href="#shorts" name="shorts" data-toggle="tab" role="tab">Shorts</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tshirt" role="tabpanel">
                    	<?php
						$tbldata = "Tshirt";
						$latestpro=$class->LatestProduct($tbldata);
						while($row= mysqli_fetch_array ($latestpro)){
						?>
                        <div class="col-sm-3 col-xs-6">
                            <div class="img-responsive">
                                <div class="productinfo text-center">
                                    <img src="<?php echo $row['Picture']; ?>" height="200" width="180"/>
                                    <h2> Rs<?php echo $row['Price']; ?></h2>
                                    <p><?php echo $row['PName']; ?></p>
                                    <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default add-to-cart">View</a>
                                </div>                               
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="shirts" role="tabpanel">
                    	<?php
						$tbldata = "Shirt";
						$latestpro=$class->LatestProduct($tbldata);
						while($row= mysqli_fetch_array ($latestpro)){
						?>
                        <div class="col-sm-3 col-xs-6">
                            <div class="img-responsive">
                                <div class="productinfo text-center">
                                    <img src="<?php echo $row['Picture']; ?>" height="200" width="180"/>
                                    <h2> Rs<?php echo $row['Price']; ?></h2>
                                    <p><?php echo $row['PName']; ?></p>
                                    <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default add-to-cart">View</a>
                                </div>                               
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="denims" role="tabpanel">
                    	<?php
						$tbldata = "Denim";
						$latestpro=$class->LatestProduct($tbldata);
						while($row= mysqli_fetch_array ($latestpro)){
						?>
                        <div class="col-sm-3 col-xs-6">
                            <div class="img-responsive">
                                <div class="productinfo text-center">
                                    <img src="<?php echo $row['Picture']; ?>" height="200" width="180"/>
                                    <h2> Rs<?php echo $row['Price']; ?></h2>
                                    <p><?php echo $row['PName']; ?></p>
                                    <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default add-to-cart">View</a>
                                </div>                               
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="shorts" role="tabpanel">
                    	<?php
						$tbldata = "Short";
						$latestpro=$class->LatestProduct($tbldata);
						while($row= mysqli_fetch_array ($latestpro)){
						?>
                        <div class="col-sm-3 col-xs-6">
                            <div class="img-responsive">
                                <div class="productinfo text-center">
                                    <img src="<?php echo $row['Picture']; ?>" height="200" width="180"/>
                                    <h2> Rs<?php echo $row['Price']; ?></h2>
                                    <p><?php echo $row['PName']; ?></p>
                                    <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default add-to-cart">View</a>
                                </div>                               
                            </div>
                        </div>
                        <?php } ?>
                    </div>                
                </div>
            </div>
        </div> 
    </div>   
</div>
<div class="background three">
	<div class="container">
    	<div class="soon">
    		<h2 class="text-center">Mega Deal Of the Week</h2>
        	<h4>Coming Soon Don't Miss Out</h4>   
       	</div>	
    </div>
</div>
<div class="middle" id="recommended">
    <div class="container">
    	<div class=" col-sm-12">
            <div class="line-header">
                <div class="text-center">
                    <h1 class="blue">RECOMMENDED PRODUCTS</h1>
                </div>
                <h4 class="text-center col-sm-12 black">Lowest prices on all products</h4>
            </div>
        </div>
        <div class=" col-sm-12"> 
        	<div class="frame">  
                <div id="myCarousel-min" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                        	<?php
							$tbldata = "Tshirt";
							$recommendedpro=$class->RecommendedProduct($tbldata);
							while($row= mysqli_fetch_array ($recommendedpro)){
							?>	
                            <div class="col-sm-3 col-xs-6">
                                <div class="img-responsive">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo $row['Picture']; ?>" height="200" width="180"/>
                                        <h2> Rs<?php echo $row['Price']; ?></h2>
                                        <p><?php echo $row['PName']; ?></p>
                                        <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default add-to-cart">View</a>     
                                    </div>                             
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="item">	
                            <?php
							$tbldata = "Shirt";
							$recommendedpro=$class->RecommendedProduct($tbldata);
							while($row= mysqli_fetch_array ($recommendedpro)){
							?>	
                            <div class="col-sm-3 col-xs-6">
                                <div class="img-responsive">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo $row['Picture']; ?>" height="200" width="180"/>
                                        <h2> Rs<?php echo $row['Price']; ?></h2>
                                        <p><?php echo $row['PName']; ?></p>
                                        <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default add-to-cart">View</a>     
                                    </div>                             
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="item">
                        	<?php
							$tbldata = "Denim";
							$recommendedpro=$class->RecommendedProduct($tbldata);
							while($row= mysqli_fetch_array ($recommendedpro)){
							?>	
                            <div class="col-sm-3 col-xs-6">
                                <div class="img-responsive">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo $row['Picture']; ?>" height="200" width="180"/>
                                        <h2> Rs<?php echo $row['Price']; ?></h2>
                                        <p><?php echo $row['PName']; ?></p>
                                        <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default add-to-cart">View</a>     
                                    </div>                             
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="item">
                        	<?php
							$tbldata = "Short";
							$recommendedpro=$class->RecommendedProduct($tbldata);
							while($row= mysqli_fetch_array ($recommendedpro)){
							?>	
                            <div class="col-sm-3 col-xs-6">
                                <div class="img-responsive">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo $row['Picture']; ?>" height="200" width="180"/>
                                        <h2> Rs<?php echo $row['Price']; ?></h2>
                                        <p><?php echo $row['PName']; ?></p>
                                        <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default add-to-cart">View</a>     
                                    </div>                             
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </a>		
                </div>
            </div>
        </div>
    </div>
</div>

<div class="background two">
    <div class="container"> 
        <div class="col-sm-12">
            <div class="line-header">
                <div class="text-center">
                    <h1 class="white">TOP BRANDS</h1>
                </div>
                <p class="text-center col-sm-12 white">Following is the list of our top clothing brands which are highly popular among the innumerable fashion lovers around the globe.
                </p>
            </div>
        </div>            
        <div class="col-sm-12">
            <ul class="brands">
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/562px-Adidas_Logo.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/2000px-Diesel_logo.svg.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/8991be25fb15749b8edba8916a399422.10969.jpeg" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/abercrombieandfitch_logo.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/American-Eagle-Outfitters-logo-vector.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/calvinklein.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/CS-AEROPOS_fp01.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/hollister_california-logo.jpg" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/Levi's_logo.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/Tommy-Hilfiger-psd61218.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/lacoste-logo.png" width="150" height="100"></li>
                <li class="col-sm-2 col-xs-4"><img src="images/Product Slider/Brands/1979_PUMA no1 logo.jpg" width="150" height="100"></li>
            </ul>
        </div>
    </div>
</div>
<div class="middle" style="background-color:#FFFFFF;">
    <div class="container" id="aboutus">
    	<div class="col-sm-12">
            <div class="line-header">
                <div class="text-center">
                    <h1>ABOUT US</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4 frame">
        	<div class="img-circle">
        		<img src="images/Kandy-City-Centre-97_5.jpg">
            </div>
        </div>
        <div class="col-sm-8">
            <div class="frame">
            <h2>What is Ravindu Fashion?</h2>
        
            <h5>Online shopping on Ravindu Fashion - Lowest prices on all products</h5>
            <p>Ravindufashion.lk is the latest online marketplace in the Sri Lanka where buyers and sellers meet to make awesome deals across all major product categories such as men fashion only all at the most affordable prices. Ravindu Fashion is the perfect platform for businesses, big and small, and entrepreneurs to get more exposure and gain more customers. It is also an excellent advertising channel, and we offer safe and secure transactions between buyers and sellers. Ravindu Fashion's local and global teams are working around the clock to provide the best online buying experience to people across the Sri lanka. With Ravindu Fashion, online buying and selling has never been easier.
        Online shopping in Sri Lanka has never been so easy. Sign up for our weekly newsletter and be the first one to know about the hottest deals. Take advantage of our amazing discounts and revolutionize the way you shop online! Ravindu Fashion is a venture of Rocket Internet in Sri Lanka along with Carmudi and Lamudi.</p>
            </div>
        </div>
    </div>
</div>
<div style="background-color:rgba(223,223,223,1.00);">
    <div class="container" id="contactus" style=" padding-bottom:80px;">
        <div class="col-sm-12">
            <div class="line-header">
                <div class="text-center">
                    <h1 class="blue">CONTACT US</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <input type="image" src="images/map.PNG" name="image" width="728" height="434"/>
        </div>
        <div class="col-sm-4">
            <h3>Contact us </h3>
            <p><span class=""></span> 123 main road Negombo, Srilanka</p>
            <p><span class="glyphicon glyphicon-phone"></span> +94779712628</p>
            <p><span class="glyphicon glyphicon-globe"></span><a href="Index.php"> www.zeus.com</a></p>            
            <form action="SelectFunction.php?action=contactus" method="post" name="Contact" id="contactus" onsubmit="return ContactUsValidation()">
              <div class="form-group">
                <input type="text" name="Name" class="form-control" placeholder="Your Name..."  />
              </div>
              <div class="form-group">
                <input type="email" name="Email" class="form-control" placeholder="Your Email..."  />
              </div>
              <div class="form-group">
                <textarea name="Message" rows="4" class="form-control" placeholder="Write down your message..."></textarea>
              </div>
              <div class="form-group" >
              <input type="submit" name="submit" class="btn btn-default" value="Send"/>
              </div>
            </form>
            <p class="text-success"><?php
			if(isset($_REQUEST['err'])&&($_REQUEST['err']==1)){
			echo 'Thanks for your feedback!';
			} ?></p>
			<p class="text-danger"><?php
			if(isset($_REQUEST['err'])&&($_REQUEST['err']==2)){
			echo 'Error Email Send!';
			} ?> </p>
        </div>
    </div>
</div>

<?php include('Footer.php'); ?>

</body>
</html>
