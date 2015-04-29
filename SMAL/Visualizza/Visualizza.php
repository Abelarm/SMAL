<?php

	require_once'/Users/Luigi/Sites/WorkSpaceSmal/SMAL/Storage/Storage.php';
	
	class Visualizza{

		
		static function Clienti(){
			$storage= new Storage();
			$risultato=$storage->EseguiQuery("SELECT ID,Nome,Cognome,eMail FROM Clienti");

			if(mysql_num_rows($risultato)==0){
				echo"Nessun Risultato da visualizzare<br>";
				return null;
			}
			
			echo"<table border=\"3\"><tr><th colspan=\"5\">Seleziona il cliente</tr><tr>";
			while($riga =mysql_fetch_array($risultato,MYSQL_ASSOC)){
				foreach($riga as $chiave => $valore){
					if($i==0){
						echo"<th>$chiave";
					}
				}
				echo"<tr>";
				foreach($riga as $chiave => $valore){
						
					if ($chiave=='ID')
						$radio=$valore;
					
					echo"<td>$valore";
				}
				echo"<td><input type=\"radio\" name=\"id\" value=\"$radio\">";
				$i++;
			}
			
			echo"</table>";
			$storage->ChiudiConn();
		}
		
		
		static function Contratti($id_cliente){
			$storage= new Storage();
			$risultato=$storage->EseguiQuery("SELECT NumeroTelefonico,DataCreazione,id_Tariffa FROM Contratti WHERE id_Cliente='$id_cliente'");
				
			if(mysql_num_rows($risultato)==0){
				echo"Nessun Risultato da visualizzare<br>";
				return null;
			}
			
			echo"<table  border=\"3\" class=\"Visualizza\"><tr><th colspan=\"4\">Seleziona il contratto <tr>";
			while($riga =mysql_fetch_array($risultato,MYSQL_ASSOC)){
				
				foreach($riga as $chiave => $valore){
					if($i==0){
						echo"<th>$chiave";
					}
				}
				echo"<tr>";

				foreach($riga as $chiave => $valore){
					
					if ($chiave=='NumeroTelefonico')
						$radio=$valore;
					
					
					echo"<td>$valore";	
				}
				echo"<td><input type=\"radio\" name=\"id\" value=\"$radio\">";
				$i++;
			}
						
			echo"</table>";
			$storage->ChiudiConn();
		}
		
		
		
		
		static function Richiesta(){
			$storage= new Storage();
			$risultato=$storage->EseguiQuery("SELECT ID,Tipo,Id_Mittente FROM Richieste WHERE Stato='Pendente'");
				
			if(mysql_num_rows($risultato)==0){
				echo"Nessun Risultato da visualizzare<br>";
				return null;
			}
			
			echo"<table  border=\"3\"><tr><th colspan=\"4\">Seleziona la richiesta <tr>";
			while($riga =mysql_fetch_array($risultato,MYSQL_ASSOC)){
				foreach($riga as $chiave => $valore){
					if($i==0){
						echo"<th>$chiave";
					}
					}
					echo"<tr>";
							foreach($riga as $chiave => $valore){
		
							if ($chiave=='ID')
								$radio=$valore;
									
							echo"<td>$valore";
							}
							echo"<td><input type=\"radio\" name=\"id\" value=\"$radio\">";
							$i++;
			}
				
			echo"</table>";
			$storage->ChiudiConn();
		}
		
		
		static function Tariffa(){
			$storage= new Storage();
			$risultato=$storage->EseguiQuery("SELECT * FROM Tariffe");
		
			if(mysql_num_rows($risultato)==0){
				echo"Nessun Risultato da visualizzare<br>";
				return null;
			}
			
			echo"<table  border=\"3\" class=\"Visualizza\"><tr><th colspan=\"5\" align=\"center\">Seleziona la Tariffa <tr>";
			while($riga =mysql_fetch_array($risultato,MYSQL_ASSOC)){
				foreach($riga as $chiave => $valore){
					if($i==0){
						echo"<th>$chiave";
					}
					}
					echo"<tr>";
					foreach($riga as $chiave => $valore){
		
					if ($chiave=='ID')
						$radio=$valore;
							
						echo"<td>$valore";
					}
					echo"<td><input type=\"radio\" name=\"id\" value=\"$radio\">";
					$i++;
			}
		
			echo"</table>";
			$storage->ChiudiConn();
			}
		
			
			static function Operatore(){
				$storage= new Storage();
				$risultato=$storage->EseguiQuery("SELECT ID,Nome,Cognome FROM Operatori");
			
				if(mysql_num_rows($risultato)==0){
					echo"Nessun Risultato da visualizzare<br>";
					return null;
				}
				
				echo"<table  border=\"3\"><tr><th colspan=\"4\">Seleziona l'operatore <tr>";
				while($riga =mysql_fetch_array($risultato,MYSQL_ASSOC)){
					foreach($riga as $chiave => $valore){
						if($i==0){
							echo"<th>$chiave";
						}
						}
						echo"<tr>";
						foreach($riga as $chiave => $valore){
			
						if ($chiave=='ID')
							$radio=$valore;
								
							echo"<td>$valore";
						}
						echo"<td><input type=\"radio\" name=\"id\" value=\"$radio\">";
						$i++;
				}
			
				echo"</table>";
				$storage->ChiudiConn();
				}
				
				
				
				
				static function Estratto($Num){
					$storage= new Storage();
					
					$totale=0;
					
					$risultato=$storage->EseguiQuery("SELECT RatioChiamate, RatioSMS FROM  Contratti INNER JOIN  Tariffe ON  Id_Tariffa =  ID  WHERE NumeroTelefonico='$Num'");
	
					$riga=mysql_fetch_row($risultato);
					
					$ratioCall=$riga[0];
					$ratioSms=$riga[1];
					
					$risultato=$storage->EseguiQuery("SELECT Tipo,Durata,Num_Destinatario FROM OperazioniTelefoniche WHERE Num_Mittente='$Num'");
				
					
					if(mysql_num_rows($risultato)==0){
						echo"Nessun Risultato da visualizzare<br>";
						return null;
					}
					
					echo"<table class=\"Visualizza\" border=\"3\"><tr><th colspan=\"5\">Estratto conto di:".$Num ."<tr>";
					while($riga =mysql_fetch_array($risultato,MYSQL_ASSOC)){
						foreach($riga as $chiave => $valore){
							if($i==0){
								echo"<th>$chiave";
								if($chiave=="Num_Destinatario")
									echo"<th>Costo";
							}
						}
							echo"<tr>";
							foreach($riga as $chiave => $valore){
								if($chiave=="Durata")
									$durata=$valore;
								echo"<td>$valore";
							}
							if($durata==0){
								echo"<td>$ratioSms";
								$totale+=$ratioSms;
							}
							else{
								echo"<td>".$durata*$ratioCall;
								$totale+=$durata*$ratioCall;
							}
							$i++;
					}

					echo"</table>";
					$storage->ChiudiConn();
					
					echo"<br>&nbsp;<br>&nbsp;<br>&nbsp";
					
					echo"<table class=\"Visualizza\" border=\"3\"><tr><th colspan=\"5\">Estratto conto di:".$Num ."<tr>";
						echo"<tr><th>Numero Operazioni<td>$i";
						echo"<tr><th>Costo Totale<td>$totale";
					echo"</table>";
				}
					
					
					static function Logs($id_op){
						$storage= new Storage();
						$risultato=$storage->EseguiQuery("SELECT ID,Tipo,Data FROM Operazioni WHERE Id_Operatore='$id_op'");
					
						if(mysql_num_rows($risultato)==0){
							echo"Nessun Risultato da visualizzare<br>";
							return null;
						}
						
						echo"<table  border=\"3\"><tr><th colspan=\"3\">Log dell'operatore:".$id_op. "<tr>";
						while($riga =mysql_fetch_array($risultato,MYSQL_ASSOC)){
							foreach($riga as $chiave => $valore){
								if($i==0){
									echo"<th>$chiave";
								}
								}
								echo"<tr>";
								foreach($riga as $chiave => $valore){
									
								echo"<td>$valore";
								}
									$i++;
								}
					
								echo"</table>";
								$storage->ChiudiConn();
						}
						
						
						
				static function Risposta($id_richiesta){
					$storage= new Storage();
					$risultato=$storage->EseguiQuery("SELECT * FROM Risposte WHERE Id_Richiesta='$id_richiesta'");
					
					if(mysql_num_rows($risultato)==0){
						echo"Nessun Risultato da visualizzare<br>";
						return null;
					}
					
					while($riga =mysql_fetch_row($risultato)){
						echo"<p><h3>Richiesta Num:". $riga[0]."</p>";
						echo"<p><H3>Testo:<br> ". $riga[1]."</p>";
					}
				}
				
		
				static function Dati($dati){
					echo"<table border=\"2\" class=\"Visualizza\">";
						foreach($dati as $key=>$value){
							echo"<tr><th> $key";
							echo "<td>$value";
							
						}
					echo"</table>";
				}
				
				
				static function Risposte($id_mittente){
					$storage=new Storage();
					$risultato=$storage->EseguiQuery("SELECT Richieste.Tipo,Richieste.Testo, Risposte.Testo FROM Richieste LEFT JOIN Risposte ON Richieste.ID=Risposte.Id_Richiesta WHERE Richieste.Id_Mittente='$id_mittente'");
					
					while($riga =mysql_fetch_row($risultato)){
						if($riga[0]=='Assistenza'){
							echo"<p style=\"font-size:14px;\"><b>Richiesta:</b><br>&nbsp;&nbsp;&nbsp;$riga[1]<br>";
							if($riga[2]==null){
								echo"<br><b>Richiesta non ancora elaborata</b></p>";
							}
							else{
								echo"<br><b>Risposta:</b><br>&nbsp;&nbsp;&nbsp;$riga[2]";
							}
						}
						else{
							echo"<p style=\"font-size:14px;\"><b>Richiesta</b><br>&nbsp;&nbsp;&nbsp;$riga[0]<br>";
							if($riga[2]==null){
								echo"<br><b>Richiesta non ancora elaborata</b></p>";
							}
							else{
								echo"<br><b>Risposta:</b><br>&nbsp;&nbsp;&nbsp;$riga[2]";
							}
						}
						
						echo"<hr>";
					}
					
					$storage->ChiudiConn();	
				}
				
	}