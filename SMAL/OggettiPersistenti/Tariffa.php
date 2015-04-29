<?php

	require_once'/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/Storage.php';
	
	
	class Tariffa{
		private $id;
		private $nome;
		private $ratioCall;
		private $ratioSms;
		private $storage;

		
	//costruttore
	function __construct($id=null,$storage=null,$nome=null,$ratioCall=null,$ratioSms=null){
		if(!is_null($id)){
			$this->storage=$storage;
			$risultato=$storage->EseguiQuery("SELECT * FROM Tariffe WHERE ID='$id'");
			
			$riga=mysql_fetch_row($risultato);
			$this->id=$riga[0];
			$this->nome=$riga[1];
			$this->ratioCall=$riga[2];
			$this->ratioSms=$riga[3];
			
		}
		else{
			$this->storage=$storage;
			$this->nome=$nome;
			$this->ratioCall=$ratioCall;
			$this->ratioSms=$ratioSms;
		}
	}
	
	//modifica,inserisci 
	function salva($tipo){
		if($tipo=="modifica"){
			$query="UPDATE Tariffe SET RatioChiamate='$this->ratioCall', RatioSms='$this->ratioSms' WHERE ID='$this->id'";
		}
		else{
			$query="INSERT INTO Tariffe (Nome,RatioChiamate,RatioSms) VALUES ('$this->nome','$this->ratioCall','$this->ratioSms')";
		}
		
		$this->storage->EseguiQuery($query);
		
	}
	
	
	function cambiaRatioCall($newratioCall){
		$this->ratioCall=$newratioCall;
	}
	
	function cambiaRatioSms($newratioSms){
		$this->ratioSms=$newratioSms;
	}
		
	
	function __toString(){
		return "ID: ". $this->id ." Nome: ". $this->nome. " RatioChiamata: ". $this->ratioCall ." RatioSms: ". $this->ratioSms."<br>";
	}
		
}
?>