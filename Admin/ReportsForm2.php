<?php
//session_start();
require_once '../Functions.php';
$class = new functions();

$day = "";
$day2 = "";

if(isset($_POST['submit'])){
$day=$_POST['Day'];
$day2=$_POST['Day2'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Report</title>

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
            <h1>Sales Reports</h1>
            <hr />   
            <form name="submit" action="ReportsForm2.php" role="button" method="post">
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
                            <input name="submit" type="submit" value="Products Details" class="btn btn-default"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
        <div class="col-sm-12">         
            <table class="table">
              <tbody>
                <tr>      
                  <th width="60" scope="col">Cart No</th>
                  <th width="80" scope="col">Cart Date</th>
                  <th width="40" scope="col">PID</th>
                  <th width="150" scope="col">PName</th>
                  <th width="60" scope="col">Size</th>
                  <th width="60" scope="col">Price</th>
                  <th width="80" scope="col">Quantity</th>
                  <th width="70" scope="col">Amount</th>
                </tr>
                <?php
				$records_per_page=5;
				$sql = $class->Reports2($day, $day2);
				$newquery = $class->paging($sql, $records_per_page);
				$result = $class->dataview($newquery);	
				//$sql=$class->Reports2($day, $day2);	
                while($value=mysqli_fetch_array($result)){
                ?>
                <tr>
                  <td><?php echo $value['CartID']; ?></td>
                  <td><?php echo $value['CartDate']; ?></td>
                  <td><?php echo $value['PID']; ?></td>
                  <td><?php echo $value['PName']; ?></td>
                  <td><?php echo $value['Size']; ?></td>
                  <td><?php echo $value['Price']; ?></td>
                  <td><?php echo $value['Quantity']; ?></td>
                  <td><?php echo $value['Amount']; ?></td>     
                </tr>
                <?php } ?>
                <tr>
                <?php $sales=$class->ReportsSales($day, $day2);
						$value1 = mysqli_fetch_array($sales); ?>
                  <td colspan="2">
                  	<p>No of Products : <span class="badge"><?php echo $value1['NoP']; ?></span></p>
                  </td>
                  <td colspan="2">
					<p>No of Quantities : <span class="badge"><?php echo $value1['NoQ']; ?></span></p>
                  </td>
                  <td colspan="4"><p>Total Income : <span class="badge"><?php echo $value1['Total']; ?></span></p></td>
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