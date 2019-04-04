<?php include("require/session.php"); ?>
<html>
    <head>  
		<?php include("header.php")?>
		<link rel="stylesheet" type="text/css" href="css/passchange_style.css" />
		<script type="text/javascript" src="js/alta_validation.js"></script>
		<link rel="stylesheet" type="text/css" href="css/alta_validation.css" />		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<!-- per Project stuff -->
		<script type='text/javascript' src='js/jquery.boxy.js'></script>
		<link   type="text/css" rel="stylesheet" href="css/boxy.css"  />
		<!-- END per project stuff -->	
		<script type='text/javascript'>
			$(function() {
			  $('.boxy').boxy();
			});
		</script>
		<SCRIPT type="text/javascript">
			<!--
			pic_loader1 = new Image(16, 16); 
			pic_loader1.src = "loader.gif";
			var usr ='';
			var str_confirm_password ='';
			var str_password ='';
			var str_pwd_status = "";
			var str_status = "";

			$(document).ready(function(){

			$("#txt_username").change(function() { 

			usr = $("#txt_username").val();

			if(usr.length >= 3)
			{
			$("#div_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking username....');

				$.ajax({  
				type: "POST",  
				url: "check_username.php",  
				data: "username="+ usr,  
				success: function(msg){  
			   
			   $("#div_status").ajaxComplete(function(event, request, settings){ 
				msg = parseInt(msg);
				if(msg == '1')
				{ 
					$("#txt_username").removeClass('invalidInput'); 					
					$("#txt_username").addClass("validInput");
					$(this).html('&nbsp;<img src="yes.gif" align="absmiddle">');
					str_status = "OK";
				}  
				else  
				{  
					$("#txt_username").removeClass('validInput');
					$("#txt_username").addClass("invalidInput");					
					$(this).html('&nbsp;<font color="red">Usuario ya usado!</font>');
					str_status = "";
				}  
			   
			   });

			 } 
			   
			  }); 


			}
			else
				{
				$("#div_status").html('<font color="red">The username should have at least <strong>3</strong> characters. Please try again.</font>');
				$("#txt_username").removeClass('validInput'); 
				$("#txt_username").addClass("invalidInput");
					str_status = "";
				}

			});

			$("#txt_confirm_password").change(function() { 

			str_password = $("#txt_password").val();
			str_confirm_password = $("#txt_confirm_password").val();

			if(str_confirm_password.length  >=3)
			if(str_password!=str_confirm_password)
				{
				$("#div_confirm_password_status").html('<font color="red">The password does not match. Please try again.</font>');
				$("#div_password_status").html('');
				$("#txt_confirm_password").removeClass('validInput'); // if necessary
				$("#txt_confirm_password").addClass("invalidInput");
				str_pwd_status  = "";
				}
			else
				{
				$("#div_password_status").html('&nbsp;<img src="yes.gif" align="absmiddle">');
				$("#div_confirm_password_status").html('&nbsp;<img src="yes.gif" align="absmiddle">');
				str_pwd_status  = "OK";
				}
			else
				{
				$("#div_confirm_password_status").html('<font color="red">The Confirm  password should have at least <strong>3</strong> characters. Please try again.</font>');
				$("#div_password_status").html('');
				}
			});

			$("#txt_password").change(function() { 
			var str_password = $("#txt_password").val();
			var str_confirm_password = $("#txt_confirm_password").val();
			if(str_password.length  >=3)
			if(str_password!=str_confirm_password)
				{
				$("#div_password_status").html('<font color="red">The password does not match. Please try again.</font>');
				$("#div_confirm_password_status").html('');
				$("#txt_password").removeClass('validInput'); 
				$("#txt_password").addClass("invalidInput");
					str_pwd_status  = "";
				}
			else
			{
			$("#div_password_status").html('&nbsp;<img src="yes.gif" align="absmiddle">');
			$("#div_confirm_password_status").html('&nbsp;<img src="yes.gif" align="absmiddle">');	
			str_pwd_status  = "OK";
			}
			else
			{
			$("#div_password_status").html('<font color="red">The password should have at least <strong>3</strong> characters. Please try again.</font>');
			$("#div_confirm_password_status").html('');
			}
			});
			});
			//-->
		</SCRIPT>		
   </head>  
<body class="modern-ui">
	<div class="page">
		<div class="page-region">
			<div class="page-region-content">
			<h2><i class="icon-user-2"></i>Alta medico</h2>
				<div class="page-control" data-role="page-control" style="margin-left:10px;width: 90%;">
						<ul>
							<li class="active"><a href="#1">Complete los campos para dar de alta un nuevo operador del sistema.</a></li>
						</ul>				
					<div class="frames">
						<div class="frame active" id="1">
							<form name="usuario" action="usuario_nuevo_post.php" method="post" onsubmit="if(isFormValid())alert('Todo ok'); else { alert('Algo esta mal completado');return false; }">
								<input class="input" type="hidden" name="fecha"  value="<?php echo date("Y-m-d G:i:s"); ?>"/>
								<table cellpadding="0" cellspacing="0" border="0" class="striped">
									<tr>
										<td class="span2"><h4>Nombre</h4></td>
										<td class="span1" colspan="2"><input class="input" type="text" name="nombre" required="1" value=""/></td>
									</tr>
									<tr>
										<td><h4>Apellido</h4></td>
										<td colspan="2"><input class="input" type="text" name="apellido" required="1" value=""/></td>
									</tr>
									<tr>
										<td><h4>M.N.</h4></td>
										<td colspan="2"><input class="input" type="text" name="mn" value=""/></td>
									</tr>
									<tr>
										<td class="span2"><h4>Nombre de usuario</h4></td>
										<td class="span1"><input type="text" id="txt_username" name="txt_username" value="" required="1"/></td>
										<td class="span3"><div id="div_status"></div></td>
									</tr>		
									<tr>
										<td><h4>Contraseña</h4></td>
										<td><input type="password" id="txt_password" name="txt_password" value="" required="1"/></td>
										<td><div id="div_password_status"></div></td>
									</tr>
									<tr>
										<td><h4>Repita Contraseña</h4></td>
										<td><input type="password" id="txt_confirm_password" name="txt_confirm_password" value="" required="1"/></td>
										<td><div id="div_confirm_password_status"></div></td>
									</tr>	
									<tr>
										<td><h4>Telefono 1</h4></td>
										<td colspan="2"><input class="input" type="phone" name="tel1" required="1" value=""/></td>
									</tr>		
									<tr>
										<td><h4>Telefono 2</h4></td>
										<td colspan="2"><input class="input" type="phone" name="tel2" value=""/></td>
									</tr>
									<tr>
										<td><h4>Direccion</h4></td>
										<td colspan="2"><input class="input" type="text" name="dir" required="1" value="<?php echo $row['dir'];?>"/></td>
									</tr>
									<tr>
										<td><h4>e-Mail</h4></td>
										<td colspan="2"><input class="input" type="email" name="email" mask="email" required="1" value=""/></td>
									</tr>			
								</table>
								<center>
									<input type="submit" name="submit" class="button" value="Ok!"/>
								</center>
						</form>
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>
</body>
</html>
