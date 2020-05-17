<?php
require_once '../Functions.php';
$class = new functions();

$search = "";
if(isset($_POST['submit'])){
	$search = $_POST['search'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Handle</title>

<style>
div{
	color:rgba(255,255,255,1.00);
}
td.paging > a:hover{
	color:white;text-decoration:none; padding:5px; border:solid 1px #FFFFFF; font-weight:bold;
}

td.paging > a{
	text-decoration:none; padding:5px; margin:0px;
}
.control-label{
	color:rgba(0,0,0,1.00);
}
</style>
</head>
<body>
      
<div class="container">
	<div class="col-sm-2">
	<?php include('Header.php'); ?>
    </div>
    <div class="col-sm-10" style="background-color:rgba(0,0,0,0.46); overflow:hidden;">
        <div class="col-sm-12">
            <div class="col-sm-offset-1">
                <h1 class="col-sm-offset-1">Products Manage</h1>
            </div>
            <hr />
        </div>
        <div class="col-sm-12">
            <div class="col-sm-8 col-sm-offset-2">
                <form action="UpdateDeleteProducts.php" method="post" name="product">
                <div class="col-sm-11" style="padding-top:10px;">
                    <input type="search" name="search" placeholder="Search...." class="form-control"/>
                </div>
                <div class="col-sm-1">
                    <input type="submit" name="submit" id="btnSearch" class="btn btn-default" value="Search"/>
                </div> 
                </form>                             
            </div>
        </div>
        <div class="col-sm-12">
            <table class="table" id="mydata">
            <tbody>
                <tr>
                	<th><strong>Picture</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Category</strong></th>
                    <th><strong>Brand</strong></th>
                    <th><strong>Color</strong></th>
                    <th><strong>Size</strong></th>
                    <th><strong>NeckLine</strong></th>
                    <th><strong>Fit</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Price</strong></th>
                    <th colspan="2"><strong>action</strong></th>
                </tr>
                    <?php $records_per_page=5;
					$DisProducts = $class->DisplayProducts($search); 
					$newquery = $class->paging($DisProducts, $records_per_page);
					$result = $class->dataview($newquery);
					//$DisProducts=$class->DisplayProducts($search);
                        while($row=mysqli_fetch_array($result)){ ?> 
                <tr>   
                	<td><img src="../<?php echo $row['Picture']; ?>" width="30" height="50"/></td>                        
                    <td><?php echo $row['PID']; ?></td>
                    <td><?php echo $row['PName']; ?></td>
                    <td><?php echo $row['Category']; ?></td>
                    <td><?php echo $row['Brand']; ?></td>
                    <td><?php echo $row['Color']; ?></td>
                    <td><?php echo $row['Size']; ?></td>
                    <td><?php echo $row['NeckLine']; ?></td>
                    <td><?php echo $row['Fits']; ?></td>
                    <?php $Qty = $row['Quantity'];
            			if(($Qty<=50)){ ?>
                    <td id="qty" bgcolor="#FF0004"><?php echo $row['Quantity']; ?></td>
                    <?php } else {?>
                    <td id="qty"><?php echo $row['Quantity']; ?></td>
                    <?php } ?>
                    <td><?php echo $row['Price']; ?></td>
                    <td><a href="PID=<?php echo $row['PID']; ?>" id="<?php echo $row['PID']; ?>"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="../SelectFunction.php?action=deleteproduct&PID=<?php echo $row['PID']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                    <?php $_SESSION['PID'] = $row['PID']; ?>
                 </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            	<tr>
                	<td colspan="13" class="paging">
                    	<?php $class->paginglink($DisProducts, $records_per_page); ?>  
                    </td>
                </tr>
              </tfoot>
            </table>  
            <div class="form-group">
                <div class="col-sm-offset-4">
                    <p class="text-danger">
                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==2)){
    echo "Record Not Delete."; }
						if(isset($_REQUEST['err'])&&($_REQUEST['err']==4)){
    echo "Record Not Update."; } ?></p>
                    <p class="text-success">
                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==1)){
    echo "Record Deleted Successfully."; } 
						if(isset($_REQUEST['err'])&&($_REQUEST['err']==3)){
    echo "Record Update Successfully."; } ?></p>
                </div>
            </div>
        </div>
	</div>
</div>	 	


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <form method="post" name="product" enctype="multipart/form-data" onsubmit="return validation()">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title blue">Products Update</h3>
      </div>
      <div class="modal-body">
      <?php
		echo $PID = $_REQUEST['PID'];
		$viewproduct=$class->ViewProduct($PID);
        $value=mysqli_fetch_array($viewproduct);
        echo $value;
	?>
      	<div class="row">      	
        <div class="col-sm-12">            
            <div class="form-horizontal">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Products ID</label>
                        <div class="col-sm-7">
                            <input type="text" id="txtNCopies" placeholder="Product ID" name="pid" value="<?php echo $value['PID']; ?>" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Products Name</label>
                        <div class="col-sm-7">
                            <input type="text" id="txtNCopies" placeholder="Product Name" name="pname" value="<?php echo $value['PName']; ?>" class="form-control"/>
                        </div>
                    </div>                        
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Categories</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="categories">
                              <option><?php echo $value['Category']; ?></a></option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Brands</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="brands">
                              <option><?php echo $value['Brand']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Colors</label>
                        <div class="col-sm-7">
                        <select class="form-control" name="colors">
                          <option><?php echo $value['Color']; ?></option>
                        </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Size</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="size">
                              <option><?php echo $value['Size']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Neck Lines</label>
                        <div class="col-sm-7">                         
                        	<select class="form-control" name="necklines">
                              <option><?php echo $value['NeckLine']; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Fits</label>
                        <div class="col-sm-7">                         
                        <select class="form-control" name="fits">
                         <option><?php echo $value['Fits']; ?></option>
                		</select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Quantity</label>
                        <div class="col-sm-7">
                        <input type="text" id="txtNCopies" placeholder="No of Copies" name="qty" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Price</label>
                        <div class="col-sm-7">
                        <input type="text" id="txtPrice" placeholder="Price" name="price" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Picture</label>
                        <div class="col-sm-7">
                        <img src="../<?php echo $value['Picture']; ?>" width="180px" height="250px"/>
                        </div>
                    </div>          
                </div>
            </div>           
        </div> 
        </div>
      </div>
      <div class="modal-footer">       
        <input type="submit" name="submit" id="submit" class="btn btn-default">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </form>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){	
	$('#mydata').dataTable();

$("#submit").click(function(){
	var nocopies = $("#txtNCopies").val();
	var price = $("#txtPrice").val();
	var dataString = 'qty='+ nocopies + '&price='+ price;
	
	$.ajax({
		type: "POST",
		url: "SelectFunction.php?action=updateproduct'",
		data: dataString,
		success: function(result){
			alert(result);
		}
		});
	return false;
});

});

</script>
</body>
</html>