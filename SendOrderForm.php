<?php
require_once 'Functions.php';
$class = new functions();

$session_qty = 0;
$invoiceno = $class->InvoiceNo();
$_SESSION['InvoiceNo'] =$invoiceno ;

$invoicedate = date("Y-m-d");
$_SESSION['InvoiceDate'] = $invoicedate;

$fullname = "";
$add = "";
if(!empty($_SESSION['UName'])){
$fullname = $_SESSION['FirstName']; + " " + $_SESSION['LastName'];
$add = $_SESSION['Address'];}
$cartno = $_SESSION['CartNo'];
$cartdate = $_SESSION['CartDate'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Check Out</title>

<style>
p{
	font-weight:bold;	
}
</style>
</head>
<body>
<?php include('Header.php'); ?>

<div class="container">
    <div class="col-sm-12">
        <h1 class="text-center">Check Out You Order</h1>
    </div>
    <form action="SelectFunction.php?action=checkout" method="post" name="addtocart" enctype="multipart/form-data" onsubmit="return validation()">
    <div class="col-sm-4">
        <div class="text-left text-strong" style="padding:10px 10px 10px 20px;">
            <div class="form-group">
                <p class="text-capitalize">Name : <span class="blue"><?php echo $fullname; ?></span></p>
                <p>Address : <span class="blue"><?php echo $add; ?></span></p>
                <p>Shopping Cart No: <span class="blue"> <?php echo $cartno; ?></span></p>
                <p>Date : <span class="blue"> <?php echo $cartdate; ?></span></p>
            </div>                
        </div>
    </div>
    <div class="col-sm-3 col-sm-offset-5">
    	<div class="text-right" style="padding:10px 20px 10px 10px;">
            <div class="form-group" style="padding-left:30px;">
                <p>Invoice No : <span class="blue"><?php echo $invoiceno; ?></span></p>
                <p>Date : <span class="blue"><?php echo $invoicedate; ?></span></p>               
            </div>
        </div>
    </div>
    <div class="col-sm-12">
    	<table class="table">
                <tr>
                	<th>Image</th>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>                
               <?php
					if(isset($_SESSION["cart"])){
						$totalamount = 0;
    				$item_total = 0;
                   foreach ($_SESSION["cart"] as $items){ 
				   $_SESSION['PID'] = $items['PID'];
					$totalamount += $items ["Price"] * $items["Qty"];
                ?>
                <tr>
                	<td><img src="<?php echo $items['Picture'];  ?>" width="50" height="60"/> </td>
                    <td><?php echo $_SESSION['PName'] = $items['PName'];  ?> </td>
                    <td><span class="blue"><?php echo $_SESSION['Size'] = $items['Size'];  ?> </span></td>
                    <td><?php echo "Rs " .$_SESSION['Price'] = $items['Price'];  ?> </td>
                    <td class="col-sm-2"><?php echo $_SESSION['RQty'] = $items['Qty']; ?></td>
					<?php $amount = 0;
                    $amount = $items ["Price"] * $items["Qty"]; 
					$_SESSION['amount'] = $amount; ?>
                    <td><span class="blue"><?php   echo "Rs " .$amount ?></span></td>
                </tr>
                <?php } }?>
          </table> 
    </div>
    <div class="form-horizontal"> 
        <div class="col-sm-5" style="padding-left:50px;">
        	<div class="form-horizontal blue">
            	<div class="form-group">
                	<input type="radio" value="PayPal" > PayPal
                </div>
                <div class="form-group">
                	<input type="radio" value="Credit Card"> Credit Card
                </div>
                <div class="form-group">
                	<input type="radio" value="On Delivery"> On Delivery
                </div>
            </div>
        </div>
        <div class="col-sm-7" style="padding-right:30px;">
            <div class="text-right">
                <div class="form-group">
					<?php $session_items = count($_SESSION["cart"]); 
                        $_SESSION['Items'] = $session_items;
                        $session_qty += $items["Qty"];
                        $_SESSION['Qty'] = $session_qty;
                    ?>
                	<p>No of Products : <span class="badge white"><?php echo $session_items; ?></span></p>
                	<p>No of Quantities : <span class="badge white"><?php echo $session_qty; ?></span></p>
                </div>
            </div>
            <div class="text-right">
            	<div class="form-group">
                    <p>Shipping Cost : <strong class="blue">Rs 100.00</strong></p>
					<?php  				 
					 $_SESSION['totalamount'] = $totalamount; ?>
                    <h4 class="black">Total Amount : <span class="blue text-strong"><?php echo "Rs ". number_format($totalamount ,2); ?></span></h4>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-5 pull-right">
                <p class="text-success">
                <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==1)){
                    echo 'Successfully Send the Order';
                    } ?>
                </p>
                <p class="text-danger">
                    <?php
					if(isset($_REQUEST['err'])&&($_REQUEST['err']==2)){
					echo 'Order is not complete';
					}
					if(isset($_REQUEST['err'])&&($_REQUEST['err']==3)){
					echo 'You Can not Buy Products, First You have to Login to your account ';
					echo '<a href="LoginForm.php">Click Here....</a>';
					} 
					if(isset($_REQUEST['err'])&&($_REQUEST['err']==4)){
					echo 'User can buy 5 Items in One time. Delete Some Items. ';
					echo '<a href="AddtoCartForm.php">Click Here....</a>';
					}?>
                </p>     
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-6">
                	<div class="pull-left">
                		<a href="AddtoCartForm.php" class="btn btn-default pull-right">Shopping Cart</a>
                    </div>
                </div>
                <div class="col-sm-6">
                	<div class=" pull-right">
                    	<input type="submit" name="submit" value="Send Order" class="btn btn-default"/>
                    </div>
                </div>
            </div>    
    	</div>
    </form>
    </div>
</div>



<?php 
include('Footer.php');
?>
</body>
</html>