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

	$patente=$_GET['patente'];
			$equipo=mysqli_query($conn, "SELECT * FROM `equipos` WHERE patente='$patente'");
				while($Rst_equipo=mysqli_fetch_array($equipo)){
                    $id_chofer=$Rst_equipo['id_chofer'];
					$Equipo=$Rst_equipo['equipo'];
					$Patente=$Rst_equipo['patente'];
					$Pais=$Rst_equipo['pais'];
					$Kilometraje=$Rst_equipo['kilometraje'];
					$clientes=$Rst_equipo['cliente'];
					$Soap=$Rst_equipo['soap'];
					$pdfSoap=$Rst_equipo['pdfSoap'];
					$Total=$Rst_equipo['total'];
					$pdfTotal=$Rst_equipo['pdfTotal'];
					$Internacional=$Rst_equipo['internacional'];
					$pdfInternacional=$Rst_equipo['pdfInternacional'];
					$Carga=$Rst_equipo['carga'];
					$pdfCarga=$Rst_equipo['pdfCarga'];
					$RevsionTecnica=$Rst_equipo['revisionTecnica'];
					$pdfRevisionTecnica=$Rst_equipo['pdfRevisionTecnica'];
					$Circulacion=$Rst_equipo['permisoCirculacion'];
					$pdfCirculacion=$Rst_equipo['pdfPermisoCirculacion'];
					$Aceite=$Rst_equipo['filtroAceite'];
					$Caja=$Rst_equipo['caja'];
					$Diferencial=$Rst_equipo['diferencial'];
					$Neumaticos=$Rst_equipo['neumaticos'];
					$Observaciones=$Rst_equipo['observaciones'];
					
					$hoy=date('Y-m-d', time());
					// Sopa 
					$newDateSopa = strtotime('-30 day' , strtotime($Soap));
					$newDateSopa = date('Y-m-d' , $newDateSopa);

					if($hoy >= $Soap){
						$imgSoap='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($Soap)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateSopa){
						$imgSoap='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($Soap)).'" width="15" height="15" align="middle">';
					}else{
						$imgSoap='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($Soap)).'" width="15" height="15" align="middle">';
					}
					// fin Soap
					// Total
					$newDateTotal = strtotime('-30 day' , strtotime($Total));
					$newDateTotal = date('Y-m-d' , $newDateTotal);

					if($hoy >= $Total){
						$imgTotal='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($Total)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateTotal){
						$imgTotal='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($Total)).'" width="15" height="15" align="middle">';
					}else{
						$imgTotal='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($Total)).'" width="15" height="15" align="middle">';
					}
					// fin Total
					// Internacional
					$newDateInternacional = strtotime('-30 day' , strtotime($Internacional));
					$newDateInternacional = date('Y-m-d' , $newDateInternacional);

					if($hoy >= $Internacional){
						$imgInternacional='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($Internacional)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateInternacional){
						$imgInternacional='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($Internacional)).'" width="15" height="15" align="middle">';
					}else{
						$imgInternacional='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($Internacional)).'" width="15" height="15" align="middle">';
					}
					// fin Internacional
					// Carga
					$newDateCarga = strtotime('-30 day' , strtotime($Carga));
					$newDateCarga = date('Y-m-d' , $newDateCarga);

					if($hoy >= $Carga){
						$imgCarga='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($Carga)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateCarga){
						$imgCarga='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($Carga)).'" width="15" height="15" align="middle">';
					}else{
						$imgCarga='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($Carga)).'" width="15" height="15" align="middle">';
					}
					// fin Carga
					// Revision Tecnica
					$newDateRevisionTecnica = strtotime('-30 day' , strtotime($RevsionTecnica));
					$newDateRevisionTecnica = date('Y-m-d' , $newDateRevisionTecnica);

					if($hoy >= $RevsionTecnica){
						$imgRevisionTecnica='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($RevsionTecnica)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateRevisionTecnica){
						$imgRevisionTecnica='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($RevsionTecnica)).'" width="15" height="15" align="middle">';
					}else{
						$imgRevisionTecnica='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($RevsionTecnica)).'" width="15" height="15" align="middle">';
					}
					// fin Revision Tecnica
					// Circulacion
					$newDateCirculacion = strtotime('-30 day' , strtotime($Circulacion));
					$newDateCirculacion = date('Y-m-d' , $newDateCirculacion);

					if($hoy >= $Circulacion){
						$imgCirculacion='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($Circulacion)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateCirculacion){
						$imgCirculacion='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($Circulacion)).'" width="15" height="15" align="middle">';
					}else{
						$imgCirculacion='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($Circulacion)).'" width="15" height="15" align="middle">';
					}
					// fin Circulacion
					// Aceite 
					$newDateAceite = strtotime('-30 day' , strtotime($Aceite));
					$newDateAceite = date('Y-m-d' , $newDateAceite);

					if($hoy >= $Aceite){
						$imgAceite='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($Aceite)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateAceite){
						$imgAceite='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($Aceite)).'" width="15" height="15" align="middle">';
					}else{
						$imgAceite='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($Aceite)).'" width="15" height="15" align="middle">';
					}
					// fin Aceite
					// Caja
					$newDateCaja= strtotime('-30 day' , strtotime($Caja));
					$newDateCaja = date('Y-m-d' , $newDateCaja);

					if($hoy >= $Caja){
						$imgCaja='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($Caja)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateCaja){
						$imgCaja='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($Caja)).'" width="15" height="15" align="middle">';
					}else{
						$imgCaja='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($Caja)).'" width="15" height="15" align="middle">';
					}
					// fin Caja
					// Diferencial
					$newDateDiferencial= strtotime('-30 day' , strtotime($Diferencial));
					$newDateDiferencial = date('Y-m-d' , $newDateDiferencial);

					if($hoy >= $Diferencial){
						$imgDiferencial='<img src="../img/rojo.png" title="VENCIDA '.date("d-m-Y", strtotime($Diferencial)).'" width="15" height="15" align="middle">';
					}elseif($hoy >= $newDateDiferencial){
						$imgDiferencial='<img src="../img/amarillo.png" title="POR VENCER '.date("d-m-Y", strtotime($Diferencial)).'" width="15" height="15" align="middle">';
					}else{
						$imgDiferencial='<img src="../img/verde.png" title="VEGENTE '.date("d-m-Y", strtotime($Diferencial)).'" width="15" height="15" align="middle">';
					}
					// fin Diferencial
					// Neumaticos
					$newNeumatico = $Neumaticos - $Kilometraje;
					$NewTire = $Kilometraje - 1000;
					
					if($Neumaticos <= $Kilometraje){
						$imgNeumaticos='<img src="../img/rojo.png" title="VENCIDA '.$newNeumatico=number_format($newNeumatico,0,',',',').'" width="15" height="15" align="middle">';
					}if($Neumaticos >= $Kilometraje){
						$imgNeumaticos='<img src="../img/verde.png" title="VEGENTE '.$newNeumatico=number_format($newNeumatico,0,',',',').'" width="15" height="15" align="middle">';
					}

					$Cliente=mysqli_query($conn, "SELECT * FROM `flotaClientes` WHERE rut='$clientes'");
						while($rstCliente=mysqli_fetch_array($Cliente)){
							$NombreCliente=$rstCliente['cliente'];
						}
                    $Chofer=mysqli_query($conn, "SELECT * FROM `flotaChoferes` WHERE id_chofer ='$id_chofer'");
                        while($rstChofer=mysqli_fetch_array($Chofer)){
                            $NombreChofer=$rstChofer['chofer'];
                            if($NombreChofer==''){
                                $NombreChofer='Sin Chofer';
                            }else{
                                $NombreChofer=$rstChofer['chofer'];
                            }
                        }
			}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="../js/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function(){
        $("#kilometraje").on({
				"focus": function (event) {
					$(event.target).select();
				},
				"keyup": function (event) {
					$(event.target).val(function (index, value ) {
						return value.replace(/\D/g, "")
									.replace(/([0-9])([0-9]{0})$/, '$1')
									.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
					});
				}
			});
    });
</script>
<title>:: Expediente del Equipo ::</title>
	<style>
		body {
			padding: 10px;
			margin: 10px;
		}
		.tabla{
			box-shadow: 0 12px 28px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.5);
			padding: 10px;
		}
		a{
			text-decoration-line: none;
			color:black;
		}
	</style>
</head>

<body>
	<h2>Expediente del Equipo <?php echo $patente; ?> <img src="../img/camion.png" width="100" align="middle"></h2>
	<hr>
<table width="100%" border="0" cellpadding="6" cellspacing="6" class="tabla">
	<form action="" name="formulario" id="formulario">
	<tr>
		<td><label>Equipo</label></td>
		<td><input type="text" value="<?php echo $Equipo;?>" class="form-control" readonly></td>
		<td><label>Patente</label></td>
		<td><input type="text" value="<?php echo $Patente;?>" class="form-control" readonly></td>
		<td><label>Pais</label></td>
		<td><input type="text" value="<?php echo $Pais;?>" class="form-control" readonly></td>
	</tr>
	<tr>
		<td><label>Kilometraje</label></td>
		<td>
            <div class="input-group">
                <input type="text" value="<?php echo $Kilometraje;?>" class="form-control" id="kilometraje" name="kilometraje" autocomplete="off" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
                <input class="btn btn-primary" type="button" id="button" value="ACTUALIZAR" title="ACTUALIZAR KILOMETRAJE">
            </div>
        </td>
		<td><label>Cliente</label></td>
		<td><input type="text" value="<?php echo $NombreCliente;?>" class="form-control" readonly></td>
		<td><label>Chofer</label></td>
		<td><input type="text" value="<?php echo $NombreChofer;?>" class="form-control" readonly></td>
	</tr>
	<tr>
		<td colspan="6"><hr></td>
	</tr>
	<tr>
		<td colspan="6"><div id="mostrar"></div></td>
	</tr>
	</form>
</table>
<br>
<table border="0" cellpadding="6" cellspacing="6" class="tabla">
	<tr>
		<td>datos </td>
	</tr>
</table>
<script>
	$(document).ready(function(){
		$("#button").click(function() {
			$.ajax({
				type: "POST",
				url: "actualizarKlm.php",
				data: {km: $('#kilometraje').val(), patente: '<?php echo $patente; ?>'},
				success: function(data){
					$("#mostrar").html(data);
				}
			});
			setTimeout(function() {
        		$("#mostrar").fadeOut(1500);
    		},3000);
		});
	});
</script>
</body>
</html>
<?php 
ob_end_flush(); 
?>