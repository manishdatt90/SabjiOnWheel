<?php
include_once("config.php");
$order_id=$_SESSION['user']['order_id'];
$userId=$_SESSION['user']['user_id'];
$payment_conformation = '';
if(!empty($order_id) && !empty($userId))
{
    if($_SESSION['user']['payment_option'] == 'cod')
    {
 	$total_discount_allowed_on_order    =   isset($_REQUEST['total_discount_allowed_on_order'])?$_REQUEST['total_discount_allowed_on_order']:0;							
        $order_amount_after_discount        =   isset($_REQUEST['order_amount_after_discount'])?$_REQUEST['order_amount_after_discount']:0;
        $totalPayableAmount                 =	isset($_REQUEST['totalPayableAmount'])?$_REQUEST['totalPayableAmount']:0;
	$totalCartAmount	=	isset($_REQUEST['totalCartAmount'])?$_REQUEST['totalCartAmount']:0;
	$shippingCharge         =	isset($_REQUEST['shippingCharge'])?$_REQUEST['shippingCharge']:0;
	$sql_confirm_update     = "Update cart_orders set total_spender_discount = '$total_discount_allowed_on_order',total_cart_amount = '$totalCartAmount',shipping_amount='$shippingCharge', order_amount_after_discount='$order_amount_after_discount', order_net_payable_amount = '$totalPayableAmount' ,order_status='2',payment_status ='1', payment_method='Cash on delivery' where order_id='$order_id' AND user_id='$userId' ";	
	$res_confirm_update	=	mysql_query($sql_confirm_update);
    }
    else
    {
        if($_REQUEST['status'] == 'success')
        {
            $payment_status = $_REQUEST['status'];
            $total_discount_allowed_on_order    =   isset($_SESSION['total_discount_allowed_on_order'])?$_SESSION['total_discount_allowed_on_order']:0;							
            $order_amount_after_discount        =   isset($_SESSION['order_amount_after_discount'])?$_SESSION['order_amount_after_discount']:0;
            $totalPayableAmount                 =   isset($_SESSION['totalPayableAmount'])?$_SESSION['totalPayableAmount']:0;
            $totalCartAmount                    =   isset($_SESSION['totalCartAmount'])?$_SESSION['totalCartAmount']:0;
            $shippingCharge                     =   isset($_SESSION['shippingCharge'])?$_SESSION['shippingCharge']:0;
            $sql_confirm_update                 =   "Update cart_orders set total_spender_discount = '$total_discount_allowed_on_order',total_cart_amount = '$totalCartAmount',shipping_amount='$shippingCharge', order_amount_after_discount='$order_amount_after_discount', order_net_payable_amount = '$totalPayableAmount' ,order_status='2',payment_status ='1', payment_method='Online Payment', payment_status_comment = '$_REQUEST' where order_id='$order_id' AND user_id='$userId' ";	
            $res_confirm_update                 =   mysql_query($sql_confirm_update);
            $sms_payment = 'your payment id is'.$_REQUEST['mihpayid'];
        }
        else
        {
            $payment_status = $_REQUEST['status'];
            $total_discount_allowed_on_order    =   isset($_SESSION['total_discount_allowed_on_order'])?$_SESSION['total_discount_allowed_on_order']:0;							
            $order_amount_after_discount        =   isset($_SESSION['order_amount_after_discount'])?$_SESSION['order_amount_after_discount']:0;
            $totalPayableAmount                 =   isset($_SESSION['totalPayableAmount'])?$_SESSION['totalPayableAmount']:0;
            $totalCartAmount                    =   isset($_SESSION['totalCartAmount'])?$_SESSION['totalCartAmount']:0;
            $shippingCharge                     =   isset($_SESSION['shippingCharge'])?$_SESSION['shippingCharge']:0;
            $sql_confirm_update                 =   "Update cart_orders set total_spender_discount = '$total_discount_allowed_on_order',total_cart_amount = '$totalCartAmount',shipping_amount='$shippingCharge', order_amount_after_discount='$order_amount_after_discount', order_net_payable_amount = '$totalPayableAmount' ,order_status='2',payment_status ='1', payment_method='Online Payment', payment_status_comment = '$_REQUEST' where order_id='$order_id' AND user_id='$userId' ";	
            $res_confirm_update                 =   mysql_query($sql_confirm_update);
            $payment_conformation               = 'Fail';
        }
    }
	ob_start();
	include("invoice_email.php");
	$content=ob_get_contents();
	ob_end_clean();
	$sql="select * from cart_user where user_id='$userId'";
	$res=mysql_query($sql);
	$r=mysql_fetch_object($res);
	$toemail=$r->user_email;
	if(!empty($toemail)  && !empty($content))
	{
		$mail_content1="<table><tr><td>Thank you for ordering.. We will contact you soon. Your Order Detial are as follows:</td></tr><tr><td>".$content."</td></tr></table>";
		$mail_content2="<table><tr><td>New Order Request..Order Detial are  as follows:</td></tr><tr><td>".$content."</td></tr></table>";
						
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
		$headers .= "Content-Transfer-Encoding: 8bit;\n";					
		$headers .= "From:<orders@sabjionwheels.com>\n";
	        $result=mail($toemail,'Your Order Detail from sabjionwheels.com',$mail_content1,$headers);
		$result2=mail('orders@sabjionwheels.com','order-placed ',$mail_content2,$headers);
	}
	if(isset($_SESSION['cart']))
	{
	   unset($_SESSION['cart']);
	   unset($_SESSION['user']['order_id']);
           unset( $_SESSION['total_discount_allowed_on_order'],$_SESSION['order_amount_after_discount'],$_SESSION['totalPayableAmount'],$_SESSION['totalCartAmount'],$_SESSION['shippingCharge'],$_SESSION['user']['payment_option']);
	}
}

$sm = mysql_query("SELECT * FROM cart_orders WHERE order_id='".$order_id."'");
$sm2 = mysql_fetch_array($sm);
$mob = $sm2['b_user_telephone'];
$amt = $sm2['order_net_payable_amount'];
$nm = $sm2['b_user_first_name'];

$request ="";
$param['uname'] = "arungupta";
$param['pwd'] = "Ericsson1234";
$param['senderid'] = "SABJHI";
$param['to'] = $mob; 
/*$param['msg']= "Hi '".$nm."', Your order '".$order_id."' has been placed. Your
total bill amount is Rs. '".$amt."'. Check your email for detailed invoice. Thank
you for shopping at Sabji On Wheels.";*/

$param['msg'] = "Hi ".$nm.", Your Order ".$order_id." has been placed. Total bill amount is Rs.
".$amt.". Check your email for invoice. Thank you for shopping at Sabji On
Wheels.".$sms_payment;
$param['route'] = "T";
foreach($param as $key=>$val) {
$request.= $key."=".urlencode($val);
$request.= "&";
}
$request = substr($request, 0, strlen($request)-1);
$url ="http://sms2support.com/sendsms?".$request;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);




$request ="";
$param['uname'] = "arungupta";
$param['pwd'] = "Ericsson1234";
$param['senderid'] = "SABJHI";
$param['to'] = 9953444548; 
/*$param['msg']= "Hi '".$nm."', Your order '".$order_id."' has been placed. Your
total bill amount is Rs. '".$amt."'. Check your email for detailed invoice. Thank
you for shopping at Sabji On Wheels.";*/

$param['msg'] = "Hi ".$nm.", Your Order ".$order_id." has been placed. Total bill amount is Rs.
".$amt.". Check your email for invoice. Thank you for shopping at Sabji On
Wheels.";
$param['route'] = "T";
foreach($param as $key=>$val) {
$request.= $key."=".urlencode($val);
$request.= "&";
}
$request = substr($request, 0, strlen($request)-1);
$url ="http://sms2support.com/sendsms?".$request;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);


unset( $_SESSION['total_discount_allowed_on_order'],$_SESSION['order_amount_after_discount'],$_SESSION['totalPayableAmount'],$_SESSION['totalCartAmount'],$_SESSION['shippingCharge'],$_SESSION['user']['payment_option']);
?>
<!DOCTYPE HTML>
<html>
<head>
<? include_once("commonTemplate/head.php");?>

<link href="css/checkout.css" rel="stylesheet">
</head>

<body>
<? include_once("commonTemplate/header.php")?>
<section>
<div class="feedback-outer">
  <div class="feedback-inner">
  <div class="feeback-heading">CheckOut</div>
   <div class="main-content-wrapper">
			  <div class="main-content item-block-3">
			    <div class="content">
			      <!-- BEGIN .header -->
			        <form action="#">
			        <table class="message-success custom-font-1">
			          <tr>
                                      <?php if($payment_conformation == 'Fail')
                                      {
                                          ?>
                                      <td> There are somthing error into payment please try again </td>
                                          <?php
                                      }
                                      else 
                                      {
                                      ?>
                                      <td> Thank you! Your order was placed successfully! </td>
                                      <?php
                                      }
			            ?>
		              </tr>
		            </table>
			        <div class="order-id">Check your mail for invoice.</div>
			       
		          </form>
			      <div class="clear"></div>
		        </div>
			    <!-- END .main-content -->
		      </div>
	     </div>
 </div>
 </div>
</section>
<? include_once("commonTemplate/footer.php") ?>
</body>
</html>