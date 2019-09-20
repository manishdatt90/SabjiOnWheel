<?
include_once($_SERVER['DOCUMENT_ROOT']."/config.php");
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
	case "login":
		if(isset($_POST['user_name']) && $_POST['user_name']!='' && isset($_POST['pwd']) && $_POST['pwd']!='')
		{
			 $username=$_POST['user_name'];
			 $pwd=$_POST['pwd'];
			 $sql_login="select * from ts_login WHERE user_email ='$username' and user_pwd ='$pwd'"; 
 		     $res=mysql_query($sql_login);
			 $rows=mysql_fetch_object($res);
			 $_SESSION['ses_useremail']=$username;
			 $_SESSION['ses_username']=$rows->user_name;
			 $_SESSION['ses_isadmin']=$rows->user_is_admin;
			 $_SESSION['ses_userid']=$rows->user_id;
			 $_SESSION['uId']=$rows->uId;
			 if($res && mysql_num_rows($res)==1)
			  header("location:../index.php");
			 else 
			  header("location:../login.php".'?msg=invaliduser' );	
			 exit;
		}
		else 
		header("location:".$_SERVER['HTTP_REFERER']);		
	break;
	case "approval_mail":
	$user_id= isset($_REQUEST['id']) && $_REQUEST['id']!=''?$_REQUEST['id']:'';  
	$sql="select * from cart_user where user_id=$user_id";
	$res=mysql_query($sql);
	$row='';
	if($res)
		{
			$row=mysql_fetch_object($res);
			$name=$row->user_first_name.' '.$row->user_last_name;
			$username=$row->user_email;
			$password=$row->user_paswd;
			$toemail=$row->user_email;
			$sql_email="select * from  automatic_mail where mail_placeholder='{##ACCOUNT-ACTIVATION##}'";
			$res_email=mysql_query($sql_email);
			$row_email=mysql_fetch_object($res_email);
			if($row_email->status==1)
			{
				$mail_content=$row_email->content;
				$mail_content=str_replace('{##NAME##}',$name,$mail_content);
				$mail_content=str_replace('{##USER-NAME##}',$username,$mail_content);
				$mail_content=str_replace('{##PASSWORD##}',$password,$mail_content);
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
				$headers .= "Content-Transfer-Encoding: 8bit;\n";					
				$headers .= "From: $row_email->from_name <no_reply@$row_email->from_email>\n";
				$result=@mail($toemail,$row_email->subject,$mail_content,$headers);
			}
			if($result)
			{
				$msg="sent";
			}
			else
			{
				$msg="notsent";
			}				
		}
		$link=explode('?',$_SERVER['HTTP_REFERER']);
		header("location:".$link[0]."?msg=$msg");
	break;
}
?>
