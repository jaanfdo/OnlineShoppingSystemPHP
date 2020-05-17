<?php 
//session_start();
require_once('Functions.php');
$class = new functions();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ravindu Fashion Products</title>

</head>

<body>
<?php include('Header.php'); ?>

<div class="container" id="products">
	<div class="row">
        <div class="col-sm-2 nav-pills-m">
            <h3 class="well white">Categories</h3>
            <ul class="nav nav-pills nav-stacked">
            	<?php $categorypro=$class->CategoryPro();
					while($row=mysqli_fetch_array($categorypro)){?>
                <li><a href="Products.php?Category=<?php echo $row["Category"];?>"><?php echo $row["Category"]; ?></li>
                <li class="nav-divider"></li>
                <?php } ?>
            </ul>
            <h3 class="well white">Brands</h3>
            <ul class="nav nav-pills nav-stacked">
            	<?php $brandpro=$class->BrandPro();
					while($row=mysqli_fetch_array($brandpro)){?>
                <li><a href="Products.php?Brand=<?php echo $row["Brand"]; ?>"><?php echo $row["Brand"]; ?></a></li>
                <li class="nav-divider"></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-sm-10">              
            <div class="col-sm-12">
                <h2>Products</h2>
                <p>Products for Every Occasion </p>
                <p>Keep it classic with our selection of casual tshirts and shirts. Fresh designs come in longline styles and khaki tones, while brands adidas Originals and Ellesse bring the vintage vibes.</p>
            </div>          
        </div>
        <div class="col-sm-10">
        	<form action="Products.php" method="post">
            <div class="col-sm-8" style="padding-top:10px;">
                <input type="search" id="txtSearch" name="search" placeholder="Search...." class="form-control"/>
            </div>
            <div class="col-sm-2">
                <input type="submit" name="submit" id="btnSearch" class="btn btn-default" value="Search"/>
            </div> 
            </form>                             
        </div>
        <div class="col-sm-10">
            <hr />
        </div>
        <div class="col-sm-10">
        	<div class="col-sm-6">
            	<div class="page_navigation"></div>
            </div>
            <div class="col-sm-6">
            	<form action="Products.php" method="post">
                <div class="col-sm-8" style="padding-top:10px;">
                    <select name="sorting" class="form-control pull-right">
                        <option value="Latest Products">Latest Products</option>
                        <option value="Recommended Products">Recommended Products</option>
                        <option value="Popular Products">Popular Products</option>
                    </select>
                </div>
                <div class="col-sm-4">
                	<input type="submit" name="submit2" class="btn btn-default" value="Sorting"/>
                </div>
                </form>
            </div>
        </div>
        <div class="col-sm-10">
            <hr />
        </div>                        
        <div class="col-sm-10">       
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active">
                    <div id="paging">
                    	<div class="page_navigation"></div>
                        <ul class="content">
                        <?php 
						$Brand = ""; $Category = "";$search = "";	$sortings = "";	
                            if(isset($_REQUEST['Brand'])){ $Brand=$_REQUEST['Brand'];}				
							if(isset($_REQUEST['Category'])){ $Category=$_REQUEST['Category'];}
							if(isset($_POST['submit2'])){ $sortings=$_POST['sorting'];}					
							if(isset($_POST['submit'])){ $search = $_POST['search'];}
                            
                            $disproducts=$class->DisProducts($search, $sortings, $Category, $Brand);
                                while($row=mysqli_fetch_array($disproducts)){
                            ?>
                            <li>
                            <div class="img-responsive image" style="margin:10px;">
                                <div class="productinfo text-center text-capitalize">
                                    <img src="<?php echo $row['Picture']; ?>"/>
                                    <h4 class="blue">Rs <?php echo $row['Price']; ?></h4>
                                    <p><?php echo $row['PName']; ?></p>
                                </div>
                                <div class="product-overlay text-center">
                                    <div class="overlay-content">                                 	
                                        <a href="SalesRequestForm.php?PID=<?php echo $row ['PID']; ?>" class="btn btn-default">View</a>
                                    </div>
                                </div>
                            </div>
                            </li> 
                            <?php } ?>
                         </ul>
                     </div>
                </div>
            </div>        
    	</div>
    </div>
</div>

<?php include('Footer.php'); ?>

</body>
</html>