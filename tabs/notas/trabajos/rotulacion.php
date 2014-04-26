<?php

function cabTrabRotulacion(){

	global $nota;
	global $contenidoCrearNota;
	global $numnota;
	global $count;

	$resultado = trabajosRotulacion($nota['id']);
	 	while(mysqli_fetch_array($resultado)){
			$contenidoCrearNota = $contenidoCrearNota. "<li><a href=\"#tdn-".$numnota."-".$count."\">".($count+1)." - Rotula.</a></li>";
			$count++;
		}

}


function tabTrabRotulacion(){

	global $nota;
	global $contenidoCrearNota;
	global $numnota;
	global $count;


	$resultado = trabajosRotulacion($nota['id']);
					 	while($trabajoRotulacion = mysqli_fetch_array($resultado)){

				 			$contenidoCrearNota = $contenidoCrearNota."\n<div id=\"tdn-".$numnota."-".$count."\">";
				 			$contenidoCrearNota = $contenidoCrearNota. $trabajoRotulacion['nombre'];
				 			$contenidoCrearNota = $contenidoCrearNota. "<script>tickets[1][".$numnota."][".$count."] = \"".ticketTrabRotulacion()."\";</script>";
				 			$contenidoCrearNota = $contenidoCrearNota. "\n<br><br><button id=\"btdn-".$numnota."-".$count."\" onClick=\"imprimir(".$numnota.", ".$count.");\">Ticket</button>";
				 			$contenidoCrearNota = $contenidoCrearNota. " <button>Editar</button>";	
				 			$contenidoCrearNota = $contenidoCrearNota. "\n</div>";
				 			$count++;

				 		}

}


function ticketTrabRotulacion() {

	global $trabajoRotulacion;
	global $nota;

	$texto = "";

	$texto = "Cliente: " . $nota['cliente'] . "\n";

	$texto = $texto . chr(27) . chr(69) . "\x01";	//Negrita
	$texto = $texto . chr(29) . chr(33) . "\x11";	//Tamaño x2x2
		$texto = $texto . chr(27) . chr(97) . "\x01";	//Centrado
	$texto = $texto . "************************\n";
	$texto = $texto . chr(29) . chr(33) . "\x55";	//Tamaño x6x6

	$texto = $texto . "IMPRIMIR\n";

	$texto = $texto . chr(29) . chr(33) . "\x11";	//Tamaño x2x2	

	$texto = $texto . "************************\n\n";

			$texto = $texto . chr(27) . chr(97) . chr(31);	//Izquierda

	$texto = $texto . chr(27) . chr(69) . "\x02";	//Sin negrita
	$texto = $texto . chr(29) . chr(33) . chr(31);	//Tamaño x1x1

	$texto = $texto . $trabajoRotulacion['nombre'];

//Código de barras.

	$texto = $texto . "\n\n";

	$texto = $texto . chr(27) . chr(97) . "\x01";	//Centrado

	$texto = $texto . chr(29) . chr(104) . "\x50";

	$texto = $texto . chr(29) . chr(119) . "\x02";

	$texto = $texto . chr(29) . chr(72) . "\x02";

	$texto = $texto . chr(29) . chr(107) . "\x04" . $nota['id'] . "-1-" . $trabajoRotulacion['id'] . chr(31);

//Fin del código de barras.

	$noesc = array("\n");
	$escaped = array("\\n");

	$texto = str_replace($noesc, $escaped, $texto);

	return $texto;

}

?>