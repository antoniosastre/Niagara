<?php

function ticketTrabImprenta() {

	global $trabajoImp;

	$texto = "";

	$texto = $texto . chr(27) . chr(69) . "\x01";	//Negrita
	$texto = $texto . chr(29) . chr(33) . "\x11";	//Tamaño x2x2
	$texto = $texto . "************************\n";
	$texto = $texto . chr(29) . chr(33) . chr(85);	//Tamaño x6x6

	$texto = $texto . "IMPRIMIR\n";

	$texto = $texto . chr(29) . chr(33) . "\x11";	//Tamaño x2x2	

	$texto = $texto . "************************\n\n";

	$texto = $texto . chr(27) . chr(69) . "\x02";	//Sin negrita
	$texto = $texto . chr(29) . chr(33) . chr(31);	//Tamaño x1x1

	$texto = $texto . $trabajoImp['notas'];

	//$texto = str_replace("\x00", "\x31", $texto);

	$noesc = array("\n", " ");
	$escaped   = array("\\n", "\\s");

	$texto = str_replace($noesc, $escaped, $texto);

	return $texto;

}

function ticketTrabCd() {

	global $trabajoCd;

	return str_replace(" ", "\x03", $trabajoCd['notas']);



}



?>