<?php
echo "<div class=\"element-task\" style=\"background:";
echo taskStatusColor($task['status']);
echo  "\">";
?>


<table width="100%" height="100%" border="0">
	<tr>
		<td colspan="2" width="20%" style="text-align:center; font-size:75%"><?php echo getTaksTypeName($task['type'])." - ".taskStatusName($task['status']) ?></td>
	</tr>
	<tr>
		<td width="60%" style="text-align:left; font-size:75%">Resp: <?php echo getWorkerNameById($task['worker']) ?></td>
		<td width="40%" style="text-align:right; font-size:75%">Precio: <?php echo str_replace(".", ",", $task['price']); ?> €</td>
	</tr>
	<tr>
		<td colspan="2" width="20%" style="text-align:left; font-size:75%"><textarea><?php echo $task['comment'] ?></textarea></td>
	
	</tr>
	
</table>
</div>