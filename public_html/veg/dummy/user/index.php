<?php
include_once("../config.php");
include_once("../logic/logicLogin.php");
include_once("../common/msg.php");
$ObjUserLogin=new UserLogin();  
$ObjUserLogin->checkUserStatus(); 
$msg=isset($_REQUEST['msg'])?$_REQUEST['msg']:'';
$ObjMsg=new Msg();
$user_id  = $_SESSION['user']['user_id'];
$sql_get_value	=	" select * from cart_user where user_id= $user_id ";
$res_get	=	mysql_query($sql_get_value);
$user_row	=	mysql_fetch_object($res_get);
$msg=$ObjMsg->msgBox($msg);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include_once("../commonTemplate/head.php")?>

<link href="../css/checkout.css" rel="stylesheet">
</head>
<body>
<? include_once("../commonTemplate/header.php")?>
<section>
<div class="feedback-outer">
  <div class="feedback-inner">
  <div class="feeback-heading"></div>
   <div class="content">
             <?
				  if(!empty($msg))
				   echo '<p><center>'.$msg.'</center></p>';
				  ?>
			          <div class="checkout-item">
			          <div class="main-title">
			            <p class="custom-font-1"><strong>My Account </strong></p>
                      </div>
                      <p style="font-size:19.5px">Full Name: &nbsp;&nbsp; <span style="font-size:18px"><?=ucwords($user_row->user_first_name).' '.ucwords($user_row->user_last_name);?></span></p>
			          <div class="single-full-width">
                        <p><a href="<?=$site_url?>/cart.php">My Cart</a></p>
			            <p><a href="<?=$site_url?>/user/myprofile.php">Update Your Profile</a></p>
			            <p><a href="<?=$site_url?>/user/order_list.php">Order History</a></p>
                        <p><a href="<?=$site_url?>/user/change_pwd.php">Change Password</a></p>
                        <p><a href="<?=$site_url?>/logout.php">Logout</a></p>
		              </div>
                      
		            </div>
			          <div class="clear"></div>
		        </div>
 </div>
 </div>
</section>
<? include_once("../commonTemplate/footer.php") ?>
</body>
</html>