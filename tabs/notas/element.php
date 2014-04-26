
<div class="elemento-nota" style="background:<?php echo prioColor($nota['prioridad']); ?>;">

<table width="100%" height="100%" border="0">
	<tr height="4%">
		<td colspan="3" width="40%" style="text-align:left; font-size:75%">ID: <?php echo $nota['id'] ?></td>
		<td colspan="3" width="40%" style="text-align:right; font-size:75%">Prio: <?php echo $nota['prioridad'] ?></td>
	</tr>
	<tr height="15%">
		<td colspan="6" style="text-align:center; font-size:110%"><?php echo $nota['trabajo'] ?></td>
	</tr>
	<tr height="4%">
		<td colspan="3" style="text-align:center; font-size:90%"><table width="100%" style="font-size:90%"><tr><td style="text-align:left;">In:</td><td style="text-align:center;"><?php echo fechanormal($nota['fecha_in']) ?></td></tr></table></td>
		<td colspan="3" style="text-align:center; font-size:90%"><table width="100%" style="font-size:90%"><tr><td style="text-align:left;">Out:</td><td style="text-align:center;"><?php echo fechanormal($nota['fecha_out']) ?></td></tr></table></td>
	</tr>
	<tr height="10%">
		<td colspan="6" style="text-align:center; font-size:90%"><?php echo $nota['cliente'] ?></td>
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

					
	
					//include_once "trabview.php";
					//include_once "tickets.php";

					include_once "trabajos/anapurna.php";
					include_once "trabajos/cddvd.php";
					include_once "trabajos/colocacion.php";
					include_once "trabajos/diseno.php";
					include_once "trabajos/exterior.php";
					include_once "trabajos/imprenta.php";
					include_once "trabajos/otro.php";
					include_once "trabajos/plotter.php";
					include_once "trabajos/rotulacion.php";
					include_once "trabajos/sublimacion.php";
					include_once "trabajos/vcorte.php";
					
					$count = 0;
					
					$contenidoCrearNota = $contenidoCrearNota."<ul>";

		//---Cabeceras---

				 	cabTrabAnapurna();
					cabTrabCddvd();
					cabTrabColocacion();
					cabTrabDiseno();
					cabTrabExterior();
				 	cabTrabImprenta();
				 	cabTrabOtro();
					cabTrabPlotter();
				 	cabTrabRotulacion();
				 	cabTrabSublimacion();
				 	cabTrabVcorte();

				 	$contenidoCrearNota = $contenidoCrearNota."</ul>";

				 	echo "<script>tickets[1][".$numnota."] = new Array(".($count).");</script>";
				 	echo "<script>tickets[0][".$numnota."] = ".$nota['id'].";</script>";

				  	
				  	$count = 0;


		//---Pestañas---
				  	//Trabajos de Imprenta.
				  	
				  	tabTrabAnapurna();
					tabTrabCddvd();
					tabTrabColocacion();
					tabTrabDiseno();
					tabTrabExterior();
				 	tabTrabImprenta();
				 	tabTrabOtro();
					tabTrabPlotter();
				 	tabTrabRotulacion();
				 	tabTrabSublimacion();
				 	tabTrabVcorte();

	
				  	

					  $contenidoCrearNota = $contenidoCrearNota. "</div>";

					 

			if ($count != 0) {
				echo $contenidoCrearNota;
			}else{

				echo "<br><br><div style=\"text-align:center; font-size:200%;\"><button class=\"crear-trabajo-nota\" onClick=\"notaalanadir(".$nota['id'].");\">Añadir Trabajo</button></div>";
			}
				  
				?>

				

		</td>
	</tr>
	<tr height="4%">
		<td colspan="5" width="54%" style="text-align:left; font-size:62%;">
			<button>Edit.</button>
			<?php
			if ($count!=0) {
				echo "<button>Imp. Trbjs.</button> ";
				echo "<button class=\"crear-trabajo-nota\" onClick=\"notaalanadir(".$nota['id'].")\">Añdr. Trbj.</button>";
			}
			?>

		</td>
		<td colspan="1" width="46%" style="text-align:right; font-size:75%;">Precio: <?php echo str_replace(".", ",", $nota['precio']); ?> €</td>
	</tr>
</table>





</div>