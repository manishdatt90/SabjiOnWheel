<? 
//include_once("config.php");
$sql_select ="select * from cart_orders where order_id=$order_id";
$res_select=mysql_query($sql_select);
$rows=mysql_fetch_object($res_select);

$sql_product="select * from cart_order_product_info where order_id=$order_id";
$res_product=mysql_query($sql_product);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title></title>
  <style type="text/css">
<!--
.invoice {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#000000;
	font-weight:normal;
}
.invborder {
	border: 1px solid #006699;
}
a:link {
	color: #000000;
}
-->
</style>
  </head>

  <body>
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="invborder">
    <tr class="invborder">
    <td width="50%" align="left" valign="top" nowrap="nowrap"class="text"  style="font-size:16px;"><h2><strong>Invoice No:</strong>
        <?=$rows->order_id?>
      </h2>
        <br >
        <strong>Date:--</strong><strong>
      <?=$rows->order_date?>
      </strong></td>
    <td width="50%" align="right">
Call Us for placing your orders:
<br>Our telephone number is +91 9310056669

<p>Our lines are open:<br>
Mon to sat: 9.00 am - 9.00 pm<br>
Sun: 9.00am - 12.00pm</p>

<br>Our email address is orders@sabjionwheels.com

<br>For any Complains & feedbacks please drop an email at feedbacks@sabjionwheels

<br>For Business and Marketing related Enquiries contact below mentioned numbers.
<br>
+918860001153(INDIA)<br>
+442036086273 (UK)<br>
+17605144306 (USA)<br></td>
  </tr>
    <tr>
</table>
<table  width="100%" border="1"  cellpadding="5" cellspacing="3"  class="invoice" style="border: 1px solid #006699"  >
    <tr>
    <td width="50%" class="invborder" >Billing Address </td>
    <td class="invborder">Shipping address</td>
  </tr>
    <tr>
    <td valign="top" class="invborder"> Company Name :
        <?=$rows->b_user_middle_name?>
        <br>
        User Email :
        <?=$rows->b_user_email?>
        <br>
        Name :<? echo $rows->b_user_first_name.' '.$rows->b_user_last_name; ?><br>
        Postal Address :
        <?=$rows->b_user_postal_address?>
        <br>
        Telephone      :
        <?=$rows->b_user_telephone?>
        <br>
        Fax            :
        <? if($rows->b_user_fax!=0) $rows->b_user_fax;?>
        <br>
        User City      :
        <?=$rows->b_user_city?>
        <br>
        User State     :
        <?=$rows->b_user_state?>
        <br>
        User Country   :
        <?=$rows->b_user_country?>
        <br>
        Zip:
        <?=$rows->b_user_zip_code?>
        <br></td>
    <td class="invborder"> 
        User Email :
        <?=$rows->b_user_email?>
        <br>
        Name :<? echo $rows->s_user_first_name.' '. $rows->s_user_last_name; ?><br>
        Postal Address :
        <?=$rows->s_user_postal_address?>
        <br>
        Telephone      :
        <?=$rows->s_user_telephone?>
        <br>
        Fax            :
        <? if($rows->s_user_fax!=0) $rows->s_user_fax;?>
        <br>
        User City      :
        <?=$rows->s_user_city?>
        <br>
        User State     :
        <?=$rows->s_user_state?>
        <br>
        User Country   :
        <?=$rows->s_user_country?>
        <br>
        Zip		       :
        <?=$rows->s_user_zip_code?>
        <br>
        Referral Code  :
        <?=$rows->referral_code;?></td>
  </tr>
  </table>
<table width="100%" border="1" cellpadding="5" cellspacing="3" class="invoice" style="border: 1px solid  #006699" >
    <tr>
    <td class="invborder"><strong>Order Status:-</strong>
        <?=isset($order_status[$rows->order_status])?($order_status[$rows->order_status]):'';?></td>
    <td class="invborder"><strong>Payment Status:-</strong>
        <?=isset($payment_status[$rows->payment_status])?($payment_status[$rows->payment_status]):'';?></td>
    <td class="invborder"><strong>Order Shipping Date :-</strong><?=$rows->shippingDate?></td>

  </tr>
    <tr>
    <td colspan="4" class="invborder"><strong>Payment Method:-</strong>
        <?=$rows->payment_method?></td>
  </tr>
  </table>
<table width="100%" border="0" cellpadding="5" cellspacing="3"  class="invoice" style="border: 1px solid  #006699" >
    <tr class="listing-head">
    <td class="invborder"><strong>Product</strong></td>
    
    <!--		<td>SKU</td> -->
    
    <td class="invborder"><strong>Qty</strong></td>
    <td align="right" class="invborder"><strong>SabjiOnWheel Price(Rs) </strong></td>
    <td class="invborder"><strong>Sub Total (Rs)</strong></td>
  </tr>
<?
$i=1;
while($rows_product=mysql_fetch_object($res_product))
{
$od_pid=$rows_product->order_product_id;
$sub_total=$rows_product->product_list_price*$rows_product->product_qty;		
$total+=$sub_total;			
?>
    <tr>
    <td class="invborder"><?=$rows_product->product_name?></td>
    <td class="invborder"><?=$rows_product->product_qty?></td>
    <td class="invborder" align="right">Rs.<?=number_format($rows_product->product_list_price,2)?></td>
    <td class="invborder">Rs.<?=number_format($sub_total,2)?></td>
  </tr>
    <?

$i++;

//$num=$num-1;

}
?>
    <tr>
    <td class="invborder" align="right" colspan="3">Total Cart Amount</td>
    <td class="invborder">Rs. <?=number_format($rows->total_cart_amount,2)?></td>
  </tr>
  <? 
  if(!empty($rows->total_spender_discount))
{
	echo '<tr><td class="invborder" align="right" colspan="3">Total Amount After '.$rows->total_spender_discount.'% Discount</td><td class="invborder">Rs.'.number_format($rows->order_amount_after_discount,2).'</td></tr>';
} ?>
    <tr>
    <td class="invborder" align="right" colspan="3"><b>TOTAL Payable Amount</b></td>
    <td class="invborder">Rs.<?=number_format($rows->order_net_payable_amount,2)?></td>
  </tr>
  <tr>

		<td style="border: 1px solid #275496"><b>Order Comments:</b></td>
		<td colspan="4" style="border: 1px solid #275496">&nbsp;
			<?=stripslashes($rows->order_comment)?></td>
	</tr>
    <tr>
    <td class="invborder" colspan="4">&nbsp;</td>
  </tr>
   
  </table>
</body>
</html>