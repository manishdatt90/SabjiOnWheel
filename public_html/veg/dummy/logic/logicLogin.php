<?          
  	if(isset($_POST['user_email']))
      $arrUser['user_email'] = addslashes($_POST['user_email']);
      
  	if(isset($_POST['password']))
      $arrUser['user_password'] = addslashes($_POST['password']);  	
    
  class UserLogin
  {
    var $arrUser;
    var $logoutUser; 
    var $arrRegUser;    
    
    function UserLogin($arrUser='')
     {
      $this->arrUser=$arrUser;      
      /*
  		// check number of Login attempts for user, using IP valu1e, login status value must be false, and allwed attempts to login  not more than 3		  		
  		// if Attempts equal to 3 than Give one grace chance with image validation  		
  		//valdiate user against details provided like username, password		
  		//return $this->CheckUser($arrUser);
  		*/
     }
	 
	//valdiate user against details provided
	function CheckUser($arrUser)
    {
      // get user id  of verified user
       $verifiedUser = $this->VerifyUser($arrUser);              
	  
      if(!empty($verifiedUser) && $verifiedUser!=false) 
      {        
        // Set the values in session for a valid user
       // session_register("user");
        
        $_SESSION['user']                 = $verifiedUser;
        
        $_SESSION['user']['user_id']          = $verifiedUser['user_id'];
        $_SESSION['user']['user_middle_name'] = $verifiedUser['user_middle_name'];
        $_SESSION['user']['user_first_name']  = $verifiedUser['user_first_name'];
        $_SESSION['user']['user_last_name']   = $verifiedUser['user_last_name'];        
        $_SESSION['user']['user_email']       = $verifiedUser['user_email'];
        $_SESSION['user']['user_telephone']   = $verifiedUser['user_telephone'];
        $_SESSION['user']['user_fax']         = $verifiedUser['user_fax']; 
        $_SESSION['user']['user_postal_address']= $verifiedUser['user_postal_address'];
        $_SESSION['user']['user_city']        = $verifiedUser['user_city'];
        $_SESSION['user']['user_state']       = $verifiedUser['user_state'];
        $_SESSION['user']['user_zip_code']    = $verifiedUser['user_zip_code'];
        $_SESSION['user']['user_country']     = $verifiedUser['user_country'];
        $_SESSION['user']['user_status']      = $verifiedUser['user_status'];
        $_SESSION['user']['modified_date']    = $verifiedUser['modified_date']; 
          
        $_SESSION['user']['valid']            = "loggedin";
        $_SESSION['user']['phpsessionId']     = $_COOKIE['PHPSESSID'];
           
        //$_SESSION['user']['user_email'] = $verifiedUser->user_email;
        //$_SESSION['user']['id']         = $verifiedUser->user_id;
        //$_SESSION['user']['phpsessionId']= $_COOKIE['PHPSESSID'];
        
       // echo "<pre>"; print_r($_SESSION['user']);
        //die;        
        //$this->loginUser("loggedin");
		if(isset($_SESSION['from-cart']) && $_SESSION['from-cart']='true')
		{
		
			$_SESSION['from-cart']='';
			header("location:../checkout.php");
			exit;
		}
       	$this->loginUser($_SESSION['user']['valid']);
        //return "loggedin";
      }
      else
      {       
        $msg="fail";
        $this->loginUser($msg);        
      }
    
    }
    
    function VerifyUser($arrUser)
    {
      $verify_user = " SELECT * FROM cart_user WHERE user_email = '".$arrUser['user_email']."' AND user_paswd = ('".$arrUser['user_password']."') AND user_status='1' ";        
       $res_verify =  mysql_query($verify_user);
		
	
      if($res_verify && mysql_num_rows($res_verify)==1)
      {
        $row=mysql_fetch_array($res_verify);
        $user_id=$row['user_id'];
	    $_SESSION['user']['user_id']=$user_id;
        //echo "<pre>"; print_r($row);          die;          
        return  $row;
      }
      else
      {
        return false;
      }
    }
    
    // check given user enail if it is unique email id
    function checkUniqueUser($reg_user_email='')
      {
          $check_unique = " SELECT * FROM cart_user WHERE user_email='".$reg_user_email."' ";      
          $res_unique   =  mysql_query($check_unique);
          //echo '--<br>--'.mysql_num_rows($res_unique);  die;
          if($res_unique && mysql_num_rows($res_unique)>0)
          {
            //$row=mysql_fetch_array($res_unique,MYSQL_ASSOC);            
            //echo  $user_id=$row['user_id'];
           return false; // user is not unique
          }
           return true; // user is unique
      }
	  
    // register user if unique email id
    function registerUser($arrRegUser='')
      {
        //echo "<pre>1111";   print_r($arrRegUser);    //  die;      
        $msg='';        
        $reg_password =	$arrRegUser['reg_password'];
        $conf_reg_password =	isset($arrRegUser['conf_reg_password'])?$arrRegUser['conf_reg_password']:'';
        $reg_user_email	=	 isset($arrRegUser['reg_user_email'])?$arrRegUser['reg_user_email']:'';
		$reg_telephone=$arrRegUser['reg_telephone'];	
		$reg_dob=$arrRegUser['reg_dob'];	
		$reg_address=$arrRegUser['reg_address'];	
		$reg_first_name=$arrRegUser['reg_first_name'];
	    $reg_last_name=$arrRegUser['reg_last_name'];
    
         if($this->checkUniqueUser($reg_user_email))
         {
          $sql_set_user	=	" Insert into cart_user(user_email,user_paswd,user_status,user_online,user_first_name,user_last_name,user_telephone,user_postal_address,user_dob,reg_date) values('".$arrRegUser['reg_user_email']."', '".$arrRegUser['reg_password']."', '1','1','$reg_first_name','$reg_last_name','$reg_telephone','$reg_address','$reg_dob',now())";            
          $res_set  = mysql_query($sql_set_user);
          $insert_id  = mysql_insert_id();                            
          $_SESSION['userid']=$insert_id;
          if($insert_id!='')
          {
                $mail_content="<table><tr><td>Thank you for registering in our site..Yours Login Details are as follows:</td></tr>
                                       <tr><td>Email Id:".$reg_user_email."</td></tr>
                                       <tr><td>Password:".$reg_password."</td></tr>
                               </table>";
						
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
				$headers .= "Content-Transfer-Encoding: 8bit;\n";					
				$headers .= "From: noreply@sabjionwheels.com <register@sabjionwheels.com>\n";
			    $result=mail($reg_user_email,'Your Login Detail from sabjionwheels.com',$mail_content,$headers);
                $msg="regd";
          }
          else
            $msg="regerr";                                              
           // return $msg;
          }
          else
          {
            $msg="notunique";
          }
          return $msg;                   
      }   		
    
    // check user login
    function loginUser($msg='')
    {
      if($msg=="loggedin")
      {	
		header("location:/dummy/user/index.php");
		exit;		
      }
      else
      {        
       header("location:/dummy/login/index.php?msg=$msg");
         //exit;      
      }
    }
	
    // logout user
    function logoutUser($logoutUser='')
    {
        if($logoutUser=='Logout')
        {
          session_unregister('user');
          session_destroy();
          session_unset();
          return "Logout";
        }    
    }
  
	// check user login status
	function checkUserStatus($msg='')
	{
		if(!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid']!="loggedin")
		{  
			$message	=	($msg!='')? "?msg=".$msg : '';
			header("location:/dummy/login/index.php".$message);
			exit;
		}
	}

      
      
  }
?>