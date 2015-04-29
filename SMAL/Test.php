<?php
	
	require_once('Visualizza/Visualizza.php');
	require_once('OggettiPersistenti/Tariffa.php');
	require_once('OggettiPersistenti/Amministratore.php');
	require_once('OggettiPersistenti/Contratto.php');
	require_once('OggettiPersistenti/Cliente.php');
	require_once('OggettiPersistenti/Richiesta.php');
	require_once('OggettiPersistenti/Operatore.php');
	
	
		date_default_timezone_set('CET');

		$storage=new Storage();	
	
		Visualizza::Clienti();	
		
		Visualizza::Contratti(1);
		
		Visualizza::Estratto($Num);
		
		Visualizza::Logs(1);
		
		Visualizza::Operatore();
		
		Visualizza::Richiesta();
		
		Visualizza::Risposta($id_richiesta);
		
		Visualizza::Tariffa();
	
		Visualizza::Risposte(2);
/*	
	
	
	$tariffa= new Tariffa(1, $storage);
	
	
	$tariffa2=new Tariffa(null,null,"latte","0.7","0.6");
	
	echo $tariffa2->toString();
	
	
	
	echo $tariffa;
	
	$amm= new Amministratore(null, null, null, null, null);
	
	$amm->modificaTariffa(1, 0.15, 0.07);
	
	
	$tariffa= new Tariffa(1, $storage);
	
	echo $tariffa;
	
	$amm->creaTariffa("prova",0.1, 0.01);
	
	$amm->eliminaTariffa(2);
	
	
		
	$contratto=new Contratto($storage,1234567890);
	echo $contratto;
	
	
		
	$contratto=new Contratto($storage,null,"2/1/2013",1,1);
	echo $contratto;
	
	
	$dati=$contratto->leggiDati();
	
	Visualizza::Dati($dati);
	
	
		
		
	$cliente = new Cliente(null,"Mario", "Rossi", "Mrossi", "mario", "mrossi@me.it");
	
	*/
	
	$cliente = new Cliente(2);
	
	echo $cliente->getNome();
	/*
	
	//Richiesta::Crea($storage, "assistenza", "LOL", 1);
		
	//Richiesta::Evadi($storage, 1);
		
	/*	$today = date("m/d/Y");
		echo $today;
		*/
	 //$operatore= new Operatore(2);
	//echo $operatore->getUsername();
	
	//$operatore->evadiRichiesta(1, "Assistenza", "AbbiamoProblema","Lo abbiamo Risolto");	

	
	//$operatore->evadiRichiesta(2,"CreaContratto", 2);	
		
	//$operatore->evadiRichiesta(3,"CambiaTariffa", "3120000001,2");
	
	//$operatore->evadiRichiesta(7, "EliminaContratto", "3120000001");
		
	//$operatore->evadiRichiesta(4,"EliminaCliente","");
		
	//$operatore->evadiRichiesta(2,"CreaContratto", 2);
		
	/*
	$cliente = new Cliente(2);
	
	$cliente->modificaEmail("mario@pe");
	$cliente->modificaPassword("lolicus");
	$cliente->modificaUsernamae("mariello");
	
	
		
	$amm= new Amministratore(null, null, null, null, null);
	
	//$amm->creaOperatore("Marco", "sessa","marcolino","prova");
		
	//$amm->leggiLog(2);
	
		$amm->eliminaOperatore(2);
		
	*/

?>
