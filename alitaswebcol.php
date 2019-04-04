<?php include("require/session.php"); ?>
<html>
	<head>  
		<?php include("header.php")?>
		<script language="javascript" src="js/search.js"></script>
		<style type="text/css">
	
			#dhtmlgoodies_listMenu a{	/* Main menu items */
				color:#FFF;
				//text-decoration:none;
				//font-weight:bold;
		
			}
			#dhtmlgoodies_listMenu ul li a{	/* Sub menu */
				color:#FFF;
				font-style:italic;
				//font-weight:normal;
			}
			#dhtmlgoodies_listMenu ul li ul li a{	/* Sub Sub menu */
				color:#FFF;
				//font-style:italic;
				//font-size:0.9em;
				//font-weight:normal;		
			}
			
			#dhtmlgoodies_listMenu .activeMenuLink{	/* Styling of active menu item */
				color:#FFF;
			}
					
			/*
			No bullets
			*/	
			#dhtmlgoodies_listMenu li{
				list-style-type:none;	
			}
			
			/*
			No margin and padding
			*/
			#dhtmlgoodies_listMenu, #dhtmlgoodies_listMenu ul{
				margin:0px;
				padding:0px;
			}
		
			/* Margin of sub menu items */
			#dhtmlgoodies_listMenu ul{
				display:none;
				margin-left:3px;
				text-align: left;
			}
		</style>
	
		<script type="text/javascript">
			var activeMenuItem = new Array();
			
			function isUlInArray(inputObj,ulObj){
				while(inputObj && inputObj.id!='dhtmlgoodies_listMenu'){
					if(inputObj==ulObj)return true;
					inputObj = inputObj.parentNode;			
				}		
				return false;
			}
			
			function showHideSub(e,inputObj)
			{
				
		
				if(!inputObj)inputObj=this;
				var parentObj = inputObj.parentNode;
				var ul = parentObj.getElementsByTagName('UL')[0];
				if(activeMenuItem.length>0){
					for(var no=0;no<activeMenuItem.length;no++){
						if(!isUlInArray(ul,activeMenuItem[0]) && !isUlInArray(activeMenuItem[0],ul)){
							activeMenuItem[no].style.display='none';
							activeMenuItem.splice(no,1);
							no--;
						}
					}			
				}
				if(ul.offsetHeight == 0){
					ul.style.display='block';
					activeMenuItem.push(ul);
				}else{
					ul.style.display='none';
				}
			}
			
			function showHidePath(inputObj)
			{
				var startTag = inputObj;
				showHideSub(false,inputObj);
				inputObj = inputObj.parentNode;
				while(inputObj){			
					inputObj = inputObj.parentNode;
					if(inputObj.tagName=='LI')showHideSub(false,inputObj.getElementsByTagName('A')[0]);
					if(inputObj.id=='dhtmlgoodies_listMenu')inputObj=false;	
				}		
			}
			
			function initMenu()
			{
				var obj = document.getElementById('dhtmlgoodies_listMenu');
				var linkCounter=0;
				var aTags = obj.getElementsByTagName('A');
				var activeMenuItem = false;
				var activeMenuLink = false;
				var thisLocationArray = location.href.split(/\//);
				var fileNameThis = thisLocationArray[thisLocationArray.length-1];
				if(fileNameThis.indexOf('?')>0)fileNameThis = fileNameThis.substr(0,fileNameThis.indexOf('?'));
				if(fileNameThis.indexOf('#')>0)fileNameThis = fileNameThis.substr(0,fileNameThis.indexOf('#'));
		
				for(var no=0;no<aTags.length;no++){
					var parent = aTags[no].parentNode;
					var subs = parent.getElementsByTagName('UL');
					if(subs.length>0){
						aTags[no].onclick = showHideSub;	
						linkCounter++;
						aTags[no].id = 'aLink' + linkCounter;
					}	
					
					if(aTags[no].href.indexOf(fileNameThis)>=0 && aTags[no].href.charAt(aTags[no].href.length-1)!='#'){				
						if(aTags[no].parentNode.parentNode){								
							var parentObj = aTags[no].parentNode.parentNode.parentNode;
							var a = parentObj.getElementsByTagName('A')[0];
							if(a.id && !activeMenuLink){
								
								activeMenuLink = aTags[no];
								activeMenuItem = a.id;
							}
						}
					}		
				}		
		
				if(activeMenuLink){
					activeMenuLink.className='activeMenuLink';
				}
				if(activeMenuItem){
					if(document.getElementById(activeMenuItem))showHidePath(document.getElementById(activeMenuItem));	
				}
			}
			window.onload = initMenu;
		</script>
	</head>
	<?php require("require/alasfun.php"); ?>	
	<body class="modern-ui">
		<div class="page" align="center">
			<div class="page-region">
				<div class="page-region-content">
					<a href="logout.php" target="_top" title="salir del sistema" onclick="return confirm('Salir ?');">
						<button style="width:100px; padding:0;" class="bg-color-white"><i class="icon-exit"></i> <b><small>SALIR</small></b></button>
					</a>
					<!--<br> ««<b> <?php echo date("d-m-Y"); ?> </b>»»<br> -->
						
					<ul id="dhtmlgoodies_listMenu" style="text-align: left;">
						<li class="bg-color-orange"><a href="alitaswebbody.php" target="central" title="home"><i class="icon-home fg-color-white"></i> <b>INICIO</b>	</a></li>
						<li class="bg-color-orangeDark"><a href="alitas_docs.php" target="central" title="Documentacion"><i class="icon-help-2 fg-color-white"></i> <b>Ayuda</b></a></li>
						<li class="bg-color-red"><a href="usuario_info.php" target="central" title="Ver informacion del usuario"><i class="icon-user-2 fg-color-white"></i> <b><?php echo strtoupper($_SESSION['username']);?></b></a></li>
						<?php if($_SESSION['username']=="admin"){?>
							<li class="bg-color-pinkDark"><a href="#"><i class="icon-cog fg-color-white"></i><b> Config.</b></a>
								<ul>								
									<li><a href="alitasconfig.php"  target="central" title="Preferencias">Preferencias</a></li>	
									<li><a href="usuario_nuevo.php?" target="central" title="Alta Usuario">Alta usuario</a></li>
									<li><a href="usuario_config.php" target="central" title="Listar Usuarios">Usuarios</a></li>
									<li><a href="alitasconfig_vacunas.php"  target="central" title="Configurariones de Vacunas">Vacunas</a></li>
									<li><a href="alitasconfig_razas.php"  target="central" title="Configuraciones de Razas">Razas</a></li>										
								</ul>
							</li>						
						<?php } ?>            
						<li class="bg-color-green"><a href="paciente_nuevo.php?altamodo=1" target="central" title="Agregar Mascota"><i class="icon-github fg-color-white"></i> <b>+ Mascota</b></a></li>                   
						<li class="bg-color-greenLight"><a href="#"><i class="icon-chart-alt fg-color-white"></i> <b>Reportes</b></a>
							<ul>
									<li><a href="#"  title="Vacunas">Vacunas</a>
										<ul>
												<li> <a href="reportes_vacunas_vencidas_mensual.php"     target="central" title="Vencimiento de vacunas del mes de <?php echo $meses[date("n")]; ?>" ><small><i class="icon-star-3 fg-color-white"></i> Proximas a vencer</small></a></li>
												<li> <a href="reportes_pacientes_nunca_vacunados.php"    target="central" title="Mascotas nunca vacunados"><small><i class="icon-star-3 fg-color-white"></i> Nunca vacunados</small></a></li>
												<li> <a href="reportes_pacientes_sinvacunas_mensual.php" target="central" title="Mascotas sin vacunar este mes"><small><i class="icon-star-3 fg-color-white"></i> s/Vacunar:<?php echo $meses_c[date("n")]; ?></small></a></li>
										</ul>
									</li>	
									<li><a href="#" title="mascotas">Mascotas</a>
										<ul>
											<li><a href="reportes_listar_mascotas.php" target="central" title="Mascotas por fecha de alta"><small><i class="icon-star-3 fg-color-white"></i> Listado</small></a></li>
											<li><a href="reportes_torta_especies.php"  target="central" title="Porcentaje de Mascotas por especie."><small><i class="icon-star-3 fg-color-white"></i> Especies</small></a></li>
											<li><a href="reportes_fallecidos.php"      target="central" title="Lista de mascotas fallecidos"><small><i class="icon-star-3 fg-color-white"></i> Fallecidos</small></a></li>
										</ul>
									</li>
									<li><a href="reportes_historico.php" target="central" title="Historicos">Historicos</a></li>
							</ul>
						</li>			   			
						<li class="bg-color-darken"><a href="#"><i class="icon-search fg-color-white"></i> <b class="fg-color-white">Buscar</b></a></li>
					</ul>
					<div class="border-color-darken">
					<form name="searchForm" method="post" action="javascript:insertTask();" style="text-align: left;">
						<label class="input-control radio">
							<input type="radio" id="mascotas" name="op" value="1" checked/>
							<span class="helper"><small><b>MASCOTAS</b></small></span>
						</label>						
						<label class="input-control radio">
							<input type="radio" id="propietarios" name="op" value="2" />
							<span class="helper"><b><small>PROPIETARIOS</small></b></span>
						</label>
						<div class="input-control text s1">
							<input type="text" placeholder="buscar!" name="searchq" id="searchq" onkeyup="javascript:searchNameq()" autocomplete="off" autocorrect="off" autocapitalize="off"/>
							<!-- <button class="btn-search"></button> -->
						</div>
						<div id="msg" class=""></div>
					</form>
					</div>
					<div id="search-result" class="" style="height: 300;width:130px;"></div>
				</div>
			</div>
		</div>
	</body>  
</html>  
