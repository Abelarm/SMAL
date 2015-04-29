<?php
	
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/iStorage.php');
	
	class Storage implements iStorage{
			
		private	$conn;
		private $Nome="prova";
		private $Pass="prova";
		private $Host="localhost";
		private $data;
		
		//Costruttore
		public function __construct(){
			$this->conn=mysql_connect($this->Host,$this->Nome,$this->Pass);
			mysql_select_db("SMAL");
		}
		
		//Esegue le operazioni e ne Restituisce il risultato
		public function EseguiQuery($stringa){
			$risultato=mysql_query($stringa);
			
			if (!$risultato) {
   				 return "ERRORE";
			}
			return $risultato;
		}
		
		//Chiude la connessione
		public function ChiudiConn() {
			mysql_close($this->conn);
		}
	}

?>