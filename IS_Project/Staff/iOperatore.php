<?php

	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Cliente.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Operatore.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Contratto.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Richiesta.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Visualizza/Visualizza.php');
	require_once ('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/iStorage.php');
	
	session_start();
	$operazione=$_GET['operazione'];
	
	switch($operazione){
		
	case "VisualizzaRichieste":
		
		$operatore=$_SESSION['Operatore'];
		Visualizza::Richiesta();
		break;
		
		
	case "RiepilogoRichieste":
		$operatore=$_SESSION['Operatore'];
		$storage= new Storage();
		$id=$_GET['Richiesta'];
		$_SESSION['id']=$id;
		$risultato=$storage->EseguiQuery("SELECT Tipo,Testo FROM Richieste WHERE ID='$id'");
		$riga=mysql_fetch_row($risultato);
		$tipo=$riga[0];
		$testo=$riga[1];
		if($tipo=="Assistenza"){
			echo"<p style=\"background:grey\"><b>Testo Messaggio:</b><br>$testo</p>";
			echo"<p><b>Risposta:</b><br><textarea id=\"testo\" rows=\"10\" cols=\"30\"></textarea></p>";
			echo"<p><input type=\"button\" value=\"Invia\" onClick=\"InviaRispostaAssistenza();\"></p>";
		}
		else{
			$operatore->evadiRichiesta($id);
			echo"<p>Operazione Effettuata con successo</p>";
		}
		break;
		
	case "ScriviRispAssistenza":
		$operatore=$_SESSION['Operatore'];
		$id=$_SESSION['id'];
		$testo=$_GET['Testo'];
		$operatore->evadiRichiesta($id,$testo);
		break;
	
	
	case "VisualizzaCliente":
		$operatore=$_SESSION['Operatore'];
		Visualizza::Clienti();
		break;
	
	case "RiepilogoContratti":
		$operatore=$_SESSION['Operatore'];
		$id=$_GET['Cliente'];
		Visualizza::Contratti($id);
		break;
	
	case "DatiContratto":
		$operatore=$_SESSION['Operatore'];
		$numero=$_GET['Contratto'];
		$contratto=new Contratto($numero);
		$dati=$contratto->leggiDati();
		Visualizza::Dati($dati);
		break;
		
	case "EstrattoConto":
		$operatore=$_SESSION['Operatore'];
		$numero=$_GET['Contratto'];
		Visualizza::Estratto($operatore->getId());
		break;
		
	case "Logout":
		$operatore=$_SESSION['Operatore'];
		unset($operatore);
		session_destroy();
		echo"Fatto";
		break;
	}