var xmlHttp;

function Login(){

      
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 

var Username = document.getElementById("user").value;
var Password = document.getElementById("psw").value;
   
var url="Cliente.php";
url=url+"?user="+Username;
url=url+"&psw="+Password;
url=url+"&operazione=Login";
//Adds a random number to prevent the server from using a cached file
url=url+"&sid="+Math.random();


//funzione usata come dati
xmlHttp.onreadystatechange=stateChanged;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

} 

function SignUp(){

xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 
  
  var Username = document.getElementById("username").value;
  var Password = document.getElementById("psw1").value;
  var Nome = document.getElementById("nome").value;
  var Cogn = document.getElementById("cogn").value;
  var Email = document.getElementById("email").value;
  
  if(Username=="" || Password=="" || Nome=="" || Cogn=="" || Email==""){
  	document.getElementById("emailerr").innerHTML='<h2 style="font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;">ATTENZIONE: Riempire tutti i campi</h1>';
  	document.getElementById("emailerr").style.display='block';
  }
  else{
		var url="Cliente.php";
		url=url+"?username="+Username;
		url=url+"&password="+Password;
		url=url+"&nome="+Nome;
		url=url+"&cogn="+Cogn;
		url=url+"&email="+Email;
		url=url+"&operazione=SignUp";
		//Adds a random number to prevent the server from using a cached file
		url=url+"&sid="+Math.random();


		//funzione usata come dati
		xmlHttp.onreadystatechange=stateChangedSignUp;

		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}
  
function stateChangedSignUp(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("JustLogin").innerHTML=xmlHttp.responseText;
		document.getElementById("JustLogin").style.display='block';
		document.getElementById("Registrazione").style.display='none';
	}
}

function checkEmail(inputvalue){	
    var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    if(pattern.test(inputvalue)){
    	document.getElementById("emailerr").style.display='none'; 
    	document.getElementById("pulsanteReg").removeAttribute("disabled");     
    }else{  
    	document.getElementById("emailerr").innerHTML='<h2 style="font-size: 13px; color: black; margin-left:0.5em; margin-right:0.5em;">ATTENZIONE: Inserire email valida</h1>';
		document.getElementById("emailerr").style.display='block';
		document.getElementById("password").style.display='none';
		document.getElementById("pulsanteReg").setAttribute("disabled","true");
    }
}

function ControllaPass(elem){
	
	var valore1=elem.value;
	var valore2=document.getElementById("psw1").value;
	
	if(valore1!=valore2){
		document.getElementById("emailerr").style.display='none';
		document.getElementById("password").style.display='block';
		document.getElementById("pulsanteReg").setAttribute("disabled","true");
		}
	else{
		document.getElementById("password").style.display='none';
		document.getElementById("pulsanteReg").removeAttribute("disabled");
	}
}

function CreaForm(e){
	
	e = e || window.event;
	e.preventDefault();
	document.getElementById("Registrazione").style.display='block';
	document.getElementById("login").style.display='none';
    document.getElementById("errore").style.display='none';
}

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
xmlHttp.onreadystatechange=stateChanged1;

xmlHttp.open("GET",url,true);
xmlHttp.send(null);

	
}

function stateChanged1(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
   		if(xmlHttp.responseText=="Fatto"){
   			document.getElementById("login").style.display='block';
    		document.getElementById("JustLogin").style.display='none';
    		document.getElementById("sicuro").style.display='none';
    		document.getElementById("loginform").reset();
   		}
   	}
}


function stateChanged(){
   if (xmlHttp.readyState==4 && xmlHttp.status==200){
   	if(xmlHttp.responseText=="Errore"){
   		document.getElementById("errore").style.display='block';
   	}
   	else{
       document.getElementById("benvenuto").innerHTML=xmlHttp.responseText;
       document.getElementById("login").style.display='none';
       document.getElementById("JustLogin").style.display='block';
       document.getElementById("errore").style.display='none';
       }
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
