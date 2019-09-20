<? include_once("config.php")?>
<!DOCTYPE HTML>
<html><head>
<? include_once("commonTemplate/head.php")?>  

              

</head>

<body>
<? include_once("commonTemplate/header.php")?>
<section>
<div class="feedback-outer">
  <div class="feedback-inner">
  <div class="feeback-heading">Vegetables</div>
   <div class="floating" ><input type="button" value="Add to Cart"  class="button add_to_cart_btn" id="button"/></div>
<form name="frmAddToCart" id="frmAddToCart" action="/addtocart.php" method="post">
<input name="cart" type="hidden" id="cart" value="1" />
<table width="100%" cellspacing="0" cellpadding="0" border="1" class="td-style">
  <tbody><tr>
    <td width="50%" valign="top" align="left">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="td-style2">
    <tbody>
    <tr class="proDetail" id="veg-1">
    <td valign="top" align="left"><img width="104" height="93" src="img/v25.jpg"></td>
    <td valign="middle" align="center"><strong>POTATO- NORMAL (500 GM)</strong><br>
       <span class="org-text"> MARKET PRICE: Rs<span class="market_pirce">15</span></span> <br>
                             SABJIONWHEELS PRICE: Rs<span class="s_pirce"> 13</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr  class="proDetail" id="veg-2">
    <td valign="top" align="left"><img width="104" height="93" src="img/v25.jpg"></td>
    <td valign="middle" align="center"><strong>POTATO- BABY POTATO(500 GM) </strong><br>
       <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">20</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">18</span>
       <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
<tr class="proDetail" id="veg-3">
    <td width="28%" valign="top" align="left"><img width="104" height="93" src="img/v1.jpg"></td>
    <td width="72%" valign="middle" align="center"><strong>BROCCOLI (250 GMS)</strong><br>
         <span class="org-text">  MARKET PRICE: Rs <span class="market_pirce">50</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">44</span>
       <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-4">
    <td valign="top" align="left"><img width="104" height="93" src="img/v2.jpg"></td>
    <td valign="middle" align="center"><strong>CABBAGE (PATTA GOBHI) &ndash; GREEN (500 GMS)</strong>
<br>
      <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">14</span></span> <br>
     SABJIONWHEELS PRICE: Rs <span class="s_pirce">11</span>
       <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>     </td>
  </tr>
  <tr class="proDetail" id="veg-5">
    <td valign="top" align="left">
    <img width="104" height="93" src="img/v3.jpg"></td>
    <td valign="middle" align="center"><strong>CABBAGE (PATTA GOBHI) &ndash; RED (500 GMS)</strong><br>
       <span class="org-text"> MARKET PRICE: Rs 55</span> <br>
                               SABJIONWHEELS PRICE: Rs 45
                               <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-6">
    <td valign="top" align="left"><img width="104" height="93" src="img/v4.jpg"></td>
    <td valign="middle" align="center"><strong>CAULIFLOWER - Shimla (PHOL GOBHI ) 500 GMS</strong><br>
               <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">35</span></span> <br>
                                       SABJIONWHEELS PRICE: Rs <span class="s_pirce">29</span>
                                       <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
<tr class="proDetail" id="veg-7">
    <td valign="top" align="left"><img width="104" height="93" src="img/v7.jpg"></td>
    <td valign="middle" align="center"><strong>CAPSICUM - GREEN (500 GMS)</strong><br>
        <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">28</span></span> <br>
                                        SABJIONWHEELS PRICE: Rs <span class="s_pirce">24</span>
                                        <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>     </td>
  </tr>
  <tr class="proDetail" id="veg-8">
    <td valign="top" align="left"><img width="104" height="93" src="img/v5.jpg"></td>
    <td valign="middle" align="center"><strong>CAPSICUM - RED (250 GMS)</strong><br>
         <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">55</span></span> <br>
         SABJIONWHEELS PRICE: Rs <span class="s_pirce">45</span>
         <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>     </td>
  </tr>
  <tr class="proDetail" id="veg-9">
    <td valign="top" align="left"><img width="104" height="93" src="img/v6.jpg"></td>
    <td valign="middle" align="center"><strong>CAPSICUM- YELLOW (250 GMS)</strong><br>
        <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">55</span></span> <br>
                              SABJIONWHEELS PRICE: Rs <span class="s_pirce">45</span>
                              <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  
  <tr class="proDetail" id="veg-10">
    <td valign="top" align="left"><img width="104" height="93" src="img/v8.jpg"></td>
    <td valign="middle" align="center"><strong>CARROT &ndash; SHIMLA (500 GMS)</strong><br>
                <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">30</span></span> <br>
                                        SABJIONWHEELS PRICE: Rs <span class="s_pirce">23</span>
                                        <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>     </td>
  </tr>
  <tr class="proDetail" id="veg-11">
    <td valign="top" align="left"><img width="104" height="93" src="img/v10.jpg"></td>
    <td valign="middle" align="center"><strong>CORINDER (DHANIYA) (100 GMS)</strong><br>
           <span class="org-text"> MARKET PRICE: Rs 8</span> <br>
           SABJIONWHEELS PRICE: Rs <span class="s_pirce">6</span>
           <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-12">
    <td valign="top" align="left"><img width="104" height="93" src="img/v11.jpg"></td>
    <td valign="middle" align="center"><strong>COCONUT &ndash; GREEN 1 Piece</strong><br>
                <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">45</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">40</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>     </td>
  </tr>
  <tr class="proDetail" id="veg-13">
    <td valign="top" align="left"><img width="104" height="93" src="img/v12.jpg"></td>
    <td valign="middle" align="center"><strong>COCONUT &ndash; BROWN 1 Piece</strong><br>
         <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">40</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">35</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-14">
    <td valign="top" align="left"><img width="104" height="93" src="img/v13.jpg"></td>
    <td valign="middle" align="center"><strong>GARLIC DESI (LAUSHAN) (250 GMS)</strong><br>
           <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">35</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">30</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-14">
    <td valign="top" align="left"><img width="104" height="93" src="img/v13.jpg"></td>
    <td valign="middle" align="center"><strong>GARLIC ORGANIC (LAUSHAN) (250 GMS)</strong><br>
           <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">55</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">48</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-15">
    <td valign="top" align="left"><img width="104" height="93" src="img/v14.jpg"></td>
    <td valign="middle" align="center"><strong>GINGER (ADRAK) (250 GMS</strong>)<br>
            <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">50</span></span> <br>
           SABJIONWHEELS PRICE: Rs <span class="s_pirce">48</span>
           <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>    </td>
  </tr>
  <tr class="proDetail" id="veg-16">
    <td valign="top" align="left"><img width="104" height="93" src="img/v15.jpg"></td>
    <td valign="middle" align="center"><strong>GREEN CHILLY (100 GMS)</strong><br>
         <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">12</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">10</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-17">
    <td valign="top" align="left"><img width="104" height="93" src="img/v16.jpg"></td>
    <td valign="middle" align="center"><strong>LEMON (100 GMS)</strong><br>
      <span class="org-text"> MARKET PRICE: Rs<span class="market_pirce"> 14</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">12</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-18">
    <td valign="top" align="left"><img width="104" height="93" src="img/v17.jpg"></td>
    <td valign="middle" align="center"><strong>KARELA-DESI (250 GMS)</strong><br>
       <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">24</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">22</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-19">
    <td valign="top" align="left"><img width="104" height="93" src="img/v18.jpg"></td>
    <td valign="middle" align="center"><strong>LADY FINGER(BHINDI)(500 GMS)</strong><br>
         <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">28</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">23</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-20">
    <td valign="top" align="left"><img width="104" height="93" src="img/v19.jpg"></td>
    <td valign="middle" align="center"><strong>LETTUCE-BLACK (salad patta)(100 GMS)</strong><br>
       <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">35</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">32</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr>
    <td valign="top" align="left"><img width="104" height="93" src="img/Greenlettuce112.jpg"></td>
    <td valign="middle" align="center"><strong>LETTUCE-GREEN (salad patta)(100 GMS)<br>
      </strong> <span class="org-text"> MARKET PRICE: Rs 25</span> <br>
      SABJIONWHEELS PRICE: Rs 20
       <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>     </td>
  </tr>
<tr class="proDetail" id="veg-21">
    <td valign="top" align="left"><img width="104" height="93" src="img/Parwal1234.jpg"></td>
    <td valign="middle" align="center"><strong>PARWAL  (500 GMS)</strong><br>
         <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">40</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">35</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-22">
    <td valign="top" align="left"><img width="104" height="93" src="img/v23.jpg"></td>
    <td valign="middle" align="center"><strong>PARSLEY LEAVES (100 GMS)</strong><br>
      <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">38</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">37</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-23">
    <td valign="top" align="left"><img width="104" height="93" src="img/v24.jpg"></td>
    <td valign="middle" align="center"><strong>PETHA-GREEN (1KG)</strong><br>
          <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">38</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">30</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-24">
    <td valign="top" align="left"><img width="104" height="93" src="img/v28.jpg"></td>
    <td valign="middle" align="center"><strong>RADDISH- WHITE (500 GMS)</strong><br>
      <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">16</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">14</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
<tr class="proDetail" id="veg-25">
        <td valign="top" align="left"><img width="104" height="93" src="img/v56.jpg"></td>
        <td valign="middle" align="center"><strong>SPINACH (paalak)(500 GMS)</strong><br>
              <span class="org-text"> MARKET PRICE: Rs<span class="market_pirce"> 20</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">18</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>          </td>
      </tr>
<tr>
        <td valign="top" align="left"><img width="104" height="93" src="img/tinda123.jpg"></td>
        <td valign="middle" align="center"><strong>TINDAY (Apple Gourd)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs 35</span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce"> 29</span>
           <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>     </td>
      </tr>
    </tbody></table>
    </td>
    <td width="50%" valign="top" align="left">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="td-style2">
      <tbody>
        <tr class="proDetail" id="veg-26">
          <td valign="top" align="left"><img width="104" height="93" src="img/pumpkin-kaddu.jpg"></td>
          <td valign="middle" align="center"><strong>Pumpkin (Kaddu)(1 KG)</strong><br>
              <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">50</span></span> <br>
            SABJIONWHEELS PRICE: Rs <span class="s_pirce">32</span>
            <div class="qtyDiv">
              <input type="button" value="+" class="button plus">
              <input type="button" value="-" class="button minus">
              <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]2">
            </div></td>
        </tr>
        <tr class="proDetail" id="veg-27">
          <td valign="top" align="left"><img width="104" height="93" src="img/tinda123.jpg"></td>
          <td valign="middle" align="center"><strong>TINDAY (Apple Gourd)(500 GMS)</strong><br>
              <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">35</span></span> <br>
            SABJIONWHEELS PRICE: Rs <span class="s_pirce">30</span>
            <div class="qtyDiv">
              <input type="button" value="+" class="button plus">
              <input type="button" value="-" class="button minus">
              <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]2">
            </div></td>
        </tr>
      
      <tr class="proDetail" id="veg-28">
        <td valign="top" align="left"><img width="104" height="93" src="img/v20.jpg"></td>
        <td valign="middle" align="center"><strong>ONION &ndash; NASIK (500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">16</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">13</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
  </tr>
  <tr class="proDetail" id="veg-29">
    <td valign="top" align="left"><img width="104" height="93" src="img/v21.jpg"></td>
    <td valign="middle" align="center"><strong>ONION &ndash; SMALL(500 GMS)<br>
      </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">18</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">16</span>
      <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
  <tr class="proDetail" id="veg-30">
    <td valign="top" align="left"><img width="104" height="93" src="img/v22.jpg"></td>
    <td valign="middle" align="center"><strong>ONION &ndash; SPRING (500 GMS)<br>
      </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">40</span></span> <br>
      SABJIONWHEELS PRICE: Rs <span class="s_pirce">35</span>
       <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>      </td>
  </tr>
        

<tr class="proDetail" id="veg-31">
        <td width="28%" valign="top" align="left"><img width="104" height="93" src="img/v29.jpg"></td>
        <td width="72%" valign="middle" align="center"><strong>ARBI (250 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">25</span></span> <br>
          SABJIONWHEELS PRICE: Rs<span class="s_pirce"> 19</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-32">
        <td valign="top" align="left"><img width="104" height="93" src="img/v30.jpg"></td>
        <td valign="middle" align="center"><strong>BABY CORN (200 GMS) <br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">37</span> </span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">34</span></td>
      </tr>
      <tr class="proDetail" id="veg-33">
        <td valign="top" align="left"><img width="104" height="93" src="img/v32.jpg"></td>
        <td valign="middle" align="center"><strong>PEAS (MATAR)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">45</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">40</span>
           <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-34">
        <td valign="top" align="left"><img width="104" height="93" src="img/v33.jpg"></td>
        <td valign="middle" align="center"><strong>BEAT ROOT (CHUKANDER)(250 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">16</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">15</span>
           <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-35">
        <td valign="top" align="left"><img width="104" height="93" src="img/v34.jpg"></td>
        <td valign="middle" align="center"><strong>BOTTLE GOURD (LOKKI)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">18</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">14</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-36">
        <td valign="top" align="left" ><img width="104" height="93" src="img/v35.jpg"></td>
        <td valign="middle" align="center"><strong>BRINJAL &ndash; ROUND (500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs 20</span> <br>
          SABJIONWHEELS PRICE: Rs 19
           <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
     </div>     </td>
      </tr>
      <tr class="proDetail" id="veg-37">
        <td valign="top" align="left"><img width="104" height="93" src="img/v36.jpg"></td>
        <td valign="middle" align="center"><strong>BRINJAL- SMALL (500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">25</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">19</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-38">
        <td valign="top" align="left"><img width="104" height="93" src="img/v37.jpg"></td>
        <td valign="middle" align="center"><strong>BRINJAL-LONG (500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">25</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">19</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-39">
        <td valign="top" align="left"><img width="104" height="93" src="img/v38.jpg"></td>
        <td valign="middle" align="center"><strong>CUCUMBER&nbsp;- DESI (KHIRA)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs 18<span class="market_pirce"></span></span> <br>
          SABJIONWHEELS PRICE: Rs 18
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>   </td>
      </tr>
     <tr>
        <td valign="top" align="left"><img width="104" height="93" src="img/chinesecucumber12.jpg"></td>
        <td valign="middle" align="center"><strong>CUCUMBER - Organic (KHIRA)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs 24</span> <br>
          SABJIONWHEELS PRICE:<span class="s_pirce"> Rs 22</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>   </td>
      </tr>
      <tr class="proDetail" id="veg-40">
        <td valign="top" align="left"><img width="104" height="93" src="img/cucumber-arm12.jpg"></td>
        <td valign="middle" align="center"><strong>CUCUMBER ARMENIAN (KAKDI)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs<span class="market_pirce"> 28</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">22</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-41">
        <td valign="top" align="left"><img width="104" height="93" src="img/v39.jpg"></td>
        <td valign="middle" align="center"><strong>JACK FRUIT (KATHAL)(1 Packek - 400 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">34</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">32</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-42">
        <td valign="top" align="left"><img width="104" height="93" src="img/JIMIKAND123.jpg"></td>
        <td valign="middle" align="center"><strong>JIMIKAND (TYPE OF ARBI)(1KG)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">80</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">70</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-43">
        <td valign="top" align="left"><img width="104" height="93" src="img/v40.jpg"></td>
        <td valign="middle" align="center"><strong>KADI PATTA (100 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">20</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">15</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-44">
        <td valign="top" align="left"><img width="104" height="93" src="img/v41.jpg"></td>
        <td valign="middle" align="center"><strong>KUNDRU (500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">35</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">25</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-45">
        <td valign="top" align="left"><img width="104" height="93" src="img/v42.jpg"></td>
        <td valign="middle" align="center"><strong>LOTUSSTEM (kamal kakdi)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">160</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">130</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-46">
        <td valign="top" align="left"><img width="104" height="93" src="img/v44.jpg"></td>
        <td valign="middle" align="center"><strong>MINT LEAVES (100 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">16</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">12</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-47">
        <td valign="top" align="left"><img width="104" height="93" src="img/v45.jpg"></td>
        <td valign="middle" align="center"><strong>MUSHROOM (200 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">70</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">60</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div></td>
      </tr>
      
      <tr class="proDetail" id="veg-48">
        <td valign="top" align="left"><img width="104" height="93" src="img/v49.jpg"></td>
        <td valign="middle" align="center"><strong>TOMATO- INDIAN (500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">23</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">20</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-49">
        <td valign="top" align="left"><img width="104" height="93" src="img/v50.jpg"></td>
        <td valign="middle" align="center"><strong>TOMATO - CHERRY (1 Packet)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">45</span> </span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">40</span>
          
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-50">
        <td valign="top" align="left"><img width="104" height="93" src="img/v52.jpg"></td>
        <td valign="middle" align="center"><strong>ZUCCHINI (250 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">40</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">30</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-51">
        <td valign="top" align="left"><img width="104" iheight="93" src="img/v53.jpg"></td>
        <td valign="middle" align="center"><strong>BEANS (PHALI)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">52</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">49</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
      <tr class="proDetail" id="veg-52">
        <td valign="top" align="left"><img width="104" height="93" src="img/tori1234.jpg"></td>
        <td valign="middle" align="center"><strong>Ridge Gourd(Tori)(500 GMS)<br>
          </strong> <span class="org-text"> MARKET PRICE: Rs <span class="market_pirce">30</span></span> <br>
          SABJIONWHEELS PRICE: Rs <span class="s_pirce">24</span>
          <div class="qtyDiv">	
            <input type="button" value="+" class="button plus">
            <input type="button" value="-" class="button minus">
            <input type="text"  value="0" size="2" class="proQty"  name="prod_qty[]">
         </div>          </td>
      </tr>
          </tbody></table>
    </td>
  </tr>
</tbody></table>
</form>
<p></p>
 </div>
 </div>
</section>
<? include_once("commonTemplate/footer.php")?>
</body>
</html>