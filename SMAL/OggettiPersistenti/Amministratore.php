<?php
		
	require_once'/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Tariffa.php';
	require_once'/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/iStorage.php';

	class Amministratore{
		
		
		private $id;
		private $username;
		private	$nome;
		private	$cognome;
		private	$password;
		private $storage;
		
		
		function __construct($id){
			$this->storage=new Storage();
			$risultato=$this->storage->EseguiQuery("SELECT * FROM Amministratori WHERE ID='$id'");
			
			$riga=mysql_fetch_row($risultato);
			$this->id=$id;
			$this->nome=$riga[1];
			$this->cognome=$riga[2];
			$this->username=$riga[3];
			$this->password=$riga[4];
		}
		
		
		function creaTariffa($nome,$ratioCall,$ratioSms){
			$this->storage=new Storage();
			$tariffa=new Tariffa(null,$this->storage,$nome,$ratioCall,$ratioSms);
			$tariffa->salva("inserisci");
			unset($tariffa);
		}
		
		function modificaTariffa($id,$newRatioCall=null,$newRatioSms=null){
			$this->storage=new Storage();
			$tariffa= new Tariffa($id, $this->storage);
			if(!is_null($newRatioCall))
				$tariffa->cambiaRatioCall($newRatioCall);
			if(!is_null($newRatioSms))
			$tariffa->cambiaRatioSms($newRatioSms);
			
			$tariffa->salva("modifica");
			
			unset($tariffa);
			
			
		}
		
		function eliminaTariffa($id){
			$this->storage=new Storage();
			$query="DELETE FROM Tariffe WHERE ID='$id'";
			$this->storage->EseguiQuery($query);
			
		}
		
		function creaOperatore($nome,$cognome,$username,$password){
			$this->storage=new Storage();
			$operatore= new Operatore(null,$nome,$cognome,$username,$password);
			unset($operatore);
		}
		
		function leggiLog($id_op){
			$this->storage=new Storage();
			Visualizza::Log($this->storage, $id_op);
		}
		
		function eliminaOperatore($id_op){
			$this->storage=new Storage();
			$query="DELETE FROM Operatori WHERE ID='$id_op'";
			$this->storage->EseguiQuery($query);
		}

		function logout(){
			$this->storage->ChiudiConn();
		}
	}
	