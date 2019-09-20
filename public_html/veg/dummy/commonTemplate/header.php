<? 
//unset($_SESSION['cart']);
//session_destroy();
?>
<a href="proceed.php" class="fancybox" style="display:none;"></a><form id="form1" runat="server">
<div class="loding_text">Processing...</div>
 
    <div id="boxes">
        <div style="top: 199.5px; left: 551.5px; display: none;" id="dialog" class="window">
        <img src="<?=$site_url?>/img/logo.jpg" />
        </div>
        <!-- Mask to cover the whole screen -->
        <div style="width: 1478px; height: 602px; display: none; opacity: 0.8;" id="mask">
        </div>
    </div>
    </form>
<div class="topbar">
  <div class="topbar-inner">
    <div class="social-area">
      
     <? if(!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid']!="loggedin"){?> 
        <div class="icons"><a href="<?=$site_url?>/login/">Login/Register</a></div>
       <? } else{?>
       <div class="icons"><a href="<?=$site_url?>/user/">My Account</a></div>
       <div class="icons"><a href="<?=$site_url?>/logout.php">LogOut</a></div>
       <? }?>
      <div class="icons"><a href="https://www.facebook.com/sabjionwheels" target="_new"><img src="<?=$site_url?>/img/facebook.png" width="20" height="20" alt="facebook"></a></div>
      <div class="icons"><a href="#"><img src="<?=$site_url?>/img/twitter.png" width="20" height="20" alt="twitter"></a></div>
      <div class="icons"><a href="#"><img src="<?=$site_url?>/img/linkdin.png" width="20" height="20" alt="linkdin"></a></div>
    </div>
    <div class="menu">
      <ul>
       <li>
          <input type="submit" value="Home" onClick="window.location.href='<?=$site_url?>/index.php'"/>
        </li>
         <li>
          <input type="submit" value="Deliveries" onClick="window.location.href='<?=$site_url?>/delivery.php'"/>
        </li>
        
       
        <li>
          <input type="submit" value="How To Order" onClick="window.location.href='<?=$site_url?>/how-to-order.php'"/>
        </li>
       
         <li>
          <input type="submit" value="Feedback" onClick="window.location.href='<?=$site_url?>/feedback.php'"/>
        </li>
        <li>
          <input type="submit" value="FAQS" onClick="window.location.href='<?=$site_url?>/faqs.php'"/>
        </li>
        <li>
          <input type="submit" value="Contact Us" onClick="window.location.href='<?=$site_url?>/contact.php'"/>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="topbar-content">
  <div class="inner">
    <marquee direction="left" onMouseOver="this.stop()" onMouseOut="this.start()">
     ~~~~ Register today to get 10% discount on your first order ~~~
    </marquee>
  </div>
</div>
<div class="topbar-divider-bg2">&nbsp;</div>
<header>
  <div class="header-inner">
    
    <div class="right" id="logo-hidden">
    <div class="logo"><a href="../index.html"><img src="<?=$site_url?>/img/logo.jpg" width="100%" alt="logo"></a></div>
      <div class="details">
	<span style="font-size:18px;font-family:Forte; color:#c0504d;"> 4 Delivery slots to choose from!!</span><br>
        <span style="font-size:20px;font-family:Cooper Black; color:#9bbb59;">Same day Home Delivery</span><br>
        <span style="font-size:18px;color:#e36c0a;font-family:Century Schoolbook;"> <b>Say goodbye to Traffic,</b></span><br>
        <span style="color:green;font-size:20px;font-family:Cooper Black;"> Parking & Long queues :)</span><br>
        <span style="font-size:20px;font-family:Cooper Black;color:orange;"> Cash on Delivery</span></div>


      <div class="details" style="margin-left:0px;"><span style="font-size:20px;color:orange;font-family:Cooper Black;">FREE SHIPPING</span><BR> 
<span style="font-size:15px;color:orange;font-family:Cooper Black;">on all orders of Rs 250 and<br> Above.</span><br>
        <span style="color:#17365d;FONT-FAMILY:ARIAL; font-size:12px;"><B>Else add Rs.20/-<br>
        No minimum order</B> </span></div>


      <div class="details" style="margin-left:0px;"> <strong style="font-size:26px;font-family:Jokerman;">ORDER NOW</strong><br>
       <strong class=" number-text">9310056669</strong><br>
        <br><span style="font-size:15px;font-family:Cooper Black; color:#9bbb59;">
        WE Deliver PAN Gurgaon. </span></div>
    </div>
  </div>
 <div class="topbar-divider-bg"style="padding-top:8px">&nbsp;</div>
  <div class="menu-bar-outer">
    <div class="menu-bar-inner">
      <div class="menu-bar">
        <ul class="orion-menu">
          <li><a href="<?=$site_url?>/vegetables.php">VEGETABLES</a></li>
          <li><a href="<?=$site_url?>/fruits.php">FRUITS</a></li>
          <li><a href="<?=$site_url?>/weekly.php">WEEKLY BOXES</a></li>
          <li><a href="<?=$site_url?>/health.php">HEALTH BOXES</a></li>
          <li><a href="<?=$site_url?>/OrganicFlour.php">ORGANIC FLOUR</a></li>
          <li><a href="<?=$site_url?>/offer.php">OFFERS</a></li>
          <li><a href="<?=$site_url?>/contact.php">CONTACT WITH US</a></li>

        </ul>
      </div>
    </div>
  </div>
  <div class="topbar" style="padding-top:8px;">&nbsp;</div>
</header>