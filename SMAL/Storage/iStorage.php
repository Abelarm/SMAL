<?php
	
	interface iStorage{
		
		//Esegue le operazioni e ne Restituisce il risultato
		public function EseguiQuery($stringa);
		
		//Chiude la connessione
		public function ChiudiConn();
		
	}
?>