<?php

	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Cliente.php');
	
	session_start();
	

	
	$cliente=$_SESSION['Cliente'];
	
	if(isset($cliente)){
		$nome=$cliente->getNome();
		$cognome=$cliente->getCognome();
	
?>
	
<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Smal</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  <script type="text/javascript" src="gestione.js"></script>
</head>

<body>
  <div id="wrapper">
	<div id="banner" style="clear:both">
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
		
		
		<div id="JustLogin" style="display: block;"> 
					<h1 id="benvenuto" style="font-size: 14px; color: black;"><?php echo "Benvenuto ".$nome.",".$cognome ?></h1>
					<ul id="nav2">
						<li  style="background-color:#888585; color:white">
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
		
	</DIV> <!-- end banner -->
	
	
	<DIV id="corpo" style="background:grey;height:500px;margin-top:215px;">
	
	<ul id="nav" style="clear:both;">
          <li class="first"><a href="http://localhost/~Luigi/WorkSpaceSmal/IS_Project/Home.php">Home</a></li>
          <li><a href="#">Piani Tariffari</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Store</a></li>
          <li><a href="#">Contatti</a></li>
      	</ul>
      	 
		<table style="position: relative;left: 13%;"> 
					<tr> 
						 <td><img src="Immagini/1.jpg" onclick="profilo();" >
						 <td><img src="Immagini/2.jpg" onclick="apricontratto()">
						 <td><img src="Immagini/3.jpg" onclick="apriAssistenza()";>
					</tr>
		</table>
	<DIV id="mostra" style="background:lightblue;height:320px;border:solid">
		<Table align="center" style="text-align:center;display:none;" id="contratto">
													<TR>
															<TH colspan="3"><a href="gestisci.php"><img src="Immagini/gestisci.png" style="height:65px"></a> </H1></TH>
													<TR>
															<TD calspan="3"><a onClick="GeneraCreaContratto()"><img src="Immagini/nuovo.png" style="width:130px;"></a>
																			<a onClick="GeneraModificaContratto()"><img src="Immagini/modifica.png" style="width:130px;"></a>
																			<a onClick="GeneraDatiContratto()"><img src="Immagini/dati.png" style="width:130px;"></a></TD>
													<TR>
															<TD colspan="3"><a onClick="GeneraEstratto()"><img src="Immagini/estratto.png" style="width:130px;"></a>
																			<a onClick="GeneraEliminaContratto()"><img src="Immagini/elimina.png" style="width:130px;"></a>
																			<a onClick="Help()"><img src="Immagini/help.png" style="width:130px;"></a></TD></TR>
		</TABLE> 
		
		<div id="operazione" style="background:lightblue;height:320px;border:solid; display:none; position:relative">
		
		</div>
	
		<div id="profilo" style="background:lightblue;height:320px;border:solid; display:none">
		
		</div>
	
	</DIV>
																			
	</DIV>

	
</body>
<footer>    
 <div id="footer">
        Note Legali
      </div><!-- end footer -->
  </div><!-- end wrapper -->
</footer>
</html>

<?php 
	}
	else{
		echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"5; URL='http://localhost/~Luigi/WorkSpaceSmal/IS_Project/Home.php'\">";
		echo "<h1>Errore Stai per essere rediretto alla home</h1>";
		}
?>