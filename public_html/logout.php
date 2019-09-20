<?
include_once("config.php");
if(isset($_SESSION['user']['user_id']) && !empty($_SESSION['user']['user_id']))
{
	session_unset($_SESSION['user']['user_id']);
	session_unset($_SESSION['cart']);
}
session_destroy();
header("location:index.php");
exit;
?>