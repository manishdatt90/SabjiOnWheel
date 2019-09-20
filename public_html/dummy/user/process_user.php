<?php
	include_once("../config.php");	
	include_once("../logic/logicLogin.php");
	
	//echo "<pre>";  print_r($_REQUEST);  //die;
	
  $ObjUserLogin	=	new UserLogin();
	$ObjUserLogin->checkUserStatus();
	
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
  $change_password ='';
  
  $change_password = isset($_REQUEST['change_password'])?$_REQUEST['change_password']:'';
	
	$msg = isset($_REQUEST['msg'])?$_REQUEST['msg']:'';
	
	$submit  = isset($_REQUEST['submit'])?$_REQUEST['submit']:'';
  
  $user_id  = $_SESSION['user']['user_id'];
    //$user_id  = $_REQUEST['id'];
  
  if(isset($_REQUEST['user_middle_name']))
		$user_middle_name	  =	addslashes($_REQUEST['user_middle_name']);
		
	if(isset($_REQUEST['user_first_name'])) 
		$user_first_name	=	addslashes($_REQUEST['user_first_name']);
		
	if(isset($_REQUEST['user_last_name']))
		$user_last_name	=	addslashes($_REQUEST['user_last_name']);
    
  if(isset($_REQUEST['password']))
		$user_password =	addslashes(trim($_REQUEST['password']));
		
	if(isset($_REQUEST['conf_password']))
		$conf_password =	addslashes(trim($_REQUEST['conf_password']));
	
	if(isset($_REQUEST['user_telephone']))
		$user_telephone =	addslashes(trim($_REQUEST['user_telephone']));
		
	if(isset($_REQUEST['user_fax']))
		$user_fax =	addslashes(trim($_REQUEST['user_fax']));
	
	if(isset($_REQUEST['user_postal_address']))
		$user_postal_address =	addslashes(trim($_REQUEST['user_postal_address']));

	if(isset($_REQUEST['user_city']))
		$user_city	=	addslashes($_REQUEST['user_city']);
		
	if(isset($_REQUEST['user_state']))
		$user_state	 =	addslashes($_REQUEST['user_state']);
	
	if(isset($_REQUEST['user_country']))
		$user_country =	addslashes($_REQUEST['user_country']);
	
	if(isset($_REQUEST['user_zip_code']))
		$user_zip_code	=	addslashes($_REQUEST['user_zip_code']);

	if(isset($_REQUEST['user_dob']))
		$user_dob	=	addslashes($_REQUEST['user_dob']);
				
    $mode	=  !empty($_REQUEST['mode'])?'edit':'';
	$opwd=$_POST['opwd'];	
  // update the users details
    if(($submit=='Update') && !empty($user_id) && isset($_POST['userUpdation']) && !empty($_POST['userUpdation']))
    {       	
        $sql_set_user	=	" Update cart_user set user_first_name= '$user_first_name' , user_last_name='$user_last_name',user_postal_address='$user_postal_address', user_telephone='$user_telephone', user_fax='$user_fax', user_city='$user_city', user_state='$user_state', user_country='$user_country', user_zip_code='$user_zip_code',user_dob='$user_dob', modified_date = NOW() where user_id= $user_id ";    			    			
		$res_set=mysql_query($sql_set_user);
    	$msg="editprofile";
  			/* update password */
    }
    else
    $msg="error";
	
	 if(!empty($conf_password) && !empty($user_password) && ($conf_password==$user_password))
        {
        
       //echo "<br>",
	   
			$sql_get_value="select * from cart_user where user_id= $user_id and user_paswd='$opwd' ";
			$res_get=	mysql_query($sql_get_value);
			if(mysql_num_rows($res_get)>0)
			{
				$sql_set_user_pswd	=	" Update cart_user set user_paswd=('$user_password'), modified_date = NOW() where user_id= $user_id "; 
				$res_set_pswd=mysql_query($sql_set_user_pswd);
				$msg="editprofile";  
			}
			else
			{
				$msg="wrongpwd";
				header("location:change_pwd.php?msg=".$msg);
                exit;  
			}
          
        }
    //die;
    	
    header("location: index.php?msg=".$msg);
    exit;
    
    ?>
