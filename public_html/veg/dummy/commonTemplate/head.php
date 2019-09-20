<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$site_title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<link href="<?=$site_url?>/css/style.css" rel="stylesheet" type="text/css">
<link href="<?=$site_url?>/css/responsive.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' href='/css/carousel.css' type='text/css' media='all' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<link rel="stylesheet" href="<?=$site_url?>/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?=$site_url?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?=$site_url?>/datepicker/js/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="<?=$site_url?>/datepicker/css/ui-darkness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?=$site_url?>/js/jquery.validate.min.js"></script>

   <script>
  $(function() {
    $( "#shippingDate" ).datepicker({ dateFormat: 'yy-mm-dd',minDate: +0}) ;
    $( "#reg_dob" ).datepicker({ dateFormat: 'yy-mm-dd',maxDate:new Date()}) ;
   });
  </script>
<!-- Menu CSS & JS -->
<link href="<?=$site_url?>/css/orion-menu.css" rel="stylesheet">
<link href="<?=$site_url?>/css/cart.css" rel="stylesheet">
 <!--------------END------------------>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48871078-2', 'sabjionwheels.com');
  ga('send', 'pageview');

</script>
<script src="<?=$site_url?>/js/jquery.themepunch.plugins.min.js"></script>    
<style>
.submit-btn {
    background: none repeat scroll 0 0 #70912C;
    border: medium none;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 15px;
    font-weight: bold;
    margin: 12px auto;
    outline: medium none;
    padding: 8px;
    width: 80px;
}
.loding_text {
    font-size: 25px;
    left: 50%;
    position: fixed;
    top: 50%;
    display:none;
}
</style>


<script>
$(document).ready(function() {
$('.fancybox').fancybox();	
});
</script>

<script type="text/javascript">
$(document).ready(function () {
$( ".plus" ).live( "click", function() {
	var qty=$(this).parents('.proDetail').find('.proQty').val();
    $(this).parents('.proDetail').find('.proQty').val(parseInt(qty)+1);
	
});
$( ".minus" ).live( "click", function() {
	var qty=$(this).parents('.proDetail').find('.proQty').val();
	if(qty!=0)
       $(this).parents('.proDetail').find('.proQty').val(parseInt(qty)-1);
	
});

$( ".add_to_cart_btn" ).live( "click", function() {
	   var proId = [];
	   var proName = [];
	   var proImg = [];
	   var proMp = [];
	   var proSp = [];
	   var proQty = [];
	   var cnt=0;
       $('.loding_text').show();
	   $('.proDetail').each(function(index, element) {
             if($(this).find('.proQty').val()!=0 || $(this).find('.proQty').val()=='undefined')
			 {
			 //alert($(this).attr('id'));
			 proId[cnt]=$(this).attr('id');
			 proName[cnt]=$(this).find('strong').text();
			 proImg[cnt]=$(this).find('img').attr('src');
			 proMp[cnt]=$(this).find('.market_pirce').text();
			 proSp[cnt]=$(this).find('.s_pirce').text();
			 proQty[cnt]=$(this).find('.proQty').val();
			 cnt++;
			 }
			//alert(prodname+'/'+mp+'/'+sp+'/'+qty);
       });
	   //alert(myArray)
	   $.ajax({
            type: 'POST',
            url: 'ajax.php?action=cartProducts',
			dataType: "json",
            data: {
				'proId[]': proId,
                'proName[]': proName,
				'proImg[]': proImg,
				'proMp[]': proMp,
				'proSp[]': proSp,
				'proQty[]': proQty
				
            },
            success: function (res) {
				//if(res.data1 >0)
				{
					//window.location="cart.php";
                   $('.fancybox').fancybox();
                   $('.loding_text').hide();
                  $('.fancybox').trigger('click');

				}
            }
         });
	});
});	
					
					
                    
          </script>
<script type="text/javascript"><!--
/* 
   Float Submit Button To Right Edge Of Window
   Version 1.0
   April 11, 2010

   Will Bontrager
   http://www.willmaster.com/
   Copyright 2010 Bontrager Connection, LLC

   Generated with customizations on May 18, 2014 at
   http://www.willmaster.com/library/manage-forms/floating-submit-button.php

   Bontrager Connection, LLC grants you 
   a royalty free license to use or modify 
   this software provided this notice appears 
   on all copies. This software is provided 
   "AS IS," without a warranty of any kind.
*/

//*****************************//

/** Five places to customize **/

// Place 1:
// The id value of the button.

var ButtonId = "button";


// Place 2:
// The width of the button.

var ButtonWidth = 100;


// Place 3:
// Left/Right location of button (specify "left" or "right").

var ButtonLocation = "right";


// Place 4:
// How much space (in pixels) between button and window left/right edge.

var SpaceBetweenButtonAndEdge = 0;


// Place 5:
// How much space (in pixels) between button and window top edge.

var SpaceBetweenButtonAndTop =260;


/** No other customization required. **/

//************************************//

TotalWidth = parseInt(ButtonWidth) + parseInt(SpaceBetweenButtonAndEdge);
ButtonLocation = ButtonLocation.toLowerCase();
ButtonLocation = ButtonLocation.substr(0,1);
var ButtonOnLeftEdge = (ButtonLocation=='l') ? true : false;

function AddButtonPlacementEvents(f)
{
   var cache = window.onload;
   if(typeof window.onload != 'function') { window.onload = f; }
   else { window.onload = function() { if(cache) { cache(); } f(); }; }
   cache = window.onresize;
   if(typeof window.onresize != 'function') { window.onresize = f; }
   else { window.onresize = function() { if(cache) { cache(); } f(); }; }
}

function WindowHasScrollbar() {
var ht = 0;
if(document.all) {
   if(document.documentElement) { ht = document.documentElement.clientHeight; }
   else { ht = document.body.clientHeight; }
   } 
else { ht = window.innerHeight; }
if (document.body.offsetHeight > ht) { return true; }
else { return false; }
}

function GlueButton(ledge) {
var did = document.getElementById(ButtonId);
did.style.top = SpaceBetweenButtonAndTop + "px";
did.style.width = ButtonWidth + "px";
did.style.left = ledge + "px";
did.style.display = "block";
did.style.zIndex = "9999";
did.style.position = "fixed";
}

function PlaceTheButton() {
if(ButtonOnLeftEdge) {
   GlueButton(SpaceBetweenButtonAndEdge);
   return;
   }
if(document.documentElement && document.documentElement.clientWidth) { GlueButton(document.documentElement.clientWidth-TotalWidth); }
else {
   if(navigator.userAgent.indexOf('MSIE') > 0) { GlueButton(document.body.clientWidth-TotalWidth+19); }
   else {
      var scroll = WindowHasScrollbar() ? 0 : 15;
      if(typeof window.innerWidth == 'number') { GlueButton(window.innerWidth-TotalWidth-15+scroll); }
      else { GlueButton(document.body.clientWidth-TotalWidth+15); }
      }
   }
}

AddButtonPlacementEvents(PlaceTheButton);
//--></script>
