<?
//echo 123;die();
include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/adminfunctions.php");
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $check_action = $_POST['action'];
} elseif (isset($_GET['action']) && !empty($_GET['action'])) {
    $check_action = $_GET['action'];
}
//echo $check_action; die;
  switch ($check_action) {
	  case 'user':
        $user_first_name=isset($_POST['user_first_name'])?$_POST['user_first_name']:'';
		$user_last_name=isset($_POST['user_last_name'])?$_POST['user_last_name']:'';
		$user_postal_address=isset($_POST['user_postal_address'])?$_POST['user_postal_address']:'';
		$user_country=isset($_POST['user_country'])?$_POST['user_country']:'';
		$user_state=isset($_POST['user_state'])?$_POST['user_state']:'';
		$user_city=isset($_POST['user_city'])?$_POST['user_city']:'';
		$user_telephone=isset($_POST['user_telephone'])?$_POST['user_telephone']:'';
		$user_zip_code=isset($_POST['user_zip_code'])?$_POST['user_zip_code']:'';
		$user_status=isset($_POST['user_status'])?$_POST['user_status']:'';
        $user_id=$_POST['user_id'];
        $sql_set_user = " Update cart_user set user_first_name= '$user_first_name' , user_last_name='$user_last_name',user_postal_address='$user_postal_address', user_telephone='$user_telephone', user_city='$user_city', user_state='$user_state', user_country='$user_country', user_zip_code='$user_zip_code',user_status='$user_status', modified_date = NOW() where user_id= $user_id ";
        $res_set=mysql_query($sql_set_user);
        $msg="edited";
		
		
		$user_password=isset($_POST['user_password'])?$_POST['user_password']:'';
		$change_password=isset($_POST['change_password'])?$_POST['change_password']:'';
		$conf_password=isset($_POST['conf_password'])?$_POST['conf_password']:'';
		if (!empty($conf_password) && !empty($user_password) && ($conf_password == $user_password) && ($change_password == 1))       {
          $sql_set_user_pswd = " Update cart_user set user_paswd 	=('$user_password'), modified_date = NOW() where user_id=$user_id ";
        $res_set_pswd      = mysql_query($sql_set_user_pswd);
        $msg               = "edited";
		}
	 

	 header("Location:../cart_user/index.php?msg=".$msg);
     break;
    case 'emailInvoice':
        $order_id=$_REQUEST['orderId'];
        ob_start();
		include("invoice_email.php");
	    $content=ob_get_contents();
	    ob_end_clean();
        //echo $content;die;
        $mail_content2="<table><tr><td>Order Detials are  as follows:</td></tr><tr><td>".$content."</td></tr></table>";
		$sql="select * from cart_orders where order_id=".$order_id; 
	    $res=mysql_query($sql);	
        $rOrder=mysql_fetch_object($res);
        $email=$rOrder->b_user_email;			
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
		$headers .= "Content-Transfer-Encoding: 8bit;\n";					
		$headers .= "From: orders@sabjionwheels.com  <orders@sabjionwheels.com>\n";
	    $result=mail($email,'Order Detail from sabjionwheels.com',$mail_content2,$headers);
		$result2=mail('orders@sabjionwheels.com','order-placed ',$mail_content2,$headers);
	    header("Location:../orders/index.php?msg=sent");
    break;
        
        
        
}
?>