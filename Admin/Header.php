<!doctype html>
<html><head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../css/styles.css" rel="stylesheet" type="text/css"/>
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="../js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js"  type="text/javascript"></script>
<script src="../js/custom.js" type="text/javascript"></script>
<script src="../js/dataTables.bootstrap.min.js"type="text/javascript"></script>
<script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>

<style>
body{
	padding-top:20px;
	
}
.nav > li > a{
    color:#FFFFFF;
    border-radius:0px;
}
.nav{
	background-color:rgba(0,0,0,0.46);
    border-radius:0px;
}

</style>
</head>

<body class="background four">
<?php 
//session_start();
?>
<div class="nav-pills-m" style="margin:0px; padding:0px; ">
    <h4 class="blue" style="background-color:rgba(0,0,0,0.70); padding:20px 5px;">Manage Administration</h4>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="Home.php">Home</a></li>
        <?php if(!empty($_SESSION['UName']) &&($_SESSION['UName']=='admin')){ ?>
        <li class="nav-divider"></li>
        <li><a href="ProductHandlingForm.php">Add Products</a></li>
        <li class="nav-divider"></li>
        <li><a href="UpdateDeleteProducts.php">Update Delete Products</a></li><?php } ?>
        <?php if(!empty($_SESSION['UName']) &&($_SESSION['UName']=='admin') || ($_SESSION['UName']=='owner')){ ?>
        <li class="nav-divider"></li>
        <li><a href="ReportsForm1.php">Invoice Reports</a></li>
        <li class="nav-divider"></li>
        <li><a href="ReportsForm2.php">Sales Reports</a></li><?php } ?>
        <?php if(empty($_SESSION['UName'])){ ?>
        <li class="nav-divider"></li>
        <li><a href="../Administration.php">Log In</a></li><?php } ?>
        <?php if(!empty($_SESSION['UName'])){ ?>
        <li class="nav-divider"></li>
        <li><a href="../SelectFunction.php?action=adminlogout">Log Out</a></li><?php } ?>
    </ul>
</div>

</body>
</html>