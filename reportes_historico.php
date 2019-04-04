<?php include("require/session.php"); ?>
<html>  
    <head>  
	<?php include("header.php")?>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="javascript/accordion.js"></script>
	
	<script>
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

		function searchNameq() {
			
		var searchq = document.getElementsByName('peri');
		for(i=0; i<searchq.length; i++){
			if(searchq[i].checked){
				var selectedPet = searchq[i].value;
				i = searchq.length; //jump out of for loop
			}
		}
		
		if(document.getElementById('a').checked == "1"){
			var a=document.getElementById('a').value;
		} else {var a="0"}
		if(document.getElementById('b').checked == "1"){
			var b=document.getElementById('b').value;
		} else {var b="0"}
		if(document.getElementById('c').checked == "1"){
			var c=document.getElementById('c').value;
		} else {var c="0"}
		
		nocache = Math.random();
		http.open('post', 'reportes_historico_getreport.php?peri='+selectedPet+'&repa='+a+'&repb='+b+'&repc='+c);
		http.onreadystatechange = searchNameqReply;
		http.send(null);
			
		}
		function searchNameqReply() {
		if(http.readyState == 4){
			var response = http.responseText;
			document.getElementById('postreporte').innerHTML = response;
			}
		}
	</script>
	<script type="text/javascript">
	<!--
		$(document).ready(function() {
		  $('a.lnk').click(function() {
			var url = $(this).attr('href');
			$('#postreporte').load(url, function(response, status, xhr) {
			  if(status=='success') {
				$('#postreporte').html(response);
			  }
			  else if(status=='error') {
				var ermsg = '<i>There was an error: '+ xhr.status+ ' '+ xhr.statusText+ '</i>';
				$('#postreporte').html(ermsg);
			  }
			  else { alert(status); }
			});
			return false;
		  })
		});
	-->
	</script>
	</head>
<?php require("require/alasfun.php"); ?>	
<body class="modern-ui">
	<div class="page">
		<div class="page-region">
			<div class="page-region-content">
				<h2><i class="icon-chart-alt"></i>Reportes historicos.</h2>
					<form name="myForm">
						<table cellpadding="0" cellspacing="0" valign="top" class="bordered">
							<tr>
								<td align="center" class="tertiary-text" style="background-color:#eeeDDD;"><b>Tipo</b></td>
								<td align="center" class="tertiary-text" style="background-color:#eeeDDD;" colspan="3"><b>Periodo de dias</b></td>
							</tr>
							<td valign="top">
								<label class="input-control checkbox">
									<input type="checkbox" name='a' value='a' id='a' checked>
									<span class="helper">Historias medicas</span>								
								</label>
								<br>
								<label class="input-control checkbox">
									<input type="checkbox" name='c' value='b' id='b'>
									<span class="helper">Vacunas</span>
								</label>
								<br>
								<label class="input-control checkbox">
									<input type="checkbox" name='b' value='c' id='c'>
									<span class="helper">Peluqueria</span>
								</label>
								<br>
							</td>
							<td valign="top">					
								<label class="input-control radio">
									<input type='radio' name='peri' value='hoy' checked>
									<span class="helper">Hoy</span>
								</label>
								<br>
								<label class="input-control radio">
									<input type='radio' name='peri' value='ayer'>
									<span class="helper">Ayer</span>
								</label>
								<br>
								<label class="input-control radio">
									<input type='radio' name='peri' value='7dias'>
									<span class="helper">Ultimos 7 dias</span>
								</label>										
							</td>
							<td valign="top">
								<label class="input-control radio">
									<input type='radio' name='peri' value='15dias'>
									<span class="helper">Ultimos 15 dias</span>
								</label>
								<br>
								<label class="input-control radio">
									<input type='radio' name='peri' value='mesactual'>
									<span class="helper">Mes actual</span>
								</label>
								<br>
								<label class="input-control radio">
									<input type='radio' name='peri' value='mesanterior'>
									<span class="helper">Mes anterior</span>
								</label>
							</td>
							<td valign="top">
								<label class="input-control radio">
									<input type='radio' name='peri' value='6meses'>
									<span class="helper">Ultimos 6 meses</span>
								</label>
								<br>
								<label class="input-control radio">
									<input type='radio' name='peri' value='ano'>
									<span class="helper">Año actual</span>
								</label>
								<br>
								<label class="input-control radio">
									<input type='radio' name='peri' value='ano2'>
									<span class="helper">Año anterior</span>
								</label>
							</td>							
						<tr>
							<td align="right" colspan="4">
								<b><input type="button" id="searchq" onclick="searchNameq();" value="Buscar !" class="button bg-color-greenDark fg-color-white" /></b>
							</td>
							</tr>
						</tr>
						</table>
					</form>
					<div class="prettyprint" id="postreporte" style="display:block;	position:relative; font-size:0.7em; margin:0px; padding:0px; overflow : auto;">...</div>
				</div>
			</div>
		</div>
	</body>
</html>
