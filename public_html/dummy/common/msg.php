<?          
  class Msg
  {
    function msgBox($msg='')
    {
 	  $HTML='';
      switch($msg)
      {
	  
       case 'Logout':
          $msgDisplay="You have sucessfully Logged Out.";
          $color  = "#3A8703";
          break;
        
       case 'loggedin':
          $msgDisplay="You have successfully logged in.";
          $color  = "#3A8703";
          break;
        
       case 'fail':
          $msgDisplay = "Whoops, looks like your username or password does not match our records. Please try again.";
          $color  = "red";
          break;
      
      case 'edit':
          $msgDisplay = "Sucessfully updated";
          $color      = "#3A8703";
          break; 
		  
      case 'add':
          $msgDisplay = "Sucessfully Add";
          $color      = "#3A8703";
          break; 
     case 'regerr':
          $msgDisplay = "An error occured while saving your details. Please try again.";
          $color  = "red";
          break;
     
     case 'error':
          $msgDisplay = "An error occured while processing. Please try again.";
          $color  = "red";
          break;
          
    case 'notunique':
          $msgDisplay = "Emailid provided by you already exists. Please try again with new Emailid.";
          $color      = "red";
          break;
    
     
     case 'mailed':
          $msgDisplay = "We are reviewing
your application. A confirmation email will be sent to your email with your login ID &
Password once your application will be approved.";
          $color      = "#3A8703";
          break;
	
  
      case 'wrongpwd':
          $msgDisplay = "Current Password provided by you is not avialable. Please try again.";
          $color      = "red";
          break;		  
	  case 'down':
          $msgDisplay = "Order is decrearsed";
          $color      = "#3A8703";
          break;
	  case 'up':
          $msgDisplay = "Order is increased";
          $color      = "#3A8703";
          break; 
      case 'pwdSucess':
          $msgDisplay = "Your Password Has Been sent, Kindly Check Your Mail.";
          $color      = "#3A8703";
      break;
	  case 'pwdFail':
          $msgDisplay = "Email Provided by you does not exist.";
          $color      = "red";
      break; 
	   
	  case 'not_mailed':
          $msgDisplay = "Not mailed";
          $color      = "red";
      break; 	
	  case 'approved':
          $msgDisplay = "Your account  is now sucessfully activated.Please login first.";
          $color  = "#3A8703";
      break;
	  case 'not_approved':
          $msgDisplay = "We are reviewing
your application. A confirmation email will be sent to your email with your login ID &
Password once your application will be approved.";
          $color  = "red";
       break;
	   case 'already_added':
          $msgDisplay = "Company already added by you as a favorite.";
          $color  = "red";
       break;
       case 'nsucess':
          $msgDisplay = "Thank you for your subscription";
          $color  = "#3A8703";
       break;
       case 'editprofile':
          $msgDisplay = "Your Profile is sucessfully Updated";
          $color  = "#3A8703";
       break;
       
      default:
		$msgDisplay = "";
        $color  = "#3A8703";
      break;        
      }      
	  $HTML='<strong><font color="'.$color.'">'.$msgDisplay.'</font></strong>'  ;   		

      return $HTML;
             	 
       }
      
  }
?>