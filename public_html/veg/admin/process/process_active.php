<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/common/functions.php");
$check_action = '';
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $check_action = $_POST['action'];
} elseif (isset($_GET['action']) && !empty($_GET['action'])) {
    $check_action = $_GET['action'];
}
switch ($check_action) {
    
    
    case "user":
        $sql_update = "UPDATE cart_user SET user_status=abs(user_status-1) WHERE user_id ='" . $_GET['id'] . "'";
        mysql_query($sql_update);
        header("location:" . $_SERVER['HTTP_REFERER']);
    break;
	
	case "orderStatus":
        $sql_update = "UPDATE cart_orders SET order_status='".$_REQUEST['status']."' WHERE order_id ='".$_REQUEST['id']."'";
        mysql_query($sql_update);
		echo 1;
    break;
	
	
	case "paymentStatus":
        $sql_update = "UPDATE cart_orders SET payment_status='".$_REQUEST['status']."' WHERE order_id ='".$_REQUEST['id']."'";
        mysql_query($sql_update);
		echo 1;
    break;

        
}


?>
