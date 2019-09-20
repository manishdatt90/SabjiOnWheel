<?php
include_once("../config.php");
include_once("../common/msg.php");
$msg=isset($_REQUEST['msg'])?$_REQUEST['msg']:'';
$ObjMsg=new Msg();
$msg=$ObjMsg->msgBox($msg);
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
                    email: {
                        required: true,
                        email: true
                    },
                    
                },
                messages: {
                    
                    email: "<span>Please enter a valid email address</span>",
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
				  if(!empty($msg))
				   echo '<span style="text-align:center;margin:20px;">'.$msg.'</span>';
				  ?>
			         <form id="login1" name="login1" method="post" action="../process/process.php">
                     <input name="action" type="hidden" id="action" value="password_recovery"  />
			        	<div class="checkout-item billing-address">
			               <div class="main-title">
			               <p class="custom-font-1">Forgot Password</p>
		                   </div>
			              <div class="items">
			              <p>
                              <label>Enter Email Id:</label>
                              <input type="text" class="input-text-1" name="email" />
		                  </p>
			              
		                  </div>
		                  <input type="submit" value="Submit" class="submit-btn custom-font-1">
                        </div>
                        
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