<?php
require_once('dbconn.php');
$db_handle = new DBController();
require_once 'Functions.php';
$class = new functions();
$PID=$_REQUEST['PID'];
$viewproduct=$class->ViewProduct($PID);
$row=mysqli_fetch_assoc($viewproduct);
$viewproduct=$class->AddtoCartInsert($PID);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product View Form</title>
</head>
<body>

<?php include('Header.php'); ?>

<div class="container" style="margin-bottom:20px; margin-top:20px;">
	<div class="row">
        <form method="post" action="SalesRequestForm.php?PID=<?php echo $row["PID"]; ?>" enctype="multipart/form-data">
            <div class="frame">
                <div class="col-sm-4 col-sm-offset-2" style="border:1px solid rgba(223,223,223,1.00);">
                    <h2 class="text-capitalize black"><?php echo $row['PName']; ?></h2>
                    <hr/>
                    <div class="img-responsive ">
                        <img src="<?php echo $row['Picture']; ?>" width="350" height="450">
                        <h4 class="product-overlay-bar-mini"><?php echo $pid = $row['PID']; $_SESSION['pid'] = $pid;?></h4>
                    </div>
                    <a href="Products.php" class="btn btn-default">Continue Shopping</a>
                </div>
                <div class="col-sm-4" style="border:1px solid rgba(223,223,223,1.00);">                    
                    <h1 class="text-capitalize text-center"><?php echo $row['Brand']; ?></h1>
                    <div id="rateYo"></div><div class="counter" style="float: left; font-weight: bold; margin-left: 10px; margin-top: 7px;"></div>
                    <p class="well white"><strong>Fit: </strong><?php echo $row['Fits']; ?> | <strong>Neck Lines: </strong><?php echo $row['NeckLine']; ?></p>
                    <h1 class="blue form-group" style="border-bottom:1px solid rgba(223,223,223,1.00);"><strong>Rs </strong><?php echo $row['Price']; ?>.00</h1>
                    <div class="col-sm-12 form-group" >
                        <strong class="col-sm-3 black">Color:</strong>
                        <div class="col-sm-5">
                            <select class="form-control input-sm">
								<option value="<?php echo $row['Color']; ?>"><?php echo $row['Color']; ?></option>
							</select>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <strong class="col-sm-3 black">Size:</strong>
                        <div class="col-sm-5">
                            <select class="form-control input-sm">
                            	<option value="<?php echo $row['Size']; ?>"><?php echo $row['Size']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <strong class="black">Available Quantity: </strong><span class="badge"><?php echo $row['Quantity']; ?></span>
                    </div>
                    <div class="col-sm-12 form-group">
                        <strong class="col-sm-4 black text-right">Quantity:</strong>
                        <div class="col-sm-3">
                            <select class="form-control input-sm" name="Qty">
                            	<option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12" style="border-top:1px solid rgba(223,223,223,1.00);"><input type="submit" id="modal" class="btn btn-default pull-right" value="Add to Cart"  data-toggle="modal" data-target="#myModal"/></div>
                </div>
            </div>
    	</form>
    </div>
</div>
<div class="container"> 
    <div class="col-sm-12"> 
        <div class="line-header">
            <div class="text-center">
                <h3 class="blue">LATEST PRODUCTS</h3>
            </div>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
      </div>
      <div class="modal-body">
        <?php
			if(isset($_SESSION["cart"])){
			$item_total = 0;
		?>
        <div class="row">
        <div class="col-sm-12">
        	<?php foreach ($_SESSION["cart"] as $items){  
			$totalamount = 0;
             $totalamount += $items ['Price'] * $items['Qty']; 
			?>
            <div class="col-sm-2">
            	<img src="<?php echo $items['Picture'];  ?>" width="50" height="60"/>
            </div>
            <div class="col-sm-10">
                <p><?php echo $items['PName'];  ?></p>
                <div class="col-sm-3">
                <p>Size: <?php echo $items['Size'];  ?> </p>
                </div>
                <div class="col-sm-4">
                <p>Quantity: <?php echo $items['Qty']; ?></p>
                </div>
                <?php
                $amount = 0;
                $amount = $items ['Price'] * $items['Qty']; 
                ?>
                <p class="blue col-sm-4"><?php   echo "Rs:" .$amount ?></p>     
            </div>
             <?php } ?>
            <div class="col-sm-12">						
                <p class="pull-right">Total : <span class="blue" id="totalamount"><?php echo "Rs ". number_format($totalamount,2); ?> </span></p>
            </div>
        </div> 
        </div>  
        <?php } ?> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">Shopping Cart</button>
        <button type="button" class="btn btn-primary">Check Out</button>
      </div>
    </div>
  </div>
</div>

<?php include('Footer.php'); ?>

<script>
$("form").submit(function(e){
	var id = $(obj).attr("id");
    e.preventDefault();
    $.ajax({
        type: 'POST',
        data: 'id='+id,
        url : 'SalesRequestForm.php',
        success : function(data){
            $("#myModal").modal("show");
        },
    });
    return false;
});
</script>

</body>
</html>
