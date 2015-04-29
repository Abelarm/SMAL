//DATABASE RICHIESTE //

function VisualizzaRichieste(){
	
xmlHttp=GetXmlHttpObject();

if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

   
var url="iOperatore.php";
url=url+"?&operazione=VisualizzaRichieste";
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChanged;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		if(xmlHttp.responseText=="Nessun Risultato da visualizzare<br>"){
			document.getElementById("form").innerHTML="<br><b>Nessun Risultato da visualizzare</b>";
		}
		else{
		document.getElementById("form").innerHTML="<p>Seleziona una richiesta</p>"+xmlHttp.responseText+"<p><input type=\"button\" value=\"Avanti\" onClick=\"RiepilogoRichiesta()\"></p>";
   		document.getElementById("form").style.overflow='auto';
   		}
   		}
}

function RiepilogoRichiesta(){

var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}

var url="iOperatore.php";
url=url+"?&operazione=RiepilogoRichieste";
url=url+"&Richiesta="+selezionato;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedRiepilogo;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedRiepilogo(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("form").innerHTML=xmlHttp.responseText;
	}
}

function InviaRispostaAssistenza(){
	xmlHttp=GetXmlHttpObject();

if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

var testo=document.getElementById("testo").value;
   
var url="iOperatore.php";
url=url+"?&operazione=ScriviRispAssistenza";
url=url+"&Testo="+testo;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedRispAssistenza;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
	
}

function stateChangedRispAssistenza(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("form").innerHTML="<br><b>Operazione Effettuata con successo</b>";
		}
}

/**************************/


// VISUALIZZA CONTRATTI //

function VisualizzaClienti(){
	
	xmlHttp=GetXmlHttpObject();

if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

   
var url="iOperatore.php";
url=url+"?&operazione=VisualizzaCliente";
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedClienti;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
	
}

function stateChangedClienti(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("form").innerHTML="<p>Seleziona un cliente</p>"+xmlHttp.responseText+"<p><input type=\"button\" value=\"Avanti\" onClick=\"VisualizzaContratti()\"></p>";
		document.getElementById("form").style.overflow='auto';
		}

}

function VisualizzaContratti(){
	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}

var url="iOperatore.php";
url=url+"?&operazione=RiepilogoContratti";
url=url+"&Cliente="+selezionato;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();

//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedRiepilogoContratti;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
	
}

function stateChangedRiepilogoContratti(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("form").innerHTML="<p>Seleziona il contratto</p>"+xmlHttp.responseText+"<p><input type=\"button\" value=\"Avanti\" onClick=\"VisualizzaDati()\"></p>";
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

var url="iOperatore.php";
url=url+"?&operazione=DatiContratto";
url=url+"&Contratto="+selezionato;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();

//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedRiepilogoDati;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
	
}

function stateChangedRiepilogoDati(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("form").innerHTML="<p><b>Dati Contratto</b></p>"+xmlHttp.responseText;
	}
}
	
/***************************/



// ESTRATTO CONTO //

function VisualizzaClienti2(){
	
	xmlHttp=GetXmlHttpObject();

if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

   
var url="iOperatore.php";
url=url+"?&operazione=VisualizzaCliente";
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedClienti2;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
	
}

function stateChangedClienti2(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		if(xmlHttp.responseText=="Nessun Risultato da visualizzare<br>"){
			document.getElementById("form").innerHTML="<br><b>Nessun Risultato da visualizzare</b>";
		}
		else{
		document.getElementById("form").innerHTML="<p>Seleziona una cliente</p>"+xmlHttp.responseText+"<p><input type=\"button\" value=\"Avanti\" onClick=\"VisualizzaContratti2()\"></p>";
   		document.getElementById("form").style.overflow='auto';
   		}
   		}

}

function VisualizzaContratti2(){
	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}

var url="iOperatore.php";
url=url+"?&operazione=RiepilogoContratti";
url=url+"&Cliente="+selezionato;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();

//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedRiepilogoContratti2;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
	
}

function stateChangedRiepilogoContratti2(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		if(xmlHttp.responseText=="Nessun Risultato da visualizzare<br>"){
			document.getElementById("form").innerHTML="<br><b>Nessun Risultato da visualizzare</b>";
		}
		else{
		document.getElementById("form").innerHTML="<p>Seleziona un contratto</p>"+xmlHttp.responseText+"<p><input type=\"button\" value=\"Avanti\" onClick=\"VisualizzaEstratto()\"></p>";
   		document.getElementById("form").style.overflow='auto';
   		}
   		}
   	}


function VisualizzaEstratto(){
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}

var url="iOperatore.php";
url=url+"?&operazione=EstrattoConto";
url=url+"&Contratto="+selezionato;
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();

//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedVisualizzaEstratto;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedVisualizzaEstratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		if(xmlHttp.responseText=="Nessun Risultato da visualizzare<br>"){
			document.getElementById("form").innerHTML="<br><b>Nessun Risultato da visualizzare</b>";
		}
		else{
		document.getElementById("form").innerHTML="<p>Estratto Conto</p>"+xmlHttp.responseText;
   		document.getElementById("form").style.overflow='auto';
   		}
   		}
	}
/***************************/


function Logout(){
xmlHttp=GetXmlHttpObject();

if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }

var url="iOperatore.php";
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