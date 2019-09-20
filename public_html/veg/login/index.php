<?php
include_once("../config.php");
include_once("../logic/logicLogin.php");
include_once("../common/msg.php");
$msg=isset($_REQUEST['msg'])?$_REQUEST['msg']:'';
$ObjMsg=new Msg();
$ObjUserLogin = new UserLogin();
$ref_page=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
if(isset($_POST['user_email']) && !empty($_POST['user_email']))
{
		$arrUser = array();	
	  	if(isset($_POST['user_email']))
			$arrUser['user_email'] = addslashes($_POST['user_email']);
  
	  	if(isset($_POST['user_password']))
			$arrUser['user_password']	=	addslashes($_POST['user_password']);

		$msg=$ObjUserLogin->CheckUser($arrUser,$ref_page);
		    				 
}
$msg1=$ObjMsg->msgBox($msg);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include_once("../commonTemplate/head.php")?>
<script>
$(document).ready(function() {
/*$.validator.addMethod("user_email_not_same", function(value, element) {
   return $('#name').val() != $('#email').val()
}, "* User and Email should not match");*/

            $("#login1").validate({
                rules: {
                    user_email: {
                        required: true,
                        email: true
                    },
                    user_password: {
                        required: true,
                        minlength: 3
                    },
                },
                messages: {
                    user_password: {
                        required: "<span>Please provide a password</span>",
                        minlength: "<span>Your password must be at least 3 characters long?</span>"
                    },
                    user_email: "<span>Please enter a valid email address</span>",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
			
			$("#register").validate({
                rules: {
					reg_first_name: "required",
                    reg_user_email: {
                        required: true,
                        email: true
                    },
                    reg_password: {
                        required: true,
                        minlength: 3
                    },
					conf_reg_password: {
					required: true,
					minlength: 3,
					equalTo: "#reg_password"
				    },
					reg_address:"required",
					reg_telephone: "required",
                },
                messages: {
                    reg_password: {
                        required: "<span>Please provide a password</span>",
                        minlength: "<span >Your password must be at least 3 characters long?</span>"
                    },
					reg_first_name: "<span>Please enter name</span>",
                    reg_user_email: "<span>Please enter a valid email address</span>",
					conf_reg_password: {
					required: "<span style=\"float:left;margin-left:0;\">Please provide a password</span>",
					minlength: "<span style=\"float:left;margin-left:0;\">Your password must be at least 5 characters long</span>",
					equalTo: "<span style=\"float:left;margin-left:0;\">Please enter the same password as above</span>",
					
				    },
                    reg_address: "<span>Please enter a address</span>",
					reg_telephone: "<span>Please enter a phone number</span>",
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
  <div class="feeback-heading">Login/Register</div>
   <div class="main-content-wrapper">
			  <div class="main-content item-block-3">
			    <div class="content">
			      <!-- BEGIN .header -->
                  <?
				  if(!empty($msg1))
				   echo '<span style="text-align:center;margin:20px;">'.$msg1.'</span>';
				  ?>
			         <form id="login1" name="login1" method="post" action="index.php">
			        	<div class="checkout-item billing-address">
			               <div class="main-title">
			               <p class="custom-font-1">Login here</p>
		                   </div>
			              <div class="items">
			              <p>
                              <label>Email Id:</label>
                              <input type="text" class="input-text-1" name="user_email" />
                              
		                  </p>
			              <p>
                              <label>Password:</label>
                              <input type="password" class="input-text-1" name="user_password" />
                             
                          </p>
		                  </div>
                           <p><a href="forgot_password.php" style=" float:left;">Forgot password?</a></p>
		                   <p><input type="submit" value="Login" class="submit-btn custom-font-1" style="margin:10px 0 0; float:left; "></p>
                        </div>
                        
                     </form>
                     <form id="register" name="register" method="post" action="register.php">
			          <div class="checkout-item shipping-address">
			          <div class="main-title">
			            <p class="custom-font-1">New User Register Here</p>
		              </div>
			          <div class="items">
                       <p>
			              <label>First Name:</label>
			              <input type="text" class="input-text-1" name="reg_first_name"  />
		                </p>
                        <p>
			              <label>Last Name:</label>
			              <input type="text" class="input-text-1" name="reg_last_name"  />
		                </p>
			            <p>
			              <label>Email Id:</label>
			              <input type="text" class="input-text-1" name="reg_user_email"  />
		                </p>
			            <p>
			              <label>Password:</label>
			              <input type="password" class="input-text-1" name="reg_password" id="reg_password" />
                        </p>
                        <p>
			              <label>Confirm Password:</label>
			              <input type="password" class="input-text-1" name="conf_reg_password" />
                        </p>
                        <p>
			              <label>Address:</label>
			             <textarea name="reg_address" class="input-text-1"></textarea>
		                </p>

                        <p>
			              <label>Contact No:</label>
			              <input type="text" class="input-text-1" name="reg_telephone"  />
		                </p>
                        <p>
			              <label>Date Of Birth: (YYYY-MM-DD)</label>
			              <input type="text" class="input-text-1" name="reg_dob" id="reg_dob"  />
		                </p>
		              </div>
                      <input type="hidden" name="register" value="Register" />
		              <input type="submit" value="Register" class="submit-btn custom-font-1" id="margin-sty-css" name="regsub">
                    </div>
			          <div class="clear"></div>
			         
		         </form>
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