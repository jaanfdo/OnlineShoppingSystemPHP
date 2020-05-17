<?php 
session_start();
if(empty($_SESSION['UName'])){
	header('Location:../Administration.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<div class="container">
    <div class="col-sm-2">
        <?php include('Header.php'); ?>
    </div>
</div>

</body>
</html>