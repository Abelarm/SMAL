// LOG OPERATORE //
function VisualizzaOperatori(){
	
xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var url="iAmministratore.php";
	url=url+"?&operazione=VisualizzaOperatori";
	url=url+"&sid="+Math.random();
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedVisualizzaOperatori;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedVisualizzaOperatori(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
	document.getElementById("form").innerHTML="<p><b>Seleziona un'operatore:<br></b></p>"+xmlHttp.responseText+"<p align=\"center\"><input type=\"button\" value=\"Avanti\" onClick=\"VisualizzaLog()\">";
	document.getElementById("form").style.overflow='auto';
	}
}

function VisualizzaLog(){
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}

var url="iAmministratore.php";
url=url+"?&operazione=VisualizzaLog";
url=url+"&operatore="+selezionato;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedVisualizzaLog;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}

function stateChangedVisualizzaLog(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
		document.getElementById("form").innerHTML="<p><b>Log Operatore:<br></b></p>"+xmlHttp.responseText;
		document.getElementById("form").style.overflow='auto';
	}
}
/**********************/


//GESTIONE OPERATORE //

function visualizzaOperazioni(){
	
	var elem=document.getElementById("form");
	var stringa="<br><p align=\"center\"><table><tr><td><a onClick=\"InserisciOp()\"><img src=\"inserOP.png\"></a><td><a onClick=\"VisualizzaOp()\"><img src=\"visualOP.png\"></a><td><a onClick=\"EliminaOp()\"><img src=\"elimOP.png\"></a>";
	elem.innerHTML=stringa;
}

function InserisciOp(){
	
	var elem=document.getElementById("form");
	var stringa="<form id=\"reg\"><fieldset><legend>Inserisi Operatore</legend><table><tr><td>Nome:<td><input type=\"text\" name=\"nome\" placeholder=\"mario\"><tr><td>Cognome:<td><input type=\"text\" name=\"cogn\" placeholder=\"rossi\"><tr><td>Username:<td><input type=\"text\" name=\"User\" placeholder=\"m.rossi\"><tr><td>Password:<td><input type=\"password\" name=\"pass\"></table></fieldset></form>";
	stringa+="<p align=\"center\"><input type=\"button\" value=\"Avanti\" onClick=\"InserisciOperatore()\"></p>";
	elem.innerHTML=stringa;
}

function InserisciOperatore(){
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var form=document.getElementById("reg");
	var data= new FormData(form);
	
	
	var url="iAmministratore.php";
	url=url+"?&operazione=InserisciOp";
	//Adds a random number to prevent the server from using a cached file
	url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedFineInserimento;

xmlHttp.open("POST",url,true);
xmlHttp.send(data);
}

function stateChangedFineInserimento(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
		document.getElementById("form").innerHTML="<p><b>Operazione effettuata con successo<br></b></p>";
		document.getElementById("form").style.overflow='auto';
	}
}

function VisualizzaOp(){

	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var url="iAmministratore.php";
	url=url+"?&operazione=VisualizzaOperatori";
	url=url+"&sid="+Math.random();
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedVisualizzaOperatori2;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}

function stateChangedVisualizzaOperatori2(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
	document.getElementById("form").innerHTML="<p><b>Seleziona un'operatore:<br></b></p>"+xmlHttp.responseText+"<p align=\"center\"><input type=\"button\" value=\"Avanti\" onClick=\"VisualizzaDati()\">";
	document.getElementById("form").style.overflow='auto';
	}
}

function VisualizzaDati(){
	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}

var url="iAmministratore.php";
url=url+"?&operazione=DatiOperatore";
url=url+"&operatore="+selezionato;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedVisualizzaDati;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedVisualizzaDati(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
		document.getElementById("form").innerHTML="<p><b>Dati Operatore:<br></b></p>"+xmlHttp.responseText;
		document.getElementById("form").style.overflow='auto';
	}
}

function EliminaOp(){	
xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var url="iAmministratore.php";
	url=url+"?&operazione=VisualizzaOperatori";
	url=url+"&sid="+Math.random();
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedVisualizzaOperatori3;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);

}

function stateChangedVisualizzaOperatori3(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
	document.getElementById("form").innerHTML="<p><b>Seleziona un'operatore:<br></b></p>"+xmlHttp.responseText+"<p align=\"center\"><input type=\"button\" value=\"Avanti\" onClick=\"EliminaOperatori()\">";
	document.getElementById("form").style.overflow='auto';
	}
}

function EliminaOperatori(){
	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}

var url="iAmministratore.php";
url=url+"?&operazione=EliminaOperatore";
url=url+"&operatore="+selezionato;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedEliminaOperatore;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedEliminaOperatore(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
		document.getElementById("form").innerHTML="<p><b>Operazione effettuata con successo<br></b></p>";
		document.getElementById("form").style.overflow='auto';
	}
}
/*************************/


// GESTIONE TARIFFE //

function visualizzaOperazioni2(){
	
	var elem=document.getElementById("form");
	var stringa="<br><p align=\"center\"><table><tr><td><a onClick=\"InserisciTar()\"><img src=\"inserTAR.png\"></a><td><a onClick=\"ModTar()\"><img src=\"modifTAR.png\"></a><td><a onClick=\"EliminaTar()\"><img src=\"elimTAR.png\"></a>";
	elem.innerHTML=stringa;
}

function InserisciTar(){
	var elem=document.getElementById("form");
	var stringa="<form id=\"reg\"><fieldset><legend>Inserisi Tariffa</legend><table><tr><td>Nome:<td><input type=\"text\" name=\"nome\" placeholder=\"You&Me\"><tr><td>Ratio Chiamata:<td><input type=\"text\" name=\"ratiocall\" placeholder=\"0.12\"><tr><td>Ratio SMS:<td><input type=\"text\" name=\"ratiosms\" placeholder=\"0.18\"></table></fieldset></form>";
	stringa+="<p align=\"center\"><input type=\"button\" value=\"Avanti\" onClick=\"InserisciTariffa()\"></p>";
	elem.innerHTML=stringa;
}

function InserisciTariffa(){

xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var form=document.getElementById("reg");
	var data= new FormData(form);
	
	
	var url="iAmministratore.php";
	url=url+"?&operazione=InserisciTar";
	//Adds a random number to prevent the server from using a cached file
	url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedFineInserimentoTar;

xmlHttp.open("POST",url,true);
xmlHttp.send(data);
}

function stateChangedFineInserimentoTar(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
		document.getElementById("form").innerHTML="<p><b>Operazione effettuata con successo<br></b></p>";
		document.getElementById("form").style.overflow='auto';
	}
}

function ModTar(){

	

	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var url="iAmministratore.php";
	url=url+"?&operazione=VisualizzaTariffe";
	url=url+"&sid="+Math.random();
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedVisualizzaTariffe;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);

}

function stateChangedVisualizzaTariffe(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
	document.getElementById("form").innerHTML="<p><b>Seleziona una tariffa:<br></b></p>"+xmlHttp.responseText+"<p align=\"center\"><input type=\"button\" value=\"Avanti\" onClick=\"ModificaTariffa()\">";
	document.getElementById("form").style.overflow='auto';
	}
}

function ModificaTariffa(){
	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var url="iAmministratore.php";
	url=url+"?&operazione=Step2ModTariffe";
	url=url+"&tariffa="+selezionato;
	url=url+"&sid="+Math.random();
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedStep2ModTariffe;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedStep2ModTariffe(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
	document.getElementById("form").innerHTML="<p><b>Modifica la tariffa:<br></b></p>"+xmlHttp.responseText+"<p align=\"center\"><input type=\"button\" value=\"Avanti\" onClick=\"ModificaTariffaFine()\">";
	document.getElementById("form").style.overflow='auto';
	}
}

function ModificaTariffaFine(){
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var form=document.getElementById("regtar");
	var data= new FormData(form);
	
	
	var url="iAmministratore.php";
	url=url+"?&operazione=ModTariffa";
	//Adds a random number to prevent the server from using a cached file
	url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedFineInserimentoTariffa;

xmlHttp.open("POST",url,true);
xmlHttp.send(data);
}

function stateChangedFineInserimentoTariffa(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
		document.getElementById("form").innerHTML="<p><b>Operazione effettuata con successo<br></b></p>";
		document.getElementById("form").style.overflow='auto';
	}
}

function EliminaTar(){
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var url="iAmministratore.php";
	url=url+"?&operazione=VisualizzaTariffe";
	url=url+"&sid="+Math.random();
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedEliminaTariffe;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedEliminaTariffe(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
	document.getElementById("form").innerHTML="<p><b>Seleziona una tariffa:<br></b></p>"+xmlHttp.responseText+"<p align=\"center\"><input type=\"button\" value=\"Avanti\" onClick=\"EliminaTariffa()\">";
	document.getElementById("form").style.overflow='auto';
	}
}

function EliminaTariffa(){
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
		alert ("Your browser does not support AJAX!");
	return;
	}
	
	var url="iAmministratore.php";
	url=url+"?&operazione=EliminaTariffe";
	url=url+"&tariffa="+selezionato;
	url=url+"&sid="+Math.random();
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedEliminaTariffe2;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedEliminaTariffe2(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
		document.getElementById("form").innerHTML="<p><b>Operazione effettuata con successo<br></b></p>";
		document.getElementById("form").style.overflow='auto';
	}
}
/************************/

function Logout(){
xmlHttp=GetXmlHttpObject();

if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }

var url="iAmministratore.php";
	url=url+"?operazione=Logout";
	//Adds a random number to prevent the server from using a cached file
	url=url+"&sid="+Math.random();

//funzione usata come dati
xmlHttp.onreadystatechange=stateChanged1;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged1(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
	if(xmlHttp.responseText=="Fatto");
		location.replace("LoginStaff.html");
	}
}



function modifica(valore) {


xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
{
alert ("Your browser does not support AJAX!");
return;
} 

var url="leggiDB.php";
url=url+"?id="+valore;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();
//funzione usata come dati
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged() {

	if (xmlHttp.readyState==4 && xmlHttp.status==200){ 
	document.getElementById("op").innerHTML=xmlHttp.responseText;
	}
	}
	/* FUNZIONE STANDARD CROSS BROWSERS */

function GetXmlHttpObject(){
	var xmlHttp=null;
	try
	{
	// IE7+, Firefox, Opera 8.0+, Safari
	xmlHttp=new XMLHttpRequest();
	}
catch (e)
{
// Internet Explorer
try
{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}
