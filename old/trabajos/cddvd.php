<?php

function cabTrabCddvd(){

	global $nota;
	global $contenidoCrearNota;
	global $numnota;
	global $count;

	$resultado = trabajosCddvd($nota['id']);
	 	while(mysqli_fetch_array($resultado)){
			$contenidoCrearNota = $contenidoCrearNota. "<li><a href=\"#tdn-".$numnota."-".$count."\">".($count+1)." - CD/DVD</a></li>";
			$count++;
		}

}


function tabTrabCddvd(){

	global $nota;
	global $contenidoCrearNota;
	global $numnota;
	global $count;
	global $trabajoCddvd;


	$resultado = trabajosCddvd($nota['id']);
					 	while($trabajoCddvd = mysqli_fetch_array($resultado)){

				 			$contenidoCrearNota = $contenidoCrearNota."\n<div id=\"tdn-".$numnota."-".$count."\">";
				 			$contenidoCrearNota = $contenidoCrearNota. $trabajoCddvd['nombre'];
				 			$contenidoCrearNota = $contenidoCrearNota. "<script>tickets[1][".$numnota."][".$count."] = \"".ticketTrabCddvd()."\";</script>";
				 			$contenidoCrearNota = $contenidoCrearNota. "\n<br><br><button id=\"btdn-".$numnota."-".$count."\" onClick=\"imprimir(".$numnota.", ".$count.");\">Ticket</button>";
				 			$contenidoCrearNota = $contenidoCrearNota. " <button>Editar</button>";	
				 			$contenidoCrearNota = $contenidoCrearNota. "\n</div>";
				 			$count++;

				 		}

}


function ticketTrabCddvd() {

	global $trabajoCddvd;
	global $nota;

	$texto = "";

	$texto = "Cliente: " . $nota['cliente'] . "\n";

	$texto = $texto . chr(27) . chr(69) . "\x01";	//Negrita
	$texto = $texto . chr(29) . chr(33) . "\x11";	//Tamaño x2x2
		$texto = $texto . chr(27) . chr(97) . "\x01";	//Centrado
	$texto = $texto . "************************\n";
	$texto = $texto . chr(29) . chr(33) . "\x55";	//Tamaño x6x6

	$texto = $texto . "CD/DVD\n";

	$texto = $texto . chr(29) . chr(33) . "\x11";	//Tamaño x2x2	

	$texto = $texto . "************************\n\n";

			$texto = $texto . chr(27) . chr(97) . chr(31);	//Izquierda

	$texto = $texto . chr(27) . chr(69) . "\x02";	//Sin negrita
	$texto = $texto . chr(29) . chr(33) . chr(31);	//Tamaño x1x1

	$texto = $texto . $trabajoCddvd['nombre'];

//Código de barras.

	$texto = $texto . "\n\n";

	$texto = $texto . chr(27) . chr(97) . "\x01";	//Centrado

	$texto = $texto . chr(29) . chr(104) . "\x50";

	$texto = $texto . chr(29) . chr(119) . "\x02";

	$texto = $texto . chr(29) . chr(72) . "\x02";

	$texto = $texto . chr(29) . chr(107) . "\x04" . $nota['id'] . "-2-" . $trabajoCddvd['id'] . chr(31);

//Fin del código de barras.

	$noesc = array("\n");
	$escaped = array("\\n");

	$texto = str_replace($noesc, $escaped, $texto);

	return $texto;

}

?>