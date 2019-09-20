<?php
include_once($_SERVER['DOCUMENT_ROOT']."/config.php");
function generateRandomString($length = 5, $letters = '1234567890qwertyuiopasdfghjklzxcvbnm')
{
      $s = '';
      $lettersLength = strlen($letters)-1;
     
      for($i = 0 ; $i < $length ; $i++)
      {
      $s .= $letters[rand(0,$lettersLength)];
      }
     
      return $s;
} 
function clean_all_var($form_vars)
{
foreach ($form_vars as $key => $value)
{
$form_vars[$key] = trim($value);
}
return $form_vars;
}
$check_action='';
if(isset($_POST['action']) && !empty($_POST['action']))
{
	  $check_action=$_POST['action'];
}
elseif(isset($_GET['action']) && !empty($_GET['action']))
{
	 $check_action=$_GET['action'];
}
switch($check_action)
{
		case 'password_recovery':
		$email_id=$_POST['email'];
		$sqlQuery="select * from cart_user where user_email='".$email_id."'";
		$result=mysql_query($sqlQuery);
		$NumRows=mysql_num_rows($result);
			if($NumRows > 0)
			{
				$rows=mysql_fetch_object($result);
				$pwd=$rows->user_paswd;
				$name=$rows->user_first_name;
				$email=$rows->user_email;
				if(!empty($email)  && !empty($pwd)  && !empty($name))
				{
					
					$mail_content='<table><tr><td>Your Login details are:</td></tr><tr><td>Email Id:'.$email.'</td></tr><tr><td>Password:'.$pwd.'</td></tr></table>';
					$headers .= "MIME-Version: 1.0\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
					$headers .= "Content-Transfer-Encoding: 8bit;\n";					
					$headers .= "From:  noreply@sabjionwheels.com<sabjionwheels@com>\n";
					$result=@mail($email,'Sabji On Wheels Login Details',$mail_content,$headers);
                    $msg='pwdSucess';
				}
				else
				$msg='pwdFail';
			}
            else
            $msg='pwdFail';
		header("location:../login/forgot_password.php?msg=".$msg);
	break;
	case 'contact':
	ob_start();
	?>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="left" valign="top"><strong>Your  Name:</strong></td>
		<td align="left" valign="top"><label><?=$_POST['fname']?></label></td>
	  </tr>
	  <tr>
		<td align="left" valign="top"><strong>E-mail:</strong></td>
		<td align="left" valign="top"><label><?=$_POST['email']?></label></td>
	  </tr> 
      <tr>
		<td align="left" valign="top"><strong>Message topic::</strong></td>
		<td align="left" valign="top"><label><?=$_POST['topic']?></label></td>
	  </tr>
	  <tr>
		<td align="left" valign="top"><strong>Message:</strong></td>
		<td align="left" valign="top"><label><?=$_POST['msg']?></label></td>
	  </tr>
	  <tr>
		<td align="left" valign="top">&nbsp;</td>
	  </tr>
	</table>
	<?
	$content=ob_get_contents();
	ob_end_clean();	
	$sendmail='';
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
	$headers .= 'From: "noreply@devDental.com" <****@devDental.com>\n';				
	$result3=@mail($sendmail,'New Contact US from www.devDental.com',$content,$headers);
	$path=isset($_POST['type'])?$_POST['type']:'';
	header("location:/".$path."index.html");
	break;
	
	
}
?>