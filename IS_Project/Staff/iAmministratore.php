<?php
	
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Cliente.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Operatore.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Amministratore.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Contratto.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Richiesta.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Visualizza/Visualizza.php');
	require_once ('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/iStorage.php');
	
	session_start();
	$operazione=$_GET['operazione'];
	
	switch($operazione){
	
	case "VisualizzaOperatori":
		$Amministratore=$_SESSION['Amministratore'];
		Visualizza::Operatore();
		break;
	
	case "VisualizzaLog":
		$Amministratoree=$_SESSION['Amministratore'];
		$id=$_GET['operatore'];
		Visualizza::Logs($id);
		break;
	
	case "InserisciOp":
		$Amministratore=$_SESSION['Amministratore'];
		$nome=$_POST['nome'];
		$cogn=$_POST['cogn'];
		$user=$_POST['User'];
		$pass=$_POST['pass'];
		$Amministratore->creaOperatore($nome,$cogn,$user,$pass);
		break;
	
	case "DatiOperatore":
		$Amministratore=$_SESSION['Amministratore'];
		$id=$_GET['operatore'];
		$operatore= new Operatore($id);
		Visualizza::Dati($operatore->Dati());
		break;
	
	case "EliminaOperatore":
		$Amministratore=$_SESSION['Amministratore'];
		$id=$_GET['operatore'];
		$Amministratore->eliminaOperatore($id);
		break;
		
	case "InserisciTar":
		$Amministratore=$_SESSION['Amministratore'];
		$nome=$_POST['nome'];
		$ratiocall=$_POST['ratiocall'];
		$ratiosms=$_POST['ratiosms'];
		$Amministratore->creaTariffa($nome,$ratiocall,$ratiosms);
		break;
	
	case "VisualizzaTariffe":
		$Amministratore=$_SESSION['Amministratore'];
		Visualizza::Tariffa();
		break;
	
	case "Step2ModTariffe":
		$Amministratore=$_SESSION['Amministratore'];
		$id=$_GET['tariffa'];
		$storage= new Storage();
		$query="SELECT ID,Nome,RatioChiamate,RatioSms FROM Tariffe WHERE ID='$id'";
		$risultato=$storage->EseguiQuery($query);
		$riga=mysql_fetch_row($risultato);
		echo"<form id=\"regtar\"><fieldset><legend>Modifica Tariffa</legend>";
			echo"<table>";
				 echo"<tr><td>ID:<td><input type=\"text\" name=\"id\" value=\"$riga[0]\" readonly>";
				 echo"<tr><td>Nome:<td><input type=\"text\" name=\"nome\" value=\"$riga[1]\" readonly>";
				 echo"<tr><td>Ratio Chiamate:<td><input type=\"text\" name=\"ratiocall\" value=\"$riga[2]\">";
				 echo"<tr><td>Ratio SMS:<td><input type=\"text\" name=\"ratiosms\" value=\"$riga[3]\">";
			echo"</table></fieldset></form>";
		break;
		
	case "ModTariffa":
		$Amministratore=$_SESSION['Amministratore'];
		$id=$_POST['id'];
		$ratiocall=$_POST['ratiocall'];
		$ratiosms=$_POST['ratiosms'];
		$Amministratore->modificaTariffa($id,$ratiocall,$ratiosms);
		break;
		
	case "EliminaTariffe":
		$Amministratore=$_SESSION['Amministratore'];
		$id=$_GET['tariffa'];
		$Amministratore->eliminaTariffa($id);
		break;
	
	case "Logout":
		$Amministratore=$_SESSION['Amministratore'];
		unset($Amministratore);
		session_destroy();
		echo"Fatto";
		break;
	}