<?
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
$check_action = '';
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $check_action = $_POST['action'];
} elseif (isset($_GET['action']) && !empty($_GET['action'])) {
    $check_action = $_GET['action'];
}


switch ($check_action) {
    
    case "user":
        $sql_card_solid_delete = "delete from cart_user WHERE user_id ='" . $_GET['id'] . "'";
        mysql_query($sql_card_solid_delete);
        header("location:" . $_SERVER['HTTP_REFERER']);
    break;
	
	case "order":
        $sql_card_solid_delete = "delete from cart_orders WHERE order_id ='" . $_GET['id'] . "'";
        mysql_query($sql_card_solid_delete);
		mysql_query("delete from cart_order_product_info WHERE order_id ='" . $_GET['id'] . "'");
        header("location:" . $_SERVER['HTTP_REFERER']);
    break;
		
    
        
        
        
}
?>