<?php	
	include_once("../../config.php");
	include_once("../message.php");

	$ObjclsMessage	=	new clsMessage();
    $msg	=	isset($_REQUEST['msg']) && $_REQUEST['msg']!=''?$_REQUEST['msg']:'';		  
?>

<!-- header- start -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>USERS LIST    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />    
    <link href="<?=__ADMINCSS?>" rel="stylesheet" type="text/css" />
  </head>
  <body>
	<div align="left" class="bodydiv" >
    <h1>  Manage Users : Users List</h1>
	  <br />
    <br />
		<tr>
		<td>
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
		
		if($res_get && mysql_num_rows($res_get)>0)
		 {		 
		
		 ?>
				<tr class="listing-head">
				<td nowrap>S.No.</td>
				<td nowrap>User Name</td>
				<td nowrap>User E-mail</td>				
				<td nowrap>Modified Date</td>
				<td nowrap>Status</td>
				<td nowrap>Edit</td>
				<td nowrap>Delete</td>
				</tr>
				
<?php				
			$i=1;
			while ($user_row=mysql_fetch_object($res_get)) 
			{
				$user_id          =	$user_row->user_id;				
      
				?>				
				<tr align="left">
					<td><?=$i?></td>
					<td><?=$user_row->user_first_name!=''?$user_row->user_first_name:'N/A'?></td>
					<td><?=$user_row->user_email!=''?$user_row->user_email:'N/A'?></td>
					<td><?=$user_row->modified_date!=''?date("M-d-Y",strtotime($user_row->modified_date)):'N/A'?></td>
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
