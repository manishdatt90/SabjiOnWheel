<? 
include_once("config.php");
$site_title="Fruits";
?>
<!DOCTYPE HTML>
<html>
<head>
<? include_once("commonTemplate/head.php")?> 

</head>

<body>
<? include_once("commonTemplate/header.php")?> 
<section>
<div class="feedback-outer">
  <div class="feedback-inner">
    <div class="feeback-heading">Fruits</div>
    <div class="floating"><input type="button" value="Add to Cart" class="button add_to_cart_btn" id="button"  onClick="" />
   </div>

<table width="100%" cellspacing="0" cellpadding="0" border="1" class="td-style">
  <tbody><tr>
    <td width="50%" valign="top" align="left">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="td-style2">
  <tbody>
   <tr class="proDetail" id="fruit-1">
    <td valign="top" align="left"><img width="104" height="93" src="img/MNGOSAFEDA.jpg"></td>
    <td valign="middle" align="center"><strong>MANGO&ndash;SAFEDA HIGH GRADE (1 KG)<br>
      </strong> <span class="org-text">Market Price: Rs<span class="market_pirce"> 60</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">50</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
      </td>
  </tr>
  <tr class="proDetail" id="fruit-2">
        <td valign="top" align="left"><img width="104" height="93" src="img/mango dashehri123.jpg"></td>
        <td valign="middle" align="center"><strong>MANGO Dashehari - HIGH GRADE(1 KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">130</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">130</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
     
          </td>
  </tr>
  <tr class="proDetail" id="fruit-3">
        <td valign="top" align="left"><img width="104" height="93" src="img/MANGOperi1234.jpg"></td>
        <td valign="middle" align="center"><strong>MANGO SINDURI(1 KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">100</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">80</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
  </tr>
   <tr class="proDetail" id="fruit-4">
        <td valign="top" align="left"><img width="104" height="93" src="img/Alphonso_Mango123.jpg"></td>
        <td valign="middle" align="center"><strong>MANGO ALPHANSO - HIGH GRADE (1 KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">250</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">199</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
   </tr>
   <tr class="proDetail" id="fruit-5">
        <td valign="top" align="left"><img width="104" height="93" src="img/aadu1234.jpg"></td>
        <td valign="middle" align="center"><strong>AADU(500 GMS)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">60</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">49</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
   <tr class="proDetail" id="fruit-6">
    <td width="28%" valign="top" align="left"><img width="104" height="93" src="img/apple-green.jpg"></td>
    <td width="72%" valign="middle" align="center"><strong>APPLE-GREEN(500 GM)<br>
      </strong>    <span class="org-text"> Market Price: Rs <span class="market_pirce">160</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">150</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
      </td>
  </tr>
  <tr class="proDetail" id="fruit-7">
    <td valign="top" align="left"><img width="104" height="93" src="img/apple.jpg"></td>
    <td valign="middle" align="center"><strong>APPLE- WASHINGTON(500 GM)
<br>
      </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">130</span>
</span> <br>
    SABJIONWHEELS PRICE: Rs <span class="s_pirce">120</span>
    <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
    </td>
  </tr>
  <tr class="proDetail" id="fruit-8">
    <td valign="top" align="left"><img width="104" height="93" src="img/APPLE-FUJI.jpg"></td>
    <td valign="middle" align="center"><strong>APPLE-FUJI(500 GM)<br>
      </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">130</span></span> <br>
  SABJIONWHEELS PRICE: Rs <span class="s_pirce">120</span>
  <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
  </td>
  </tr>
  <tr class="proDetail" id="fruit-9">
    <td valign="top" align="left"><img width="100" height="80" src="img/BANANA - RAW.jpg"></td>
    <td valign="middle" align="center"><strong>BANANA &ndash; RAW (500 GMS)<br>
      </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">40</span></span> <br>
     SABJIONWHEELS PRICE: Rs <span class="s_pirce">35</span>
     <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
     </td>
  </tr>
  <tr class="proDetail" id="fruit-10">
    <td valign="top" align="left"><img width="104" height="93" src="img/banana.jpg"></td>
    <td valign="middle" align="center"><strong>BANANA &ndash; NORMAL(HALF DOZEN)<br>
      </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">38</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">35</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
      </td>
  </tr>
  <tr class="proDetail" id="fruit-11">
    <td valign="top" align="left"><img width="104" height="93" src="img/BANAN-HIGHGR.jpg"></td>
    <td valign="middle" align="center"><strong>BANANA - HIGHGRADE(HALF DOZEN)<br>
      </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">50</span></span> <br>
   SABJIONWHEELS PRICE: Rs <span class="s_pirce">45</span>
   <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
   </td>
  </tr>


  
  <tr class="proDetail" id="fruit-12">
    <td valign="top" align="left"><img width="104" height="93" src="img/PAPAYA123.jpg"></td>
    <td valign="middle" align="center"><strong>PAPAYA(1KG)<br>
      </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">50</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">45</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
      </td>
  </tr>
  
  <tr class="proDetail" id="fruit-13">
    <td valign="top" align="left"><img width="104" height="93" src="img/PINEHIGHGRADE1234.jpg"></td>
    <td valign="middle" align="center"><strong>PINEAPPLE- HIGH GRADE(1PIECE)<br>
      </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">120</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">119</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
      </td>
  </tr>
  <tr class="proDetail" id="fruit-14">
    <td valign="top" align="left"><img width="104" height="93" src="img/PINEHIGHGRADE1234.jpg"></td>
    <td valign="middle" align="center"><strong>PINEAPPLE- Normal(1PIECE)<br>
      </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">90</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">70</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
      </td>
  </tr>
  <tr class="proDetail" id="fruit-15">
        <td valign="top" align="left"><img width="104" height="93" src="img/nashpati.jpg"></td>
        <td valign="middle" align="center"><strong>NASHPATI- IMPORTED (500 GMS)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">95</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">85</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
   </tr>
   <tr class="proDetail" id="fruit-16">
        <td valign="top" align="left"><img width="104" height="93" src="img/SARDA1234.jpg"></td>
        <td valign="middle" align="center"><strong>SARDA(1 Piece)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">115</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">85</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>





  </tbody></table>
</td>
    <td width="50%" valign="top" align="left">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="td-style2">
      <tbody>

<tr class="proDetail" id="fruit-17">
        <td valign="top" align="left"><img width="104" height="93" src="img/Lychee-Fruit.jpeg"></td>
        <td valign="middle" align="center"><strong>Lychee (500 GM)<br>
          </strong> <span class="org-text">Market Price: Rs  <span class="market_pirce">100</span></span> <br>
          SABJIONWHEELS PRICE: Rs  <span class="s_pirce">90</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
<tr class="proDetail" id="fruit-18">
        <td valign="top" align="left"><img width="104" height="93" src="img/cherry_fruit_by_fayssalart-d5263pc.jpg"></td>
        <td valign="middle" align="center"><strong>Cherry - HIGH GRADE (500 GM)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">160</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">140</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
<tr class="proDetail" id="fruit-19">
        <td valign="top" align="left"><img width="104" height="93" src="img/jaamun1234.jpg"></td>
        <td valign="middle" align="center"><strong>JAAMUN (1 KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">360</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">340</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>

<tr class="proDetail" id="fruit-20">
        <td valign="top" align="left"><img width="104" height="93" src="img/kharbuja1234.jpg"></td>
        <td valign="middle" align="center"><strong>KHARBUJA (1 KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">70</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">59</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
<tr class="proDetail" id="fruit-21">
        <td valign="top" align="left"><img width="104" height="93" src="img/watermelonhighgrade123.jpg"></td>
        <td valign="middle" align="center"><strong>WATERMELON (TARBUJ) (1 KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">25</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">22</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>

<tr class="proDetail" id="fruit-22">
        <td width="28%" valign="top" align="left"><img width="104" height="93" src="img/chiku.jpg"></td>
        <td width="72%" valign="middle" align="center"><strong>CHIKOO(1KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">84</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">78</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
      
      
      <tr class="proDetail" id="fruit-23">
        <td valign="top" align="left"><img width="104" height="93" src="img/KIWI!!.jpg"></td>
        <td valign="middle" align="center"><strong>KIWI (1 Piece)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">38</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">36</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
      <tr class="proDetail" id="fruit-24">
        <td valign="top" align="left"><img width="104" height="93" src="img/MOUSAMBI0123.jpg"></td>
        <td valign="middle" align="center"><strong>MAUSAMBI(1KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">65</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">59</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
      <tr class="proDetail" id="fruit-25">
        <td valign="top" align="left"><img width="104" height="93" src="img/ORANGECALI123.jpg"></td>
        <td valign="middle" align="center"><strong>ORANGE &ndash; California(500 GMS)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">125</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">100</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
     
      <tr class="proDetail" id="fruit-26">
        <td valign="top" align="left"><img width="104" height="93" src="img/PEAR1234.jpg"></td>
        <td valign="middle" align="center"><strong>PEAR (Babugosha) &ndash; IMPORTED (500 GMS)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">125</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">115</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
      </td>
      </tr>
      <tr class="proDetail" id="fruit-27">
        <td valign="top" align="left"><img width="104" height="93" src="img/POMEGRA1234.jpg"></td>
        <td valign="middle" align="center"><strong>POMEGRANATE HIGH GRADE (500GM)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">105</span></span> <br>
         SABJIONWHEELS PRICE: Rs <span class="s_pirce">90</span>
         <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
         </td>
      </tr>
      <tr class="proDetail" id="fruit-28">
        <td valign="top" align="left"><img width="104" height="80" src="img/GRREN_GRAPES.jpg"></td>
        <td valign="middle" align="center"><strong>GRAPES- Green(500GM)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">120</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">105</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
      <tr class="proDetail" id="fruit-29">
        <td valign="top" align="left"><img width="104" height="80" src="img/GRAPESCALIFORNIARED.jpg"></td>
        <td valign="middle" align="center"><strong>GRAPES-CALIFORNIA RED(250GM)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">120</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">110</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>
<tr class="proDetail" id="fruit-30">
        <td valign="top" align="left"><img width="104" height="80" src="img/rawmango1234.jpg"></td>
        <td valign="middle" align="center"><strong>Raw Mango (1 KG)<br>
          </strong> <span class="org-text">Market Price: Rs <span class="market_pirce">80</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">75</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>
          </td>
      </tr>

      </tbody></table></td>
  </tr>
</tbody></table>
<p></p> </div>
 </div>
</section>
<? include_once("commonTemplate/footer.php")?> 
</body>
</html>