<?php
function viewTrabImp(){

	global $trabajoImp;

	$texto = $trabajoImp['coment'];

	return $texto;


}


function viewTrabCd(){

	global $trabajoCd;

	$texto = $trabajoCd['coment'];

	return $texto;

}

function viewTrabAnapurna(){

	global $trabajoAnapurna;

	$texto = $trabajoAnapurna['coment'];

	return $texto;

}


?>