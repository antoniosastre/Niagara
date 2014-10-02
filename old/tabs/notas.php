
<table id="tabla-menu-notas">
	<tr>
		<td>
<button id="abrir-nuevanota">Nueva</button>
<?php include 'tabs/crearnota.php' ?>
<?php include 'tabs/creartrabajo.php' ?>

		</td>
		<td>
<div id="selectornotas">
		<input type="radio" id="sn_1" name="sn" checked="checked"><label for="sn_1">Todas</label>
		<input type="radio" id="sn_2" name="sn"><label for="sn_2">Hoy</label>
		<input type="radio" id="sn_3" name="sn"><label for="sn_3">Mañana</label>
		<input type="radio" id="sn_4" name="sn"><label for="sn_4">Archivadas</label>
	</div>
		</td>
	</tr>
</table>
	<div style="clear: both;"></div>
<div id="notacontainer">

<?php 

	$resulta = todasnotas();

	echo "<script>var tickets = new Array(2);</script>";
	echo "<script>tickets[0] = new Array(".mysqli_num_rows($resulta).");</script>";
	echo "<script>tickets[1] = new Array(".mysqli_num_rows($resulta).");</script>";
	$numnota = 0;
	 while($nota = mysqli_fetch_array($resulta)){
 
  			include 'notas/element.php';
  			$numnota++;
  		
  }
  
?>

</div>