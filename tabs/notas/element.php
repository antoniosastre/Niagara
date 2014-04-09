<div class="elemento-nota" style="background:#ccc;">
<?php
echo "ID: ".$nota['id']."<br />";
echo "Editando: ".$nota['isediting']."<br />";
echo "Prio: ".$nota['prioridad']."<br />";
echo "Trabajo: ".$nota['trabajo']."<br />";
echo "In: ".$nota['fecha_in']."<br />";
echo "Out: ".$nota['fecha_out']."<br />";
echo "Cliente: ".$nota['cliente']."<br />";
echo "Nota Clie: ".$nota['notacliente']."<br />";
echo "Pre: ".$nota['precio']."<br />";
?>

<div class="notas-de-nota">
	<ul>
		<li><a href="#ndn-<?php echo $nota['id']?>-1">General</a></li>
		<li><a href="#ndn-<?php echo $nota['id']?>-2">Impresión</a></li>
		<li><a href="#ndn-<?php echo $nota['id']?>-3">Manipulado</a></li>
		<li><a href="#ndn-<?php echo $nota['id']?>-4">Entrega</a></li>
	</ul>
	<div id="ndn-<?php echo $nota['id']?>-1">
		<textarea rows="5" cols="56"><?php echo $nota['nota_gen'] ?></textarea>
	</div>
	<div id="ndn-<?php echo $nota['id']?>-2">
		<textarea rows="5" cols="56"><?php echo $nota['nota_imp'] ?></textarea>
	</div>
	<div id="ndn-<?php echo $nota['id']?>-3">
		<textarea rows="5" cols="56"><?php echo $nota['nota_man'] ?></textarea>
	</div>
	<div id="ndn-<?php echo $nota['id']?>-4">
		<textarea rows="5" cols="56"><?php echo $nota['nota_ent'] ?></textarea>
	</div>
</div>

</div>