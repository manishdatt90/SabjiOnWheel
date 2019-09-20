<?php	
	include_once("../../config.php");
	include_once("../message.php");
    include_once("../adminfunctions.php");
	$ObjclsMessage	=	new clsMessage();
    $msg	=	isset($_REQUEST['msg']) && $_REQUEST['msg']!=''?$_REQUEST['msg']:'';
	$cond='';
	if(isset($_POST['regDate']) && !empty($_POST['regDate']))
   	$cond.=" and reg_date like '%".$_POST['regDate']."%'"; 
    
    if(isset($_POST['user_name']) && !empty($_POST['user_name']))
   	$cond.=" and user_first_name like '%".$_POST['user_name']."%'";

    if(isset($_POST['user_telephone']) && !empty($_POST['user_telephone']))
   	$cond.=" and user_telephone like '%".$_POST['user_telephone']."%'";

    $sql="select * from cart_user where 1 $cond";
	$res=mysql_query($sql);		  
?>

<!-- header- start -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>USERS LIST    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />    
    <link href="/admin/css/admincss.css" rel="stylesheet" type="text/css" />
    <script type='text/javascript' src="/js/jquery-1.10.1.min.js"></script>
    <link rel="stylesheet" href="/css/jquery-ui.css" />
	<script src="/js/jquery-ui.js"></script>
      <link rel="stylesheet" href="/css/jquery.ui.datepicker.css" />
      <script>
  $(function() {
    $( "#regDate" ).datepicker({ dateFormat: 'yy-mm-dd'}) ;
   });
  </script>
  </head>
  <body>
	<div align="left" class="bodydiv" >
    <h1>  Manage Users : Users List</h1>
	  <br />
    <br />
	<form name="frmOrder" action="index.php" method="post" >
   <table width="100%" border="1"  cellspacing="0" cellpadding="0">
      <tr>
        <td align="right">Registeration date</td>
        <td><input name="regDate" type="text" id="regDate" value="" autocomplete="off" />
      </tr>
      <tr>
        <td align="right">Name</td>
        <td><input name="user_name" type="text" id="user_name" value="" autocomplete="off" />
      </tr>
      <tr>
        <td align="right">Phone No. </td>
        <td><input name="user_telephone" type="text" id="user_telephone" value="" autocomplete="off" />
      </tr>
      <tr>
        <td align="center" colspan="2"><input type="submit" name="submit" title="" value="search"></td>
      </tr>
   </table>
    </form>
 		  <table width="100%" border="1"  cellspacing="0" cellpadding="0" align="center" class="listing">
		<?		 
		 if(isset($msg) && $msg!='')
		 {
		 ?>
		 <tr>
			<td align="center" colspan="7"> <font color="#0066FF"><strong><?=$ObjclsMessage->msgBox($msg);?></strong></td>
		 </tr>		 
		 <?php
		 }		 
		
		if($res && mysql_num_rows($res)>0)
		 {		 
		
		 ?>
				<tr class="listing-head">
				<td nowrap>S.No.</td>
				<td nowrap>Name</td>
				<td nowrap>E-mail</td>	
                <td nowrap>Telephone</td>				
				<td nowrap>Registeration Date</td>
				<td nowrap>Status</td>
				<td nowrap>Edit</td>
				<td nowrap>Delete</td>
				</tr>
				
<?php				
			$i=1;
			while ($user_row=mysql_fetch_object($res)) 
			{
				$user_id          =	$user_row->user_id;				
      
				?>				
				<tr align="left">
					<td><?=$i?></td>
					<td><?=$user_row->user_first_name!=''?$user_row->user_first_name:'N/A'?></td>
					<td><?=$user_row->user_email!=''?$user_row->user_email:'N/A'?></td>
                    <td><?=$user_row->user_telephone!=''?$user_row->user_telephone:'N/A'?></td>
					<td><?=$user_row->reg_date!=''?date("Y-m-d",strtotime($user_row->reg_date)):'N/A'?></td>
                    <td><?=activeInactiveLink('user',$user_id,$user_row->user_status)?></td>
					<td><?=editLink('add.php?userId='.$user_id)?></td>
					<td align="center"><?=deleteLink('user',$user_id)?></td>
				</tr>				
			<?php
			$i++;
				}			
			}
			else 
			{
			?>
				<tr>
					<td nowrap colspan="8" align="center">
					<strong><font color="Red">No User has been added by web site administrator till now.</font></strong>
					</td>
				</tr>
		<?php				
			}
		?>
		</table>	
		</form>	  
	</td> 	
	</tr>	
  </body>
	</html>
