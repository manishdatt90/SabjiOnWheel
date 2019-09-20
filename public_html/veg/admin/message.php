<?php
 // messages   
   
   class	clsMessage
   {
    function msgBox($msg='')
    {
 	    $HTML='';
        
      switch($msg)
      {              
       case 'Logout':
          $msgDisplay="You have sucessfully Logged Out.";
          $color  = "blue";
          break;
        
       case 'loggedin':
          $msgDisplay=" You have successfully logged in.";
          $color  = "blue";
          break;
        
       case 'fail':
          $msgDisplay = "User Name and Password do not match or wrong.";
          $color  = "red";
          break;
      
      case 'editprofile':
          $msgDisplay = "You have sucessfully updated your profile.";
          $color      = "blue";
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
          $msgDisplay = "E-mail provided by you already exists. Please try again with new email id.";
          $color      = "red";
          break;
    
     
     case 'regd':
          $msgDisplay = "You have been success fully registered. Please login for shopping online.";
          $color      = "blue";
          break;
          
     /* Update Related Messages START */
     
     case 'added':
				$msgDisplay = "You have successfully added the record.";
				$color  = "blue";
				break;
     		
			case 'edited':
				$msgDisplay = "You have successfully edited the record.";
				$color  = "blue";
			break;
           	case 'sent':
				$msgDisplay = "Email Sent Sucessfully..";
				$color  = "blue";
			break;
				
			case 'failed':
				$msgDisplay = "An occur ocured while saving user please try again.";
        $color  = "blue";						
				break;
			
			case 'active':
				$msgDisplay = "You have successfully activated the record.";
				$color  = "blue";
				break;
				
			case 'deactive':
				$msgDisplay = "You have successfully deactivated the record.";
				$color  = "blue";
				break;
			
			case 'deleted':
				$msgDisplay = "You have successfully deleted the record.";
				$color  = "blue";
				break;
				
			default :
				$msgDisplay = "";			
				$color  = "";
				break;      
       /* Update Related Messages  ENDS */
              
      }      
      $HTML.=<<<msgBoxHTML
        <font color="$color">$msgDisplay</font>          		
msgBoxHTML;
      echo $HTML;
             	 
      }
	  
 }
?>