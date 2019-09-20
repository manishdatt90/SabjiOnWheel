<?
	include_once("config.php");
	include_once("logic/logicLogin.php");
	$cadrate=1;
	// create object of classes
	$ObjUserLogin = new UserLogin();
	$ObjUserLogin->checkUserStatus();
	$userId=$_SESSION['user']['user_id'];
        
  ///////////////////////////////////////////// Order Process STARTs //////////////////////////////             

    $user_first_name  = isset($_REQUEST['b_user_first_name'])?addslashes(trim($_REQUEST['b_user_first_name'])):'';
    $user_last_name   = isset($_REQUEST['b_user_last_name'])?addslashes(trim($_REQUEST['b_user_last_name'])):'';
    $b_user_email     = isset($_REQUEST['b_user_email'])?addslashes(trim($_REQUEST['b_user_email'])):'';    
    $b_user_postal_address= isset($_REQUEST['b_user_postal_address'])?addslashes(trim($_REQUEST['b_user_postal_address'])):'';
    $b_user_telephone = isset($_REQUEST['b_user_telephone'])?addslashes(trim($_REQUEST['b_user_telephone'])):'';
    $b_user_city      = isset($_REQUEST['b_user_city'])?addslashes(trim($_REQUEST['b_user_city'])):'';
    $b_user_country   = isset($_REQUEST['b_user_country'])?addslashes(trim($_REQUEST['b_user_country'])):'';
    $b_user_state= isset($_REQUEST['b_user_state'])?addslashes(trim($_REQUEST['b_user_state'])):'';  
    $b_user_zip_code= isset($_REQUEST['b_user_zip_code'])?addslashes(trim($_REQUEST['b_user_zip_code'])):'';
	
    $s_user_first_name= isset($_REQUEST['s_user_first_name'])?addslashes(trim($_REQUEST['s_user_first_name'])):$user_first_name;
    $s_user_last_name= isset($_REQUEST['s_user_last_name'])?addslashes(trim($_REQUEST['s_user_last_name'])):$user_last_name;
    $s_user_email= isset($_REQUEST['s_user_email'])?addslashes(trim($_REQUEST['s_user_email'])):$b_user_email;
    $s_user_postal_address =isset($_REQUEST['s_user_postal_address'])?addslashes(trim($_REQUEST['s_user_postal_address'])):$b_user_postal_address; 
    $s_user_telephone = isset($_REQUEST['s_user_telephone'])?addslashes(trim($_REQUEST['s_user_telephone'])):$b_user_telephone;
    $s_user_country     = isset($_REQUEST['s_user_country'])?addslashes(trim($_REQUEST['s_user_country'])):$b_user_country; 
    
	$s_user_city      = isset($_REQUEST['s_user_city'])?addslashes(trim($_REQUEST['s_user_city'])):$b_user_city; 
    $s_user_state    = isset($_REQUEST['s_user_state'])?addslashes(trim($_REQUEST['s_user_state'])):$b_user_state;
	$s_user_zip_code= isset($_REQUEST['s_user_zip_code'])?addslashes(trim($_REQUEST['s_user_zip_code'])):$b_user_zip_code;
    $shippingDate           = isset($_REQUEST['shippingDate'])?date('Y-m-d h:m:s',strtotime($_REQUEST['shippingDate'])):'';
    $shippingTimeSlot           = isset($_REQUEST['shippingTimeSlot'])?addslashes(trim($_REQUEST['shippingTimeSlot'])):'';
    $submit           = isset($_REQUEST['submit'])?addslashes(trim($_REQUEST['submit'])):'';
	$order_comment    = isset($_REQUEST['order_comment'])?addslashes(trim($_REQUEST['order_comment'])):'';
	if(isset($_SESSION['user']['order_id']))
	{
		$order_id	=	$_SESSION['user']['order_id'];
	}
	else
		$order_id	=	0;
	// insert the billing and shipping details in the order table for User
	$is_order_exist=false;
    if($userId!='' && empty($order_id))
    {
		$sql_checkout_order=" insert into cart_orders
		(user_id, b_user_first_name, b_user_middle_name, b_user_last_name, b_user_postal_address, b_user_city, b_user_zip_code, b_user_state, b_user_state_id , b_user_country_id , b_user_country, b_user_email, b_user_telephone, b_user_fax,	s_user_first_name, s_user_middle_name, s_user_last_name, s_user_email, s_user_telephone, s_user_fax, s_user_postal_address, s_user_city, s_user_zip_code, s_user_state, s_user_state_id, s_user_country_id , s_user_country, referral_code, order_comment, order_date, shipping_status, payment_status, order_status,payment_method,shippingTimeSlot,shippingDate)
		values
		('$userId', '$user_first_name', '$user_middle_name', '$user_last_name', '$b_user_postal_address', '$b_user_city', '$b_user_zip_code', '$b_user_state','$b_user_state_id','$b_user_country_id','$b_user_country', '$b_user_email', '$b_user_telephone', '$b_user_fax', '$s_user_first_name', '$s_user_middle_name', '$s_user_last_name', '$s_user_email', '$s_user_telephone', '$s_user_fax', '$s_user_postal_address', '$s_user_city', '$s_user_zip_code', '$s_user_state', '$s_user_state_id', '$s_user_country_id', '$s_user_country', '$referral_code', '$order_comment', NOW(),'1' , '1', '1','','$shippingTimeSlot','$shippingDate')";
	    $res_checkout_order = mysql_query($sql_checkout_order);
       // insert id is order id
		$order_id  = mysql_insert_id($conLink);
        // insert order id in session

		$_SESSION['user']['order_id']=$order_id;		
        if($res_checkout_order &&  $order_id>0)
          $msg="ins_order"; 

		if( $msg == "ins_order" && $order_id > 0 )	
		{
		// insert cart products in order product info table 
			
			$cart	=	$_SESSION['cart'];
			$cart_count = count($cart);
	
		    foreach($cart as $pid=>$value)
            {
                $proId=$value['proId'];
				$proName=$value['proName'];
				$proImg=$value['proImg'];
				$proMp=$value['proMp'];
				$proSp=$value['proSp'];
				$proQty=$value['proQty']; 
                $prodFinalMp	=	$proSp * $proQty;
				$totalCartAmount+=$prodFinalMp;
                $totalCartAmountDisp=number_format($totalCartAmount,2,'.',',');
				$prodFinalMpDisp=number_format($prodFinalMp,2,'.',',');

				$sql_order_product  = "INSERT INTO cart_order_product_info 
				( order_id, product_id,product_name,product_image,product_qty, product_list_price,product_unit_price, product_discounted_price, product_final_price, product_total_price, modified_date ) 
				VALUES ('$order_id','$proId','$proName','$proImg', '$proQty', '$proSp','$proMp','','$prodFinalMp', '$totalCartAmount', NOW()) ";

				$res_order_product		=	mysql_query($sql_order_product);
				$ins_order_product_id	=	mysql_insert_id();
			}
			
			if($res_order_product && $ins_order_product_id>0)
			{
				$msg="update_order_product";    
			}
			else
			{
				$msg="err_update_order_product";	// order product details not updated in order product deails table
			}
			
		
		}
		$is_order_exist=true;
	}
    elseif($userId!='' && $order_id > 0)
    {
	$sql_update_checkout_order=" Update cart_orders set b_user_first_name = '$user_first_name', b_user_middle_name = '$user_middle_name', b_user_last_name = '$user_last_name',  
    b_user_state = '$b_user_state', b_user_state_id = '$b_user_state_id' , b_user_country_id = '$b_user_country_id',b_user_postal_address = '$b_user_postal_address', 
    b_user_country = '$b_user_country', b_user_email = '$b_user_email',  b_user_telephone = '$b_user_telephone', b_user_city = '$b_user_city',  b_user_zip_code = '$b_user_zip_code',
    b_user_fax = '$b_user_fax', s_user_first_name = '$s_user_first_name', s_user_middle_name = '$s_user_middle_name',
    s_user_last_name = '$s_user_last_name', s_user_email = '$s_user_email', s_user_telephone = '$s_user_telephone',s_user_fax = '$s_user_fax', s_user_postal_address = '$s_user_postal_address', 
    s_user_city = '$s_user_city', s_user_zip_code = '$s_user_zip_code', s_user_state = '$s_user_state', s_user_state_id = '$s_user_state_id' , s_user_country_id = '$s_user_country_id', s_user_country = '$s_user_country', referral_code = '$referral_code', 
    order_comment = '$order_comment', order_date = NOW(),shippingTimeSlot='$shippingTimeSlot',shippingDate='$shippingDate'  where order_id = '$order_id' and user_id = '$userId' ";		
    $res_update_checkout_order	=	mysql_query($sql_update_checkout_order);	
		$msg	=	"update_order";
		if( $msg == "update_order")
		{
			$sql_order_product = "Delete from cart_order_product_info where order_id='$order_id' ";
			$res_order_product=mysql_query($sql_order_product);
		
			$cart	=	$_SESSION['cart'];
			$cart_count = count($cart);
			$order_values='';
			foreach($cart as $pid=>$value)
            {
                $proId=$value['proId'];
				$proName=$value['proName'];
				$proImg=$value['proImg'];
				$proMp=$value['proMp'];
				$proSp=$value['proSp'];
				$proQty=$value['proQty']; 
                $prodFinalMp	=	$proSp * $proQty;
				$totalCartAmount+=$prodFinalMp;
                $totalCartAmountDisp=number_format($totalCartAmount,2,'.',',');
				$prodFinalMpDisp=number_format($prodFinalMp,2,'.',',');

				$sql_order_product  = "INSERT INTO cart_order_product_info 
				( order_id, product_id,product_name,product_image,product_qty, product_list_price,product_unit_price, product_discounted_price, product_final_price, product_total_price, modified_date ) 
				VALUES ('$order_id','$proId','$proName','$proImg', '$proQty', '$proSp','$proMp','','$prodFinalMp', '$totalCartAmount', NOW()) ";

				$res_order_product		=	mysql_query($sql_order_product);
				$ins_order_product_id	=	mysql_insert_id();
			}
			
			
			if($res_order_product && $ins_order_product_id>0)
			{
				$msg="update_order_product";    
			}
			else
			{
				$msg="err_update_order_product";	// order product details not updated in order product deails table
			}			
		}
		else
		{
			$msg="err_update_order"; // order not updated in order table
		}

		$is_order_exist=true;

    }
	else
    {
      $msg="order_fail";
    }
	if($is_order_exist==true)
	{
		$user_info_update_qry="Update cart_user set
								user_first_name = '$user_first_name',
								user_middle_name = '$user_middle_name',
								user_last_name = '$user_last_name',
								user_postal_address = '$b_user_postal_address',
								user_city = '$b_user_city',
								user_zip_code = '$b_user_zip_code',								
								user_state = '$b_user_state',
								user_country = '$b_user_country',
								user_telephone = '$b_user_telephone',
								user_fax = '$b_user_fax',
								modified_date=now() where user_id=".$_SESSION['user']['user_id'];
								mysql_query($user_info_update_qry);
	}

	if($msg!="")
    {
        $_SESSION['user']['payment_option'] = $_REQUEST['payment_option'];
        header("location:confirm.php?msg=".$msg);
	exit;
    }

///////////////////////////////////////////// Order Process ENDs //////////////////////////////

?>

