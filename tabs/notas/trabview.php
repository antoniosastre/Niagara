<?php
function viewTrabImp(){

	global $trabajoImp;

	$texto = utf8_encode($trabajoImp['coment']);

	return $texto;


}


function viewTrabCd(){

	global $trabajoCd;

	$texto = utf8_encode($trabajoCd['coment']);

	return $texto;

}

function viewTrabAnapurna(){

	global $trabajoAnapurna;

	$texto = utf8_encode($trabajoAnapurna['coment']);

	return $texto;

}


?>