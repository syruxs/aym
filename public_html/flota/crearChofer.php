<?php 
ob_start(); 
?>
<?php
session_start();
date_default_timezone_set('America/Santiago');
$ver=$_SESSION['user'];
$s=explode(',',$ver);
	if($s[0]!=""){
	}	else{
		header("Location:../index.php");
		exit;
	}
    require("../admin/conex.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="../js/jquery-3.6.0.js"></script>
<title>Documento sin título</title>
	<style>
		body {
			padding: 10px;
			margin: 10px;
		}
		.tabla{
			box-shadow: 0 12px 28px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.5);
			padding: 10px;
		}
	</style>
</head>

<body>
	<h2>Crear Chofer</h2>
	<hr>
	<form action="" name="formulario" id="formulario">
	<table border="0" width="100%" cellpadding="8" cellspacing="6" class="tabla">
		<tr>
			<td width="16%">
				<label>Nombre del Chofer</label>
			</td>
			<td>
				<input type="text" id="chofer" name="chofer" class="form-control formulario__input" title="Ingresar Cliente" autocomplete="off" placeholder="INGRESAR CLIENTE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
			</td>
			<td>
				<label>R.U.T.</label>
			</td>
			<td>
				<input type="text" name="rut" id="rut" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off" required>
			</td>
		</tr>		
		<tr>
			<td>
				<label>Pais</label>
			</td>
			<td width="37%">
				<select id="pais" name="pais" class="form-control" required>
					<option value="">------------</option>
					<option value="CHILE">CHILE</option>
					<option value="ARGENTINA">ARGENTINA</option>
					<option value="BOLIVIA">BOLIVIA</option>
					<option value="BRASIL">BRASIL</option>
					<option value="PARAGUAY">PARAGUAY</option>
				</select>
			</td>
			<td width="15%">
				<label>Teléfono</label>
			</td>
			<td width="32%">
				<input type="text" id="tel" name="tel" class="form-control" placeholder="00-0-00000000" title="Ingresar teléfono" autocomplete="off" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
			</td>
		</tr>
		<tr>
			<td>
				<label>Dirección</label>
			</td>
			<td>
				<input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la dirección del cliente" title="Ingrese la dirección" autocomplete="off" required>
			</td>
			<td>
				<label>Corre Electrónico</label>
			</td>
			<td>
				<input type="text" id="mail" name="mail" class="form-control" placeholder="Ingrese el correo electrónico" title="Ingrese el correo electrónico"  style="text-transform:lowercase;" onkeyup="javascript:this.value=this.value.lowercase();"autocomplete="off" required>
			</td>
		</tr>
		<tr>
			<td>
				<button type="submit" class="btn btn-primary" id="enviar">GUARDAR</button>
			</td>
			<td colspan="3">
			</td>
		</tr>
	</table>
	<br>
	<div id="respuesta"></div>
	</form>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#formulario").submit(function () {
			enviar();
			$("#formulario")[0].reset();
			return false;
			
		});
		function enviar(){
			$.ajax({
				url: "saveChofer.php", 
				type: "POST", 
				data: {cho: $('#chofer').val(), rut: $('#rut').val(), pais: $('#pais').val(), tel: $('#tel').val(), dir: $('#direccion').val(), mail: $('#mail').val()},
				success: function(e){
					$("#respuesta").html(e);
				}
			});
		setTimeout(function() {
        	$("#respuesta").fadeOut(1500);
    	},3000);
		}
	});
	</script>
</body>
</html>
<?php 
ob_end_flush(); 
?>