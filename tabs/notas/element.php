<div class="elemento-nota" style="background:#ccc;border-style:solid;
border-width:1px;">
<?php
echo "ID: ".$nota['id']."<br />";
echo "Editando: ".$nota['isediting']."<br />";
echo "Prio: ".$nota['prioridad']."<br />";
echo "In: ".$nota['fecha_in']."<br />";
echo "Out: ".$nota['fecha_out']."<br />";
echo "Cliente: ".$nota['cliente']."<br />";
echo "Nota Clie: ".$nota['notacliente']."<br />";
echo "Pre: ".$nota['precio']."<br />";
?>

<table>
	<tr>
		<td><?php echo $nota['trabajo'] ?></td>
	</tr>
</table>

<div class="notas-de-nota">
	<ul>
		<li><a href="#ndn-<?php echo $nota['id']?>-1">General</a></li>
		<li><a href="#ndn-<?php echo $nota['id']?>-2">Cliente</a></li>
		<li><a href="#ndn-<?php echo $nota['id']?>-3">Entrega</a></li>
	</ul>
	<div id="ndn-<?php echo $nota['id']?>-1">
		<textarea rows="5" cols="56"><?php echo $nota['nota_gen'] ?></textarea>
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
	$count = 1;

	echo "<ul>";	

	//Trabajos de Imprenta.
	$resultado = trabajosImp($nota['id']);
	 	while($trabajoImp = mysqli_fetch_array($resultado)){
 			echo "<li><a href=\"#tdn-".$nota['id']."-".$count."\">".$count." - Imp.</a></li>";
 			$count++;
 			}
 	//Trabajos de CD/DVD.
 		$resultado = trabajosCd($nota['id']);
	 	while($trabajoCd = mysqli_fetch_array($resultado)){
 			echo "<li><a href=\"#tdn-".$nota['id']."-".$count."\">".$count." - CD</a></li>";	
 			$count++;
 		}

  	echo "</ul>";
  	$count = 1;
  	//Trabajos de Imprenta.

  		$resultado = trabajosImp($nota['id']);
	 	while($trabajoImp = mysqli_fetch_array($resultado)){

 			echo "\n<div id=\"tdn-".$nota['id']."-".$count."\">";
 			echo viewTrabImp();
 			echo "\n<br><br><button onClick=imprimir(\"".ticketTrabImprenta()."\")>Imprimir</button>";
 			echo "\n</div>";
 			$count++;
 		}

 	//Trabajos de CD/DVD.

  		$resultado = trabajosCd($nota['id']);
	 	while($trabajoCd = mysqli_fetch_array($resultado)){

 			echo "\n<div id=\"tdn-".$nota['id']."-".$count."\">";
 			echo viewTrabCd();
 			echo "\n<br><br><button onClick=imprimir(\"".ticketTrabCd()."\")>Imprimir</button>";
 			echo "\n</div>";
 			$count++;

  }
  
?>

</div>

</div>