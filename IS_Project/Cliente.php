<?php

	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Cliente.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Contratto.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Richiesta.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Visualizza/Visualizza.php');
	
	$operazione=$_GET['operazione'];
	session_start();
	
	switch($operazione){
		
	case "Login":
		
		
		$user=$_GET['user'];
		$psw=$_GET['psw'];
	
		$Nome="prova";
		$Pass="prova";
		$Host="localhost";
	
		$conn=@mysql_connect($Host,$Nome,$Pass) or die ("Connessione Fallita");
		mysql_select_db("SMAL");
	
		$query="SELECT Nome,Cognome,ID FROM Clienti WHERE Username='$user' AND Password='$psw'";
	
		$risultato=mysql_query($query);
	
		if(mysql_num_rows($risultato)==0)
			echo "Errore";
		else{
			while($riga=mysql_fetch_row($risultato)){
				$id=$riga[2];
			}
			
			
			//Creazione Oggetto Cliente
				$cliente= new Cliente($id);
				
			$stringa="Benvenuto ".$cliente->getNome()." ". $cliente->getCognome();
			echo $stringa;	
			
			//Inserimento di cliente nella sessione;
				$_SESSION['Cliente']=$cliente;
			
			}
		break;
			
	case "Logout":
		$cliente=$_SESSION['Cliente'];
		unset($cliente);
		session_destroy();
		echo "Fatto";
		break;
		
		
		
	case "SignUp":
		$user=$_GET['username'];
		$psw=$_GET['password'];
		$nome=$_GET['nome'];
		$cognome=$_GET['cogn'];
		$email=$_GET['email'];
		
		$cliente= new Cliente(null,$nome,$cognome,$user,$psw,$email);
		echo"<p><h1 id=\"benvenuto\" style=\"font-size: 14px; color: black;\">Complimenti, registrazione effettuata con successo</h1><p>";
		echo"<ul id=\"nav2\"><li OnMouseOver=\"this.style.backgroundColor='#888585';this.style.color='white'\" OnMouseOut=\"this.style.backgroundColor='white'; this.style.removeProperty('color');\" onclick=\"window.location.reload()\">Torna Indietro</li>";
		unset($cliente);
		break;
		
		
		
	case "Assistenza":
		$cliente=$_SESSION['Cliente'];
		
		$messaggio=$_GET['messaggio'];	
		$cliente->creaRichiesta("Assistenza",$messaggio);
		break;
		
	case "VisualizzaCreaContratto":
		$cliente=$_SESSION['Cliente'];
		echo"<h1 id=\"benvenuto\" style=\"font-size: 14px; color: black;\" align=\"center\"><br>Scegli la tariffa per il tuo nuovo contratto</h1>";
		echo"<div style=\"position:relative; top:10%; left: 26%; overflow:auto; width:78%; height:80%;\"><p>";
		Visualizza::Tariffa();
		echo"<p><input type=\"button\" onClick=\"CreaContratto()\" value=\"Invia\" style=\"position: relative; left: 52%;\"></p>";
		echo"</div>";
		break;
		
	case "CreaContratto":
		$cliente=$_SESSION['Cliente'];
		$messaggio=$_GET['tariffa'];
		$cliente->creaRichiesta("CreaContratto",$messaggio);
	
		break;
		
		
	case "VisualizzaModificaContratto":
		$cliente=$_SESSION['Cliente'];
		echo"<h1 id=\"benvenuto\" style=\"font-size: 14px; color: black;\" align=\"center\"><br>Scegli il contratto</h1>";
		echo"<div style=\"position:relative; top:10%; left: 22%; overflow:auto; width:78%; height:80%;\"><p>";
		Visualizza::Contratti($cliente->getId());
		echo"<p><input type=\"button\" id=\"bottone\" onClick=\"Step2ModifcaContratto()\" value=\"Avanti\" style=\"position: relative; left: 61%;\"></p>";
		echo"</div>";
		break;
		
	
	case "Step2ModificaContratto":
		$cliente=$_SESSION['Cliente'];
		$numero=$_GET['numtel'];
		echo"<h1 id=\"benvenuto\" style=\"font-size: 14px; color: black;\" align=\"center\"><br>Scegli la tariffa da inserire per il tuo contratto</h1>";
		echo"<div style=\"position:relative; top:10%; left: 26%;overflow:auto; width:78%; height:80%; \"><p>";
		echo"Contratto: <input type=\"text\" name=\"numtel\" value=\"$numero\" disabled>";
		Visualizza::Tariffa();
		echo"<p><input type=\"button\" onClick=\"ModificaContratto()\" value=\"Invia\" style=\"position: relative; left: 41%;\"></p>";
		echo"</div>";
		break;
		
	case "ModificaContratto":
		$cliente=$_SESSION['Cliente'];
		$numero=$_GET['numtel'];
		$tariffa=$_GET['tariffa'];
		$messaggio=$numero.",".$tariffa;
		$cliente->creaRichiesta("CambiaTariffa",$messaggio);
		break;
		
	
	case "DatiContratto":
		$cliente=$_SESSION['Cliente'];
		$numero=$_GET['numtel'];
		$contratto=new Contratto($numero);
		$dati=$contratto->leggiDati();
		echo"<div style=\"position:relative; top:10%; left: 34%\"><p>";
		Visualizza::Dati($dati);
		echo"</div>";
		break;
	
	case "EstrattoConto":
		$cliente=$_SESSION['Cliente'];
		$numero=$_GET['numtel'];
		echo"<div style=\"position:relative; top:10%; left: 22%; overflow:auto; width:78%; height:80%; \"><p>";
		Visualizza::Estratto($numero);
		echo"</div>";
		break;
		
	case "EliminaContratto":
		$cliente=$_SESSION['Cliente'];
		$numero=$_GET['numtel'];
		$cliente->creaRichiesta("EliminaContratto",$numero);
	
		break;
	
	case "Help":
		$handle = @fopen("prova.txt", "r");
		if ($handle) {
   			while (!feof($handle)) {
				$buffer = fgets($handle);
        		echo $buffer;
   		}
  		fclose($handle);	
		}
		break;
		
	case "Leggi":
		$cliente=$_SESSION['Cliente'];
		Visualizza::Risposte($cliente->getId());
		break;
	
	
	case "Update":
		$cliente=$_SESSION['Cliente'];
		$pass=$_POST['psw1'];
		$user=$_POST['username'];
		$email=$_POST['email'];
		$cliente->modificaPassword($user);
		$cliente->modificaUsername($user);
		$cliente->modificaEmail($email);
		break;
	}