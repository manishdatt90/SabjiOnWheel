<?php	
	include_once("../../config.php");
	include_once("../message.php");
	include_once("../adminfunctions.php");

	$ObjclsMessage	=	new clsMessage();
    $msg	=	isset($_REQUEST['msg']) && $_REQUEST['msg']!=''?$_REQUEST['msg']:'';
	
	if(isset($_POST['orderDate']) && !empty($_POST['orderDate']))
   	$cond=" and order_date like '%".$_POST['orderDate']."%'"; 

    $sql="select * from cart_orders,cart_user where cart_orders.user_id=cart_user.user_id $cond"; 
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
    $( "#orderDate" ).datepicker({ dateFormat: 'yy-mm-dd'}) ;
   });
  </script>
    <script type="application/javascript">
	$( document ).ready(function() {
		$( ".orderStatus" ).change(function() {
			var value=$(this).val();
			var id=$(this).attr('id');
			$.ajax
			 ({
					 type: "POST",
					 url: "../process/process_active.php?action=orderStatus&id="+id+"&status="+value,
					 success: function(result)
					 { 
					    document.location.reload()
					 }
			 });
		 });
		$( ".paymentStatus" ).change(function() {
			var value=$(this).val();
			var id=$(this).attr('id');
			$.ajax
			 ({
					 type: "POST",
					 url: "../process/process_active.php?action=paymentStatus&id="+id+"&status="+value,
					 success: function(result)
					 { 
						 document.location.reload()
					 }
			 });
		 });
    });
	</script>
  </head>
  <body>
	<div align="left" class="bodydiv" >
    <h1>  Manage Orders : Order List</h1>
	  <br />
    <br />
    <form name="frmOrder" action="index.php" method="post" >
   <table width="100%" border="1"  cellspacing="0" cellpadding="0">
      <tr>
        <td align="right">Date of order placed</td>
        <td><input name="orderDate" type="text" id="orderDate" value="" autocomplete="off" />
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
			<td align="center" colspan="15"> <font color="#0066FF"><strong><?=$ObjclsMessage->msgBox($msg);?></strong></td>
		 </tr>
		 <?php
		 }		 
		
		if($res && mysql_num_rows($res)>0)
		 {		 
		
		 ?>
				<tr class="listing-head">
				<td nowrap>Order Id</td>
				<td nowrap>User Name</td>
				<td nowrap>User E-mail</td>
                <td nowrap>Mobile Number</td>
                <td nowrap>Address</td>				
				<td nowrap>Order Created Date</td>
                <td nowrap>Shipping Date</td>
                <td nowrap>Shipping Time Slot</td>
                <td nowrap>Total Amount Payable</td> 
                <td nowrap>Order Details</td>
                <td nowrap>Email Invoice</td>  
				<td nowrap>Order Status</td>
				<td nowrap>Payment Status</td>
				<td nowrap>Delete</td>
				</tr>
				
<?php				
			$i=1;
			while ($user_row=mysql_fetch_object($res)) 
			{
				$order_id          =	$user_row->order_id;				
      
				?>				
				<tr align="left">
					<td><?=$order_id?></td>
					<td><?=$user_row->user_first_name!=''?$user_row->user_first_name:'N/A'?></td>
					<td><?=$user_row->user_email!=''?$user_row->user_email:'N/A'?></td>
                    <td><?=$user_row->user_telephone!=''?$user_row->user_telephone:'N/A'?></td>
                    <td><?=$user_row->user_postal_address!=''?$user_row->user_postal_address:'N/A'?></td>
					<td><?=$user_row->order_date!=''?$user_row->order_date:'N/A'?></td>
                    <td><?=$user_row->shippingDate!=''?$user_row->shippingDate:'N/A'?></td>
                    <td><?=$user_row->shippingTimeSlot!=''?$user_row->shippingTimeSlot:'N/A'?></td>
                    <td>Rs.<?=$user_row->order_net_payable_amount!=''?number_format($user_row->order_net_payable_amount,2):'N/A'?></td>
                    <td><a href="/dummy/order_detail.php?oid=<?=$order_id?>" target="_blank">View Detail</a></td>
                    <td><a href="../process/process_add.php?action=emailInvoice&orderId=<?=$order_id?>">Invoice Email</a></td>
                    <td>
					<select class="orderStatus" id="<?=$order_id?>">
                    <? 
					   foreach ($order_status as $key=>$val)
					   {
						   if($user_row->order_status==$key)
						   $sel='selected="selected"';
						   else
						   $sel='';
						   echo '<option value="'.$key.'" '.$sel.'>'.$val.'</option>';
					   }
					   
					?>
                    </select>
                    <td>
                    <select class="paymentStatus" id="<?=$order_id?>">
                    <? 
					   foreach ($payment_status as $key1=>$val1)
					   {
						   if($user_row->payment_status==$key1)
						   $sel1='selected="selected"';
						   else
						   $sel1='';
						   echo '<option value="'.$key1.'" '.$sel1.'>'.$val1.'</option>';
					   }
					   
					?>
                    </select>
                    </td>
					<td align="center"><?=deleteLink('order',$order_id)?></td>
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
					<strong><font color="Red">No oder has been added by web site administrator till now.</font></strong>
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
