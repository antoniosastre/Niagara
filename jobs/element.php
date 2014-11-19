<?php
echo "<div class=\"element-job\" style=\"background:";
echo getPriorityColor($job['priority']);
echo  "\" id=\"job-".$job['id']."\">";
?>


<table style="width: 100%; height: 100%" border="1">
	<tr height="4%">
		<td colspan="2" width="20%" style="text-align:left; font-size:75%">ID: <?php echo $job['id'] ?></td>
		<td colspan="2" width="60%" style="text-align:center; font-size:75%"><?php echo getPriorityName($job['priority']) ?></td>
		<td colspan="2" width="20%" style="text-align:right; font-size:75%">Prio: <?php echo $job['priority'] ?></td>
	</tr>
	<tr height="15%">
		<td colspan="6" style="text-align:center; font-size:110%"><?php echo $job['title'] ?><br><textarea rows="1" cols="51"></textarea></td>
	</tr>
	<tr height="4%">
		<td colspan="3" width="50%" style="text-align:center; font-size:90%"><table width="100%" style="font-size:90%"><tr><td style="text-align:left;">In:</td><td style="text-align:center;"><?php echo fechanormal($job['date_in']) ?></td></tr></table></td>
		<td colspan="3" width="50%" style="text-align:center; font-size:90%"><table width="100%" style="font-size:90%"><tr><td style="text-align:left;">Out:</td><td style="text-align:center;"><?php echo fechanormal($job['date_out']) ?></td></tr></table></td>
	</tr>
	<tr height="10%">
		<td colspan="6" style="text-align:center; font-size:90%"><?php echo $job['client'] ?></td>
	</tr>
	<tr height="*">
		<td colspan="6" style="font-size:62%; vertical-align:top;" style="width: 100%; height: 100%">

				<?php 

	$resultasks = allTasksFromJob($job['id']);

	echo "<div class=\"tasks\" style=\"height: 380; background: ".getPriorityColor($job['priority'])."\">";
	echo "<ul>";

	$numtasks = 1;

	 while($task = mysqli_fetch_array($resultasks)){

  			echo "<li><a href=\"#task-".$task['id']."\" style=\"background:".taskStatusColor($task['status']).";\">".$numtasks."</a></li>";
  			$numtasks++;
  		
  }

	echo "</ul>";

	$resultasks = allTasksFromJob($job['id']);
	$numtasks = 1;

	 while($task = mysqli_fetch_array($resultasks)){

  			include 'tasks/element.php';
  			$numtasks++;
  		
  }
  
  echo "</div>";
?>

		</td>


			<!-- <div class="tasks-de-task">
				<ul>
					<li><a href="#ndn-<?php echo $task['id']?>-1">task General</a></li>
					<li><a href="#ndn-<?php echo $task['id']?>-2">task de Cliente</a></li>
					<li><a href="#ndn-<?php echo $task['id']?>-3">task de Entrega</a></li>
				</ul>
				<div id="ndn-<?php echo $task['id']?>-1">
					<textarea rows="5" cols="56" oninput="saveComentGeneral(<?php echo $task['id'] ?>,this.value)"><?php echo $task['task_gen'] ?></textarea>
				</div>
				<div id="ndn-<?php echo $task['id']?>-2">
					<textarea rows="5" cols="56"><?php echo $task['taskcliente'] ?></textarea>
				</div>
				<div id="ndn-<?php echo $task['id']?>-3">
					<textarea rows="5" cols="56"><?php echo $task['task_ent'] ?></textarea>
				</div>
			</div> -->
			<?php

			/*
					$contenidoCreartask = "";

				    $contenidoCreartask = $contenidoCreartask."<div class=\"trabajos-de-task\">";

					
	
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
					
					$contenidoCreartask = $contenidoCreartask."<ul>";

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

				 	$contenidoCreartask = $contenidoCreartask."</ul>";

				 	echo "<script>tickets[1][".$numtask."] = new Array(".($count).");</script>";
				 	echo "<script>tickets[0][".$numtask."] = ".$task['id'].";</script>";

				  	
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

	
				  	

					  $contenidoCreartask = $contenidoCreartask. "</div>";

					 

			if ($count != 0) {
				echo $contenidoCreartask;
			}else{

				echo "<br><br><div style=\"text-align:center; font-size:200%;\"><button class=\"crear-trabajo-task\" onClick=\"taskalanadir(".$task['id'].");\">Añadir Trabajo</button></div>";
			}
				*/  
				?>

				


	</tr>
	<tr height="4%">
		<td colspan="3" width="50%" style="text-align:left; font-size:62%;">

			<script type="text/javascript">
				$(document).ready(function () {
    				$('#buttonEditJob-<?php echo $job['id']; ?>').click(function () {
        				$('#editJob-<?php echo $job['id']; ?>').dialog();
   	 				});
				});
			 </script>

			<button id="buttonEditJob-<?php echo $job['id']; ?>">Edit.</button></a>
			<div class="editJob" id="editJob-<?php echo $job['id']; ?>" title="Dialog Title" style="display:none"><iframe src="editjob.php"></iframe></div>
			<?php
			//if ($count!=0) {
				//echo "<button>Imp. Trbjs.</button> ";
				//echo "<button class=\"crear-trabajo-task\" onClick=\"taskalanadir(".$task['id'].")\">Añdr. Trbj.</button>";
			//}
			?>

		</td>
		<td colspan="3" width="50%" style="text-align:right; font-size:75%;">Precio: <?php echo str_replace(".", ",", priceTotalJob($job['id'])); ?> €</td>
	</tr>
</table>





</div>