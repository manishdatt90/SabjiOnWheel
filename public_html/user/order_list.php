<?php
include_once("../config.php");
include_once("../logic/logicLogin.php");
$ObjUserLogin=new UserLogin();  
$ObjUserLogin->checkUserStatus(); 

	if(isset($_GET['uid'])&& !empty($_GET['uid']))
	$user_id=$_GET['uid'];
    else
    $user_id  = $_SESSION['user']['user_id'];
	$sql_select ="select * from cart_orders where user_id=$user_id order by order_date desc";
	$res_select=mysql_query($sql_select);
	$sql_merchant ="select * from cart_merchant";
	$res_merchant=mysql_query($sql_merchant);
	$rows_merchant=mysql_fetch_object($res_merchant);
			
		
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include_once("../commonTemplate/head.php")?>

<link href="../css/checkout.css" rel="stylesheet">
<style>

</style>
</head>
<body>
<? include_once("../commonTemplate/header.php")?>
<section>
<div class="feedback-outer">
  <div class="feedback-inner">
  <div class="feeback-heading">My Orders</div>
   <div class="main-content-wrapper">
                <div class="main-title">
                    <p class="custom-font-1">Order List</p>
                    <a href="index.php" class="view">Back</a>
			    </div>
               <div class="single-full-width">
                 <? if(mysql_num_rows($res_select)>0)
                 {?>
                   <table width="100%" border="0" cellpadding="0" cellspacing="2" class="table-style">
<tr>
                            <td align="center"><strong>Order No</strong></td>
                            <td align="center"><strong>Name</strong></td>
                            <td align="center"><strong>Email</strong></td>
                            <td align="center"><strong>Date</strong></td>
                            <td align="center"><strong>Amount</strong></td>
                            <td align="center"><strong>Payment Status</strong></td>
                            <td align="center"><strong>Order Status</strong></td>
							<td align="center"><strong>Payment Method</strong></td>
                     </tr>
                           <?
							while($rows=mysql_fetch_object($res_select))
							{  
							 
							?>
                           <tr>
                            <td align="center"><a  href="<?=$site_url?>/order_detail.php?oid=<?=$rows->order_id?>&uid=<?=$user_id?>"><?=$rows->order_id?></a></td>
                            <td align="center"><?=$rows->b_user_first_name.'  '.$rows->b_user_last_name?></td>
                            <td align="center"><?=$rows->b_user_email?></td>
                            <td align="center"><?=$rows->order_date?></td>
                            <td align="center">Rs.<?=!empty($rows->order_net_payable_amount)?number_format($rows->order_net_payable_amount,2):'&nbsp;'?></td>
                            <td align="center"><?=!empty($rows->payment_status)?$payment_status[$rows->payment_status]:'&nbsp;'?></td>
                            <td align="center"><?=!empty($rows->order_status)?$order_status[$rows->order_status]:'&nbsp;'?></td>
							<td align="center"><?=!empty($rows->payment_method)?(!empty($payment_method[$rows->payment_method])?$payment_method[$rows->payment_method]:$rows->payment_method):'&nbsp;'?></td>
                     </tr>
                            <?	
						    }	
							?>
                    </table>
                 <?
                    }
                    else
                      echo '<p> No Order has been placed by you yet...</p>';
                    ?>
                    
               </div>    
			   <div class="clear"></div>
			</div>
 </div>
 </div>
</section>
<? include_once("../commonTemplate/footer.php") ?>
</body>
</html>