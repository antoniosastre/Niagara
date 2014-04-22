<div class="elemento-nota" style="background:<?php echo prioColor($nota['prioridad']); ?>;">

<table width="100%" height="100%" border="0">
	<tr height="4%">
		<td colspan="2" width="40%" style="text-align:left; font-size:75%">ID: <?php echo $nota['id'] ?></td>
		<td colspan="2" width="20%" style="text-align:center; font-size:60%">
			<button>Editar</button>
		</td>
		<td colspan="2" width="40%" style="text-align:right; font-size:75%">Prio: <?php echo $nota['prioridad'] ?></td>
	</tr>
	<tr height="15%">
		<td colspan="6" style="text-align:center; font-size:110%"><?php echo utf8_encode($nota['trabajo']) ?></td>
	</tr>
	<tr height="4%">
		<td colspan="3" style="text-align:center; font-size:90%"><table width="100%" style="font-size:90%"><tr><td style="text-align:left;">In:</td><td style="text-align:center;"><?php echo fechanormal($nota['fecha_in']) ?></td></tr></table></td>
		<td colspan="3" style="text-align:center; font-size:90%"><table width="100%" style="font-size:90%"><tr><td style="text-align:left;">Out:</td><td style="text-align:center;"><?php echo fechanormal($nota['fecha_out']) ?></td></tr></table></td>
	</tr>
	<tr height="10%">
		<td colspan="6" style="text-align:center; font-size:90%"><?php echo utf8_encode($nota['cliente']) ?></td>
	</tr>
	<tr height="*">
		<td colspan="6" style="font-size:62%; vertical-align:top;">

			<div class="notas-de-nota">
				<ul>
					<li><a href="#ndn-<?php echo $nota['id']?>-1">Nota General</a></li>
					<li><a href="#ndn-<?php echo $nota['id']?>-2">Nota de Cliente</a></li>
					<li><a href="#ndn-<?php echo $nota['id']?>-3">Nota de Entrega</a></li>
				</ul>
				<div id="ndn-<?php echo $nota['id']?>-1">
					<textarea rows="5" cols="56" oninput="saveComentGeneral(<?php echo $nota['id'] ?>,this.value)"><?php echo $nota['nota_gen'] ?></textarea>
				</div>
				<div id="ndn-<?php echo $nota['id']?>-2">
					<textarea rows="5" cols="56"><?php echo $nota['notacliente'] ?></textarea>
				</div>
				<div id="ndn-<?php echo $nota['id']?>-3">
					<textarea rows="5" cols="56"><?php echo $nota['nota_ent'] ?></textarea>
				</div>
			</div>
			<?php

					$contenidoCrearNota = "";

							$contenidoCrearNota = $contenidoCrearNota."<div class=\"trabajos-de-nota\">";

					
	
					include_once "trabview.php";
					include_once "tickets.php";
					
					$count = 0;
					
					$contenidoCrearNota = $contenidoCrearNota."<ul>";

					//Trabajos de Imprenta.
					$resultado = trabajosImp($nota['id']);
					 	while($trabajoImp = mysqli_fetch_array($resultado)){
				 			$contenidoCrearNota = $contenidoCrearNota. "<li><a href=\"#tdn-".$numnota."-".$count."\">".($count+1)." - Imp.</a></li>";
				 			$count++;
				 			}
				 	//Trabajos de CD/DVD.
				 		$resultado = trabajosCd($nota['id']);
					 	while($trabajoCd = mysqli_fetch_array($resultado)){
				 			$contenidoCrearNota = $contenidoCrearNota. "<li><a href=\"#tdn-".$numnota."-".$count."\">".($count+1)." - CD</a></li>";	
				 			$count++;
				 		}
				 	//Trabajos Anapurna
				 	$resultado = trabajosAnapurna($nota['id']);
					 	while($trabajoAnapurna = mysqli_fetch_array($resultado)){
				 			$contenidoCrearNota = $contenidoCrearNota. "<li><a href=\"#tdn-".$numnota."-".$count."\">".($count+1)." - Anap.</a></li>";	
				 			$count++;
				 		}

				 	$contenidoCrearNota = $contenidoCrearNota."</ul>";

				 	echo "<script>tickets[1][".$numnota."] = new Array(".($count).");</script>";
				 	echo "<script>tickets[0][".$numnota."] = ".$nota['id'].";</script>";

				  	
				  	$count = 0;
				  	//Trabajos de Imprenta.
				  	
				  		$resultado = trabajosImp($nota['id']);
					 	while($trabajoImp = mysqli_fetch_array($resultado)){

				 			$contenidoCrearNota = $contenidoCrearNota."\n<div id=\"tdn-".$numnota."-".$count."\">";
				 			$contenidoCrearNota = $contenidoCrearNota. viewTrabImp();
				 			$contenidoCrearNota = $contenidoCrearNota. "<script>tickets[1][".$numnota."][".$count."] = \"".ticketTrabImprenta()."\";</script>";
				 			$contenidoCrearNota = $contenidoCrearNota. "\n<br><br><button id=\"btdn-".$numnota."-".$count."\" onClick=\"imprimir(".$numnota.", ".$count.");\">Ticket</button>";
				 			$contenidoCrearNota = $contenidoCrearNota. " <button>Editar</button>";	
				 			$contenidoCrearNota = $contenidoCrearNota. "\n</div>";
				 			$count++;

				 		}

				 	//Trabajos de CD/DVD.

				  		$resultado = trabajosCd($nota['id']);
					 	while($trabajoCd = mysqli_fetch_array($resultado)){

				 			$contenidoCrearNota = $contenidoCrearNota. "\n<div id=\"tdn-".$numnota."-".$count."\">";
				 			$contenidoCrearNota = $contenidoCrearNota. viewTrabCd();
				 			$contenidoCrearNota = $contenidoCrearNota. "<script>tickets[1][".$numnota."][".$count."] = \"".ticketTrabCd()."\";</script>";
				 			$contenidoCrearNota = $contenidoCrearNota. "\n<br><br><button id=\"btdn-".$numnota."-".$count."\" onClick=\"imprimir(".$numnota.", ".$count.");\">Ticket</button>";
				 			$contenidoCrearNota = $contenidoCrearNota. " <button>Editar</button>";	
				 			$contenidoCrearNota = $contenidoCrearNota. "\n</div>";
				 			$count++;

				  }

				  	//Trabajos de Anapurna
					  $resultado = trabajosAnapurna($nota['id']);
						 	while($trabajoAnapurna = mysqli_fetch_array($resultado)){

					 			$contenidoCrearNota = $contenidoCrearNota. "\n<div id=\"tdn-".$numnota."-".$count."\">";
					 			$contenidoCrearNota = $contenidoCrearNota. viewTrabAnapurna();
					 			$contenidoCrearNota = $contenidoCrearNota. "<script>tickets[1][".$numnota."][".$count."] = \"".ticketTrabAnapurna()."\";</script>";
					 			$contenidoCrearNota = $contenidoCrearNota. "\n<br><br><button id=\"btdn-".$numnota."-".$count."\" onClick=\"imprimir(".$numnota.", ".$count.");\">Ticket</button>";
				 				$contenidoCrearNota = $contenidoCrearNota. " <button>Editar</button>";				 			
					 			$contenidoCrearNota = $contenidoCrearNota. "\n</div>";
					 			$count++;

					  }

					  $contenidoCrearNota = $contenidoCrearNota. "</div>";

					  //Crear trabajo
					
					 /*
					echo "\n<div id=\"tdn-".$numnota."-crear\">";

							echo "<div class=\"anadir-trabajo\"id=\"anadir-trabajo-".$numnota."\">";
					echo "<input type=\"radio\" id=\"at-".$numnota."-1\" name=\"at\"><label for=\"at-".$numnota."-1\">Todas</label>";
					echo "<input type=\"radio\" id=\"at-".$numnota."-2\" name=\"at\"><label for=\"at-".$numnota."-2\">Hoy</label>";
					echo "<input type=\"radio\" id=\"at-".$numnota."-3\" name=\"at\"><label for=\"at-".$numnota."-3\">Mañana</label>";
					echo "<input type=\"radio\" id=\"at-".$numnota."-4\" name=\"at\"><label for=\"at-".$numnota."-4\">Archivadas</label>";
					echo "</div>";
					echo "</div>";

					
					echo "<select>";
					echo "<option value=\"sel\">Seleccionar...</option>";
					echo "<option value=\"imprimir\">Diseño</option>";
 					echo "<option value=\"imprimir\">Imprimir</option>";
  					echo "<option value=\"anapurna\">Anapurna</option>";
  					echo "<option value=\"mercedes\">CD/DVD</option>";
  					echo "<option value=\"plotter\">Plotter</option>";
  					echo "<option value=\"vcorte\">Vinilo de Corte</option>";
  					echo "<option value=\"sublimacion\">Sublimación</option>";
  					echo "<option value=\"externo\">Externo</option>";

					echo "</select>";
					*/

			if ($count != 0) {
				echo $contenidoCrearNota;
			}else{

				echo "<br><br><div style=\"text-align:center; font-size:200%;\"><button>Añadir Trabajo</button></div>";
			}
				  
				?>

				

		</td>
	</tr>
	<tr height="4%">
		<td colspan="4" style="text-align:left; font-size:62%;">
			<?php
			if ($count!=0) {
				echo "<button>Añadir Trabajo</button>";
			}
			?>

		</td>
		<td colspan="2" style="text-align:right; font-size:75%;">Precio: <?php echo str_replace(".", ",", $nota['precio']); ?> €</td>
	</tr>
</table>





</div>