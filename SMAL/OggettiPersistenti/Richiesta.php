<?php

	require_once'/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/iStorage.php';
	
	class Richiesta{
		
		static function Crea($tipo,$testo,$id_rif){
			$storage= new Storage();
			
			$query="INSERT INTO Richieste (Tipo,Testo,Stato,Id_Mittente) VALUES('$tipo','$testo','Pendente','$id_rif')";
			$storage->EseguiQuery($query);
		}
		
		static function Evadi($id){
			$storage= new Storage();
			
			$query="UPDATE Richieste SET Stato='evasa' WHERE ID='$id'";
			$storage->EseguiQuery($query);
		}

	}