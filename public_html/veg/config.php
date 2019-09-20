<?
session_start();
date_default_timezone_set("Asia/Kolkata"); 
ini_set('display_errors','0');
$allow_image_ext=array('jpg','jpeg','gif','png');
$allow_media_ext=array('swf','avi','mov','mp3','wav');
$allow_file_ext=array('jpg','jpeg','gif','png','swf','avi','mov','doc','txt','xls','ppt','pdf','csv','mp3');
$_SERVER['DOCUMENT_ROOT']="/dummy";

$order_status=array(
					1=>"Incomplete",
					2=>"Pending",
					3=>"Approved",
					4=>"Cancelled"
					);
$payment_status=array(
					1=>"Pending",
					2=>"Paid"
					);
$shipping_status=array(
					1=>"Unshipped",
					2=>"Shipped"
					);
$payment_method=array(
					"CASH ON DELIVERY"=>"Cash on delivery",
					"CREDITCARD"=>"Offline Credit Card",
					"PAYPAL"=>"PAYPAL"
					 );
					 
$db_host="localhost";
$db_user="sabjionw_admin";
$db_password="%OMN]b8AR}@?";
$db_database="sabjionw_db";

$site_title='HOME DELIVERY OF FRUITS & VEGETABLES IN GURGAON';
$conLink = mysql_connect($db_host,$db_user,$db_password) or die('could not connect to Cart database');
$dbLink=mysql_select_db($db_database,$conLink) or die('could not select Cart db');
$localhostIP=$_SERVER['HTTP_HOST'];
$path="/admin";
$site_url="";
$cust_path='';
if(substr($_SERVER['REQUEST_URI'],0,6)=='/admin')
{
if(!isset($_SESSION['ses_userid']) || empty($_SESSION['ses_userid']))
	{
		header("location:$path/login.php");
	}
}
?>