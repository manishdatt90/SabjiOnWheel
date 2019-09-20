<?
session_start();
$username='';
$pwd='';
$msg='';
if(isset($_SESSION['ses_userid'])&& $_SESSION['ses_userid']!='')
{
session_destroy();
}

if(isset($_GET['msg']) && $_GET['msg']=='invaliduser')
{
	$msg='Invalid User! Please check user name and password.';
	
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator Login</title>
<style type="text/css">
.box {
	margin: auto;
	width: 510px;
	padding-top: 84px;
	background-repeat: no-repeat;
	background-position: bottom;
	padding-bottom: 9px;
}
.formblock {
	background-repeat: repeat-y;
}
.formbox {
	background-color: #FFFFFF;
	background-repeat: no-repeat;
	
	border:1px solid #ccc;
}
.formcontent {
	padding-top: 54px;
	padding-bottom: 54px;

	padding-right: 43px;
	padding-left: 21px;
	height: auto;
}
.formelement {
	width: 295px;
	float: left;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
-->
</style>
</head>

<body>
<div class="top"><img src="../img/logo.jpg" alt="sonitekinternational" width="380" height="59" style="margin-left:8px" /></div>
<div class="box">
  <div class="formbox">
    <div class="formcontent"><img src="/admin/images/lock.jpg" width="125" height="132" style="float:left" /><br />
      <div class="formelement">
        <form name="form_login" method="POST" action="process/process_extra.php" AUTOCOMPLETE="OFF">
<input type="hidden" name="action" value="login" />
<table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="40%" align="right">Username:</td>
            <td width="60%" align="right"><label>
              <input type="text" name="user_name" tabindex="1">
            </label></td>
          </tr>
          <tr>
            <td align="right">Password:</td>
            <td align="right"><label>
              <input type="password" name="pwd" tabindex="2" >
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right"><input type="submit" name="imageField" id="imageField" value="Login"  /></td>
          </tr>
        </table>
</form>
      </div>
	  <div style="clear:both; height:0px">&nbsp;</div>
    </div>
  </div>
  </div>
</body>
</html>