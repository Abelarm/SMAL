<?php
	
	require_once'/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/iStorage.php';
	require_once'/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Visualizza/Visualizza.php';

	class Contratto{
		
		private $numtel;
		private $dataCreazione;
		private $idCliente;
		private $idTariffa;
		private $storage;
		
		
		function __construct($numtel=null,$dataCreazione=null,$idCliente=null,$idTariffa=null){
			$this->storage=new Storage();
			
			if(is_null($numtel)){	
				$this->dataCreazione=$dataCreazione;
				$this->idCliente=$idCliente;
				$this->idTariffa=$idTariffa;
				$this->storage=$storage;
				$this->salva("inserisci");
			}
			else{
				$risultato=$this->storage->EseguiQuery("SELECT * FROM Contratti WHERE NumeroTelefonico='$numtel'");
				
				$riga=mysql_fetch_row($risultato);
				$this->numtel=$riga[0];
				$this->dataCreazione=$riga[1];
				$this->idCliente=$riga[2];
				$this->idTariffa=$riga[3];
			}
			
			$this->storage->ChiudiConn();
			
		}
		
		function leggiTabulato(){
			Visualizza::Estratto($this->storage,$this->numtel);
		}
		
		
		function cambiaTariffa($newIdTariffa){
			$this->idTariffa=$newIdTariffa;
			$this->salva("modifica");
		}
		
		function __toString(){
			$stringa="Numero Telefonico: ". $this->numtel. " DataCreazione: ". $this->dataCreazione ." IdCliente:". $this->idCliente. " IdTafiffa: ". $this->idTariffa;
			return $stringa;
		}
		
		
		function salva($tipo){
			$this->storage=new Storage();
			if($tipo=="modifica"){
				$query="UPDATE Contratti SET Id_Tariffa='$this->idTariffa' WHERE NumeroTelefonico='$this->numtel'";
			}
			else{
				$query="INSERT INTO Contratti (DataCreazione,Id_Cliente,Id_Tariffa) VALUES ('$this->dataCreazione','$this->idCliente','$this->idTariffa')";
			}
		
			$this->storage->EseguiQuery($query);
			$this->storage->ChiudiConn();
		}
		
		function leggiDati(){
			$this->storage=new Storage();
			$dati["Numero"]=$this->numtel;
			$dati["DataCreazione"]=$this->dataCreazione;
			$query="SELECT * FROM Tariffe WHERE ID='$this->idTariffa'";
			$risultato=$this->storage->EseguiQuery($query);
			
			while($riga=mysql_fetch_array($risultato,MYSQL_ASSOC)){
				foreach($riga as $key=>$value){
					if($key=="Nome")
						$key="Nome Tariffa";
					if($key=="ID")
						$key="ID Tariffa";
					$dati[$key]=$value;
				}
			
			}
			
			$query="SELECT Count(*) FROM OperazioniTelefoniche WHERE Num_Mittente='$this->numtel'";
			$risultato=$this->storage->EseguiQuery($query);
			$riga=mysql_fetch_row($risultato);
			$dati["NumOperazioni"]=$riga[0];
			
			$this->storage->ChiudiConn();
			return $dati;
		}
	}