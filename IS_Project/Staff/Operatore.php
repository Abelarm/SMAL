<?php 		

require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Operatore.php');
	
	session_start();
	

	
	$op=$_SESSION['Operatore'];
	
	if(isset($op)){
?>
	<html >
	<head>
		<title>SMAL</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="Operatore.js"> </script>
	</head>
	<body style="background-color:grey" align="center">						
		<div id="sfondo" style="background-color:white; width:600; height:600; border:solid black"> <!-- inizio body -->
			<div id="header" style="display:inline;"> <!--inizio header -->
			<img src="Logo.jpg" style="width:200;margin-top:20; margin-left:20"> </div> <!-- fine header -->
			
		<div id="immagini" align="center" style="margin-left:19">
			<table cellspacing="10"><tr>
				<td><img src="richieste.png" usemap="#sito"> 
							<map name="sito"> <area shape="rect" onClick="VisualizzaRichieste();" coords="0,0,200,200"></map>
					<td><img src="contr.png" usemap="#help"> 
								<map name="help"><area shape="rect" onClick="VisualizzaClienti();" coords="0,0,200,200"></map>
						<td><img src="Estratt.png" usemap="#note"> 
									<map name="note"> <area shape="rect" onClick="VisualizzaClienti2();" coords="0,0,200,200"></map></tr></table></div> 
		<div id="form" align="center" > <!-- inizio divcentrare -->
			
		</div> <!-- fine divcentrare --> 		
		
		<div id="logout" align="center" >
			<input type="button" value="logout" onClick="Logout()" style="background: lightgreen;">
		</div>
		</div> <!-- fine sfondo -->
	<body>

<html>
<?
	}
	else{
		echo "<meta HTTP-EQUIV=\"refresh\" CONTENT=\"5; URL='http://localhost/~Luigi/WorkSpaceSmal/IS_Project/Staff/LoginStaff.html'\">";
		echo "<h1>Errore Stai per essere rediretto alla home</h1>";
		}
?>