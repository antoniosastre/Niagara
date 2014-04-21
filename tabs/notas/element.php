<div class="elemento-nota" style="background:<?php echo prioColor($nota['prioridad']); ?>;">

<table width="100%" height="100%">
	<tr>
		<td style="text-align:left; font-size:75%">ID: <?php echo $nota['id'] ?></td>
		<td style="text-align:right; font-size:75%">Prio: <?php echo $nota['prioridad'] ?></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center; font-size:110%"><?php echo utf8_encode($nota['trabajo']) ?></td>
	</tr>
	<tr>
		<td style="text-align:center; font-size:90%"><table width="100%" style="font-size:90%"><tr><td style="text-align:left;">In:</td><td style="text-align:center;"><?php echo fechanormal($nota['fecha_in']) ?></td></tr></table></td>
		<td style="text-align:center; font-size:90%"><table width="100%" style="font-size:90%"><tr><td style="text-align:left;">Out:</td><td style="text-align:center;"><?php echo fechanormal($nota['fecha_out']) ?></td></tr></table></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center; font-size:90%"><?php echo utf8_encode($nota['cliente']) ?></td>
	</tr>
	<tr>
		<td colspan="2" style="font-size:62%">

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

							<div class="trabajos-de-nota">

					<?php 
					include_once "trabview.php";
					include_once "tickets.php";
					$count = 0;

					echo "<ul>";	

					//Trabajos de Imprenta.
					$resultado = trabajosImp($nota['id']);
					 	while($trabajoImp = mysqli_fetch_array($resultado)){
				 			echo "<li><a href=\"#tdn-".$numnota."-".$count."\">".($count+1)." - Imp.</a></li>";
				 			$count++;
				 			}
				 	//Trabajos de CD/DVD.
				 		$resultado = trabajosCd($nota['id']);
					 	while($trabajoCd = mysqli_fetch_array($resultado)){
				 			echo "<li><a href=\"#tdn-".$numnota."-".$count."\">".($count+1)." - CD</a></li>";	
				 			$count++;
				 		}
				 	//Trabajos Anapurna
				 	$resultado = trabajosAnapurna($nota['id']);
					 	while($trabajoAnapurna = mysqli_fetch_array($resultado)){
				 			echo "<li><a href=\"#tdn-".$numnota."-".$count."\">".($count+1)." - Anap.</a></li>";	
				 			$count++;
				 		}


				 	echo "<script>tickets[1][".$numnota."] = new Array(".($count).");</script>";
				 	echo "<script>tickets[0][".$numnota."] = ".$nota['id'].";</script>";

				  	echo "</ul>";
				  	$count = 0;
				  	//Trabajos de Imprenta.

				  		$resultado = trabajosImp($nota['id']);
					 	while($trabajoImp = mysqli_fetch_array($resultado)){

					 		//echo "<script>var </script>";

				 			echo "\n<div id=\"tdn-".$numnota."-".$count."\">";
				 			echo viewTrabImp();
				 			echo "<script>tickets[1][".$numnota."][".$count."] = \"".ticketTrabImprenta()."\";</script>";
				 			echo "\n<br><br><button id=\"btdn-".$numnota."-".$count."\" onClick=\"imprimir(".$numnota.", ".$count.");\">Imprimir</button>";
				 			echo "\n</div>";
				 			$count++;

				 		}

				 	//Trabajos de CD/DVD.

				  		$resultado = trabajosCd($nota['id']);
					 	while($trabajoCd = mysqli_fetch_array($resultado)){

				 			echo "\n<div id=\"tdn-".$numnota."-".$count."\">";
				 			echo viewTrabCd();
				 			echo "<script>tickets[1][".$numnota."][".$count."] = \"".ticketTrabCd()."\";</script>";
				 			echo "\n<br><br><button id=\"btdn-".$numnota."-".$count."\" onClick=\"imprimir(".$numnota.", ".$count.");\">Imprimir</button>";
				 			echo "\n</div>";
				 			$count++;

				  }

				  	//Trabajos de Anapurna
					  $resultado = trabajosAnapurna($nota['id']);
						 	while($trabajoAnapurna = mysqli_fetch_array($resultado)){

					 			echo "\n<div id=\"tdn-".$numnota."-".$count."\">";
					 			echo viewTrabAnapurna();
					 			echo "<script>tickets[1][".$numnota."][".$count."] = \"".ticketTrabAnapurna()."\";</script>";
					 			echo "\n<br><br><button id=\"btdn-".$numnota."-".$count."\" onClick=\"imprimir(".$numnota.", ".$count.");\">Imprimir</button>";
					 			echo "\n</div>";
					 			$count++;

					  }
				  
				?>

				</div>

		</td>
	</tr>
	<tr>
		<td style="text-align:left; font-size:60%">
			<button>Añadir Trabajo</button>
			<button>Editar</button>



		</td>
		<td style="text-align:right; font-size:75%">Precio: <?php echo str_replace(".", ",", $nota['precio']); ?> €</td>
	</tr>
</table>





</div>