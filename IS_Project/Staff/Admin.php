<?php 		

require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Amministratore.php');
	
	session_start();
	

	
	$op=$_SESSION['Amministratore'];
	
	if(isset($op)){
?>
<html >
	<head>
		<title>SMAL</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="Admin.js"> 
		</script>
	</head>
	<body style="background-color:grey" align="center">						
		<div id="sfondo" style="background-color:white; width:600; height:600; border:solid black"> <!-- inizio body -->
			<div id="header" style="display:inline;"> <!--inizio header -->
			<img src="Logo.jpg" style="width:200;margin-top:20; margin-left:20"> </div> <!-- fine header -->
			
		<div id="immagini" align="center" style="margin-left:19">
			<table cellspacing="10"><tr>
				<td><img src="opera.png" usemap="#sito"> <map name="sito"> <area shape="rect" onClick="visualizzaOperazioni()" coords="0,0,200,200"></map>
					<td><img src="log.png" usemap="#help"> <map name="help"><area shape="rect" onClick="VisualizzaOperatori()" coords="0,0,200,200"></map>
						<td><img src="tar.png" usemap="#note"> <map name="note"> <area shape="rect" onClick="visualizzaOperazioni2()" coords="0,0,200,200"></map></tr></table></div> 
		<div id="form" align="center" > <!-- inizio form -->
		</div> <!-- fine form --> 
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
