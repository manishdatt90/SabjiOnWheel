<?php
include_once("../config.php");
include_once("../logic/logicLogin.php");
include_once("../common/msg.php");
$ObjUserLogin=new UserLogin();  
$ObjUserLogin->checkUserStatus(); 
$msg=isset($_REQUEST['msg'])?$_REQUEST['msg']:'';
$ObjMsg=new Msg();
	
	$mode	= '';
	$user_id = '';
	$user_middle_name	='';
	$user_first_name	='';
	$user_last_name	='';
	$user_postal_address=	'';
	$user_city		=	'';
	$user_zip_code=	'';
	$user_state		=	'';
	$user_country	=	'';
  	$user_telephone	=	'';
  	$user_fax	=	'';
	$conf_password ='';
	$password ='';
	$change_password='';
	
	
	
	$change_password = isset($_REQUEST['change_password'])?$_REQUEST['change_password']:'';
	
	$msg = isset($_REQUEST['msg'])?$_REQUEST['msg']:'';
	

  $user_id  = $_SESSION['user']['user_id'];
 
    $mode	=  !empty($_REQUEST['mode'])?'edit':'';

    // set value for edit
			$sql_get_value	=	" select * from cart_user where user_id= $user_id ";
			$res_get	=	mysql_query($sql_get_value);
			$user_row	=	mysql_fetch_object($res_get);
			
      ///echo "<pre>----test";      print_r($user_row);	die;
			$user_id   		  =	 $user_row->user_id;
      		$user_email		  =	 $user_row->user_email;
			$user_first_name=	 $user_row->user_first_name;
			$user_last_name	=	 $user_row->user_last_name;			
			$user_telephone =	 $user_row->user_telephone;
			$user_postal_address =	 $user_row->user_postal_address;
      		$user_city		  =	 $user_row->user_city;
			$user_state		  =	 empty($user_row->user_state)?0:$user_row->user_state;
			$user_country	  =	 empty($user_row->user_country)?0:$user_row->user_country;
			$user_zip_code=$user_row->user_zip_code;
            $user_dob =	 $user_row->user_dob;
			
		
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include_once("../commonTemplate/head.php")?>
<script type="text/JavaScript">
$(document).ready(function() {
$("#frmMyProfile").validate({
                rules: {
                    user_first_name: {
                        required: true,
                    },
					user_postal_address: {
                        required: true,
                    },
					user_telephone: {
                        required: true,
                    },
					user_city: {
                        required: true,
                    },
					user_state: {
                        required: true,
                    },
                    user_country: {
                        required: true,
                    },
                   
                },
                messages: {
					user_first_name: "<span>Please enter a first name</span>",
                    user_postal_address: "<span>Please enter address</span>",
					user_telephone: "<span>Please enter a phone number</span>",
					user_city: "<span>Please enter city</span>",
					user_state: "<spam style=\"line-height:17px;\">Please enter state</spam>",
                    user_country: "<spam style=\"line-height:17px;\">Please enter country</spam>",
					
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

			$( "#user_dob" ).datepicker({ 

              dateFormat: 'yy-mm-dd',
              maxDate:new Date()
              }) ;
     });
</script>
<link href="../css/checkout.css" rel="stylesheet">
</head>
<body>
<? include_once("../commonTemplate/header.php")?>
<section>
<div class="feedback-outer">
  <div class="feedback-inner">
  <div class="feeback-heading">My Profile</div>
   <div class="main-content-wrapper">
			  <div class="main-content item-block-3">
			    <div class="content">
			      <!-- BEGIN .header -->
			        <div class="checkout-item billing-address">
			          <div class="main-title">
			            <p class="custom-font-1"><p class="custom-font-1">User Email: &nbsp;&nbsp; <span style="font-size:18px"><? if($user_email!='') echo $user_email;?></span></p>
		                <a href="index.php" class="view">Back</a></p>
		              </div>
			          <form name="frmMyProfile" id="frmMyProfile" action="process_user.php" method="POST">
                           <input type="hidden" name="userUpdation" value="1" />
                            <p>
                              <label>First Name:</label>
                              <input name="user_first_name" type="text" class="input-text-1" value="<? if($user_first_name!='') echo $user_first_name;?>" />
                            </p> 
                  
                            <p>
                              <label>Last Name:</label>
                              <input name="user_last_name" type="text" class="input-text-1" value="<? if($user_last_name!='') echo $user_last_name;?>" />
                            </p>
                            <p>
                              <label>Postal Address:</label>
                             <input name="user_postal_address" type="text" class="input-text-1" value="<? if($user_postal_address!='') echo $user_postal_address;?>" />
                            </p>
                            <p>
                              <label>Telephone:</label>
                              <input name="user_telephone" type="text" class="input-text-1"  value="<? if($user_telephone!='') echo $user_telephone;?>" />
                            </p>
                            <p>
                               <label>User Country:</label>
                                <input name="user_country" type="text" class="input-text-1" tabindex="10" value="<? if($user_country!='') echo $user_country;?>" maxlength="50" />
                             </p> 
                             <p>
                               <label>User State:</label>
                                <input name="user_state" type="text" class="input-text-1" tabindex="10" value="<? if($user_state!='') echo $user_state;?>" maxlength="50" />
                             </p> 
                             <p>
                              <label>User City:</label>
                              <input name="user_city" type="text" class="input-text-1" tabindex="10" value="<? if($user_city!='') echo $user_city;?>" maxlength="50" />
                            </p>
                             <p>
                              <label>User Date Of Birth:</label>
                              <input name="user_dob" id="user_dob" type="text" class="input-text-1" tabindex="10" value="<? if($user_dob!='') echo $user_dob;?>" maxlength="50" />
                            </p>
                            <p>
                               <label>Zip Code:</label>
                                <input name="user_zip_code" type="text" class="input-text-1" tabindex="10" value="<? if($user_zip_code!='') echo $user_zip_code;?>" maxlength="50" />
                             </p> 
                            <p>&nbsp;</p> 
                            <p><input type="submit"  name="submit" value="Update" class="submit-btn custom-font-1"  align="middle"/></p>
                            <p>&nbsp;</p> 
                         
                          
		               </form>
		            </div>
			        
			        <div class="clear"></div>
			        
		          
			          <div class="clear"></div>
			         
			      <div class="clear"></div>
		        </div>
			    <!-- END .main-content -->
		      </div>
	        </div>
 </div>
 </div>
</section>
<? include_once("../commonTemplate/footer.php") ?>
</body>
</html>