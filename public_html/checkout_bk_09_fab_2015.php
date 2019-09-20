<?php
include_once("config.php");
include_once("logic/logicLogin.php");
include_once("common/msg.php");
$ObjUserLogin=new UserLogin();  
$_SESSION['from-cart']='true';
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
//session_destroy();
    $userId=$_SESSION['user']['user_id'];
    $sql_get_value	=	"select * from cart_user where user_id=$userId";
	$res_get	=	mysql_query($sql_get_value);
	$user_row	=	mysql_fetch_object($res_get);
 	$user_id   		  =	 $user_row->user_id;
    $user_email		  =	 $user_row->user_email;
	$user_middle_name= $user_row->user_middle_name;
	$user_first_name=	 $user_row->user_first_name;
	$compname=	 $user_row->user_company;
	$pst= $user_row->user_pst;
	$user_last_name	=	 $user_row->user_last_name;			
	$user_telephone =	 $user_row->user_telephone;
	$user_fax       =	 $user_row->user_fax;
	$user_postal_address =	 $user_row->user_postal_address;
    $user_city		  =	 $user_row->user_city;
	$user_state		  =	 $user_row->user_state;
	$user_country	  =	 $user_row->user_country;
	$user_zip_code	=	 $user_row->user_zip_code;
    $order_comment	=	 stripslashes($user_row->order_comment);
    if(isset($_SESSION['user']['order_id']) && !empty($_SESSION['user']['order_id']))
    {
      $sqlOrder="select * from cart_orders where order_id='".$_SESSION['user']['order_id']."'";
      $resOrder=mysql_query($sqlOrder);
      $rOrder=mysql_fetch_object($resOrder);
      $shippingDate=$rOrder->shippingDate;
      $shippingTimeSlot=$rOrder->shippingTimeSlot;
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<? include_once("commonTemplate/head.php");?>
<script type="text/JavaScript">
function ship_same_address()
{
	var ObjForm = document.frmCheckOut;	
	if(ObjForm.same.checked==true)
    {
		ObjForm.s_user_first_name.value=ObjForm.b_user_first_name.value;
		ObjForm.s_user_last_name.value=ObjForm.b_user_last_name.value;
		ObjForm.s_user_postal_address.value=ObjForm.b_user_postal_address.value;
		ObjForm.s_user_country.value=ObjForm.b_user_country.value;
		ObjForm.s_user_state.value=ObjForm.b_user_state.value;
		ObjForm.s_user_city.value=ObjForm.b_user_city.value;
	    ObjForm.s_user_telephone.value=ObjForm.b_user_telephone.value;
	    ObjForm.s_user_zip_code.value= ObjForm.b_user_zip_code.value;
		//$("#shipFrm").hide();
    }
    else
    { 
	  ObjForm.s_user_first_name.value="";
      ObjForm.s_user_last_name.value="";
      ObjForm.s_user_postal_address.value="";
	  ObjForm.s_user_country.value="";
	  ObjForm.s_user_state.value="";
      ObjForm.s_user_city.value="";	  
	  ObjForm.s_user_telephone.value="";
      ObjForm.s_user_zip_code.value="";
    }
}

$(document).ready(function() {
$("#frmCheckOut").validate({
                rules: {
                    b_user_first_name: "required",
					b_user_postal_address:"required",
					b_user_telephone: "required",
					b_user_city: "required",
					b_user_state: "required",
                    shippingDate: "required",
					shippingTimeSlot: "required",
					//agree: "required"
                },
                messages: {
					b_user_first_name: "<span>Please enter a first name</span>",
                    b_user_postal_address: "<span>Please enter address</span>",
					b_user_telephone: "<span>Please enter a phone number</span>",
					b_user_city: "<span>Please enter city</span>",
					b_user_state: "<span>Please enter state</span>",
                    shippingTimeSlot: "<span>Please select deliver time.</span>",
                    shippingDate: "<span>Please select deliver date.</span>",
					//agree: "<span style=\"float:left;margin-left:0\">Please check </span>"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
			
   ship_same_address();	
});



</script>
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
			      <form name="frmCheckOut" id="frmCheckOut" action="process_checkout.php" method="POST">
			       <div class="checkout-item contact-email">
			          <div class="main-title">
			            <p class="custom-font-1">Your contact e-mail</p>
                        <a class="continue" href="vegetables.php">Return to store</a>
		              </div>
			          <p><a href="#"><?=$user_email?></a>
                      <input type="hidden" name="b_user_email" value="<?=$user_email?>" /></p>
		            </div>
			        <div class="checkout-item billing-address">
			          <div class="main-title">
			            <p class="custom-font-1">Billing address</p>
		              </div>
			          <div class="items">
			           
			            <p>
			              <label>First name:</label>
			              <input type="text" name="b_user_first_name" id="b_user_first_name" class="input-text-1"  value="<?=isset($user_first_name)?$user_first_name:'';?>" />
		                </p>
			            <p>
			              <label>Last name:</label>
			              <input type="text" class="input-text-1" id="b_user_last_name" name="b_user_last_name" value="<?=isset($user_last_name)?$user_last_name:'';?>" />
			            </p>
			            <p>
			              <label>Address:</label>
			              <input type="text" name="b_user_postal_address" id="b_user_postal_address" class="input-text-1" value="<?=isset($user_postal_address)?$user_postal_address:'';?>" />
		                </p>
                        <p>
                           <label>Country:</label>
                            <input name="b_user_country" type="text" class="input-text-1" id="b_user_country" value="<?=isset($user_country)?$user_country:'';?>"  />
                        </p>  
                        <p>
                           <label>State:</label>
                            <input name="b_user_state" type="text" class="input-text-1" id="b_user_state" value="<?=isset($user_state)?$user_state:'';?>"  />
                        </p>   
                        <p>
			              <label>City:</label>
			              <input name="b_user_city" type="text" class="input-text-1" id="b_user_city" value="<?=isset($user_city)?$user_city:'';?>"  />
		                </p> 
			            <p>
			              <label>Phone:</label>
			              <input type="text" name="b_user_telephone" id="b_user_telephone" class="input-text-1" value="<?=isset($user_telephone)?$user_telephone:'';?>" />
		                </p>
                        <p>
                               <label>Zip Code:</label>
                                <input name="b_user_zip_code" type="text" class="input-text-1" tabindex="10" value="<? if($user_zip_code!='') echo $user_zip_code;?>" maxlength="50" />
                        </p> 
			            <p class="checkbox">
			              <input type="checkbox" name="same" id="same"  onclick="ship_same_address()" checked />
			              <span>Ship items to the above billing address </span>
                        </p>
                        <p>
                                <label>Shipping Date: (YYYY-MM-DD)</label>
                                <input name="shippingDate" id="shippingDate" type="text" class="input-text-1" tabindex="10"  maxlength="50" value="<?=$shippingDate?>" />
                        </p> 
                       <p class="checkbox">
			              <label>Shipping Time Slot:</label>
                          <select name="shippingTimeSlot" id="shippingTimeSlot" class="input-text-1">
                            <option value="">Time Slot</option>
                            <option value="10:00AM-1PM" <?=$shippingTimeSlot=='10:00AM-1PM'?'selected="selected"':''?>>10:00AM-1:00PM (Monday-Saturday)</option>
<option value="11:00AM-3:00PM" <?=$shippingTimeSlot=='11:00AM-3PM'?'selected="selected"':''?>>11:00AM-3:00PM (Monday-Saturday)</option>
                           
                            <option value="4PM-7PM" <?=$shippingTimeSlot=='4PM-7PM'?'selected="selected"':''?>>4:00PM-7:00PM (Monday-Saturday)</option>
                            <option value="6PM-9PM" <?=$shippingTimeSlot=='6PM-9PM'?'selected="selected"':''?>>6:00PM-9:00PM (Monday-Saturday)</option>                  
                                               
                          </select>
                        </p>
<p><b>Note: We do not deliver on Sunday's. You can place your orders for the next day and get 5% discount on the total bill.      
</b></p>
                       <p>
                               <label>Additional Instructions:</label>
                                <textarea name="order_comment" id="order_comment"  class="input-text-1" rows="10" cols="5"><?=$order_comment?></textarea>
                         </p> 
		              </div>
		            </div>
			        <div class="checkout-item shipping-address">
			          <div class="main-title">
			            <p class="custom-font-1">Shipping address</p>
		              </div>
                     
			          <div class="items">                         
                        <span id="shipFrm">
                         <p>
			              <label>First name:</label>
			              <input type="text" name="s_user_first_name" id="s_user_first_name" class="input-text-1"  value="<?=isset($res_query['s_user_first_name'])?$res_query['s_user_first_name']:'';?>" />
		                </p>
			            <p>
			              <label>Last name:</label>
			              <input type="text" class="input-text-1" id="s_user_last_name" name="s_user_last_name" value="<?=isset($res_query['s_user_last_name'])?$res_query['s_user_last_name']:'';?>" />
			            </p>
			            <p>
			              <label>Address:</label>
			              <input type="text" name="s_user_postal_address" id="s_user_postal_address" class="input-text-1" value="<?=isset($res_query['s_user_postal_address'])?$res_query['s_user_postal_address']:'';?>" />
		                </p>
                        <p>
                           <label>Country:</label>
                            <input name="s_user_country" class="input-text-1" id="s_user_country" value="<?=isset($res_query['s_user_country'])?$res_query['s_user_country']:'';?>"  />
                        </p>  
                        <p>
                           <label>State:</label>
                            <input name="s_user_state" type="text" class="input-text-1" id="s_user_state" value="<?=isset($res_query['s_user_state'])?$res_query['s_user_state']:'';?>"  />
                        </p>  
			            <p>
			              <label>City:</label>
			              <input name="s_user_city" type="text" class="input-text-1" id="s_user_city" value="<?=isset($res_query['s_user_city'])?$res_query['s_user_city']:'';?>"  />
		                </p>
                        <p>
                        
                        </p>
                        
			            <p>
			              <label>Phone:</label>
			              <input type="text" name="s_user_telephone" id="s_user_telephone" class="input-text-1" value="<?=isset($res_query['s_user_telephone'])?$res_query['s_user_telephone']:'';?>" />
		                </p>
                         <p>
                               <label>Zip Code:</label>
                                <input name="s_user_zip_code" type="text" class="input-text-1" tabindex="10" value="<? if($res_query['s_user_zip_code']!='') echo $res_query['s_user_zip_code']?>" maxlength="50" />
                         </p> 
                         
                        </span>
                        
		              </div>
		            </div>
			        <div class="clear"></div>
                     

			        <div class="next-step">
			           
                           <input type="submit"  name="submit" value="Continue to next step" style="width:17%" class="submit-btn custom-font-1" /></td>
		                
		            </div>
		          </form>
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