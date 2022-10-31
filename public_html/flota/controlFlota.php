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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
		a{
			text-decoration-line: none;
			color:black;
		}
	</style>
</head>

<body>
	<h2>Control de Flota</h2>
	<hr>
	<table class="table table-success table-striped tabla" style="font-size: 10px;">
		<tr>
			<th>EQUIPO</th>
			<th>PATENTE</th>
			<th title="SEGURO S.O.A.P.">S.O.A.P</th>
			<th title="SEGURO TOTAL">TOTAL</th>
			<th title="SEGURO INTERNACIONAL">INTER.</th>
			<th title="SEGURO DE CARGA">CARGA</th>
			<th title="REVISION TECNICA">R. TECNICA</th>
			<th title="PERMISO DE CIRCULACION">CIRCUL.</th>
			<th title="ACEITE DE MOTOR">ACEITE</th>
			<th title="ACEITE DE CAJA">CAJA</th>
			<th title="DIFERENCIAL">DIFER.</th>
			<th title="NEUMATICOS">NEUMA.</th>
			<th title="OBSERVACIONES">OBS.</th>
		</tr>
		<?php
			$equipo=mysqli_query($conn, "SELECT * FROM `equipos` ORDER BY patente ASC ");
				while($Rst_equipo=mysqli_fetch_array($equipo)){
                    $id_chofer=$Rst_equipo['id_chofer'];
					$Equipo=$Rst_equipo['equipo'];
					$Patente=$Rst_equipo['patente'];
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
					$newDateAceite = $Aceite - $Kilometraje;
					
					if($Aceite <= $Kilometraje){
						$imgAceite='<img src="../img/rojo.png" title="VENCIDA '.$newDateAceite=number_format($newDateAceite,0,'.','.').'" width="15" height="15" align="middle">';
					}if($Aceite >= $Kilometraje){
						$imgAceite='<img src="../img/verde.png" title="VEGENTE '.$newDateAceite=number_format($newDateAceite,0,'.','.').'" width="15" height="15" align="middle">';
					}
					// fin Aceite
					// Caja
					$newDateCaja= $Caja - $Kilometraje;
					
					if($Caja <= $Kilometraje){
						$imgCaja='<img src="../img/rojo.png" title="VENCIDA '.$newDateCaja=number_format($newDateCaja,0,'.','.').'" width="15" height="15" align="middle">';
					}if($Caja >= $Kilometraje){
						$imgCaja='<img src="../img/verde.png" title="VEGENTE '.$newDateCaja=number_format($newDateCaja,0,'.','.').'" width="15" height="15" align="middle">';
					}
					// fin Caja
					// Diferencial
					$newDateDiferencial= $Diferencial  - $Kilometraje;
					
					if($Diferencial <= $Kilometraje){
						$imgDiferencial='<img src="../img/rojo.png" title="VENCIDA '.$newDateDiferencial=number_format($newDateDiferencial,0,'.','.').'" width="15" height="15" align="middle">';
					}if($Diferencial >= $Kilometraje){
						$imgDiferencial='<img src="../img/verde.png" title="VEGENTE '.$newDateDiferencial=number_format($newDateDiferencial,0,'.','.').'" width="15" height="15" align="middle">';
					}
					// fin Diferencial
					// Neumaticos
					$newNeumatico = $Neumaticos - $Kilometraje;
										
					if($Neumaticos <= $Kilometraje){
						$imgNeumaticos='<img src="../img/rojo.png" title="VENCIDA '.$newNeumatico=number_format($newNeumatico,0,'.','.').'" width="15" height="15" align="middle">';
					}if($Neumaticos >= $Kilometraje){
						$imgNeumaticos='<img src="../img/verde.png" title="VEGENTE '.$newNeumatico=number_format($newNeumatico,0,'.','.').'" width="15" height="15" align="middle">';
					}

					// fin Neumaticos
					$Cliente=mysqli_query($conn, "SELECT * FROM `flotaClientes` WHERE rut='$clientes'");
						while($rstCliente=mysqli_fetch_array($Cliente)){
							$NombreCliente=$rstCliente['cliente'];
					
                    $Chofer=mysqli_query($conn, "SELECT * FROM `flotaChoferes` WHERE id_chofer ='$id_chofer'");
                        while($rstChofer=mysqli_fetch_array($Chofer)){
                            $NombreChofer=$rstChofer['chofer'];
                                if($NombreChofer==''){
                                    $NombreChofer='Sin Chofer';
                                }else{
                                    $NombreChofer=$rstChofer['chofer'];
                            }
                        }
                    
                    $titulo = 'TTES: '.$NombreCliente.' - Chofer: '.$NombreChofer.' - Kilometraje: '.$Kilometraje=number_format($Kilometraje,0,'.','.').'';
					
                    echo '
					
					<tr>
						<td>'.$Equipo.'</td>
						<td><a href="expediente.php?patente='.$Patente.'" title="'.$titulo.'">'.$Patente.'</a></td>
						<td title="'.date("d-m-Y", strtotime($Soap)).'"> '.$imgSoap.' <a href="'.$pdfSoap.'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
						<td title="'.date("d-m-Y", strtotime($Total)).'"> '.$imgTotal.' <a href="'.$pdfTotal.'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
						<td title="'.date("d-m-Y", strtotime($Internacional)).'"> '.$imgInternacional.' <a href="'.$pdfInternacional.'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
						<td title="'.date("d-m-Y", strtotime($Carga)).'"> '.$imgCarga.' <a href="'.$pdfCarga.'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
						<td title="'.date("d-m-Y", strtotime($RevsionTecnica)).'"> '.$imgRevisionTecnica.' <a href="'.$pdfRevisionTecnica.'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
						<td title="'.date("d-m-Y", strtotime($Circulacion)).'"> '.$imgCirculacion.' <a href="'.$pdfCirculacion.'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
						<td title="'.$Aceite.'"> '.$imgAceite.'</td>
						<td title="'.$Caja.'"> '.$imgCaja.'</td>
						<td title="'.$Diferencial.'"> '.$imgDiferencial.'</td>
						<td title="'.$Neumaticos.'"> '.$imgNeumaticos.'</td>
						<td>'.$Observaciones.'</td>
					</tr>
					';
					}
				}
		?>
	</table>
</body>
</html>
<?php 
ob_end_flush(); 
?>