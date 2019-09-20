<?
ob_start();
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="21%" align="left" valign="top">&nbsp;</td>
    <td width="79%" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Name:</strong></td>
    <td align="left" valign="top"><label><?=$_POST['fname']?></label>
   </td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Order Number:</strong></td>
    <td align="left" valign="top"><?=$_POST['phone']?></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><span style="text-align:left; padding-top:5px;">
      <label for="fscf_field1_2" style="text-align:left;"><strong>Email Id:</strong></label>
    </span></td>
    <td align="left" valign="top"><label><?=$_POST['email']?>
    </label></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Delivery Date:</strong></td>
    <td align="left" valign="top"><label>
      <?=$_POST['delivery']?>
    </label></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong>Suggestions:</strong></td>
    <td align="left" valign="top"><label><?=$_POST['suggestions']?></label></td>
  </tr>
</table>
<?
$content=ob_get_contents();
ob_end_clean();	
					
					//$headers.= "From: milsky.com<order@milsky.com>\r\n";
$sendmail='feedbacks@sabjionwheels.com';
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
$headers .= 'From: "sabjionwheels.com" <****@sabjionwheels.com>\n';				
					$result3=@mail($sendmail,'Contact us from-orders@sabjionwheels.com:'.$orderno,$content,$headers);
					
					if($result3)
					 {
					 	header("location:thanks.php");
						exit;
					 }
					 else
					 	{
						
					 	header("location:thanks.php");
						exit;
						}				

				header("location:thanks.php");
				exit;
			
?>