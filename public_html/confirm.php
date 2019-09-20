<?php
include_once("config.php");
include_once("logic/logicLogin.php");
include_once("common/msg.php");
$ObjUserLogin=new UserLogin();  
$ObjUserLogin->checkUserStatus(); 
$msg=isset($_REQUEST['msg'])?$_REQUEST['msg']:'';
$ObjMsg=new Msg();
//echo '<pre>';print_r($_SESSION['cart']);
$arrCart=array();
if(isset($_SESSION['cart']))
{
	$arrCart=$_SESSION['cart'];
	$arrCartCount=count($_SESSION['cart']);
}
else
$arrCartCount=0;
$totalQty=0;
$totalCartAmount =0;
$empMsg='';
$order_id	=	$_SESSION['user']['order_id'];

//session_destroy();
    $userId=$_SESSION['user']['user_id'];
    $sql_get_value="select * from cart_orders,cart_user where cart_orders.user_id=cart_user.user_id and order_id=$order_id";
	$res_get                  =	mysql_query($sql_get_value);
	$order_detail             =	mysql_fetch_object($res_get);
 	$user_id   		  =	 $order_detail->user_id;
        $user_email		  =	 $order_detail->user_email;
	$user_middle_name         =      $order_detail->user_middle_name;
	$user_first_name          =	 $order_detail->user_first_name;
	$compname                 =	 $order_detail->user_company;
	$pst                      =      $order_detail->user_pst;
	$user_last_name           =	 $order_detail->user_last_name;			
	$user_telephone           =	 $order_detail->user_telephone;
	$user_fax                 =	 $order_detail->user_fax;
	$user_postal_address      =	 $order_detail->user_postal_address;
        $user_city                =	 $order_detail->user_city;
	$user_state		  =	 $order_detail->user_state;
	$user_country             =	 $order_detail->user_country;
	$user_zip_code            =	 $order_detail->user_zip_code;
	
	$b_user_first_name	=	$order_detail->b_user_first_name;
	$b_user_middle_name	=	$order_detail->b_user_middle_name;
	$b_user_last_name	=	$order_detail->b_user_last_name;
	$b_user_postal_address	=	$order_detail->b_user_postal_address;
	$b_user_city		=	$order_detail->b_user_city;
	$b_user_zip_code	=	$order_detail->b_user_zip_code;
	$b_user_state		=	$order_detail->b_user_state;
	$b_user_state_id	=	$order_detail->b_user_state_id;
	$b_user_country_id	=	$order_detail->b_user_country_id;			
	$b_user_country		=	$order_detail->b_user_country;
	$b_user_email		=	$order_detail->b_user_email;
	$b_user_fax             =	$order_detail->b_user_fax;
	$b_user_telephone	=	$order_detail->b_user_telephone;
	$s_user_first_name	=	$order_detail->s_user_first_name;
	$s_user_middle_name	=	$order_detail->s_user_middle_name;
	$s_user_last_name	=	$order_detail->s_user_last_name;
	$s_user_email		=	$order_detail->s_user_email;
	$s_user_telephone 	=	$order_detail->s_user_telephone;	
	$s_user_fax		=	$order_detail->s_user_fax;
	$s_user_postal_address	=$order_detail->s_user_postal_address;
	$s_user_city		=	$order_detail->s_user_city;	
	$s_user_zip_code	=	$order_detail->s_user_zip_code;
	$s_user_state		=	$order_detail->s_user_state;
	$s_user_country		=	$order_detail->s_user_country;
    $shippingDate		=	date("Y-m-d",strtotime($order_detail->shippingDate));
    $shippingTimeSlot           =       $order_detail->shippingTimeSlot;
    
    
//Pay U Payment Gatway intigration    
    
    $tottal_bill_amt=0.00;
    $prod_query1=mysql_query("select * from cart_order_product_info where order_id=$order_id");
    while($prod_query1 && $p_row1=mysql_fetch_array($prod_query1))
    {
            $product_price1      =   $p_row1['product_list_price'];
            $qty1                =   $p_row1['product_qty'];
            $subtotal1           =	($product_price1 * $qty1);
            $prod_id1            =	$p_row1['product_id'];
            $od_pid1		 =	$p_row1['order_product_id'];
            $totalCartAmount1    +=  $subtotal1;
            $product_priceDisp1  =	number_format($product_price1,2);
            $subtotalDisp1       =	number_format($subtotal1,2);
            $totalCartAmountDisp1=	number_format($totalCartAmount1,2);
            $tQty1               =   $tQty1+$qty1;
            $totalPayableAmount1 =   $totalCartAmount1;
    }
if($totalCartAmount1 >= 1000) 
{ 
    $discountPerc1=5;
    $discountedAmount1=($totalCartAmount1*$discountPerc1)/100;
    $totalPayableAmount1=($totalCartAmount1 - $discountedAmount1);
}	
elseif($totalCartAmount1 < 299) 
{ 
    $shippingCharge1=30;
}
			
				  
$totalPayableAmount1            =   ($totalPayableAmount1	+ $shippingCharge1);
				   
$totalPayableAmountDisp1	=	number_format($totalPayableAmount1,2);
    
$totalPayableAmountDisp_payu = str_replace( ',', '', $totalPayableAmountDisp1);
//$totalPayableAmountDisp_payu1 = floatval($totalPayableAmountDisp_payu);
//echo $totalPayableAmountDisp_payu; exit;
    // Merchant key here as provided by Payu
$MERCHANT_KEY = "vKsH9w";

// Merchant Salt as provided by Payu
$SALT = "jTdiutYq";

// End point - change to https://secure.payu.in for LIVE mode https://test.payu.in
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';
$form_action = '';
$posted = array();
if($_POST['pay_via'] == 'Pay Online' ) {
  $posted = array(
      "key"=>'vKsH9w',
      "hash"=>'',
      "txnid"=>$order_id,
      "amount"=>$totalPayableAmountDisp_payu,
      "firstname"=>$b_user_first_name,
      "email"=>$b_user_email,
      "phone"=>$b_user_telephone,
      "productinfo"=>$order_id,
      "surl"=>'http://www.sabjionwheels.com/success.php',
      "furl"=>'http://www.sabjionwheels.com/success.php',
      "service_provider" => 'payu_paisa',
      "lastname" => '',
      "curl" => 'http://www.sabjionwheels.com',
      "address1" => '',
      "address2" => '',
      "city" => '',
      "state" => '',
      "country" => '',
      "zipcode" => '',
      "udf1" => '',
      "udf2" => '',
      "udf3" => '',
      "udf4" => '',
      "udf5" => '',
      "pg" => '');
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
   
    
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
  
   
}
   
if($_SESSION['user']['payment_option'] == 'cod')
{
    $payment_option = 'Cash On Delivery';
    $form_action = 'success.php';
}
else
{
    $payment_option = 'Pay Online';
    $_SESSION['total_discount_allowed_on_order']    =   $discountPerc1;						
    $_SESSION['order_amount_after_discount']        =   $totalPayableAmount1;
    $_SESSION['totalPayableAmount']                 =   $totalPayableAmount1;
    $_SESSION['totalCartAmount']                    =   $totalPayableAmount1;
    $_SESSION['shippingCharge']                     =   $shippingCharge1;
    if ($_POST['pay_via'] == 'Pay Online')
    {
        $form_action_pay_u = $action;
    }
    else
    {
        $form_action_pay_u = '';
    }
    
    $form_action = '';
    $payu_form = 'payuForm';
    
}
?>
<!DOCTYPE HTML>
<html>
<head>
<? include_once("commonTemplate/head.php");?>
<link href="css/checkout.css" rel="stylesheet">
 <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
</head>

<body  onload="submitPayuForm()">
<? include_once("commonTemplate/header.php")?>
<section>
<div class="feedback-outer">
  <div class="feedback-inner">
  <div class="feeback-heading">Please Confirm Order Details:</div>
   <div class="main-content-wrapper">
			  <div class="main-content item-block-3">
			    <div class="content">
			      <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
                     <td height="300" align="center" valign="top"><?=$msg1;?>
					  <?php
                            if(count($arrCart)>0)
                            {
                      ?>  
                            <form name="confirmCart" method="post" action="<?php echo $form_action; ?>">
                            <div class="separ"/>
                            <div style="padding: 1px;" class="main_block">
                            <div id="confirmDetails" class="centerColumn">
                            <fieldset>
                            <legend class="text12"><strong></strong></legend>
                            <div class="instructions">
                            
                            <div id="PriceDetails" style="background:#FFF;">
                               <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#F3F3F5" style="border:#C1C1C1 1px solid;">
			
			<tr style="text-align:center;" class="table-heading">
				<td align="center" valign="top" bgcolor="#669933" style="border-right:1px solid #FFF" >Product</td>
				<td align="center" valign="top" bgcolor="#669933" style="border-right:1px solid #FFF"   >Qty</td>
				<td align="center" valign="top" bgcolor="#669933" style="border-right:1px solid #FFF"  >SABJIONWHEELS Price</td>
				<td align="center" valign="top" bgcolor="#669933"  >Sub Total</td>
				</tr>
			<?php
			$totalCartAmount=0.00;
			$prod_query=mysql_query("select * from cart_order_product_info where order_id=$order_id");
			while($prod_query && $p_row=mysql_fetch_array($prod_query))
			{
				$product_price      =   $p_row['product_list_price'];
				$qty                =   $p_row['product_qty'];
				$subtotal           =	($product_price * $qty);
				$prod_id	    =	$p_row['product_id'];
				$od_pid		    =	$p_row['order_product_id'];
				$totalCartAmount    +=  $subtotal;
				$product_priceDisp  =	number_format($product_price,2);
				$subtotalDisp       =	number_format($subtotal,2);
				$totalCartAmountDisp=	number_format($totalCartAmount,2);
				$tQty               =   $tQty+$qty;
                                $totalPayableAmount =   $totalCartAmount;
	?>			<tr>
				<td align="left" bgcolor="#F3F3F5" style="border:1px solid #7E7F81">
				  <?=$p_row['product_name'];?>
				</td>
				<td align="center"  bgcolor="#F3F3F5" style="border:1px solid #7E7F81" ><?=$qty?></td>
				<td align="right"  bgcolor="#F3F3F5" style="border:1px solid #7E7F81" >
					<div align="right">Rs <?=$product_priceDisp?>				
					  </div></td>
				<td  bgcolor="#F3F3F5" style="border:1px solid #7E7F81" ><div align="right">Rs.<?=$subtotalDisp;?>
				  </div></td>
				</tr>
			<?php	
	
			}
			?>
            
			
			<tr style="text-align:right; ">
				<td colspan="4"   bgcolor="#F3F3F5" style="border:1px solid #7E7F81">
                <div align="right">Total Cart Amount: </div>
                </td>
				<td colspan="1"   bgcolor="#F3F3F5" style="border:1px solid #7E7F81" >Rs.<?=$totalCartAmountDisp?></span></td>
				</tr>
			<?php	
			if($totalCartAmount >= 1000) 
			{ 
			$discountPerc=5;
			?>
			
            <tr style="text-align:right; ">
				<td colspan="4"   bgcolor="#F3F3F5" style="border:1px solid #7E7F81">
                <div align="right"><?=$discountPerc?> % Discount :</div>
                </td>
				<td colspan="1"   bgcolor="#F3F3F5" style="border:1px solid #7E7F81" >
				  <?  $discountedAmount=($totalCartAmount*$discountPerc)/100;
				      echo number_format($discountedAmount,2);
				      $totalPayableAmount=($totalCartAmount	-	$discountedAmount);
				   ?> 
				</td>
			</tr>
            <tr style="text-align:right; ">
				<td colspan="4" bgcolor="#F3F3F5" style="border:1px solid #7E7F81">
                <div align="right">Total Amount After Discount:</div></td>
				<td colspan="1" bgcolor="#F3F3F5" style="border:1px solid #7E7F81" ><?=number_format($totalPayableAmount,2)?>				
				</td>
			</tr>
			<? 	}	
			elseif($totalCartAmount < 299) 
			{ 
			$shippingCharge=30;
			?>
			
            <tr style="text-align:right; ">
				<td colspan="4"   bgcolor="#F3F3F5" style="border:1px solid #7E7F81">
                <div align="right">Shipping Charge (Order Less Than 299) :</div>
                </td>
				<td colspan="1"   bgcolor="#F3F3F5" style="border:1px solid #7E7F81" >Rs.
				  <?  echo $shippingCharge;
				      $totalPayableAmount=($totalCartAmount	+	$shippingCharge);
				   ?> 
				</td>
			</tr>
            <tr style="text-align:right; ">
				<td colspan="4" bgcolor="#F3F3F5" style="border:1px solid #7E7F81">
                <div align="right">Total Amount After Shipping Charge:</div></td>
				<td colspan="1" bgcolor="#F3F3F5" style="border:1px solid #7E7F81" >Rs.<?=number_format($totalPayableAmount,2)?>				
				</td>
			</tr>
			<? 	}?>
             <? 	$totalPayableAmountDisp	=	number_format($totalPayableAmount,2);?>
			<tr style="text-align:right; ">
				<td colspan="4"  bgcolor="#F3F3F5" style="border:1px solid #7E7F81" >
                <div align="right">Total Amount Payable</div></td>
				<td   bgcolor="#F3F3F5" style="border:1px solid #7E7F81" >Rs.<?=$totalPayableAmountDisp?></td>
			</tr>	
		</table>
                            </div>
                            </div>
                            
                            <div align="left">
                            <label for="shipping" class="btn">
                            <strong ></strong></label>
                            </div>
                            <table cellpadding="0" width="95%" cellspacing="0" border="0" class="text">
                            
                            
                            
                            
<tr>
                            <td width="150" align="left" valign="top">
                            <br />
                            Shipping Date & Time:<br/>
                            (YYYY-MM-DD)<br> Payment Type : </td>
                            <td align="left">
                            <br />

                            <? if($shippingDate!='') echo $shippingDate;?>
                            <br>
                            <? if($shippingTimeSlot!='') echo $shippingTimeSlot;?>
                            <br>
                            <? echo $payment_option ?>
                            </tr>
                            
                            <tr>
                            <td align="right" style="padding-top:20px; padding-right:10px;">
                             <a href="/checkout.php" class="obtn"><span style="width:60px;">Checkout</span></a></td>
                            <td align="left" style="padding-top:20px;">
                             <input name="continue" type="submit" value="Submit Order" style="width:18%" class="submit-btn custom-font-1"/>
                            </td>
                            </tr>
                            </table>
                            </fieldset>
                            </div>
                         <input type="hidden" name="order_id" value="<?=$order_id?>" />
                         <input type="hidden" name="total_discount_allowed_on_order" value="<?=$discountPerc?>" />
                         <input type="hidden" name="shippingCharge" value="<?=$shippingCharge?>" />
                         <input type="hidden" name="order_amount_after_discount" value="<?=$totalPayableAmount?>" />
                         <input type="hidden"  id="totalCartAmount" name="totalCartAmount" value="<?=$totalCartAmount?>" />
                         <input type="hidden"  id="totalPayableAmount" name="totalPayableAmount" value="<?=$totalPayableAmount?>" />
                        <!--pay u payment hidden variables-->
                        <input type="hidden" name="pay_via" value="<?= $payment_option ?>" />
                         
                            </div>
                        </form>
                         
                         <form name="payuForm" method="post" action="<?php echo $form_action_pay_u; ?>">
                            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
                            <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                            <input type="hidden" name="txnid" value="<?php echo $order_id;  ?>" />
                            <input type="hidden" name="amount" value="<?php echo str_replace( ',', '', $totalPayableAmountDisp1); ?>" />
                            <input type="hidden" name="firstname" id="firstname" value="<?php echo $b_user_first_name; ?>" />
                            <input type="hidden" name="email" id="email" value="<?php echo $b_user_email; ?>" />
                            <input type="hidden" name="phone" value="<?php echo $b_user_telephone; ?>" />
                            <input type="hidden" name="productinfo" value="<?php echo $order_id; ?>" />
                            <input type="hidden" name="surl" value="http://www.sabjionwheels.com/success.php" size="64" />
                            <input type="hidden" name="furl" value="http://www.sabjionwheels.com/success.php" size="64" />
                            <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                            <input type="hidden" name="curl" value="http://www.sabjionwheels.com" />
                         </form>
    
					<?php
                    }
                    else
                    {
                    ?>
                    <address class="back" >
                    <span class="text-black"><br>
There are no products in your cart.</span> <span class="font12"><a href="index.php"  class="font12"> Go to Our Products Page</a>. 
                    </span>
                    </address>
                    <br class="clearBoth"/>
                    <?php
                    }
                    ?>			
                    </td>
                  </tr>
                </table>
			      <div class="clear"></div>
		        </div>
			    <!-- END .main-content -->
		      </div>
	</div>
<p></p>
 </div>
 </div>
</section>
<? include_once("commonTemplate/footer.php") ?>
</body>
</html>