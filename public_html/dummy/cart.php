<?php
include_once("config.php");
//echo '<pre>';print_r($_SESSION['cart']);
$arrCart=array();
if(isset($_SESSION['cart']))
{
	$arrCart=$_SESSION['cart'];
	$arrCartCount=count($_SESSION['cart']);
}
else
$arrCartCount=0;
$totalQty=0;
$totalCartAmount =0;
$empMsg='';
//session_destroy();
?>
<!DOCTYPE HTML>
<html>
<head>
<? include_once("commonTemplate/head.php");?>
<script type="text/javascript">
function qtyPlus(proId)
{
	 var qty=parseFloat($(".q"+proId).val())+1;
	 $(".q"+proId).val(qty);
	 qtyUpdate(proId,qty);
	 
}
function qtyMinus(proId)
{
	 var qty=parseFloat($(".q"+proId).val())-1;
	 if(qty!=0)
	 {
		 $(".q"+proId).val(qty);
	     qtyUpdate(proId,qty);
	 }
	 
}
function qtyUpdate(proId,qty)
{
	//alert(proId)
	$.ajax
	 ({
             type: "POST",
             url: "ajax.php?action=updateQty&proId="+proId+"&qty="+qty,
			 dataType: "json",
             success: function(result)
			 { 
				 if(result.subtotal1=='0')
				 {
					 $("#proRow"+proId).html(''); 
				 }
				$("#subTotal"+proId).html(parseFloat(result.subtotal).toFixed(2)); 
				$("#totCartAmt").html('$'+parseFloat(result.totalCartAmount).toFixed(2));
            }
     });
}
function removePro(proId)
{
	$.ajax
	 ({
             type: "POST",
             url: "ajax.php?action=removePro&proId="+proId,
			 dataType: "json",
             success: function(result)
			 { 
				$("#proRow"+proId).remove();
				if(result.totalCartAmount!='0')
				{
				    $("#totCartAmt").html('$'+parseFloat(result.totalCartAmount).toFixed(2));
				}
				else
				{
					$(".cart-items").remove();
					$("#emptyMsg").html('Empty Cart.Go to <a href="vegetables.html">Our Products</a>');
				}
             }
     });
}
</script>               
</head>

<body>
<? include_once("commonTemplate/header.php")?>

<section>
<div class="feedback-outer">
  <div class="feedback-inner">
  <div class="feeback-heading">My Cart</div>
   <div class="main-content-wrapper">
				<div class="cart-wrapper">
					<div class="main-title"><a href="vegetables.php" class="continue">continue shopping</a></div>
                    
					<div class="cart-titles">
						<p class="item-image">Product name</p>
						<p class="quantity">Quantity</p>
						<p class="price">SABJIONWHEELS Price</p>
					</div>
                    <? 
					if($arrCartCount > 0)
					{
					?>
					<form action="#">
						<div class="cart-items">
						<?
                        
                        foreach($arrCart as $pid=>$value)
                        {
                           $proName=$value['proName'];
						   $proImg=$value['proImg'];
						   $proMp=$value['proMp'];
						   $proSp=$value['proSp'];
						   $proQty=$value['proQty']; 
                           $prodFinalMp	=	$proSp * $proQty;
						   //$prodFinalSp=$proSp * $proQty;
                           $totalCartAmount+=$prodFinalMp;
                           $totalCartAmountDisp=number_format($totalCartAmount,2,'.',',');
						   $prodFinalMpDisp=number_format($prodFinalMp,2,'.',',');
                           $img="/img/apple.jpg";
                        ?>
                                                
                                                
                         <div class="row" id="proRow<?=$pid?>">
                                                    <div class="item-image">
                                                        <div class="image-wrapper-1">
                                                            <div class="image">
                                                                <div class="image-overlay-1 trans-1">
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <a class="button-2 trans-1"></a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <a><img src="<?=$proImg?>" alt=""width="90" height="90"  /></a>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="desc">
                                                        <h3 class="custom-font-1"><?=$proName?></h3>
                                                        <!--<br>MARKET PRICE: Rs<?=$proMp?>-->
                                                        <br>SABJIONWHEELS PRICE: Rs<?=$proSp?>
                                                        
                                                    </div>
                                                    <div class="quantity">
                                                        <input type="text" class="input-text-1 count q<?=$pid?>" name="<?=$pid?>_cart_qty" value="<?=$proQty?>" readonly />
                                                        <a class="button-1 custom-font-1 trans-1 plus"  onclick="qtyPlus('<?=$pid?>')" ><span></span></a>
                                                        <a class="button-1 custom-font-1 trans-1 minus" onclick="qtyMinus('<?=$pid?>')"><span></span></a>
                                                    </div>
                                                    <div class="price custom-font-1" >
                                                        Rs.<span id="subTotal<?=$pid?>"><?=$prodFinalMpDisp?></span>
                                                    </div>
                                                    <div class="remove">
                                                        <a onclick="removePro('<?=$pid?>')" style="cursor:pointer;">remove</a>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                              
                                                
                        <?php	
                          
                            $totalQty+=$proQty;
                        }
						
                        ?>     
    
                       
                       <div class="row">
							
								<div class="total" style="float:right">
									<div class="checkout">
										<p>
											Total payment:
                                            <input type="hidden" id="cartAmt" value="<?=$totalCartAmount?>" />
                                            <b class="custom-font-1" id="totCartAmt"><?=!empty($totalCartAmountDisp)?'Rs.'.$totalCartAmountDisp:''?></b>
										</p>
										<p>
											<a class="button-3 custom-font-1 trans-1" href="checkout.php?ref=cart"><span>Proceed to checkout</span></a>
										</p>
									</div>
								</div>
							</div>                 
                        </div>
				   </form>

					<? 
					}
					
					else
					{
						$empMsg='Empty Cart.Go to <a href="vegetables.php">Our Products</a>';
					}
					
					?>
                    <div id="emptyMsg"><?=$empMsg?></div>
				<!-- END .cart-wrapper -->
				</div>
				<div class="clear"></div>
			</div>
<p></p>
 </div>
 </div>
</section>
<? include_once("commonTemplate/footer.php") ?>
</body>
</html>