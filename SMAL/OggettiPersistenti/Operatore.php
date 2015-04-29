<?php
	
	require_once '/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Richiesta.php';
	require_once '/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/iStorage.php';
	require_once '/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Contratto.php';
	require_once '/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Cliente.php';

	class Operatore{

		
		private $id;
		private $username;
		private	$nome;
		private	$cognome;
		private	$password;
		private $storage;
		
	function __construct($id=null,$nome=null,$cognome=null,$username=null,$password=null){
		$this->storage=new Storage();
		if(is_null($id)){
			$this->nome=$nome;
			$this->cognome=$cognome;
			$this->username=$username;
			$this->password=$password;
			$this->storage= new Storage();
			$query="INSERT INTO Operatori (Nome,Cognome,Username,Password) VALUES('$this->nome','$this->cognome','$this->username','$this->password')";
			$ris=$this->storage->EseguiQuery($query);
		}
		else{
			$this->storage=new Storage();
			$risultato=$this->storage->EseguiQuery("SELECT * FROM Operatori WHERE ID='$id'");
			
			$riga=mysql_fetch_row($risultato);
			$this->id=$riga[0];
			$this->nome=$riga[1];
			$this->cognome=$riga[2];
			$this->username=$riga[3];
			$this->password=$riga[4];
		}
	}	
		
		function evadiRichiesta($idRichiesta,$testoRisp=null){

			$this->storage=new Storage();
			
			$query="SELECT Id_Mittente,Tipo,Testo FROM Richieste WHERE ID='$idRichiesta'";
			$risultato=$this->storage->EseguiQuery($query);
			$riga=mysql_fetch_row($risultato);
			$idMittente=$riga[0];
			$tipo=$riga[1];
			$testoMex=$riga[2];
			
			switch ($tipo){
				case "Assistenza":
					$this->rispondi($idRichiesta, $idMittente, $testoRisp);
					$this->creaOperazione("Assitenza", $this->id);
					break;
				//Il testo del messaggio($testoMex) contiene la tariffa da applicare
				case "CreaContratto":
					date_default_timezone_set("Europe/Berlin");
					$today = date("d/m/Y");                         // 03.10.01
					new Contratto(null,$today,$idMittente,$testoMex);
					$this->rispondi($idRichiesta, $idMittente, "Nuovo contratto creato con successo");
					$this->creaOperazione("CreaContratto", $this->id);
					break; 
				//Il testo del messaggio ($testoMex) contiene il numero del contratto e la nuova tariffa
				//da applicare separata da una virgola
				case "CambiaTariffa":
					$dati=explode(",", $testoMex);
					$contratto= new Contratto($dati[0]);
					$contratto->cambiaTariffa($dati[1]);
					unset($contratto);
					$this->rispondi($idRichiesta, $idMittente, "Cambio tariffa effettuato con successo");
					$this->creaOperazione("CambiaTariffa", $this->id);
					break;
				//Il testo del messaggio ($testoMex) contiene il numero del contratto da eliminare
				case "EliminaContratto":
					$query="DELETE FROM Contratti WHERE NumeroTelefonico='$testoMex'";
					$this->storage->EseguiQuery($query);
					$this->rispondi($idRichiesta, $idMittente, "Cancellazione contratto effettuata con successo");
					$this->creaOperazione("EliminaContratto", $this->id);
					break;
				//Il testo del messaggio($testoMex)  vuoto
				case "EliminaCliente":
					$query="DELETE FROM Clienti WHERE ID='$idMittente'";
					$this->storage->EseguiQuery($query);
					$this->creaOperazione("EliminaCliente", $this->id);
					break;
			}
		}
		
		
		function creaOperazione($tipo,$idOP){
			$this->storage=new Storage();
			date_default_timezone_set("Europe/Berlin");
			$today = date("m/d/Y G:i:s");
			
			$query="INSERT INTO Operazioni (Tipo,Data,Id_Operatore) VALUES ('$tipo','$today','$idOP')";
			$risultato=$this->storage->EseguiQuery($query);
			return $risultato;
		}
		
		function rispondi($idRic,$idMit,$testo){
			$this->storage=new Storage();
			$query="INSERT INTO Risposte (Testo,Id_Richiesta,Id_Destinatario) VALUES ('$testo','$idRic','$idMit')";
			$this->storage->EseguiQuery($query);
			
			Richiesta::Evadi($idRic);
		}
		
		function Dati(){
			$dati["Nome"]=$this->nome;
			$dati["Cognome"]=$this->cognome;
			$dati["Username"]=$this->username;
			return $dati;
		}
		
		function getUsername(){
			return $this->username;
		}
		
		function getId(){
			return $this->id;
		}
		
		function logout(){
			$this->storage->ChiudiConn();
		}
	}