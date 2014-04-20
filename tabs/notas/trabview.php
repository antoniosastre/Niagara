<?php
function viewTrabImp(){

	global $trabajoImp;

	$texto = $trabajoImp['notas'];

	return $texto;


}


function viewTrabCd(){

	global $trabajoCd;

	$texto = $trabajoCd['notas'];

	return $texto;

}


?>