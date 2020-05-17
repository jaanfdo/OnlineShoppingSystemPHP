<?php
session_start();
require_once('dbconn.php');
$db_handle = new DBController();
class functions{

function AddtoCartInsert($PID){
	$db_handle = new DBController();
	if(!empty($_POST['Qty'])) {
	$sql = $db_handle->runQuerys("SELECT * FROM products WHERE PID='". $_GET["PID"]."'");
	$item = array($sql[0]["PID"]=>array('PID'=>$sql[0]['PID'],'PName'=>$sql[0]['PName'],'Size'=>$sql[0]['Size'],'Qty'=>$_POST['Qty'], 'Price'=>$sql[0]['Price'],'Picture'=>$sql[0]['Picture']));
	
	if(!empty($_SESSION["cart"])) {
		if(in_array($sql[0]["PID"],$_SESSION["cart"])) {
			foreach($_SESSION["cart"] as $row => $value) {
					if($sql[0]["PID"] == $row)
						$_SESSION["cart"][$row]["Qty"] = $_POST["Qty"];
			}
		} else {
			$_SESSION["cart"] = array_merge($_SESSION["cart"],$item);
		}		
	} else {
		$_SESSION["cart"] = $item;
	}
}
}

function AddtoCartRemove($PID){
	if(!empty($_SESSION["cart"])) {
		foreach($_SESSION["cart"] as $row => $value) {
			if($PID == $row)
				unset($_SESSION["cart"][$row]);				
			if(empty($_SESSION["cart"]))
				unset($_SESSION["cart"]);
		}
	}
	header('location:AddtoCartForm.php');
}
			
function AddtoCartEmpty(){
	unset($_SESSION["cart"]);
	header('location:AddtoCartForm.php'); 
}
		
function AddtoCartEdit(){
	$total_price = 0;
	foreach ($_SESSION['cart'] as $row => $value) {
	  if($_POST["PID"] == $row) {
		  if($_POST["RQty"] == '0') {
			  unset($_SESSION["cart"][$row]);
		  } else {
			$_SESSION['cart'][$row]["Qty"] = $_POST["RQty"];
		  }
	  }
	  $total_price += $_SESSION['cart'][$row]["Price"] * $_SESSION['cart'][$row]["Qty"];	
		  
	}
	if($total_price!=0 && is_numeric($total_price)) {
		print "$" . number_format($total_price,2);
		exit;
	}
}

function Login(){
	if(isset($_POST['submit'])){
    echo $UName= $_POST['UName'];
    echo $Pass=$_POST ['Pass'];
	
    $db_handle = new DBController();
    $login=$db_handle->runQuery("SELECT * FROM registration WHERE UName='$UName' AND Pass='$Pass'");
	$value=mysqli_fetch_array($login);
	
	$uname=$value['UName'];
	echo $_SESSION['UName']=$uname;
	$fname=$value['FirstName'];
	echo $_SESSION['FirstName']=$fname;
	$lname=$value['LastName'];
	echo $_SESSION['LastName']=$lname;
	$add=$value['Address'];
	echo $_SESSION['Address']=$add;
	$userLevel=$value['UserLevel'];
	echo $_SESSION['UserLevel']=$userLevel;

	$data = mysqli_num_rows($login);
	if($data == 1)
	{
		if($value['UserLevel'] === "admin"){
			header('location:Admin/Home.php');
		}else if($value['UserLevel'] === "owner"){
			header('location:Admin/Home.php');
		}else if($value['UserLevel'] === "salesman"){
			header('location:Admin/Home.php');
		}else{
			header('location:LoginForm.php?err=3'); 
		}
	}else{
		header('location:LoginForm.php?err=4'); 
	}
     
	}
}

function Logout(){
	session_destroy();
	header('location:LoginForm.php');	
}

function AdminLogout(){
	session_destroy();
	header('location:Administration.php');	
}

function SignUp(){
	if(isset($_POST['submit'])){
    echo $fname= $_POST['FName'];
	echo $lname= $_POST['LName'];
    echo $uname= $_POST['UName'];
    echo $pass=$_POST ['Pass'];
    echo $email= $_POST['Email'];
    echo $tpno= $_POST['TpNo'];
	echo $add= $_POST['Address'];
	
    $db_handle = new DBController();
	$select = $db_handle->runQuery("SELECT * FROM registration WHERE UName='$uname'");
	$data =  mysqli_num_rows($select);
	if($data == 1)
	{
		header('location:LoginForm.php?err=5'); 
	}else{
		 $signup=$db_handle->runQuery("INSERT INTO registration (FirstName, LastName, UName, Pass, Email, TelephoneNo, Address, UserLevel) VALUES ('$fname','$lname','$uname','$pass','$email','$tpno', '$add', 'user')");
		if($signup == 1)
		{
			header('location:LoginForm.php?err=1'); 
		}else{
			header('location:LoginForm.php?err=2'); 
		}
	}
    
	}
}

function ForgotPassword($UName){
	$db_handle = new DBController();
    $sql = $db_handle->runQuery("SELECT * FROM registration WHERE UName='$UName'");
	
	return $sql;
}
				 
function AddProduct(){
	$db_handle = new DBController();
	if(isset($_POST['submit']))
    {
	echo $pid= $_POST['pid'];
	echo $pname= $_POST['pname'];
    	echo $categories= $_POST['categories'];
	echo $brands= $_POST['brands'];
    	echo $colors=$_POST ['colors'];
    	echo $size= $_POST['size'];
	echo $necklines= $_POST['necklines'];
	echo $fits= $_POST['fits'];
	echo $qty= $_POST['qty'];
	echo $price= $_POST['price'];

	$target_dir = "../Products/";
	echo $target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["file"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
	}
	$select = $db_handle->runQuery("SELECT * FROM products WHERE PName='$pname'");
	$data =  mysqli_num_rows($select);
	if($data == 1)
	{
		header('location:Admin/ProductHandlingForm.php?err=7'); 
	}else{
		if($categories == "TShirt"){
			$insertproduct = $db_handle->runQuery("INSERT INTO products VALUES ('$pid','$pname','$categories','$brands','$colors','$size','$necklines','$fits','$qty','$price','$target_file')");
		}else{
			$insertproduct = $db_handle->runQuery("INSERT INTO products VALUES ('$pid','$pname','$categories','$brands','$colors','$size',null,'$fits','$qty','$price','$target_file')");
		}
	}
	if($insertproduct == 1)
	{
		if (file_exists($target_file)) {
			header('location:Admin/ProductHandlingForm.php?err=3');
			$uploadOk = 0;
		}
		if ($_FILES["file"]["size"] > 500000) {
			header('location:Admin/ProductHandlingForm.php?err=4');
			$uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			header('location:Admin/ProductHandlingForm.php?err=5');
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			header('location:Admin/ProductHandlingForm.php?err=6');
		} else {
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			}
		}		
		header('location:Admin/ProductHandlingForm.php?err=1');
	}else{
		header('location:Admin/ProductHandlingForm.php?err=2');
	}
}

function UpdateProduct()
{
	if(isset($_POST['submit'])){
	echo $pid= $_POST['pid'];
	echo $qty= $_POST['qty'];
	echo $price= $_POST['price'];
	}
	$db_handle = new DBController();
	$Updateproduct = $db_handle->runQuery("UPDATE products SET Quantity='$qty', Price='$price' WHERE PID='$pid'");
	if($Updateproduct == 1)
	{		
		header('location:Admin/UpdateDeleteProducts.php?err=3');
	}else{
		header('location:Admin/UpdateDeleteProducts.php?err=4');
	}	
}

function DeleteProduct()
{
	if(isset($_REQUEST['PID'])){
	echo $PID= $_REQUEST['PID'];
	}
  $db_handle = new DBController();
  $Deleteproduct = $db_handle->runQuery("DELETE FROM products WHERE PID='$PID'");
  if($Deleteproduct == 1)
	{
		header('location:Admin/UpdateDeleteProducts.php?err=1');
	}else{
		header('location:Admin/UpdateDeleteProducts.php?err=2');
	}
} 

function CheckOut(){
	if(isset ($_POST['submit'])){
	echo $ino=$_SESSION['InvoiceNo'];
	echo $idate=$_SESSION['InvoiceDate'];
	echo $uname=$_SESSION['UName'];
	echo $fname=$_SESSION['FirstName'];
	echo $address=$_SESSION['Address'];
	echo $cartno=$_SESSION['CartNo'];
 	echo $nop=$_SESSION['Items'];
	echo $noq=$_SESSION['Qty'];
 	echo $totalamount=$_SESSION['totalamount'];
	
	echo $CartDate=$_SESSION['CartDate'];
 	echo $PID=$_SESSION['PID'];
 	echo $PName=$_SESSION['PName'];
	echo $Size=$_SESSION['Size'];
 	echo $Price=$_SESSION['Price'];
 	echo $RQty=$_SESSION['RQty'];
	echo $Amount=$_SESSION['amount'];
	}
	
	if(!empty($uname)){
		$db_handle = new DBController();
		if($PID <= 5){
			$sql=$db_handle->runQuery("INSERT INTO sales(CartID, CartDate, PID, PName, Size, Quantity, Price, Amount) VALUES('$cartno','$CartDate','$PID','$PName','$Size','$RQty','$Price','$Amount')");
			
			$sql=$db_handle->runQuery("INSERT INTO invoice(InvoiceID, InvoiceDate, UName, FirstName, Address, CartID, Items, Quantity, Amount) VALUES('$ino','$idate','$uname','$fname','$address','$cartno','$nop','$noq','$totalamount')");
			
			$sql1=$db_handle->runQuery("SELECT * FROM products WHERE PID='$PID'");
			$value1 = mysqli_fetch_array($sql1);
			$Qty = $value1['Quantity'];
			$NQty = $Qty-$RQty;
			$sql2=$db_handle->runQuery("UPDATE products SET Qty='$NQty' WHERE PID='$PID'");
			
			if($sql == 1 && $sql2 == 1){
				header('location:SendOrderForm.php?err=1');
				unset($_SESSION["cart"]);	
			}else{
				header('location:SendOrderForm.php?err=2');
			}	
		}else{
			header('location:SendOrderForm.php?err=4');
		}	
	}else{
		header('location:SendOrderForm.php?err=3');
	}
}

function ContactUs(){
	if(isset($_POST["submit"])){
	$mail_to = 'janithsrimal@gmail.com';
	$subject = 'Ravindu Fashion';
	$msg = 'Name : '.$_POST['Name']."\n" .'Email : ' .$_POST['Email']. "\n" .'Message : ' ."\n" .$_POST['Message'];
	mail($mail_to, $subject, $msg);
		header('Location:Index.php?err=1');	
	}else{
		header('Location:Index.php?err=2');
		exit(0);
	}
}

function ReportsInvoice($day, $day2){
	$db_handle = new DBController();
	if($day == "" && $day2 == "")
	{
		$invoice = $db_handle->runQuery("select COUNT(InvoiceID) as NoI, SUM(Items) as NoP, SUM(Quantity) as NoQ, SUM(Amount) as Total, MAX(Amount) as MaxPrice from invoice");
	}else if (!empty($day)){
		$invoice = $db_handle->runQuery("select COUNT(InvoiceID) as NoI, SUM(Items) as NoP, SUM(Quantity) as NoQ, SUM(Amount) as Total, MAX(Amount) as MaxPrice from invoice where InvoiceDate like '$day' ");
	}else if (isset($day) && ($day2)){
		$invoice = $db_handle->runQuery("select COUNT(InvoiceID) as NoI, SUM(Items) as NoP, SUM(Quantity) as NoQ, SUM(Amount) as Total, MAX(Amount) as MaxPrice from invoice where InvoiceDate between '$day' and  '$day2' ");		
	}
	return $invoice;

}
function Reports1($day, $day2){	
	$db_handle = new DBController();

	if($day == "" && $day2 == "")
	{
		$sql = "SELECT * FROM invoice";
	}else if (!empty($day)){
		$sql = "SELECT * FROM invoice WHERE InvoiceDate like '$day'";
	}else if (isset ($day) && ($day2)){
		$sql = "SELECT * FROM invoice WHERE InvoiceDate between '$day' and  '$day2'";
	}	
	return $sql;
}
function ReportsSales($day, $day2){
	$db_handle = new DBController();
	
	if($day == "" && $day2 == "")
	{
		$sales = $db_handle->runQuery("select COUNT(PID) as NoP, SUM(Quantity) as NoQ, SUM(Amount) as Total from sales");
	}else if (!empty($day)){
		$sales = $db_handle->runQuery("select COUNT(PID) as NoP, SUM(Quantity) as NoQ, SUM(Amount) as Total from sales where CartDate like '$day' ");
	}else{
		$sales = $db_handle->runQuery("select COUNT(PID) as NoP, SUM(Quantity) as NoQ, SUM(Amount) as Total from sales where CartDate between '$day' and  '$day2' ");
	}	
	return $sales;
}
function Reports2($day, $day2){
	$db_handle = new DBController();
	
	if($day == "" && $day2 == "")
	{	
		$sql = "SELECT * FROM sales ";
	}else if (!empty($day)){
		$sql = "SELECT * FROM sales WHERE CartDate like '$day' ";
	}else if(isset($day) && ($day)){
		$sql = "SELECT * FROM sales WHERE CartDate between '$day' and  '$day2' ";
	}
	return $sql;
}
 public function paging($sql,$records_per_page)
 {
        $starting_position=0;
        if(isset($_GET["page_no"]))
        {
             $starting_position=($_GET["page_no"]-1)*$records_per_page;
        }
        $sql2=$sql." limit $starting_position,$records_per_page";
        return $sql2;
 }
 public function dataview($newquery)
 {
		 $db_handle = new DBController();
         $result = $db_handle->runQuery($newquery);
  		return $result;
 }
public function paginglink($sql, $records_per_page)
 {
        $self = $_SERVER['PHP_SELF'];
		
		$db_handle = new DBController();
        $result = $db_handle->numRows($sql);
  		$row = $result;
        $total_no_of_records = $row;
  
        if($total_no_of_records > 0)
        {
            
            $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
            $current_page=1;
            if(isset($_GET["page_no"]))
            {
               $current_page=$_GET["page_no"];
            }
            if($current_page!=1)
            {
               $previous = $current_page-1;
               echo "<a href='".$self."?page_no=1'>First</a>";
               echo "<a href='".$self."?page_no=".$previous."'>Previous</a>";
            }
            for($i=1;$i<=$total_no_of_pages;$i++)
            {
            if($i==$current_page)
            {
                echo "<strong><a href='".$self."?page_no=".$i."' style='color:white;text-decoration:none; padding: 5px; border:solid 1px #FFFFFF;'>".$i."</a></strong>";
            }
            else
            {
                echo "<a href='".$self."?page_no=".$i."'>".$i."</a>";
            }
   }
   if($current_page!=$total_no_of_pages)
   {
        $next=$current_page+1;
        echo "<a href='".$self."?page_no=".$next."'>Next</a>";
        echo "<a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>";
   }

  }
 }

function DisProducts($search, $sortings, $Category, $Brand){
	$db_handle = new DBController();
	if(empty($search)){
		$disproducts = $db_handle->runQuery("SELECT * FROM products");
	}else {		
		$disproducts = $db_handle->runQuery("SELECT * FROM products WHERE PID='$search' OR Brand='$search' OR PName like '%".$search."%'");
	}
	
	if($sortings == 'Latest Products')
	{
		$disproducts = $db_handle->runQuery("SELECT * FROM products ORDER BY PID DESC");
	}
	else if($sortings == 'Recommended Products')
	{
		$disproducts = $db_handle->runQuery("SELECT * FROM products ORDER BY PID ASC");
	}
	else if($sortings == 'Popular Products')
	{
		$disproducts = $db_handle->runQuery("SELECT DISTINCT p.PID, p.PName, p.Price, p.Picture FROM sales as s inner join products as p on s.PID=p.PID ORDER BY p.PID ASC");
	}
	if(!empty($Category)){
		$disproducts = $db_handle-> runQuery("SELECT * FROM products WHERE Category='$Category'");
	}else if(!empty($Brand)){
		$disproducts = $db_handle-> runQuery("SELECT * FROM products WHERE Brand='$Brand'");
	}
	
	return $disproducts;
}

function DisplayProducts($search){
	$db_handle = new DBController();
	if(empty($search)){
		$DisProducts = "SELECT * FROM products";
	}else {		
		$DisProducts = "SELECT * FROM products WHERE PID='$search' OR Brand='$search' OR PName like '%".$search."%'";
	}
	
	return $DisProducts;
}

function ViewProduct($PID){
	$db_handle = new DBController(); 
	$viewproduct = $db_handle-> runQuery("SELECT * FROM products WHERE PID='$PID'");
	return $viewproduct;
}

function LatestProduct($tbldata){
	$db_handle = new DBController();
	$latestpro = $db_handle->runQuery("SELECT * FROM products WHERE Category='$tbldata' ORDER BY PID DESC LIMIT 4");
	return $latestpro;
}
function RecommendedProduct($tbldata){
	$db_handle = new DBController();
	$recommendedpro = $db_handle->runQuery("SELECT * FROM products WHERE Category='$tbldata' ORDER BY PID ASC LIMIT 4");
	return $recommendedpro;
}
function PopularProduct(){
	$db_handle = new DBController();
	$popularpro = $db_handle->runQuery("SELECT * FROM products inner join sales on products.PID and sales.PID ORDER BY sales.PID ASC LIMIT 4");
	return $popularpro;
}	  

/*display category brand and colors*/
function CategoryPro(){
	$db_handle = new DBController();
	$categorypro = $db_handle-> runQuery("SELECT Distinct Category FROM products");
	return $categorypro;
} 
function BrandPro(){
	$db_handle = new DBController();
	$brandpro = $db_handle-> runQuery("SELECT Distinct Brand FROM products");
	return $brandpro;
}  

/*view category brand and colors*/
function ViewCatProduct($Category){
	$db_handle = new DBController();
	$viewcatproduct = $db_handle-> runQuery("SELECT * FROM products WHERE Category='$Category'");
	return $viewcatproduct;
} 
function ViewBrandProduct($Brand){
	$db_handle = new DBController();
	$viewbrandproduct = $db_handle-> runQuery("SELECT * FROM products WHERE Brand='$Brand'");
	return $viewbrandproduct;
} 
function ViewCatsProduct($category){
	$db_handle = new DBController();
	$viewcatsproduct = $db_handle-> runQuery("SELECT * FROM products WHERE Category='$category'");
	return $viewcatsproduct;
} 

function Sorting($sortings){
	$db_handle = new DBController();
	if($sortings == 'Latest Products')
	{
		$sortings = $db_handle->runQuery("SELECT * FROM products ORDER BY PID DESC LIMIT 4");
	}
	else if($sortings == 'Recommended Products')
	{
		$sortings = $db_handle->runQuery("SELECT * FROM products ORDER BY PID ASC LIMIT 4");
	}
	else if($sortings == 'Popular Products')
	{
		$sortings = $db_handle->runQuery("SELECT s.PID, p.PName, p.Price, p.Picture FROM products as p inner join sales as s on p.PID and s.PID ORDER BY s.PID ASC LIMIT 4");
	}
	return $sortings;
}

/*search*/
function Search($search){
		$db_handle = new DBController();
		$searchpro = $db_handle-> runQuery("SELECT * FROM products WHERE PName Like '%".$search."%' or Category Like '%".$search."%' or Brand Like '%".$search."%' or Color Like '%".$search."%'");
		return $searchpro;
}
function CartNo(){
	$db_handle = new DBController();
	$autono = $db_handle->runQuery("SELECT MAX(CartID) as maxcno FROM sales");
	$value = mysqli_fetch_assoc($autono);
	$valno = $value['maxcno'];
	$cartno = $valno;
	$cartno ++;
	
	return $cartno;
}
function InvoiceNo(){
	$db_handle = new DBController();
	$autono1 = $db_handle->runQuery("SELECT MAX(InvoiceID) as maxino FROM invoice");
	$value = mysqli_fetch_assoc($autono1);
	$valno = $value['maxino'];
	$invoiceno = $valno;
	$invoiceno ++;
	
	return $invoiceno;
}
function ProductNo(){
	$db_handle = new DBController();
	$autono2 = $db_handle->runQuery("SELECT MAX(PID) as maxpno FROM Products");
	$value = mysqli_fetch_assoc($autono2);
	$valno = $value['maxpno'];
	$productno = $valno;
	$productno ++;
	
	return $productno;
}
/*Product Details*/
function Category(){
	$db_handle = new DBController();
	$category = $db_handle-> runQuery("SELECT Distinct Category FROM productdetails");
	return $category;
}	
function Brand(){
	$db_handle = new DBController();
	$brand = $db_handle-> runQuery("SELECT Distinct Brand FROM productdetails");
	return $brand;
}
function Color(){
	$db_handle = new DBController();
	$color = $db_handle-> runQuery("SELECT Distinct Color FROM productdetails");
	return $color;
}
function Size(){
	$db_handle = new DBController();
	$size = $db_handle-> runQuery("SELECT Distinct Size FROM productdetails ");
	return $size;
}	
function NeckLine(){
	$db_handle = new DBController();
	$neckline = $db_handle-> runQuery("SELECT Distinct NeckLine FROM productdetails");
	return $neckline;
}
function Fit(){
	$db_handle = new DBController();
	$fit = $db_handle-> runQuery("SELECT Distinct Fits FROM productdetails");
	return $fit;
} 

}
	 
?>