<?php

date_default_timezone_set('Europe/Madrid');

$conexion = mysqli_connect("localhost", "root", "root", "notas");

echo "<div id=\"dbstatus\">DB: ";

if (mysqli_connect_errno($conexion))
  {
  echo "ERR." . mysqli_connect_error();
  }else{
  echo "OK";
  }

 echo "</div>";

function todasnotas(){
	global $conexion;
	$que = "SELECT * FROM notas ORDER BY prioridad DESC";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function trabajosImp($id){
	global $conexion;
	$que = "SELECT * FROM trab_imp WHERE nota='".$id."' ORDER BY id";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function trabajosCd($id){
	global $conexion;
	$que = "SELECT * FROM trab_cddvd WHERE nota='".$id."' ORDER BY id";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function trabajosAnapurna($id){
	global $conexion;
	$que = "SELECT * FROM trab_anapurna WHERE nota='".$id."' ORDER BY id";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function prioColor($id){
	global $conexion;
	$que = "SELECT color FROM prio_color WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['color'];

}
/*

function todosclientes(){
	global $conexion;
	$que = "SELECT * FROM clientes ORDER BY nombre, apellidos DESC";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function idsclientesnotasdiego(){
	global $conexion;
	$que = "SELECT DISTINCT cliente FROM notas WHERE asignado='8'";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function todasnotasnoarchi(){
	global $conexion;
	$que = "SELECT * FROM notas WHERE asignado!='12' ORDER BY prioridad DESC";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function querynotas($asig, $est, $cli){
	global $conexion;
	
	if($asig=="t" && $est=="t"){
		$que = "SELECT * FROM notas WHERE asignado!='12' ORDER BY prioridad DESC";
	}else if($asig=="t"){
		$que = "SELECT * FROM notas WHERE asignado!='12' AND estado='".$est."' ORDER BY prioridad DESC";
	}else if($est=="t"){
		$que = "SELECT * FROM notas WHERE asignado='".$asig."' ORDER BY prioridad DESC";
	}else{
		$que = "SELECT * FROM notas WHERE asignado='".$asig."' AND estado='".$est."' ORDER BY prioridad DESC";
	}
	$res = mysqli_query($conexion,$que);
	return $res;
}

function notasasiga($num){
	global $conexion;
	if($num=="t"){
		$que = "SELECT * FROM notas WHERE asignado!='12'";
	}else{
	$que = "SELECT * FROM notas WHERE asignado='".$num."'";
	}
	$res = mysqli_query($conexion,$que);
	return $res;
}

function notasestado($num){
	global $conexion;
	$que = "SELECT * FROM notas WHERE estado='".$num."'";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function notasasigyestad($asig, $est){
	global $conexion;
	if($asig=="t"){
		$que = "SELECT * FROM notas WHERE estado='".$est."' AND asignado!='12'";
	}else{
	$que = "SELECT * FROM notas WHERE estado='".$est."' AND asignado='".$asig."'";
	}
	$res = mysqli_query($conexion,$que);
	return $res;
}

function estadotexto($nestado){
	switch ($nestado){
	case 0:
		return "Stand By...";
	case 1:
		return "Pendiente Diseño";
	case 2:
		return "Pendiente Materiales";
	case 3:
		return "Pendiente Impresión";
	case 4:
		return "Pendiente Manipulado";
	case 5:
		return "Pendiente Instalación";
	case 6:
		return "Pendiente Recogida/Entrega";
	case 7:
		return "Pendiente Facturar";
	case 8:
		return "Pendiente Pago";
	
}
}

function todosmostrar(){
	global $conexion;
	$que = "SELECT mostrar FROM usuarios ORDER BY orden ASC";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function todosidymostrar(){
	global $conexion;
	$que = "SELECT id, mostrar FROM usuarios ORDER BY orden ASC";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function contrasenade($usuario){
	global $conexion;
	$que = "SELECT pass FROM usuarios WHERE usuario='".$usuario."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['pass'];
}

function archivosde($nota){
	global $conexion;
	$que = "SELECT * FROM archivos WHERE nota='".$nota."'";
	$res = mysqli_query($conexion,$que);
	return $res;
}

**

/*function emailcliente($cliente){
	global $conexion;
	$que = "SELECT email FROM clientes WHERE id='".$cliente."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['email'];
}*/

/* function notabyid($id){
	global $conexion;
	$que = "SELECT * FROM notas WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea;
}

function nombrearchivobyid($id){
	global $conexion;
	$que = "SELECT * FROM archivos WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['nombre'];
}

*/

/*function nombrecliente($cliente){
	global $conexion;
	$que = "SELECT nombre, apellidos FROM clientes WHERE id='".$cliente."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['nombre']." ".$linea['apellidos'];
}

function telfcliente($cliente){
	global $conexion;
	$que = "SELECT telefono FROM clientes WHERE id='".$cliente."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['telefono'];
}*/

/*
function usuariomostrar($usuario){
	global $conexion;
	$que = "SELECT mostrar FROM usuarios WHERE id='".$usuario."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return utf8_encode($linea['mostrar']);
}

function usuarionombre($usuario){
	global $conexion;
	$que = "SELECT nombre FROM usuarios WHERE id='".$usuario."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return utf8_encode($linea['nombre']);
}

function usuarioid($usuario){
	global $conexion;
	$que = "SELECT id FROM usuarios WHERE usuario='".$usuario."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return utf8_encode($linea['id']);
}

function notasdeestecliasignadasdiegoidyestado($idusuario, $estado){
	global $conexion;
	$que = "SELECT id FROM notas WHERE cliente='".$idusuario."' AND  estado='".$estado."'";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function clientebyid($id){
	global $conexion;
	$que = "SELECT * FROM clientes WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea;
}


function idultimanota(){
	global $conexion;
	$que = "SELECT id FROM notas ORDER BY id DESC LIMIT 0 , 1";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['id'];
}

function idultimocliente(){
	global $conexion;
	$que = "SELECT id FROM clientes ORDER BY id DESC LIMIT 0 , 1";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['id'];
}
*/
function fechanormal($fecha){
	preg_match( "#([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})#", $fecha, $mifecha); 
	$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
	return $lafecha;
}

function fechasql($fecha){
	preg_match( "#([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})#", $fecha, $mifecha);
	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
	return $lafecha; }

?>

<script>

	function saveComentGeneral(nota, texto){

		alert("Nota: "+nota+"\nTexto: "+texto);

	}

</script>









