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
	$res_get	=	mysql_query($sql_get_value);
	$order_detail	=	mysql_fetch_object($res_get);
 	$user_id   		  =	 $order_detail->user_id;
    $user_email		  =	 $order_detail->user_email;
	$user_middle_name= $order_detail->user_middle_name;
	$user_first_name=	 $order_detail->user_first_name;
	$compname=	 $order_detail->user_company;
	$pst= $order_detail->user_pst;
	$user_last_name	=	 $order_detail->user_last_name;			
	$user_telephone =	 $order_detail->user_telephone;
	$user_fax       =	 $order_detail->user_fax;
	$user_postal_address =	 $order_detail->user_postal_address;
    $user_city		  =	 $order_detail->user_city;
	$user_state		  =	 $order_detail->user_state;
	$user_country	  =	 $order_detail->user_country;
	$user_zip_code	=	 $order_detail->user_zip_code;
	
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
	$b_user_fax			=	$order_detail->b_user_fax;
	$b_user_telephone	=	$order_detail->b_user_telephone;
	$s_user_first_name	=	$order_detail->s_user_first_name;
	$s_user_middle_name	=	$order_detail->s_user_middle_name;
	$s_user_last_name	=	$order_detail->s_user_last_name;
	$s_user_email		=	$order_detail->s_user_email;
	$s_user_telephone 	=	$order_detail->s_user_telephone;	
	$s_user_fax			=	$order_detail->s_user_fax;
	$s_user_postal_address	=$order_detail->s_user_postal_address;
	$s_user_city		=	$order_detail->s_user_city;	
	$s_user_zip_code	=	$order_detail->s_user_zip_code;
	$s_user_state		=	$order_detail->s_user_state;
	$s_user_country		=	$order_detail->s_user_country;
    $shippingDate		=	date("Y-m-d",strtotime($order_detail->shippingDate));
    $shippingTimeSlot	=$order_detail->shippingTimeSlot;
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
  <div class="feeback-heading">Confirm Order</div>
   <div class="main-content-wrapper">
			  <div class="main-content item-block-3">
			    <div class="content">
			      <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
                     <td><?=$msg1;?>
					  <?php
                            if(count($arrCart)>0)
                            {
                      ?>  
                            <form name="confirmCart" method="post" action="success.php">
                            <div class="separ"/>
                            <div style="padding: 1px;" class="main_block">
                            <div id="confirmDetails" class="centerColumn">
                            <fieldset>
                            <legend class="text12"><strong>Please confirm Order Details.</strong></legend>
                            <div class="instructions">
                            
                            <div id="PriceDetails">
                               <table width="100%" border="0" cellspacing="2" cellpadding="5" style="border:#C1C1C1 1px solid;">
			
			<tr style="text-align:center;" class="table-heading">
				<td align="left" bgcolor="#7E7F81" >Product</td>
				<td align="left" bgcolor="#7E7F81"  >Qty</td>
				<td align="right" bgcolor="#7E7F81"  >SABJIONWHEELS Price</td>
				<td align="right" bgcolor="#7E7F81"  >Sub Total</td>
				</tr>
			<?php
			$totalCartAmount=0.00;
			$prod_query=mysql_query("select * from cart_order_product_info where order_id=$order_id");
			while($prod_query && $p_row=mysql_fetch_array($prod_query))
			{
				$product_price=$p_row['product_list_price'];
				$qty=$p_row['product_qty'];
				$subtotal		=	($product_price * $qty);
				$prod_id	    =	$p_row['product_id'];
				$od_pid		    =	$p_row['order_product_id'];
				$totalCartAmount+=$subtotal;
				$product_priceDisp		=	number_format($product_price,2);
				$subtotalDisp 			=	number_format($subtotal,2);
				$totalCartAmountDisp	=	number_format($totalCartAmount,2);
				$tQty=$tQty+$qty;
$totalPayableAmount=$totalCartAmount;
	?>			<tr>
				<td align="left" bgcolor="#F3F3F5" style="border:1px solid #7E7F81">
				  <?=$p_row['product_name'];?>
				</td>
				<td align="left"  bgcolor="#F3F3F5" style="border:1px solid #7E7F81" ><?=$qty?></td>
				<td align="right"  bgcolor="#F3F3F5" style="border:1px solid #7E7F81" >
					<div align="right">Rs <?=$product_priceDisp?>				
					  </div></td>
				<td  bgcolor="#F3F3F5" style="border:1px solid #7E7F81" ><div align="right"><?=$cname?> <?=$subtotalDisp;?>
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
                            <br>
                            <div align="left">
                            <label for="shipping" class="btn">
                            <strong ></strong></label>
                            </div>
                            <table cellpadding="0" width="100%" cellspacing="0" border="0" class="text">
                            <tr>
                            <td width="18%" align="left">
                              <br />
                              <strong>Billing Address :</strong>
                            </td>
                            <td align="left">
                            <br />
                              <a href="checkout.php" class="obtn"><span>Change Address</span></a>
                            </td>
                            </tr>
                            
                            <tr>
                            <td colspan="2" align="left">
                            <div class="text-black">
                            <br />
                            Your billing address is shown below. The billing address should match the address on your
                            credit card statement. You can change the billing address by clicking the <em>Change Address</em> button.</div></td>
                            </tr>
                            <tr>
                            <td width="150" align="left">
                            <br />
                            E - Mail Address:</td>
                            <td align="left">
                            <br />
                            <? if($b_user_email!='') echo $b_user_email;?></td>
                            </tr>
                            <tr>
                            <td width="150" align="left" valign="top">
                            <br />
                            Billing Address:</td>
                            <td align="left">
                            <br />
                            <? if($b_user_middle_name!='') echo $b_user_middle_name;?>
                            <br />
                            <? if($b_user_first_name!='') echo $b_user_first_name;?>&nbsp;&nbsp;<? if($b_user_last_name!='') echo $b_user_last_name;?>
                            <br >
                            <? if($b_user_postal_address!='') echo $b_user_postal_address;?>
                             <br>
                            <? if($b_user_country!='') echo $b_user_country;?>
                            <br>
                            <? if($b_user_city!='') echo $b_user_city;?>
                            <br>
                            <? if($b_user_state!='') echo $b_user_state;?>
                            <br >
                            <? if($b_user_telephone!='') echo $b_user_telephone;?>
                            <br >
                            <? if($b_user_zip_code!='') echo $b_user_zip_code;?>
                            </tr>
                            
                            <tr>
                            <td width="150" align="left">
                            <br />
                            <strong>Shipping Address :</strong></td>
                            <td align="left">
                            <br />
                            <a href="checkout.php" class="obtn"><span>Change Address</span></a></td>
                            </tr>
                            <tr>
                            <td colspan="2" align="left">
                            <br />
                            <span class="text-black">Your order will be shipped to the address below or you may change the shipping address by clicking the <em>Change Address</em> button.</span></td>
                            </tr>
                            
                            <tr>
                            <td width="150" align="left">
                            <br />
                            E - Mail Address:</td>
                            <td align="left">
                            <br />
                            <? if($s_user_email!='') echo $s_user_email;?></td>
                            </tr>
                            <tr>
                            <td width="150" align="left" valign="top">
                            <br />
                            Shipping Address:</td>
                            <td align="left">
                            <br />
                            <? if($s_user_first_name!='') echo $s_user_first_name;?>&nbsp;&nbsp;<? if($s_user_last_name!='') echo $s_user_last_name;?>
                            <br>
                            <? if($s_user_postal_address!='') echo $s_user_postal_address;?>
                            <br>
                            <? if($s_user_country!='') echo $s_user_country;?>
                            <br>
                            <? if($s_user_city!='') echo $s_user_city;?>
                            <br>
                            <? if($s_user_state!='') echo $s_user_state;?>
                            <br>
                            <? if($s_user_telephone!='') echo $s_user_telephone;?>
                            <br>
                            <? if($s_user_zip_code!='') echo $s_user_zip_code;?>
                            <br>
                            <? if($shippingDate!='') echo $shippingDate;?>
                            <br>
                            <? if($shippingTimeSlot!='') echo $shippingTimeSlot;?>
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
                         <input type="hidden" name="order_amount_after_discount" value="<?=$totalPayableAmount?>" />
                         <input type="hidden"  id="totalCartAmount" name="totalCartAmount" value="<?=$totalCartAmount?>" />
                         <input type="hidden"  id="totalPayableAmount" name="totalPayableAmount" value="<?=$totalPayableAmount?>" />
                            </div>
                        </form>
    
					<?php
                    }
                    else
                    {
                    ?>
                    <address class="back" >
                    <span class="text-black">There are no products in your cart.</span> <span class="font12"><a href="index.php"  class="font12"> Go to Our Products Page</a>. 
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