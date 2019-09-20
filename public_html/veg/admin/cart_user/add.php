<?php
	include_once("../../config.php");
	include_once("../message.php");
	$ObjclsMessage	=	new clsMessage();
    $user_id  = $_REQUEST['userId'];
  
  // set value for edit
	$sql_get_value	=	" select * from cart_user where user_id= $user_id ";
	$res_get	=	mysql_query($sql_get_value);
	$user_row	=	mysql_fetch_object($res_get);
	

?>
<!-- header- start -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>My Profile</title>
</head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="/admin/css/admincss.css" rel="stylesheet" type="text/css" />
  <body>
	<div align="left" class="bodydiv">
    <h1>  My Profile </h1>
	<br />
	<br />
	<tr><td><a href="index.php"> View Users List </a></td></tr>
	<br />
	<br />
  	<table border="0" width="100%" >
 	 <tr>
	 <td>
    <form name="frmMyProfile" action="../process/process_add.php" method="POST" onsubmit="javascript: return checkFrm();">
    		 
		<table width="100%" border="0"  cellspacing="0" align="center">
		<input type="hidden" value="<?=$user_id;?>" name="user_id">
        <input type="hidden" value="user" name="action">    	
     <tr>				
    	<td nowrap>User Email : &nbsp;</td>
    	<td>&nbsp;&nbsp;<? if($user_row->user_email!='') echo $user_row->user_email;?></td>
     </tr>
      
      <tr>
    	<td nowrap>Change Password ": &nbsp;*</td>
    	<td>&nbsp;&nbsp;<input type="checkbox" name="change_password" value="0" />
      </td>
     </tr> 
     <tr>
    	<td nowrap>New Password : &nbsp;*</td>
    	<td>&nbsp;&nbsp;<input type="password" name="user_password" value="" />
      </td>
     </tr>
      <tr>				
        <td nowrap>Confirm New Password : &nbsp;* :</td>
        <td>&nbsp;&nbsp;<input type="password" name="conf_password" value="" tabindex="2" /></td>
      </tr>
  
  	   
     <tr>
       <td nowrap> First Name :&nbsp;*</td>
       <td>&nbsp;&nbsp;<input type="text" name="user_first_name" value="<? if($user_row->user_first_name!='') echo $user_row->user_first_name;?>" tabindex="3" /></td>
     </tr>
     
     <tr>
       <td nowrap> Last Name :&nbsp;*</td>
       <td>&nbsp;&nbsp;<input type="text" name="user_last_name" value="<? if($user_row->user_last_name!='') echo $user_row->user_last_name;?>" tabindex="3" /></td>
     </tr>
     <tr>
       <td nowrap colspan="2" style="color: red; font-weight:bold">Address :&nbsp;</td>
     </tr>
     
      <tr>
    	<td nowrap> Postal Address :&nbsp;*</td>
    	<td>&nbsp;&nbsp;<input type="text" name="user_postal_address" tabindex="4" value="<? if($user_row->user_postal_address!='') echo $user_row->user_postal_address;?>" /></td>
     </tr>
 
	  <tr>
    <td nowrap>User Country :&nbsp;*</td>
    	<td><input type="text" name="user_country" tabindex="4" value="<? if($user_row->user_country!='') echo $user_row->user_country;?>" /></td>

     </tr>	 
     <tr>
    <td nowrap>User State :&nbsp;*</td>
    	<td><input type="text" name="user_state" tabindex="4" value="<? if($user_row->user_state!='') echo $user_row->user_state;?>" />
</td>
     </tr>
    <tr>
    <td nowrap>User City :&nbsp;*</td>
    	<td><input type="text" name="user_city" tabindex="4" value="<? if($user_row->user_city!='') echo $user_row->user_city;?>" />
</td>
     </tr>
      <tr>
    <td nowrap>User Telephone :&nbsp;*</td>
    	<td><input type="text" name="user_telephone" tabindex="4" value="<? if($user_row->user_telephone!='') echo $user_row->user_telephone;?>" />
</td>
     </tr>
   
     <tr>
       <td nowrap>Zip :&nbsp;*</td>
       <td>&nbsp;&nbsp;<input type="text" name="user_zip_code" tabindex="8" value="<? if($user_row->user_zip_code!='') echo $user_row->user_zip_code;?>" maxlength="6" size="10"/></td>
     </tr>
	 
	<tr>
					<td>Active Status:</td>
					<td><input type="checkbox" name="user_status" value="1" <? echo (!empty($user_row->user_status) && $user_row->user_status==1)? 'checked="checked"' : ''; ?>></td>
				</tr>
	  
     <tr>		  
     	<td align="center" nowrap colspan="2">&nbsp;&nbsp;
    	 <input type="submit" value="Update" name="submit" tabindex="12"> 
    	</td>
     </tr>
  </table> 
  	</form>
  </td>
  </tr>
  </table>
  
<script language="javascript1.1" type="text/javascript">
	
  function checkFrm()
	{	
	
    var ObjForm=document.frmMyProfile;	 
    var conf_password;
        
    if(ObjForm.change_password.checked==true)
    {
      if(ObjForm.password.value=="")
      {
    	  alert("Please provide new password.");
        ObjForm.password.value="";
        ObjForm.password.focus();
        return false;
      } 
       
      if(ObjForm.conf_password.value=="" )
      {
    	  alert("Please retype new password.");
        ObjForm.conf_password.value="";
        ObjForm.conf_password.focus();
        return false;
      }  
      
      if(ObjForm.conf_password.value!="" && ObjForm.password.value!="")
      {
        if(conf_pswd(ObjForm.password.value,ObjForm.conf_password.value)==false)
        return false;
      }
      ObjForm.change_password.value="true";
    }
    
    if((ObjForm.password.value!='' || ObjForm.conf_password.value!='') && ObjForm.change_password.checked==false)
    {   
      alert("Please check change password to change your password");
      ObjForm.change_password.checked="checked";
      ObjForm.password.value="";
      ObjForm.conf_password.value="";
      ObjForm.password.focus();      
      return false;
    }    
    
	}
	
	function conf_pswd(password,conf_password)
	{
	 var ObjForm = document.frmMyProfile;	
	 // alert('in conf function');
	 
   if(password!=conf_password)
   {  
        alert("Confirm password is not same as password provided.");
        ObjForm.password.value="";
        ObjForm.conf_password.value="";
        ObjForm.password.focus();
        //alert('fail');
        return false;
    }
    else
    {
       return true;
    }  
  }
  
	getStates(document.frmMyProfile.user_country,"user_state");
document.frmMyProfile.user_state.value=<?=isset($user_state1) && !empty($user_state1)?$user_state1:'0';?>;
	</script>
	</div>
  </body>
	</html>
