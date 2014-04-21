<?php include 'db.php' ?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Notas</a></li>
		<li><a href="#tabs-2">Gestionar Nota</a></li>
		<li><a href="#tabs-3">Descarga de Archivos</a></li>
	</ul>
	<div id="tabs-1">
		<?php include 'tabs/notas.php' ?>
	</div>
	<div id="tabs-2">
		<?php include 'tabs/gestionar.php' ?>
	</div>
	<div id="tabs-3">
		<?php include 'tabs/descarga.php' ?>
	</div>
</div>