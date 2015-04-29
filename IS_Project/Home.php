<?php
  		require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Cliente.php');
  		session_start();
  
  ?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Smal</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  <script type="text/javascript" src="Cliente.js"></script>
  <?
  		
  		$cliente=$_SESSION['Cliente'];
  		
  		
  ?>
  				
</head>

<body>
  <div id="wrapper">
	<div id="banner">
      <h1><img src="Immagini/Logo.jpg" width="250" height="250" style="float:left" ></h1>
      <DIV id= "collegamenti">
					<img src="Immagini/facebook.png" width="4%" style="margin-left:43%;float:left" usemap="#face"> 
					<map name="face" > 
						<area shape="rect" coords="0,0,100,100" href="http:\\www.facebook.com"> 
					</map>
					<img src="Immagini/twitter.png" width="4%" style="margin-left:2%;float:left" usemap="#twit"> 
					<map name="twit" > 
						<area shape="rect" coords="0,0,100,100" href="http:\\www.twitter.com"> 
					</map>	
					<img src="Immagini/google.png" width="4%" style="margin-left:2%;" usemap="#gg"> 
					<map name="gg" > 
						<area shape="rect" coords="0,0,100,100" href="http:\\www.google.com"> 
					</map> 
		</DIV>
		
		<?
			if($cliente==null)
				$display="display:block";
			else
				$display="display:none";
		?>
		
		<DIV id="login" style="<? echo $display ?>">
					<fieldset style="width:80%;height:45%" align="center">
						<legend align="center">Login </b></legend>
							<form id="loginform">
								Username: <input type="Text" id=user placeholder="Username">
								Password: <input type="password" id=psw  placeholder="Password">
							<TABLE align="center">
								<input type="button" value="Login" onClick="Login();">
								<TR><TD><A href="">Password dimenticata?</A></b></TD>
								<TR><TD><A href="" Onclick="CreaForm()">Nuovo utente</A></TD></TR>
							</TABLE> 
							</form>
					</fieldset>
		</DIV>
		
	
		<div id="Registrazione">
					<fieldset style="width:80%;height:45%" align="center">
						<legend align="center">Registrazione </b></legend>
						<form id="Regfor" style="margin-top:1em;">
							<table style="text-align:right;border-spacing: 17px 1px;">
								<tr>
									<td>Nome:<input type="Text" onChange="Controlla(this)" id=nome placeholder="Mario">
									<td>Cognome:<input type="text" onChange="Controlla(this)" id=cogn  placeholder="Rossi">
								<tr>
									<td>Password:<input type="password" id=psw1  placeholder="Password">
									<td>Password:<input type="password" id=psw2  placeholder="Verifica Password" onChange="ControllaPass(this)">
								<tr>
									<td>Username:<input type="Text" onChange="Controlla(this)" id=username placeholder="m.rossi">
									<td>Email:<input type="Text" id=email placeholder="m.rossi@me.it" onChange="checkEmail(this.value)">
								<tr>
									<td colspan="2"><input type="button" id="pulsanteReg" value="Registrati" onClick="SignUp()">
							</table>
							
		<div id="password">
				<h2 style="font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;">I due campi password non Coincidono</h1>
		</div>
		
		<div id="emailerr">
				<h2 style="font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;">Inserire una mail valida</h1>
		</div>
							
		</div>
		
		<?
			if($cliente!=null){
				$display="display:block";
				$stringa="Benvenuto ".$cliente->getNome()." ". $cliente->getCognome();
				}
			else{
				$display="display:none";
				$stringa=null;
				}
		?>
		<div id="JustLogin" style="<? echo $display ?>"> 
					<h1 id="benvenuto" style="font-size: 14px; color: black; "><?php echo $stringa ?></h1>
					<ul id="nav2">
						<li  OnClick="location.replace('Gestisci.php') "OnMouseOver="this.style.backgroundColor='#888585';this.style.color='white'" OnMouseOut="this.style.backgroundColor='white'; this.style.removeProperty('color');">
							Area Utente
						</li>
						<li OnClick="AskLogout();" OnMouseOver="this.style.backgroundColor='#888585'; this.style.color='white'" OnMouseOut="this.style.backgroundColor='white'; this.style.removeProperty('color'); ">
							Logout
						</li>
					</ul>
		</div>
		
		<div id=sicuro>
				<h1 id="benvenuto" style="font-size: 18px; color: black;">Sicuro di Voler Sloggare?</h1>
				<p align="center">
				<input type="button" value="SI" onClick="Logout()">
				<input type="button" value="NO" onClick="document.getElementById('sicuro').style.display='none'">
				</p>
		</div>
		
		<div id="errore">
			<h2 style="font-size: 16px; color: black; margin-left:1em;">Errore: </h1>
			<p style="font-size: 13px; color: black; margin-left:0.5em;">Autenticazione non riuscita, Username o Password Errati</p>
		</div>
	
	
	</div>
		<ul id="nav" style="clear:both;">
          <li class="first"><a href="http://localhost/~Luigi/WorkSpaceSmal/IS_Project/Home.php">Home</a></li>
          <li><a href="#">Piani Tariffari</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Store</a></li>
          <li><a href="#">Contatti</a></li>
      	</ul>
      <div class="clear" style="margin-top:5"></div>
      <!-- end searches -->
      <div id="body">
          <div id="highlights">
              <div class="p green">
                  <a href="#"><img src="Immagini/4u.jpeg" width="124" height="76" alt="Smal 4U" /></a>
              </div><!-- end .green -->
              <div class="p purple">
                  <a href="#"><img src="Immagini/ueme.jpeg" width="124" height="76" alt="U & Me" /></a>
              </div><!-- end .purple -->
              <div class="p orange">
                  <a href="#"><img src="Immagini/famiglia.jpg" width="124" height="77" alt="My Family" /></a>
              </div><!-- end .orange -->
              <div id="topspot">
                  <h2><img src="Immagini/cell_week.gif" width="116" height="17" alt="Smart of the week" /></h2>
                  <div class="faceotweek">
                      <img src="Immagini/cell.jpg" width="87" height="90" alt="Clara" />
                      <p>Name: iPhone 5<br />
                      Produttore: Apple</p>
                  </div><!-- end .faceotweek -->
                <p>Il cellulare della settimana è l'iphone 5 della Apple che con ben 1.300.000 pezzi venduti è solo in testa alla classifica delle vendite, <a href="http://store.apple.com/it/browse/home/shop_iphone/family/iphone5">clicca qui per scoprirlo</a>.</p>
				<p>Vi ricordiamo che ogni settimana, per i prossimi due mesi, vedrete in questa area consigli sugli smartphone che si fanno "notare". </p>
				
              </div><!-- end topspot -->
          </div><!-- end highlights -->
          <div id="right">
              <div id="products">
                  <div id="item-one">
                      <h2><img src="" width="69" height="17" alt="SMAL 4 U" /></h2>
                      <img src="Immagini/smal4u.jpg" width="145" height="113" alt="smal4U" class="left" />
                    <p>Smal 4 U, la nuova tariffa fatta a misura di studente. Minuti, sms, internet incluso...a soli 4 euro al mese!! E senza sorprese!</p>
                      <p class="readmore"><a href="#" class="orange">Click Here!</a></p>
                  </div><!-- end item-one -->
                  <div id="item-two">
                      <h2><img src="images/smalueme.jpg" width="70" height="17" alt="U & ME" /></h2>
                      <img src="Immagini/ueme.jpg" width="59" height="56" alt="U and me" class="right" />
                      <p>Coppie felici e non, questa è l'offerta per parlare o litigare all'infinito, senza spendere nulla.</p>
                      <p class="readmore"><a href="#" class="green">Click Here!</a></p>
                  </div><!-- end item-two -->
              </div><!-- end products -->
              <div id="news">
                  <h2><img src="images/title_news.gif" width="85" height="17" alt="News" /></h2>
                  <h3>Nov 07, 2006</h3>
                  
				<p>Luigi Giugliano, Steven Sirchia, Angelo Sirica e Marco Sessa. Ve li presentiamo.</p> 
				
				
                  
                  <p class="readmore"><a href="#" class="teal">Click Here!</a></p>
              </div><!-- end news -->
          </div><!-- end right -->
          <div id="beauty">
              <div>
              <h2><img src="images/title_tips.gif" width="141" height="17" alt="Beauty Expert Tips" /></h2>
              <h3>Cos'è Smal?</h3>
             
              <p class="readmore"><a href="#" class="purple">click here</a></p>
              </div>
          </div><!-- end beauty -->
          <div class="clear"></div>
      </div><!-- end body -->
      <div id="footer">
        Note Legali
      </div><!-- end footer -->
  </div><!-- end wrapper -->
</body>
</html>
