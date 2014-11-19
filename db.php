<?php

date_default_timezone_set('Europe/Madrid');

$conexion = mysqli_connect("151.236.36.41", "sastre_notas", "6vd0aN$1", "sastre_notas");

echo "<div id=\"dbstatus\">DB: ";

if (mysqli_connect_errno($conexion))
  {
  echo "ERR." . mysqli_connect_error();
  }else{
  echo "<img src=\"/img/green.gif\" width=\"10\" height=\"10\">";
  }

  if (!$conexion->set_charset("utf8")) {
    printf(" Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
}

 echo "</div>";

function allmaterials(){
	global $conexion;
	$que = "SELECT mt_material.id AS id, mt_material.name AS name, mt_subtype.name AS subtype, mt_material.description AS description, mt_material.comment AS comment, mt_type.name AS type
	FROM mt_material LEFT JOIN mt_subtype ON mt_material.subtype=mt_subtype.id 
	LEFT JOIN mt_type ON mt_subtype.type=mt_type.id
	ORDER BY type,subtype,name ASC";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function materialById($id){
	global $conexion;
	$que = "SELECT mt_material.id AS id, mt_material.name AS name, mt_subtype.name AS subtype, mt_material.description AS description, mt_material.comment AS comment, mt_type.name AS type
	FROM mt_material LEFT JOIN mt_subtype ON mt_material.subtype=mt_subtype.id 
	LEFT JOIN mt_type ON mt_subtype.type=mt_type.id
	WHERE mt_material.id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea;
}

function subtypeNameById($id){
	global $conexion;
	$que = "SELECT name FROM mt_subtype WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['name'];

}

function idTypeFromSubtypeId($id){
	global $conexion;
	$que = "SELECT type FROM mt_subtype WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['type'];
}

function typeNameById($id){
	global $conexion;
	$que = "SELECT name FROM mt_type WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['name'];

}

function insertMaterial($name, $subtype, $description, $comment){
	
	if(!empty($name)){

		global $conexion;
		$que = "INSERT INTO mt_material (name,subtype,description,comment) VALUES (\"".$name."\",".$subtype.",\"".$description."\",\"".$comment."\")";
		mysqli_query($conexion,$que);

		
	}
}

function deleteMaterial($id){
	
	if(!empty($id)){

		global $conexion;
		$que = "DELETE FROM mt_material WHERE id=".$id;
		mysqli_query($conexion,$que);

	}
}


function allSubtypesWithTypes(){

	global $conexion;
	$que = "SELECT mt_subtype.id AS id, mt_subtype.name AS subtype, mt_type.name AS type
	FROM mt_subtype LEFT JOIN mt_type ON mt_subtype.type=mt_type.id 
	ORDER BY type,subtype ASC";
	$res = mysqli_query($conexion,$que);
	return $res;

}

function allTypesWithSubtypes(){

	global $conexion;
	$que = "SELECT mt_subtype.id AS id, mt_subtype.name AS subtype, mt_type.name AS type
	FROM mt_type LEFT JOIN mt_subtype ON mt_type.id=mt_subtype.type 
	ORDER BY type,subtype ASC";
	$res = mysqli_query($conexion,$que);
	return $res;

}


function insertType($name){
	if(!empty($name)){

		global $conexion;
		$que = "INSERT INTO mt_type (name) VALUES (\"".$name."\")";
		mysqli_query($conexion,$que);
	}
}


function insertSubType($name, $type){

if(!empty($name)){

		global $conexion;
		$que = "INSERT INTO mt_subtype (type,name) VALUES (".$type.",\"".$name."\")";
		mysqli_query($conexion,$que);
	}
}

function allTypes(){

	global $conexion;
	$que = "SELECT mt_type.id AS id, mt_type.name AS type
	FROM mt_type
	ORDER BY type ASC";
	$res = mysqli_query($conexion,$que);
	return $res;

}

function materialNameById($id){
	global $conexion;
	$que = "SELECT name FROM mt_material WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['name'];
}

function materialDescriptionById($id){
	global $conexion;
	$que = "SELECT description FROM mt_material WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['description'];
}

function materialCommentById($id){
	global $conexion;
	$que = "SELECT comment FROM mt_material WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['comment'];
}

function materialSubtypeIdById($id){
	global $conexion;
	$que = "SELECT subtype FROM mt_material WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['subtype'];
}

function updateMaterial($id,$name,$subtype,$description,$comment){

	if(!empty($name)){

		global $conexion;
		$que = "UPDATE mt_material SET name=\"".$name."\",subtype=".$subtype.",comment=\"".$comment."\",description=\"".$description."\" WHERE id='".$id."'";
		mysqli_query($conexion,$que);

	}


}

function allJobs(){
	global $conexion;
	$que = "SELECT * FROM jb_jobs ORDER BY priority DESC";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function fechanormal($fecha){
	if ($fecha){
	preg_match( "#([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})#", $fecha, $mifecha); 
	$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
	return $lafecha;
	}
	return null;
}

function fechasql($fecha){
	if ($fecha){
	preg_match( "#([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})#", $fecha, $mifecha);
	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
	return $lafecha;
	}
	return null;
}


function getPriorityColor($id){
	global $conexion;
	$que = "SELECT color FROM jb_priority WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['color'];

}

function taskStatusColor($id){

global $conexion;
	$que = "SELECT color FROM tsk_status WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['color'];

}

function taskStatusName($id){

global $conexion;
	$que = "SELECT name FROM tsk_status WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['name'];

}

function getPriorityName($id){
	global $conexion;
	$que = "SELECT name FROM jb_priority WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['name'];

}

function tasksFromJob($id){

	global $conexion;
	$que = "SELECT * FROM tsk_tasks WHERE id='".$id."' ORDER BY status ASC";
	$res = mysqli_query($conexion,$que);
	return $res;

}

function getTaksTypeName($id){

	global $conexion;
	$que = "SELECT name FROM tsk_types WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['name'];

}

function getWorkerNameById($id){

	global $conexion;
	$que = "SELECT display_name FROM wk_worker WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['display_name'];

}

function allTasksFromJob($id){

	global $conexion;
	$que = "SELECT * FROM tsk_tasks WHERE job='".$id."' ORDER BY status ASC";
	$res = mysqli_query($conexion,$que);
	return $res;

}

function priceTotalJob($id){

	global $conexion;
	$que = "SELECT SUM(price) FROM tsk_tasks WHERE job='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	return $linea['SUM(price)'];

}


function getProperties($table,$id){
	global $conexion;
	$que = "SELECT * FROM ".$table." WHERE task='".$id."'";
	$res = mysqli_query($conexion,$que);
	return $res;
}

function getAllProperties(){
	global $conexion;
	$que = "SELECT * FROM prp_properties";
	$res = mysqli_query($conexion,$que);
	return $res;
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

?>









