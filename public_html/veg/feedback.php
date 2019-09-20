<? include_once("config.php");
$site_title="Feedback";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Feedback | Home Delivery Fruits &amp; Vegetables Gurgaon</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<meta name="description" content="Feedback for Sabji On Wheels delivers fresh and best quality fruits &amp; vegetables at your doorstep in Gurgaon.">
<meta name="keywords" content="Feedback forhome delivery vegetables, free delivery fruits in gurgaon, sabji market gurgaon">
<? include_once("commonTemplate/head.php")?> 
<script type="text/JavaScript">
/*$(document).ready(function() {
$("#feedbackFrm").validate({
                rules: {
                    fname: "required",
					emailid:{
                        required: true,
                        email: true
                    },
					
                },
                messages: {
					fname: "<span>Please enter a first name</span>",
                    emailid:{
                        required:"<span>Please enter email id</span>",
                        email: "<span>Please enter valid email id</span>"
                    },
                    
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
			
});*/
</script>
<link href="css/checkout.css" rel="stylesheet">
</head>

<body>
<? include_once("commonTemplate/header.php")?>
<section>
 <div class="feedback-outer">
  <div class="feedback-inner">
<div class="feedback-left">
<div class="feeback-heading">Any Feeback &amp; Suggestions for us</div>
<form method="post" action="/process/process.php" id="feedbackFrm">
<input type="hidden" name="action" value="feedback">
<label>Your Name:</label>
<input type="text" value="" id="fname" name="fname" placeholder="Name"><br>

<label>Your Email:</label>
<input type="text" value="" id="emailid" name="emailid" placeholder="Email"><br>

<label>Your Phone Number:</label>
<input type="text" value="" id="phone" name="phone" placeholder="Phone Number"><br>


<label>Suggestions:</label>
<textarea rows="5" cols="42" name="suggestions" id="suggestions" placeholder="Suggestions"></textarea>
<br>

<input type="submit" value="Submit">

</form>

</div>
<div style="margin-left: -88px; margin-top: 29px;" class="feedback-right hidden-img"><img width="300" height="255" alt="feedback" src="img/Feedback.jpg"></div>

<iframe src='http://www.flipkart.com/affiliate/displayWidget?affrid=WRID-142178506309337368' frameborder=0 height=90 width=728></iframe>

 </div>
 </div>
</section>
<? include_once("commonTemplate/footer.php")?>

</body>
</html>
