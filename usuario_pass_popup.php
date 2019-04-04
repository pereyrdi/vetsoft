<?php 
	include("require/session.php");
	$user_name = $_SESSION['username'];
?>
<head>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
	<!--
	pic_loader1 = new Image(16, 16); 
	pic_loader1.src = "loader.gif";
	var usr ='';
	var usr2 ='';
	var str_confirm_password ='';
	var str_password ='';
	var str_pwd_status = "";
	var str_status = "";

	$(document).ready(function(){
		
	$("#txt_username").change(function() { 
		usr = $("#txt_username").val();
		usr2 = $("#username").val();

		if(usr.length >= 3)
		{
			$("#div_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking password....');
			$.ajax({  
				type: "POST",  
				url: "check_password.php",
				data: "username="+ usr2 +"&claveactual="+ usr,
				success: function(msg){
					$("#div_status").ajaxComplete(function(event, request, settings){
						msg = parseInt(msg);
						//$("#test").html('#'+msg+'#');
						if(msg == '1')
						{ 
							$("#txt_username").removeClass('css_error'); 
							$("#txt_username").addClass('css_ok');
							$("#txt_username").html('&nbsp;<img src="yes.gif" align="absmiddle">');		
							$(this).html('&nbsp;<img src="yes.gif" align="absmiddle">');				
							str_status = "OK";
						}  
						else  
						{  
							$("#txt_username").removeClass('css_ok'); 
							$("#txt_username").addClass('css_error');
							$(this).html('&nbsp;<font color="red">La clave para <STRONG><?php echo $user_name;?></STRONG> esta mal escrita.</font>');
							str_status = "";
							
						}  
					});
				}			 
			}); 
		}
		else
		{
			$("#div_status").html('<font color="red">La clave debe tener al menos <strong>3</strong> caracteres. Reintente.</font>');
			$("#txt_username").removeClass('css_ok'); 
			$("#txt_username").addClass('css_error');
			str_status = "";
		}
	});

	$("#txt_confirm_password").change(function() { 

	str_password = $("#txt_password").val();
	str_confirm_password = $("#txt_confirm_password").val();

	if(str_confirm_password.length  >=3)
	if(str_password!=str_confirm_password)
		{
		$("#div_confirm_password_status").html('<font color="red">Las claves no coinciden. Reintente.</font>');
		$("#div_password_status").html('');
		$("#txt_confirm_password").removeClass('css_ok'); // if necessary
		$("#txt_confirm_password").addClass("css_error");
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
		$("#div_confirm_password_status").html('<font color="red">La clave debe tener al menos <strong>3</strong> letras. Reintente.</font>');
		$("#div_password_status").html('');
		}
	});

	$("#txt_password").change(function() { 
	var str_password = $("#txt_password").val();
	var str_confirm_password = $("#txt_confirm_password").val();
	if(str_password.length  >=3)
		if(str_password!=str_confirm_password)
			{
			$("#div_password_status").html('<font color="red">Las claves no coinciden. Reintente.</font>');
			$("#div_confirm_password_status").html('');
			$("#txt_password").removeClass('css_ok'); 
			$("#txt_password").addClass("css_error");
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
			$("#div_password_status").html('<font color="red">La clave debe tener al menos <strong>3</strong> letras. Reintente.</font>');
			$("#div_confirm_password_status").html('');
			}
		});
	});
	function fn_onclick() { 
		
		if(str_status == "OK" && str_pwd_status =="OK" && str_password != '' && str_confirm_password != '' )
		{
		$("#div_msg").html('<div id="logged_in"> <br />' +				  
					  '<img align="absmiddle" src="pics/loader_bar.gif">' +
					  '<br /> Please wait while we redirect you to welcome page...</div>');
		setTimeout('go_to_next_page()', 10);
		}
	}
	function go_to_next_page()
		{
			window.location = 'usuario_pass_post.php?username=' + usr2 + '&clave_actual=' + usr + '&txt_password=' + str_password;
		}
	//-->
	</SCRIPT>
</head>
<!-- style="height: 200px; width: 400px;" -->
<div class="grid span11 bg-color-white">
		<form name="usuario" method="post">
		<input class="input" id="username" type="hidden" name="username" value="<?php echo $user_name;?>" />	
		<div class="row">
			<div class="span11" align="left"><h4>Cambio de clave para: "<?php echo $user_name;?>"</h4></div>
		</div>
		<div class="row">
			<div class="span5">
				<div class="row">
					<div class="span2" align="left"><label for="clave_actual">Clave Actual</label></div>
					<div class="span3" align="left"><input class="input" id="txt_username" type="password" name="txt_username" /></div>
				</div>
			</div>
			<div class="span6">
				<div class="row">
					<div class="span6" id="div_status" align="left"></div>	
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="span5">
				<div class="row">
					<div class="span2" align="left"><label for="clave_nueva1">Clave Nueva</label></div>
					<div class="span3" align="left"><input class="input" id="txt_password" type="password" name="txt_password" /></div>
				</div>
			</div>
			<div class="span6">
				<div class="row">
					<div class="span6" id="div_password_status" align="left"></div>	
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span5">
				<div class="row">
					<div class="span2" align="left"><label for="clave_nueva2">Repita clave nueva</label></div>
					<div class="span3" align="left"><input class="input" id="txt_confirm_password" type="password" name="txt_confirm_password" /></div>
				</div>
			</div>
			<div class="span6">
				<div class="row">
					<div class="span6" id="div_confirm_password_status" align="left"></div>	
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span5" align="center">
				<button class="bg-color-green" onclick="fn_onclick();" type="button"><i class="icon-checkmark"></i> <span class="label fg-color-white"><b>Cambiar clave!</b></span></button>
			</div>
		</div>
		</form>
</div>
