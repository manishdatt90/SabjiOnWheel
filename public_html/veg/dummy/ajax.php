<?
session_start();
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
$action=$_REQUEST['action'];

    switch ($action) {
    case 'cartProducts':
	$noOfProduct = isset($_REQUEST['proId'])?count($_REQUEST['proId']):0;
	if(!isset($_SESSION['cart']))
	{
		$_SESSION['cart']=array();
	}
	for ($j = 0; $j < $noOfProduct; $j++) 
	 {
		$proId=$_REQUEST['proId'][$j];
		if(!empty($_REQUEST['proQty'][$j]))
		{
			if(isset($_SESSION['cart'][$proId]))
			{
				$_SESSION['cart'][$proId]['proQty']=$_REQUEST['proQty'][$j]+$_SESSION['cart'][$proId]['proQty'];
			}
			else
			{
			$_SESSION['cart'][$proId]['proId']=$_REQUEST['proId'][$j];
			$_SESSION['cart'][$proId]['proName']=$_REQUEST['proName'][$j];
			$_SESSION['cart'][$proId]['proImg']=$_REQUEST['proImg'][$j];
			$_SESSION['cart'][$proId]['proMp']=$_REQUEST['proMp'][$j];
			$_SESSION['cart'][$proId]['proSp']=$_REQUEST['proSp'][$j];
			$_SESSION['cart'][$proId]['proQty']=$_REQUEST['proQty'][$j];
			}
		}
     }
				
	 $output = array('data1' => $noOfProduct);
	 echo json_encode($output);
	 break;
	 
	 case 'updateQty':
	 $qty1=$_REQUEST['qty'];
	 $pid1=$_REQUEST['proId'];
	 foreach($arrCart as $pid=>$value)
     {
		
		if($pid==$pid1)
		{
			$subtotal1=$value['proSp'] * $qty1;
		    $totalCartAmount+=$subtotal1;
			if($qty1==0)
			unset($_SESSION['cart'][$pid1]);
			else
			$_SESSION['cart'][$pid1]['proQty']=$qty1;
		}
		else
		{
			$subtotal		=	$value['proSp'] * $value['proQty'];
		    $totalCartAmount+=$subtotal;
		}
	}
	 $output = array('subtotal' => $subtotal1,'totalCartAmount'=>$totalCartAmount);
	 echo json_encode($output);
	 break;
        
    case 'removePro':
	$proId=$_REQUEST['proId'];
	unset($_SESSION['cart'][$proId]);
	$arrCart1=$_SESSION['cart'];
	foreach($arrCart1 as $pid=>$value)
    {
	   $subtotal=$value['proMp'] * $value['proQty'];
	   $totalCartAmount+=$subtotal;
	}
	 $output = array('totalCartAmount'=>$totalCartAmount);
	 echo json_encode($output);
	break;
   
}
?>