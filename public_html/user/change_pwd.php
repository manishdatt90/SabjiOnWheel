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
<script type="text/JavaScript">
$(document).ready(function() {
$("#frmChangePwd").validate({
                rules: {
					opwd:"required",
                    password:{
				     required:true,
				     minlength: 3
				    },
					conf_password: {
					required:true,	
					minlength: 3,
					equalTo: "#password"
				    },
                },
                messages: {
				  opwd:"<span>Please enter the old password</span>",
				  password: {
					required:"<span>Please enter the password</span>",
					minlength:"<span>Your password must be at least 5 characters long</span>",
				    },
				  conf_password: {
					required:"<span style=\"float:left;margin-left:0;\">Please enter the password</span>",  
					minlength: "<span style=\"float:left;margin-left:0;\">Your password must be at least 5 characters long</span>",  
					equalTo: "<span style=\"float:left;margin-left:0;\">Please enter the same password as above</span>"
				    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
			
}); 
</script>
<link href="../css/checkout.css" rel="stylesheet">
</head>
<body>
<? include_once("../commonTemplate/header.php")?>
<section>
<div class="feedback-outer">
  <div class="feedback-inner">
  <div class="feeback-heading">Change Password</div>
   <div class="main-content-wrapper">
			  <div class="main-content item-block-3">
			    <div class="content">
			      <!-- BEGIN .header -->
                     <?
							  if(!empty($msg))
							   echo '<p><center>'.$msg.'</center></p>';
							?>
			        <div class="checkout-item billing-address">
			          <div class="main-title">
			            <p class="custom-font-1"><p class="custom-font-1">User Email: &nbsp;&nbsp; <span style="font-size:18px"><?=$user_row->user_email?></span></p>
		                <a href="index.php" class="view">Back</a></p>
		              </div>
			          <form name="frmChangePwd" id="frmChangePwd" action="process_user.php" method="POST">
                            
                            <p>
                              <label>Old Password :</label>
                              <input name="opwd" type="password" id="opwd" class="input-text-1"  value="" /> 
                            </p>
                            <p>
                              <label>New Password :</label>
                              <input name="password" type="password" id="password" class="input-text-1"  value="" /> 
                            </p>
                            <p>
                              <label>Confirm Password:</label>
                              <input name="conf_password" type="password" id="conf_password" class="input-text-1" value="" />
                            </p> 
                             <p>&nbsp;</p> 
                            
                            <p><input type="submit"  name="submit" value="Update" class="submit-btn custom-font-1" align="middle"/></p>
                          
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