var xmlHttp;


// PROFILO //

function apricontratto(){ 
			
			document.getElementById("profilo").style.display='none';
			document.getElementById("contratto").style.removeProperty ("display");
			document.getElementById("operazione").style.display='none';
}

function checkEmail(inputvalue){	
    var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    if(pattern.test(inputvalue)){
    	document.getElementById("emailerr").style.display='none'; 
    	document.getElementById("pulsanteReg").removeAttribute("disabled");     
    }else{  
    	document.getElementById("emailerr").innerHTML='<h2 style="font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;">ATTENZIONE: Inserire email valida</h1>';
		document.getElementById("emailerr").style.display='block';
		document.getElementById("pulsanteReg").setAttribute("disabled","true");
    }
}
	
function ControllaPass(elem){
	
	var valore1=elem.value;
	var valore2=document.getElementById("psw1").value;
	
	if(valore1!=valore2){
		document.getElementById("password").style.display='block';
		document.getElementById("pulsanteReg").setAttribute("disabled","true");
		}
	else{
		document.getElementById("password").style.display='none';
		document.getElementById("pulsanteReg").removeAttribute("disabled");
	}
}

function profilo(){
	xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

document.getElementById("contratto").style.display="none";
document.getElementById("operazione").style.display='none';
var url="LeggiDatabase.php";
//Adds a random number to prevent the server from using a cached file
url=url+"?sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedprofilo;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}

function stateChangedprofilo(){
   if (xmlHttp.readyState==4 && xmlHttp.status==200){
   	if(xmlHttp.responseText=="Errore"){
   		document.getElementById("errore").style.display='block';
   	}
   	else{ 
   		document.getElementById("contratto").style.display='none';
   		document.getElementById("profilo").style.display='block';
       document.getElementById("profilo").innerHTML=xmlHttp.responseText;
       }
 }
}

function Update(){
	
	var form= document.getElementById("Regfor");
	var data= new FormData(form);
	
	xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

   
var url="Cliente.php";
url=url+"?&operazione=Update";
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedUpdate;

xmlHttp.open("POST",url,true);
xmlHttp.send(data);
	
}

function stateChangedUpdate(){
 if (xmlHttp.readyState==4 && xmlHttp.status==200){
	document.getElementById("profilo").innerHTML="<p><b>Operazione Eseguita con successo<b></p>";
	}
}

function Controlla(valore){
	
	var y=parseInt(valore);
  	if (isNaN(y)){ 
  		document.getElementById("emailerr").innerHTML='<h2 style="font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;">ATTENZIONE: valore valido</h1>';
		document.getElementById("emailerr").style.display='block';
		document.getElementById("pulsanteReg").setAttribute("disabled","true");
		}
	else{
		document.getElementById("emailerr").style.display='none'; 
    	document.getElementById("pulsanteReg").removeAttribute("disabled");  
	}
	if(valore==null){
		document.getElementById("emailerr").innerHTML='<h2 style="font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;">ATTENZIONE: Inserire valore valido</h1>';
		document.getElementById("emailerr").style.display='block';
		document.getElementById("pulsanteReg").setAttribute("disabled","true");
	}
	else{
	document.getElementById("emailerr").style.display='none'; 
    document.getElementById("pulsanteReg").removeAttribute("disabled");
    }
}

/*******************************************/


// CREA CONTRATTO //

function GeneraCreaContratto(){
	
	document.getElementById("contratto").style.display='none';
	document.getElementById("profilo").style.display='none';
	
	xmlHttp=GetXmlHttpObject();
if (xmlHttp==null){
  alert ("Your browser does not support AJAX!");
  return;
  }
  
  var url="Cliente.php";
  url=url+"?operazione=VisualizzaCreaContratto";
//Adds a random number to prevent the server from using a cached file
 url=url+"&sid="+Math.random();
 
//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedVisualizzaCreaContratto;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

  
}

function stateChangedVisualizzaCreaContratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
	}
}

function CreaContratto(){

	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}
	
  	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
  		return;
  	} 

	var url="Cliente.php";
		url=url+"?operazione=CreaContratto";
		url=url+"&tariffa="+selezionato;
		//Adds a random number to prevent the server from using a cached file
		url=url+"&sid="+Math.random();
	
	
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedCreaContratto;

	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedCreaContratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML="<P><h1 style=\"font-size: 14px;color: black\" align=\"center\">RICHIESTA EFFETTUATA CON SUCCESSO</h1><h2 align=\"center\">A breve un operatore eseguirà la sua richiesta</h2></P>";;
		document.getElementById("operazione").style.display='block';
	}
}

/*******************************************/


// MODIFICA CONTRATTO //

function GeneraModificaContratto(){
	
	document.getElementById("contratto").style.display='none';
	document.getElementById("profilo").style.display='none';
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
 	return;
  	}
  
  var url="Cliente.php";
  url=url+"?operazione=VisualizzaModificaContratto";
//Adds a random number to prevent the server from using a cached file
 url=url+"&sid="+Math.random();
 
//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedVisualizzaModificaContratto;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}

function stateChangedVisualizzaModificaContratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
	}
}

function Step2ModifcaContratto(){
	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}
	
  	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
  		return;
  	} 

	var url="Cliente.php";
		url=url+"?operazione=Step2ModificaContratto";
		url=url+"&numtel="+selezionato;
		//Adds a random number to prevent the server from using a cached file
		url=url+"&sid="+Math.random();
	
	
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedStep2ModificaContratto;

	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedStep2ModificaContratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
	}
}

function ModificaContratto(){
	var selezionato=null;
	
	var numero=document.getElementsByName("numtel");
	numero=numero[0].value;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}
	
  	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
  		return;
  	} 

	var url="Cliente.php";
		url=url+"?operazione=ModificaContratto";
		url=url+"&numtel="+numero;
		url=url+"&tariffa="+selezionato;
		//Adds a random number to prevent the server from using a cached file
		url=url+"&sid="+Math.random();
	
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedModificaContratto;

	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedModificaContratto(){
if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=document.getElementById("operazione").innerHTML="<P><h1 style=\"font-size: 14px;color: black\" align=\"center\">RICHIESTA EFFETTUATA CON SUCCESSO</h1><h2 align=\"center\">A breve un operatore eseguirà la sua richiesta</h2></P>";
		document.getElementById("operazione").style.display='block';
	}
}

/*******************************************/


// DATI CONTRATTO //

function GeneraDatiContratto(){
	
	document.getElementById("contratto").style.display='none';
	document.getElementById("profilo").style.display='none';
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
 	return;
  	}
  
  var url="Cliente.php";
  url=url+"?operazione=VisualizzaModificaContratto";
//Adds a random number to prevent the server from using a cached file
 url=url+"&sid="+Math.random();
 
//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedDatiContratto;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}

function stateChangedDatiContratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
		document.getElementById("bottone").setAttribute("onClick","DatiContratto()");
	}
}

function DatiContratto(){
	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}
	
  	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
  		return;
  	} 

	var url="Cliente.php";
		url=url+"?operazione=DatiContratto";
		url=url+"&numtel="+selezionato;
		//Adds a random number to prevent the server from using a cached file
		url=url+"&sid="+Math.random();
	
	
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedVisualizzaDatiContratto;

	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}

function stateChangedVisualizzaDatiContratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
		}
}

/*******************************************/



// ASSISTENZA //

function apriAssistenza(){

	document.getElementById("contratto").style.display='none';
	document.getElementById("profilo").style.display='none';
	document.getElementById("operazione").style.display='block';
	
	var stringa="<table style=\"position:relative; left:13%; top:20%\"><tr><td><a onclick=\"leggi()\"><img src=\"Immagini/archivio.png\"></a><td><td><a onclick=\"assistenza()\"><img src=\"Immagini/newmess.png\">";
	
	document.getElementById("operazione").innerHTML=stringa;
}

function leggi(){
xmlHttp=GetXmlHttpObject();

if (xmlHttp==null){
  alert ("Your browser does not support AJAX!");
  return;
  } 
  
  var url="Cliente.php";
	url=url+"?operazione=Leggi";
	//Adds a random number to prevent the server from using a cached file
	url=url+"&sid="+Math.random();
	
	//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedLeggi;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedLeggi(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
   		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
   		document.getElementById("operazione").style.overflow='auto';
}
}

function assistenza(){
	
	document.getElementById("contratto").style.display='none';
	document.getElementById("profilo").style.display='none';

	var area="<P><h1 style=\"font-size: 14px;color: black\" align=\"center\"> Scrivi il tuo messaggio d'assistenza</h1> </P><textarea id=\"area\" rows=\"15\" cols=\"50\" style=\"position:relative; top:10%; left:23%;\"></textarea><p><input style=\"position:relative; left:71%\" type=\"button\" value=\"Invia\" onClick=\"InviaMessaggio()\"></p>";
	elemento=document.getElementById("operazione");
	elemento.innerHTML=area;
	elemento.style.display='block';

}

function InviaMessaggio(){

var messaggio=document.getElementById("area").value;


xmlHttp=GetXmlHttpObject();

if (xmlHttp==null){
  alert ("Your browser does not support AJAX!");
  return;
  } 
  
  var url="Cliente.php";
	url=url+"?operazione=Assistenza";
	url=url+"&messaggio="+messaggio;
	//Adds a random number to prevent the server from using a cached file
	url=url+"&sid="+Math.random();
	
	//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedInviaMessaggio;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
	
}

function stateChangedInviaMessaggio(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
   		document.getElementById("operazione").innerHTML="<P><h1 style=\"font-size: 14px;color: black\" align=\"center\">OPERAZIONE EFFETTUATA CON SUCCESSO</h1><h2 align=\"center\">A breve un operatore risponderà alla sua richiesta</h2></P>";
   	}
}

/*******************************************/


// LOGOUT //

function AskLogout(){
	document.getElementById("sicuro").style.display='block';
}

function Logout(){

xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

var url="Cliente.php";
	url=url+"?operazione=Logout";
	//Adds a random number to prevent the server from using a cached file
	url=url+"&sid="+Math.random();

//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedLogout;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

	
}

function stateChangedLogout(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
   		if(xmlHttp.responseText=="Fatto"){
   			location.replace("http://localhost/~Luigi/WorkSpaceSmal/IS_Project/Home.php");
   		}
   	}
}

/*******************************************/



// ESTRATTO CONTO //

function GeneraEstratto(){
	document.getElementById("contratto").style.display='none';
	document.getElementById("profilo").style.display='none';
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
 	return;
  	}
  
  var url="Cliente.php";
  url=url+"?operazione=VisualizzaModificaContratto";
//Adds a random number to prevent the server from using a cached file
 url=url+"&sid="+Math.random();
 
//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedGeneraDatiConti;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedGeneraDatiConti(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
		document.getElementById("bottone").setAttribute("onClick","EstrattoConto()");
	}
}

function EstrattoConto(){
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}
	
  	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
  		return;
  	} 

	var url="Cliente.php";
		url=url+"?operazione=EstrattoConto";
		url=url+"&numtel="+selezionato;
		//Adds a random number to prevent the server from using a cached file
		url=url+"&sid="+Math.random();
	
	
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedVisualizzaEstrattoConto;

	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedVisualizzaEstrattoConto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
		}
}
/*******************************************/



// ELIMINA CONTRATTO //

function GeneraEliminaContratto(){
	
	document.getElementById("contratto").style.display='none';
	document.getElementById("profilo").style.display='none';
	
	xmlHttp=GetXmlHttpObject();

	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
 	return;
  	}
  
  var url="Cliente.php";
  url=url+"?operazione=VisualizzaModificaContratto";
//Adds a random number to prevent the server from using a cached file
 url=url+"&sid="+Math.random();
 
//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedVisualizzaEliminaContratto;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}

function stateChangedVisualizzaEliminaContratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
		document.getElementById("bottone").setAttribute("onClick","EliminaContratto()");
	}
}

function EliminaContratto(){
	
	if(!confirm("Sei sicuro di VolerContinuare"))
		return;
	
	var selezionato=null;
	
	var radio= document.getElementsByName("id");
	for(i=0;i<radio.length;i++){
		if(radio[i].checked==true){
			selezionato=radio[i].value;
			}
	}
	
  	if (xmlHttp==null){
  		alert ("Your browser does not support AJAX!");
  		return;
  	} 

	var url="Cliente.php";
		url=url+"?operazione=EliminaContratto";
		url=url+"&numtel="+selezionato;
		//Adds a random number to prevent the server from using a cached file
		url=url+"&sid="+Math.random();
	
	
	//funzione usata come dati
	xmlHttp.onreadystatechange=stateChangedEliminaContratto;

	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function stateChangedEliminaContratto(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=document.getElementById("operazione").innerHTML="<P><h1 style=\"font-size: 14px;color: black\" align=\"center\">RICHIESTA EFFETTUATA CON SUCCESSO</h1><h2 align=\"center\">A breve un operatore eseguirà la sua richiesta</h2></P>";
		document.getElementById("operazione").style.display='block';
	}
}

/*******************************************/


// HELP //

function Help(){
	
	document.getElementById("contratto").style.display='none';
	document.getElementById("profilo").style.display='none';
	
	xmlHttp=GetXmlHttpObject();
if (xmlHttp==null){
  alert ("Your browser does not support AJAX!");
  return;
  }
  
  var url="Cliente.php";
  url=url+"?operazione=Help";
//Adds a random number to prevent the server from using a cached file
 url=url+"&sid="+Math.random();
 
//funzione usata come dati
xmlHttp.onreadystatechange=stateChangedHelp;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}

function stateChangedHelp(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("operazione").innerHTML=xmlHttp.responseText;
		document.getElementById("operazione").style.display='block';
	}
}


// FUNZIONE STANDARD CREAZIONE XMLHTTPOBJECT CROSS BROWSERS //
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

/*******************************************/
