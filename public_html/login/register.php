<?
	include_once("../config.php");	
	include_once("../logic/logicLogin.php");
	
	$ObjUserLogin=new UserLogin();  
	$arrRegUser=array();
	$msg='';
	$ref_page='';
	if(isset($_POST['regsub'])){
		$fn=$_POST['reg_first_name'];
		$mob=$_POST['reg_telephone'];
		
		$request ="";
$param['uname'] = "arungupta";
$param['pwd'] = "Ericsson1234";
$param['senderid'] = "SABJHI";
$param['to'] = $mob; 
$param['msg']= "Dear $fn, You are successfully registered with SABJI ON WHEELS. Your Login details are sent on your email id. You are eligible to get 5% off on
first order.
Happy Shopping.
Sabji On Wheels";
$param['route'] = "T";
foreach($param as $key=>$val) {
$request.= $key."=".urlencode($val);
$request.= "&";
}
$request = substr($request, 0, strlen($request)-1);
$url ="http://sms2support.com/sendsms?".$request;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
		
	}
	
	$arrRegUser['reg_password']=isset($_REQUEST['reg_password'])?addslashes(trim($_REQUEST['reg_password'])):'';	
	$arrRegUser['conf_reg_password']=isset($_REQUEST['conf_reg_password'])?addslashes(trim($_REQUEST['conf_reg_password'])):'';	
	$arrRegUser['reg_user_email']=isset($_REQUEST['reg_user_email'])?addslashes(trim($_REQUEST['reg_user_email'])):'';	
	$arrRegUser['reg_telephone']=isset($_REQUEST['reg_telephone'])?addslashes(trim($_REQUEST['reg_telephone'])):'';	
	$arrRegUser['reg_dob']=isset($_REQUEST['reg_dob'])?addslashes(trim($_REQUEST['reg_dob'])):'';	
	$arrRegUser['reg_address']=isset($_REQUEST['reg_address'])?addslashes(trim($_REQUEST['reg_address'])):'';	
	$arrRegUser['reg_first_name']=isset($_REQUEST['reg_first_name'])?addslashes(trim($_REQUEST['reg_first_name'])):'';
    $arrRegUser['reg_last_name']=isset($_REQUEST['reg_last_name'])?addslashes(trim($_REQUEST['reg_last_name'])):'';
    $arrRegUser['register']=isset($_REQUEST['register'])?$_REQUEST['register']:'';
	
	
	if(($arrRegUser['register']=='Register') && !empty($arrRegUser['reg_password']) && !empty($arrRegUser['reg_user_email']))
	$msg = $ObjUserLogin->registerUser($arrRegUser);
	else
	$msg='empty';
	
	
	if($msg=='regd')
	{
		$arrUser['user_email'] = $arrRegUser['reg_user_email'];
		$arrUser['user_password']	=	$arrRegUser['reg_password'];
		// check user for loggin
		$msg	=	$ObjUserLogin->CheckUser($arrUser,$ref_page);
	}
	else
	{
		header("location:../login/index.php?msg=$msg");
		exit;
	}
	
?>
