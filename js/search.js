/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
var request_type;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
	request_type = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	request_type = new XMLHttpRequest();
	}
	return request_type;
}

var http = createObject();

/* -------------------------- */
/* SEARCH */
/* -------------------------- */
function searchNameq() {
searchq = encodeURI(document.getElementById('searchq').value);
//var opq=document.getElementById('op').value;

if(document.getElementById('mascotas').checked) {
  //mascotas radio button is checked
  var opq="1"
}else if(document.getElementById('propietarios').checked) {
  //propietarios is checked
  var opq="2"
}
 
document.getElementById('msg').style.display = "block";
//document.getElementById('msg').innerHTML = "<i>Searching for <strong>" + searchq+"</strong></i>";
// Set te random number to add to URL request
nocache = Math.random();
http.open('post', 'paciente_search.php?searchq='+searchq+'&nocache = '+nocache+'&opq='+opq);
//http.open('post', 'reportes_historico_getreport.php?peri='+selectedPet+'&repa='+a+'&repb='+b+'&repc='+c);
http.onreadystatechange = searchNameqReply;
http.send(null);
}
function searchNameqReply() {
if(http.readyState == 4){
	var response = http.responseText;
	document.getElementById('search-result').innerHTML = response;
	}
}
