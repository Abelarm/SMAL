<?php

require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Cliente.php');

session_start();
$cliente=$_SESSION['Cliente'];
$id=$cliente->getId();

$host="localhost";
$user="prova";
$pass="prova";

$connessione= mysql_connect($host,$user,$pass) or die("Connessione Fallita");
$database="SMAL";
mysql_select_db($database) or die ("Accesso a Database non effettuato");
$query="SELECT * FROM Clienti WHERE ID='$id'";
$risultato=mysql_query("$query") or die("Query non eseguita");
while($riga=mysql_fetch_row($risultato)){
 echo"<fieldset style=\"width:60%;height:45%;position: relative;top:20%;left: 18%\" align=\"center\">
						<legend align=\"center\">Riepilogo Account</b></legend>
						<form id=\"Regfor\" style=\"margin-top:1em;\">
							<table style=\"text-align:right;border-spacing: 17px 1px;\">
								<tr>
									<td>Nome:<input type=\"Text\" name=nome value=\"".$riga[1]."\" disabled>
									<td>Cognome:<input type=\"text\" name=cogn  value=\"".$riga[2]."\" disabled>
								<tr>
									<td>Password:<input type=\"password\" name=psw1  value=\"".$riga[4]."\">
									<td>Password:<input type=\"password\" name=psw2  value=\"".$riga[4]."\" onChange=\"ControllaPass(this)\">
								<tr>
									<td>Username:<input type=\"Text\" name=username value=\"".$riga[3]."\">
									<td>Email:<input type=\"Text\" name=email value=\"".$riga[5]."\" onChange=\"checkEmail(this.value)\">
								<tr>
									<td colspan=\"2\"><input type=\"button\" id=\"pulsanteReg\" value=\"Modifica\" onClick=\"Update()\">
							</table>
							
		<div id=\"password\" style=\"position: relative;\">
				<h2 style=\"font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;\">I due campi password non Coincidono</h1>
		</div>
		
		<div id=\"emailerr\" style=\"position: relative;\">
				<h2 style=\"font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;\">Inserire una mail valida</h1>
		</div>
							
		</div>
		</fieldset>";
	}
?>
