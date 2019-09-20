<? include_once($_SERVER['DOCUMENT_ROOT']."/config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Sonitek CMS Admin</title>
<style>
a {
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	font-weight:normal;
	
	margin:0px;
	
	background-position: 15px center;
	background-repeat: no-repeat;
	text-decoration: none;
	padding-left: 25px;
	padding-bottom: 7px;
	display: block;
	padding-top: 4px;
}
ul.admin-left-menu {
	list-style:none;
	padding-left:0px;
	padding-top:0px;
	width:196px;
   
	background-repeat: repeat-y;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	padding-bottom: 10px;
}
.naviholder {
    border:1px solid #ccc;
	background-repeat: no-repeat;
	background-position: bottom;
	height: auto;
	padding-bottom: 9px;
	width: 196px;
	margin: 0px;
}
ul.admin-left-menu li {
	width:auto;
	height:auto;
	border-bottom: 1px solid #CCCCCC;
	background-repeat: no-repeat;
	background-position: center bottom;
	padding: 0px;
	margin-top: 0px;
	margin-right: 4px;
	margin-bottom: 0px;
	margin-left: 4px;
}
.active-head {
	color:#333607;
	background-color: #a8b468;
	margin-top: 2px;
	margin-left: 1px;
	background-image: none;
}
.active-head a {
	color:#333C07;
	background-color: #CFD5B3;
}
body {
	padding: 0px;
	margin-top: 7px;
	margin-right: 0px;
	margin-bottom: 7px;
	margin-left: 7px;
	width: 196px;
}
</style>
<script>
function activeThis(curItem)
{
	liobjs=document.getElementsByTagName("li");
	for(i=0;i<liobjs.length;i++)
	{
			liobjs[i].className="";
	}
	curItem.className="active-head";
}
</script>
</head>

<body>
<div class="naviholder">
  <div style="width:196px; height:9px; line-height:9px"> &nbsp; </div>
  <ul class="admin-left-menu" id="adminmenu">
    <li onclick="activeThis(this)" style="text-align:center"> <strong style="color:#000; font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif">Home Dilevery </strong></li>
      <li onclick="activeThis(this)"> <a href="orders/index.php" target="main">Manage Orders</a> </li>
      <li onclick="activeThis(this)"> <a href="cart_user/index.php" target="main">Manage User</a> </li>
      <li onclick="activeThis(this)"> <a href="login.php" target="_parent">LogOut </a> </li>
  </ul>
</div>
</body>
</html>
