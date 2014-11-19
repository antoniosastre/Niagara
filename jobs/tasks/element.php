<?php
echo "<div class=\"element-task\" style=\"background:";
echo taskStatusColor($task['status']);
echo  ";

/* Firefox */
height: -moz-calc(100% - 52px);
/* WebKit */
height: -webkit-calc(100% - 52px);
/* Opera */
height: -o-calc(100% - 52px);
/* Standard */
height: calc(100% - 52px);

overflow-y:scroll;

\" id=\"task-".$task['job']."-".$numtasks."\">";
?>


<table width="100%" border="0" style="




">
	<tr>
		<td colspan="2" width="20%" style="text-align:center; font-size:75%"><?php echo getTaksTypeName($task['type'])." - ".taskStatusName($task['status']) ?></td>
	</tr>
	
	<tr>
		<td width="60%" style="text-align:left; font-size:75%">Resp: <?php echo getWorkerNameById($task['worker']) ?></td>
		<td width="40%" style="text-align:right; font-size:75%">Precio: <?php echo str_replace(".", ",", $task['price']); ?> €</td>
	</tr>

	<tr><td>

	<?php

	$propertiesList = getAllProperties();

	for ($i=0; $i < mysqli_num_rows($propertiesList) ; $i++) { 
		
		$thisproperty = mysqli_fetch_array($propertiesList);
		$propertiesOfThis =	getProperties($thisproperty['table'],$task['id']);

		while ($propertyToPrint = mysqli_fetch_array($propertiesOfThis)) {
		
			switch ($thisproperty['id']) {
	    		case 1:
	        		echo "-Dirección";
	        		break;
	   			case 2:
	        		echo "-Color";
	        		break;
	    		case 3:
	        		echo "-Fecha";
	        		break;
	    		case 4:
	        		echo "-Dúplex";
	        		break;
	    		case 5:
	        		echo "-Acabado";
	        		break;
	    		case 6:
	        		echo "-Hora";
	        		break;
	    		case 7:
	        		echo "-Tintas";
	        		break;
	    		case 8:
	        		echo "-Enlace";
	        		break;
	    		case 9:
	        		echo "-Material";
	        		break;
	    		case 10:
	        		echo "-Cantidad";
	        		break;
	    		case 11:
	        		echo "-Tamaño";
	        		break;
	    		case 12:
	        		echo "-Archivo";
	        		break;
	    		case 13:
	        		echo "-Empresa";
	        		break;
	        }

		}

	}

	?>

</td></tr>


	<tr>
		<td colspan="2" width="20%" style="text-align:left; font-size:75%">Comentario:<br><textarea rows="3" cols="51"><?php echo $task['comment'] ?></textarea></td>
	
	</tr>
	
</table>
</div>