<?php
//session_start();
require_once '../Functions.php';
$class = new functions();	
$day = "";
$day2 = "";

if(isset($_POST['submit'])){
$day=$_POST['Day'];
$day2=$_POST['Day2']; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice Report</title>


<style>
div, table{
	color:rgba(255,255,255,1.00);
}
td.paging > a:hover{
	color:white;text-decoration:none; padding:5px; border:solid 1px #FFFFFF; font-weight:bold;
}

td.paging > a{
	text-decoration:none; padding:5px; margin:0px;
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
            	<h1>Invoice Reports</h1>
            </div>
            <hr />
         </div>
         <div class="col-sm-12">       
            <form name="submit" action="ReportsForm1.php" method="post">
                <div class="form-inline">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Start Date : </label>
                        <div class="col-sm-7">
                            <input name="Day" class="form-control" type="date"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">End Date : </label>
                        <div class="col-sm-7">
                            <input name="Day2" class="form-control" type="date"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-7 pull-right">
                            <input name="submit" type="submit" id="display" value="Invoice Details" class="btn btn-default"/>
                        </div>
                    </div>
                </div>
            </form>
         </div>    
    	<div class="col-sm-12" >   
            <table class="table">
              <tbody>
                <tr>
                  <th width="90" scope="col">Invoice No</th>
                  <th width="90" scope="col">Invoice Date</th>
                  <th width="79" scope="col">Cart No</th>
                  <th width="100" scope="col">First Name</th>
                  <th width="217" scope="col">Address</th>
                  <th width="100" scope="col">Products</th>
                  <th width="81" scope="col">Quantity</th>
                  <th width="82" scope="col">Amount</th>
                </tr>
                <?php
				$records_per_page=5;
				$sql = $class->Reports1($day, $day2);
				$newquery = $class->paging($sql, $records_per_page);
				$result = $class->dataview($newquery);
                while($value=mysqli_fetch_array($result)){ ?>
                <tr>
                  <td><?php echo $value['InvoiceID']; ?></td>
                  <td><?php echo $value['InvoiceDate']; ?></td>
                  <td><?php echo $value['CartID']; ?></td>
                  <td><?php echo $value['FirstName']; ?></td>
                  <td><?php echo $value['Address']; ?></td>
                  <td><?php echo $value['Items']; ?></td>
                  <td><?php echo $value['Quantity']; ?></td>
                  <td><?php echo $value['Amount']; ?></td>          
                </tr>
                <?php } ?>
                <tr>
                <?php $invoice=$class->ReportsInvoice($day, $day2);
					$value1 = mysqli_fetch_array($invoice);
					?>
                  <td colspan="2"><p>No of Invoics :  <span class="badge"><?php echo $value1['NoI']; ?></span></p></td>
                  <td colspan="2"><p>No of Products : <span class="badge"><?php echo $value1['NoP']; ?></span></p></td>
                  <td colspan="2"><p>No of Quantities : <span class="badge"><?php echo $value1['NoQ']; ?></span></p></td>
                  <td colspan="2"><p>Max Price :  <span class="badge"><?php echo $value1['MaxPrice']; ?></span></p></td>
                </tr>
                <tr>
                <td colspan="8"><p>Total Income :  <span class="badge"><?php echo $value1['Total']; ?></span></p></td>
                </tr>
              </tbody>
              <tfoot>
 				<tr>
                	<td colspan="8" class="paging">
              			<?php $class->paginglink($sql, $records_per_page); ?>
					</td>
                 </tr>
              </tfoot>
            </table>
    	</div>
    </div>
</div>



</body>
</html>