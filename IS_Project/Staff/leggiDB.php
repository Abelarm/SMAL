<?php 
				$host="localhost";
				$root="root";
				$password="899161689";
				$id=$_GET['id'];
		
				$connessione = mysql_connect($host,$root,$password) or die ("CONNESSIONE FALLITA");
				$database="SMAL";
				mysql_select_db($database);
				
						$query="SELECT * FROM Operatore WHERE ID='$id'";
						$risultato=mysql_query($query) or die ("Query non riuscita");
						echo "<table>";

						while($riga=mysql_fetch_row($risultato))
						{
							echo "<tr>";							
							foreach($riga as $key=>$value)
							{
								echo "<td> $value </td>";				
							}
							echo "</tr> ";		
							}
						echo "</table>";
							
					
							 ?>
