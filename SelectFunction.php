<?php
require_once('Functions.php');
$function = new functions();
$action=$_REQUEST['action'];

switch($action){

case 'signup':
	$function -> SignUp();
break;
case 'login':
	$function -> Login();
break;	
case 'logout':
	$function -> Logout();
break;	
case 'adminlogout':
	$function -> AdminLogout();
break;	

case 'addproduct':
	$function -> AddProduct();
break;
case 'updateproduct':
	$function -> UpdateProduct();
break;
case 'deleteproduct':
	$function -> DeleteProduct();
break;

case 'checkout':
	$function -> CheckOut(); 
break;
case 'contactus':
	$function -> ContactUs();
break;

case 'addtocartinsert':
	$function -> AddtoCartInsert();
break;	
case 'remove':	
	$function -> AddtoCartRemove();
	break;		
case 'edit':
	$function -> AddtoCartEdit();
break;
case 'empty':
	$function -> AddtoCartEmpty();
break;	
	
}

?>