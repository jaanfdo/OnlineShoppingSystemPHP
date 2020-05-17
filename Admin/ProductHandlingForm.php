<?php
require_once '../Functions.php';
$class = new functions();

$productno = $class->ProductNo();
$_SESSION['CartNo'] =$productno;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Handle</title>

<style>
.control-label{
	color:rgba(255,255,255,1.00);
}
</style>
</head>
<body>

<div class="container">
	<div class="row">
    	<div class="col-sm-12">
            <div class="col-sm-2">
            <?php include('Header.php'); ?>
            </div>
            <div class="col-sm-10" style="background-color:rgba(0,0,0,0.46);">
                <form action="../SelectFunction.php?action=addproduct" method="post" name="product" enctype="multipart/form-data" onsubmit="return validation()" autocomplete="off">
                    <div class="form-horizontal">
                        <div class="col-sm-offset-1">
                            <h1>Products Registration</h1>
                        </div>
                        <hr />
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Products ID</label>
                                <div class="col-sm-7">
                                    <input type="text" id="txtNCopies" placeholder="Product ID" value="<?php echo $productno; ?>" name="pid" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Products Name</label>
                                <div class="col-sm-7">
                                    <input type="text" id="txtNCopies" placeholder="Product Name" name="pname" class="form-control"/>
                                </div>
                            </div>                          
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Categories</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="categories">
                                    <option>Select</option>
                                    <?php
                                        $category=$class->Category();
                                         while($value = mysqli_fetch_array($category)){
                                         ?>
                                      <option value="<?php echo $value['Category']; ?>"><?php echo $value['Category']; ?></a></option>
                                      <?php } ?>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Brands</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="brands">
                                    <option>Select</option>
                                    <?php
                                        $brand=$class->Brand();
                                         while($value = mysqli_fetch_array($brand)){
                                         ?>
                                      <option><?php echo $value['Brand']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Colors</label>
                                <div class="col-sm-7">
                                <select class="form-control" name="colors">
                                <option>Select</option>
                                <?php
                                    $color=$class->Color();
                                     while($value = mysqli_fetch_array($color)){
                                     ?>
                                  <option><?php echo $value['Color']; ?></option>
                                  <?php } ?>
                                </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Size</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="size">
                                    <option>Select</option>
                                    <?php
                                        $size=$class->Size();
                                         while($value = mysqli_fetch_array($size)){
                                         ?>
                                      <option><?php echo $value['Size']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Neck Lines</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="necklines">
                                    <option>Select</option>
                                    <?php
                                        $neckline=$class->NeckLine();
                                         while($value = mysqli_fetch_array($neckline)){
                                         ?>
                                      <option><?php echo $value['NeckLine']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Fits</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="fits">
                                    <option>Select</option>
                                    <?php
                                        $fit=$class->Fit();
                                         while($value = mysqli_fetch_array($fit)){
                                         ?>   
                                      <option><?php echo $value['Fits']; ?></option>
                                      <?php } ?>
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
                                <input type="file" id="txtFile" class="control-label" name="file"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4">
                                    <p class="text-success">
                                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==1)){
                					echo "Record Added Successfully."; } ?></p>
                                    <p class="text-danger">
                                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==2)){
                					echo "Record Not Added."; } ?></p>
                					<p class="text-danger">
                                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==3)){
               						echo "Sorry, file already exists."; } ?></p>
                                    <p class="text-danger">
                                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==4)){
               						echo "Sorry, your file is too large."; } ?></p>
                                    <p class="text-danger">
                                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==5)){
               						echo "Sorry, only jpg, jpeg, png & gif files are allowed."; } ?></p>
                                    <p class="text-danger">
                                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==6)){
               						echo "Sorry, your file was not uploaded."; } ?></p> 
                                    <p class="text-danger">
                                    <?php if(isset($_REQUEST['err'])&&($_REQUEST['err']==7)){
               						echo "Product Already Added"; } ?></p>              
                                </div>
                            </div>           
                            <div class="form-group">
                                <div class="col-sm-offset-4">
                                    <input type="submit" name="submit" value="Save" class="btn btn-default"/>
                                    <input type="reset" name="clear" value="Clear" class="btn btn-default"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
        </div>       
    </div>
</div>
               
</body>
</html>
