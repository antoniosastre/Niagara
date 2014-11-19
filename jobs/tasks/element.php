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

\" id=\"task-".$task['id']."\">";
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
	<tr>
		<td colspan="2" width="20%" style="text-align:left; font-size:75%"><textarea rows="2" cols="51"><?php echo $task['comment'] ?></textarea></td>
	
	</tr>

	<tr><td colspan="2" style="text-align:left; font-size:75%">

	<?php

	$propertiesList = getAllProperties();

	for ($i=0; $i < mysqli_num_rows($propertiesList) ; $i++) { 
		
		$thisproperty = mysqli_fetch_array($propertiesList);
		$propertiesOfThis =	getProperties($thisproperty['table'],$task['id']);

		while ($propertyToPrint = mysqli_fetch_array($propertiesOfThis)) {
		
			switch ($thisproperty['id']) {
	    		case 1: //prp_address
	       			echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".$propertyToPrint['street1']."<br>".$propertyToPrint['street2']."<br>".$propertyToPrint['city']."<br>(".$propertyToPrint['zip'].") ".$propertyToPrint['state'].", ".$propertyToPrint['country']."</fieldset>";
	        		break;
	   			case 2: //prp_color
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".$propertyToPrint['color']."</fieldset>";
	        		break;
	    		case 3: //prp_date
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".fechanormal($propertyToPrint['date'])."</fieldset>";
	        		break;
	    		case 4: //prp_duplex
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".$propertyToPrint['duplex']."</fieldset>";
	        		break;
	    		case 5: //prp_finish
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".$propertyToPrint['finish']."</fieldset>";
	        		break;
	    		case 6: //prp_hour
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".substr($propertyToPrint['hour'], 0, 5)."</fieldset>";
	        		break;
	    		case 7: //prp_inks
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".$propertyToPrint['inks']."</fieldset>";
	        		break;
	    		case 8: //prp_link
	        		if($propertyToPrint['title']){
	        			echo "<fieldset><legend>".$propertyToPrint['as']."</legend><a href=\"".$propertyToPrint['url']."\" target=\"_blank\">".$propertyToPrint['title']."</a></fieldset>";
	        		}else{
	        			echo "<fieldset><legend>".$propertyToPrint['as']."</legend><a href=\"".$propertyToPrint['url']."\">".$propertyToPrint['url']."</a></fieldset>";
	        		}
	        		break;
	    		case 9: //prp_material
	    			$material = materialById($propertyToPrint['material']);

	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>";
	        		echo $material['name'];
	        		echo "<br>";
	        		echo $material['type']." - ".$material['subtype'];
	        		if ($material['description']) echo "<br>Descripción: ".$material['description'];
	        		if ($material['comment']) echo "<br>Comentario: ".$material['comment'];
	        		echo "</fieldset>";
	        		break;
	    		case 10: //prp_quantity
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".$propertyToPrint['quantity']."</fieldset>";
	        		break;
	    		case 11: //prp_size
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>".$propertyToPrint['value']."</fieldset>";
	        		break;
	    		case 12: //prp_file
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend><a href=\"".$propertyToPrint['file_url']."\" download=\"".$propertyToPrint['file_name']."\" target=\"_blank\">".$propertyToPrint['file_name']."</a></fieldset>";
	        		break;
	    		case 13: //prp_company
	        		echo "<fieldset><legend>".$propertyToPrint['as']."</legend>";
	        		echo "Empresa: ".$propertyToPrint['name'];
	        		echo "<br>";
	        		if ($propertyToPrint['contact_person']) echo "Contacto: ".$propertyToPrint['contact_person']."<br>";
	        		if ($propertyToPrint['phone']) echo "Telf: ".$propertyToPrint['phone']." ";
	        		if ($propertyToPrint['email']) echo "Email: <a href=\"mailto:".$propertyToPrint['email']."\">".$propertyToPrint['email']."</a>";
	        		if ($propertyToPrint['phone'] || $propertyToPrint['email']) echo "<br>";

	        		if ($propertyToPrint['nifcif']) echo "Nif/Cif: ".$propertyToPrint['nifcif']." ";
	        		if ($propertyToPrint['web']) echo "Web: <a href=\"".$propertyToPrint['web']."\">".$propertyToPrint['web']."</a>";
	        		if ($propertyToPrint['web'] || $propertyToPrint['nifcif']) echo "<br>";

	        		if ($propertyToPrint['street1']) echo $propertyToPrint['street1']."<br>";
	        		if ($propertyToPrint['street2']) echo $propertyToPrint['street2']."<br>";
	        		if ($propertyToPrint['city']) echo $propertyToPrint['city']."<br>";
	        		if ($propertyToPrint['zip']) echo "(".$propertyToPrint['zip'].") ";
	        		if ($propertyToPrint['state'] || $propertyToPrint['country']) echo $propertyToPrint['state'].", ".$propertyToPrint['country'];

	        		echo "</fieldset>";
	        		break;
	        }

		}

	}

	?>

	</td>
</tr>

	
</table>
</div>