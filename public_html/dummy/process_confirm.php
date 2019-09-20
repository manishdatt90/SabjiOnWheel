<?php	
		include_once($_SERVER['DOCUMENT_ROOT']."/config.php");
		include_once("logic/logicLogin.php");
		include_once("common/logicCommon.php");
		include_once($_SERVER['DOCUMENT_ROOT']."/common/cart_functions.php");
		include_once($_SERVER['DOCUMENT_ROOT']."/common/functions.php");
	
		// create object of classes
		$ObjlogicCommon 	=	new logicCommon();	
		$ObjUserLogin 		= 	new UserLogin();
		$ObjcartFunctions	= 	new cartFunctions();		
		
		// redirect to login page for new registration or login
		$ObjUserLogin->checkUserStatus();
		
		// get merchant details
		$sql_merchant	=	" select * from cart_merchant where merchant_status = 1 ";
		$res_merchant	=	mysql_query($sql_merchant);
		
		if($res_merchant && mysql_num_rows($res_merchant) > 0 )
		{	
			$row_merchant			=	mysql_fetch_object($res_merchant);			
						
			$merchant_company_name	=	$row_merchant->merchant_company_name;
			$merchant_postal_address=	$row_merchant->merchant_postal_address;	
			$merchant_zip_code		=	$row_merchant->merchant_zip_code;
			$merchant_state			=	$row_merchant->merchant_state;	
			$merchant_country		=	$row_merchant->merchant_country;	
			$merchant_telephone		=	$row_merchant->merchant_telephone;
			$merchant_fax			=	$row_merchant->merchant_fax;
			$merchant_email			=	$row_merchant->merchant_email;
			$merchant_city			=	$row_merchant->merchant_city;					
		}
		else
		{
			$merchant_company_name	=	'';
			$merchant_postal_address=	'';
			$merchant_city			=	'';				
			$merchant_zip_code		=	'';
			$merchant_state			=	'';	
			$merchant_country		=	'';	
			$merchant_telephone		=	'';
			$merchant_fax			=	'';
			$merchant_email			=	'';		
		}	
		
		$sessInfo			=	$ObjlogicCommon->getSessionInfo();	
		$order_id			=	$sessInfo['user']['order_id'];
		$arrCart			=	$sessInfo['cart'];		
		$user_id			=	$sessInfo['user']['user_id'];
	  
		$Confirm_Order		=	isset($_REQUEST['Confirm_Order'])?$_REQUEST['Confirm_Order']:0;
		$crossSellDiscount	=	isset($_REQUEST['crossSellDiscount'])?$_REQUEST['crossSellDiscount']:0;
		$bigSpenderDis		=	isset($_REQUEST['bigSpenderDis'])?$_REQUEST['bigSpenderDis']:0;
		$totalCouponDis		=	isset($_REQUEST['totalCouponDis'])?$_REQUEST['totalCouponDis']:0;
		$TotalBigSpenderDiscount=isset($_REQUEST['TotalBigSpenderDiscount'])?$_REQUEST['TotalBigSpenderDiscount']:0;
		$referral_discount	=	isset($_REQUEST['referral_discount'])?$_REQUEST['referral_discount']:0;
		$gift_amount		=	isset($_REQUEST['gift_amount'])?$_REQUEST['gift_amount']:0;
		$points_to_redeem		=	isset($_REQUEST['points_to_redeem'])?$_REQUEST['points_to_redeem']:0;
		//tax details		
	 	$shippingCharge		=	isset($_REQUEST['shippingCharge'])?$_REQUEST['shippingCharge']:0;
		$shippingType		=	isset($_REQUEST['shippingType'])?'Canada Post '.$_REQUEST['shippingType']:0;
			
				
	
		$shippingDiscount	=	isset($_REQUEST['shippingDiscount'])?$_REQUEST['shippingDiscount']:0;
		$shippingFinal		=	isset($_REQUEST['shippingFinal'])?$_REQUEST['shippingFinal']:0;
		
		//tax details		
		$total_cart_amount	=	isset($_REQUEST['totalCartAmount'])?$_REQUEST['totalCartAmount']:0;							
		$taxable_cart_amount=	isset($_REQUEST['taxableCartAmount'])?$_REQUEST['taxableCartAmount']:0;		
		$tax_name		=	isset($_REQUEST['taxname'])?$_REQUEST['taxname']:0;
		$tax_amount			=	isset($_REQUEST['taxAmount'])?$_REQUEST['taxAmount']:0;
		
		$finalPayableAmount	=	isset($_REQUEST['finalPayableAmount'])?number_format($_REQUEST['finalPayableAmount'],2):0;
		
		if($Confirm_Order=="Confirm" && $order_id>0 && $user_id > 0)
		{				

		$sql_confirm_update = " Update cart_orders set points_to_redeem='$points_to_redeem', gift_amount='$gift_amount', x_sell_discount = '$crossSellDiscount' ,spender_discount = '$bigSpenderDis' ,total_spender_discount = '$TotalBigSpenderDiscount' ,coupon_discount = '$totalCouponDis', referral_discount_amount = '$referral_discount' , shipping_amount = '$shippingCharge', shipping_discount_amount = '$shippingDiscount', shipping_final_amount = '$shippingFinal',shipping_type='$shippingType', total_cart_amount = '$total_cart_amount', taxable_cart_amount =  '$taxable_cart_amount', tax_name = '$tax_name', tax_amount = '$tax_amount', order_net_payable_amount = '$finalPayableAmount' where order_id='$order_id' AND user_id='$user_id' ";	
		$res_confirm_update	=	mysql_query($sql_confirm_update);
		$amount=$total_cart_amount-$points_to_redeem-$gift_amount-$crossSellDiscount-$bigSpenderDis-$TotalBigSpenderDiscount-$totalCouponDis-$referral_discount;
		if($amount>0)
		{
			$points=0;
			$affiliate_id=get_single_value("cart_orders","affiliate_user_id","order_id='$order_id'");
			if(!empty($affiliate_id))
			{
				$affiliate_point_per=get_single_value("cart_user","affiliate_points_percent","user_id='$affiliate_id'");
				$affiliate_point_per=!empty($affiliate_point_per)?$affiliate_point_per:get_single_value("points_rule","rule","rule_place_holder='{##AFFILIATE-POINT-PERCENTAGE##}'");
				if($affiliate_point_per>0)
				{
					$points_affiliate=$amount*$affiliate_point_per/100;
					$qry_sel="select * from user_point where user_id='$affiliate_id' and order_id='$order_id'";
					$res_sel=mysql_query($qry_sel);
					if(mysql_num_rows($res_sel))
					{
					$row_sel=mysql_fetch_object($res_sel);
					$qry="update user_point set point_date=now(),
												points='$points_affiliate'
												where user_point_id=$row_sel->user_point_id";
					}
					else
					{
					$qry="insert into user_point (user_id,order_id,point_date,points) values('$affiliate_id','$order_id',now(),'$points_affiliate')";
					}
					mysql_query($qry);
				}
			}
			$point_per=get_single_value("cart_user","points_percent","user_id='$user_id'");
			$point_per=!empty($point_per)?$point_per:get_single_value("points_rule","rule","rule_place_holder='{##PURCHASE-POINT-PERCENTAGE##}'");
			if($point_per>0)
			{
				$points+=($amount*$point_per)/100;
			}
			if(!empty($_SESSION[referal_code]))
			{
				$qry_referal="select * from cart_user where referal_code='$_SESSION[referal_code]' and user_id<>'$user_id'";
				$res_referal=mysql_query($qry_referal);
				if(mysql_num_rows($res_referal)>0)
				{
					$row_referal=mysql_fetch_object($res_referal);
					$referal_id=$row_referal->user_id;
					$referal_point_per=$row_referal->referal_points_percentage;
					$referal_point_per=!empty($referal_point_per)?$referal_point_per:get_single_value("points_rule","rule","rule_place_holder='{##REFERAL-POINT-PERCENTAGE##}'");
					if(!empty($referal_id) && !empty($referal_point_per))
					{
						$points_referal=$amount*$referal_point_per/100;
						$qry_sel="select * from user_point where user_id='$referal_id' and order_id='$order_id'";
						$res_sel=mysql_query($qry_sel);
						if(mysql_num_rows($res_sel))
						{
						$row_sel=mysql_fetch_object($res_sel);
						$qry="update user_point set point_date=now(),
														points='$points_referal'
														where user_point_id=$row_sel->user_point_id";
						}
						else
						{
						$qry="insert into user_point (user_id,order_id,point_date,points) values('$referal_id','$order_id',now(),'$points_referal')";
						}
						mysql_query($qry);
					}
					elseif(!empty($referal_id))
					{
					$refered_point_per=get_single_value("cart_user","refered_point_percentage","user_id='$user_id'");
					$refered_point_per=!empty($refered_point_per)?$refered_point_per:get_single_value("points_rule","rule","rule_place_holder='{##REFERED-POINT-PERCENTAGE##}'");
					$points+=$amount*$refered_point_per/100;
					}
				}
			}
			if(!empty($points))
			{
				$qry_sel="select * from user_point where user_id='$user_id' and order_id='$order_id'";
				$res_sel=mysql_query($qry_sel);
				if(mysql_num_rows($res_sel))
				{
				$row_sel=mysql_fetch_object($res_sel);
				$qry="update user_point set point_date=now(),
											points='$points'
											where user_point_id=$row_sel->user_point_id";
				}
				else
				{
					$qry="insert into user_point (user_id,order_id,point_date,points) values('$user_id','$order_id',now(),'$points')";
				}
				mysql_query($qry);
		  }
		}
			$msg="ord_confirmed";			
		}
		
		if($msg=="ord_confirmed")
		{
			header("location:https://www.flatohomeproducts.com/make_payment.php");
			exit;
		}?>