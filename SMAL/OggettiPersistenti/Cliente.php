<?php

	require_once '/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Richiesta.php';
	require_once '/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/Storage.php';

	
	class Cliente{
		
	private $id;
	private $username;	
	private	$nome;
	private	$cognome;
	private	$password;
	private $email;
	private $storage;
	
	//Costruttore per l'inserimento all'interno del DB
	function __construct($id=null,$nome=null,$cognome=null,$username=null,$password=null,$email=null){
		if(is_null($id)){
			$this->nome=$nome;
			$this->cognome=$cognome;
			$this->username=$username;
			$this->password=$password;
			$this->email=$email;
			$this->storage= new Storage();
			$query="INSERT INTO Clienti (Nome,Cognome,Username,Password,eMail) VALUES('$this->nome','$this->cognome','$this->username','$this->password','$this->email')";
			$ris=$this->storage->EseguiQuery($query);
			$this->storage->ChiudiConn();
		}
		else{
			$this->storage=new Storage();
			$risultato=$this->storage->EseguiQuery("SELECT * FROM Clienti WHERE ID='$id'");
			
			$riga=mysql_fetch_row($risultato);
			$this->id=$riga[0];
			$this->nome=$riga[1];
			$this->cognome=$riga[2];
			$this->username=$riga[3];
			$this->password=$riga[4];
			$this->email=$riga[5];
			$this->storage->ChiudiConn();
		}
	}
	
	
	//Richiama la funzione del sistema SMAL per la creazione di una richiesta
	function creaRichiesta($tipo,$testo){
		$mittente=$this->id;
		Richiesta::Crea($tipo, $testo, $mittente);
	}
	
	
	function modificaPassword($newPass){
		$this->password=$newPass;
		$this->salva();
	}
	
	function modificaUsername($newUser){
		$this->username=$newUser;
		$this->salva();
	}
	
	function modificaEmail($newEmail){
		$this->email=$newEmail;
		$this->salva();
	}
	
	function salva(){
		$this->storage= new Storage();
		$query="UPDATE Clienti SET Username='$this->username', Password='$this->password',eMail='$this->email' WHERE ID='$this->id'";
		$this->storage->EseguiQuery($query);
		$this->storage->ChiudiConn();
	}
	
	
	function getId(){
		return $this->id;
	}
	
	function getUsername(){
		return $this->username;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function getCognome(){
		return $this->cognome;
	}
	
	function getPassword(){
		return $this->password;
	}
	
	function getContratti(){
		return $this->contratti;
	}
	
}