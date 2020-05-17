<?php
session_start();
$UserLevel=$_SESSION['UserLevel'];
if((!isset ($_SESSION['UserLevel'])) &&($_SESSION['UserLevel']!='Guest'||$_SESSION['UserLevel']!='Admin' || $_SESSION['UserLevel']!='Sales')){
header('location:Index.php');
}
require_once('Functions.php');
$class = new functions();

$cartno = $class->CartNo();
$_SESSION['CartNo'] =$cartno;

$cartdate = date("Y-m-d");
$_SESSION['CartDate'] = $cartdate;

if(isset($_REQUEST['PID']))
$PID=$_REQUEST['PID'];
$remove=$class->AddtoCartRemove($PID);

$action=$_REQUEST['action'];
switch($action){
case 'edit':
	foreach ($_SESSION['cart'] as $row => $value) {
	  if($_POST["PID"] == $row) {
		  if($_POST["RQty"] == '0') {
			  unset($_SESSION["cart"][$row]);
		  } else {
			$_SESSION['cart'][$row]["Qty"] = $_POST["RQty"];
			$amount = $_SESSION['cart'][$row]["Price"] * $_SESSION['cart'][$row]["Qty"];
		  }
	  }
	  $totalamount += $_SESSION['cart'][$row]["Price"] * $_SESSION['cart'][$row]["Qty"];	
		  
	}
	if($total_price!=0 && is_numeric($total_price)) {
		print "$" . number_format($total_price,2);
		exit;
	}
	break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
</head>

<body>
<?php 
include('Header.php');
?>

<div class="container" id="addtocart">
	<div class="col-sm-12 menuname">
    	<div class="line-header">
        	<h1 class="text-center">Your Shopping Cart</h1>
        </div>    	
    </div>
    <form action="SendOrderForm.php?CartNo=<?php echo $_SESSION['CartNo']; ?>" method="post" name="addtocart" enctype="multipart/form-data">
    <div class="col-sm-12">
    	<label class="col-sm-6 control-label" hidden="true"><?php echo $cartno; ?></label>
    	<label class="col-sm-6 control-label" hidden="true"><?php echo $cartdate; ?></label>
    </div>
    <div class="frame">
            <div class="col-sm-12">
                <div class="col-sm-8"><p>* Only You can Buy Five Products in One Time!</p></div>
                <div class="col-sm-4"><a href="Products.php" class="btn btn-default pull-right">Continue Shopping</a></div>
            </div>
 			<table class="table">
                <tr>
                	<th>Image</th>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Delete</th>
                </tr>                
               <?php
					if(isset($_SESSION["cart"])){?>
                    <?php 
                   foreach ($_SESSION["cart"] as $items){ 
                ?>
                <tr>
                	<td><img src="<?php echo $items['Picture'];  ?>"/> </td>
                    <td><?php echo $items['PName'];  ?> </td>
                    <td><span class="blue"><?php echo $items["Size"];  ?> </span></td>
                    <td>Rs: <span class="blue"><?php echo $items["Price"];  ?> </span></td>
                    <td class="col-sm-1"><input type="text" name="RQty" class="form-control" id="<?php echo $items['PID']; ?>" value="<?php echo $items["Qty"]; ?> " onBlur="saveCart(this);"/></td>
                    <?php
					$amount = 0;
                    $amount = $items ["Price"] * $items["Qty"]; 
					$_SESSION['amount'] = $amount;
					?>
                    <td>Rs: <span id="amount"><?php   echo "$" .$amount ?> </span></td>
                    <td><a href="AddtoCartForm.php?PID=<?php echo $items ["PID"]; ?>"><img src="images/Icons/Delete_Icon.png" width="50" height="50"></a></td>
                </tr>
                <tr>
                <?php } ?>
                <td colspan="2">Total Items = <?php echo $session_items; ?></td>
                <td colspan="3" style="text-align:center;">
                <?php
                    if(isset($_REQUEST['err'])&&($_REQUEST['err']==1)){
                    echo 'Successfully Send the Order';
                    }
                    ?>
                    <?php
					$totalamount = 0;
					 $totalamount += $items ["Price"] * $items["Qty"];  
					 
					 $_SESSION['totalamount'] = $totalamount; ?>
                </td>
                  <td colspan="2" style="text-align:end;"> Total : <span class="blue" id="totalamount"><?php echo "Rs ". number_format($totalamount,2); ?> </span></td>    
                </tr>
                <?php } ?> 
          </table>                              
        <div class="col-sm-12">
        	<a href="SelectFunction.php?action=empty">Clear Cart</a>
            <button type="submit" class="btn btn-default pull-right " name="submit">Check Out >></button></a>
        </div>        
    </div>
    </form>
</div>

<?php 
include('Footer.php');
?>
<script>
function saveCart(obj) {
	var qty = $(obj).val();
	var id = $(obj).attr("id");
	$.ajax({
		url: "?action=edit",
		type: "POST",
		data: 'PID='+id+'&RQty='+qty,
		success: function(data, status){$("#totalamount").html(data)},
		success: function(data, status){$("#amount").html(data)},
	});
	}
</script>
</body>
</html>