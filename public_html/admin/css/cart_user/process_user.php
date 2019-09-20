<?php
include_once("../../config.php");

$mode    = isset($_REQUEST['mode']) && $_REQUEST['mode'] != '' ? $_REQUEST['mode'] : '';
$user_id = isset($_REQUEST['id']) && $_REQUEST['id'] != '' ? $_REQUEST['id'] : '';
$order   = isset($_REQUEST['order']) && $_REQUEST['order'] != '' ? $_REQUEST['order'] : '';
$msg     = isset($_REQUEST['msg']) && $_REQUEST['msg'] != '' ? $_REQUEST['msg'] : '';
 $change_password = isset($_REQUEST['change_password']) ? $_REQUEST['change_password'] : '';

$msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';

$submit = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';

 
if (isset($_REQUEST['user_first_name']))
    $user_first_name = addslashes($_REQUEST['user_first_name']);


if (isset($_REQUEST['password']))
    $user_password = addslashes(trim($_REQUEST['password']));

if (isset($_REQUEST['conf_password']))
    $conf_password = addslashes(trim($_REQUEST['conf_password']));


if (isset($_REQUEST['user_postal_address']))
    $user_postal_address = addslashes(trim($_REQUEST['user_postal_address']));

if (isset($_REQUEST['user_state']))
    $user_state = addslashes($_REQUEST['user_state']);

if (isset($_REQUEST['user_country']))
    $user_country = addslashes($_REQUEST['user_country']);

if (isset($_REQUEST['user_zip_code']))
    $user_zip_code = addslashes($_REQUEST['user_zip_code']);

if (isset($_REQUEST['compname']))
    $compname = addslashes($_REQUEST['compname']);


$online = isset($_REQUEST['online_status']) ? $_REQUEST['online_status'] : 0;

//$mode	=  !empty($_REQUEST['mode'])?'edit':'';

// update the users details
if (($submit == 'Update') && !empty($user_id)) {
    //echo	
    $sql_set_user = " Update cart_user set user_middle_name='$user_middle_name', user_first_name= '$user_first_name' , user_last_name='$user_last_name',user_postal_address='$user_postal_address', user_telephone='$user_telephone', user_fax='$user_fax', user_city='$user_city', user_state='$user_state', user_country='$user_country',user_pst='$upst',user_credit='$ucredit'+user_credit,user_company='$compname', user_zip_code='$user_zip_code',credit_from='$fromdate',credit_end='$enddate',user_online='$online', modified_date = NOW() where user_id= $user_id ";
    $res_set      = mysql_query($sql_set_user);
    $msg          = "edited";
    
    // update password 
    
    if (!empty($conf_password) && !empty($user_password) && ($conf_password == $user_password) && ($change_password == "true")) {
        $sql_set_user_pswd = " Update cart_user set peoplePassword=('$user_password'), modifiedDate = NOW() where peopleId=$user_id ";
        $res_set_pswd      = mysql_query($sql_set_user_pswd);
        $msg               = "edited";
    }
} else
    $msg = "error";


//die($msg);

switch ($mode) {
    case 'del':
        $sql_sel = " delete from people where peopleId=$user_id ";
        $res_sel = mysql_query($sql_sel);
        $msg     = "deleted";
        break;
    
    case 'active':
        $sql_sel = " update people set activeStatus=1, modifiedDate=NOW() where peopleId=$user_id ";
        $res_sel = mysql_query($sql_sel);
        $msg     = "active";
        
        break;
    
    case 'inactive':
        $sql_sel = " update people set activeStatus=0, modifiedDate=NOW() where peopleId=$user_id ";
        $res_sel = mysql_query($sql_sel);
        $msg     = "deactive";
        break;
    
    default:
        $sql_sel = " select * from people order by peopleId desc ";
        $res_sel = mysql_query($sql_sel);
        break;
        
}

if (!empty($msg)) {
    header("location: index.php?msg=" . $msg);
    exit;
}

?>
