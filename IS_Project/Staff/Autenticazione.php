<?php
	
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Operatore.php');
	require_once('/Users/Luigi/Sites/WorkSpaceSmal/SMAL/OggettiPersistenti/Amministratore.php');
	
	session_start();
	$pass=$_GET['password'];
	$user=$_GET['user'];
	$tipo=$_GET['tipo'];
	$id;
	
	function verifica($user,$pass,$tipo){

		$nome=$user;
		$psw=$pass;
		$lista=$tipo;		
		
		$host="localhost";
		$root="prova";
		$password="prova";
		
		$connessione = mysql_connect($host,$root,$password) or die ("CONNESSIONE FALLITA");
		$database="SMAL";
		mysql_select_db($database);

		$query="SELECT ID FROM $lista WHERE Username='$nome' AND Password='$psw'";
		$risultato= mysql_query($query) or die("Query non riuscita");
		
	
		while($riga=mysql_fetch_row($risultato)){
			$_SESSION['id']=$riga[0];
		}
		
				

		if(mysql_num_rows($risultato)==1)
			return true;
		else
			return false;	
	}

	if(verifica($user,$pass,$tipo)==false){
		
		header("location: ERRORE.HTML");
		
	}
	else{
		if($tipo=="Operatori"){
		$a=$_SESSION['id'];
		$op= new Operatore($a);
		$_SESSION['Operatore']=$op;
		date_default_timezone_set("Europe/Berlin");
		$today = date("m/d/Y G:i:s");
		$tipo="Login";
		$query="INSERT INTO Operazioni (Tipo,Data,Id_Operatore) VALUES ('$tipo','$today','$a')";
		$risultato= mysql_query($query) or die("Query non riuscita operatore");
		
		header("location:Operatore.php");
		}
		else {
		$a=$_SESSION['id'];
		$Amm= new Amministratore($id);
		$_SESSION['Amministratore']=$Amm;
		header("location:Admin.php");
		}
	}


	
?>
