<div id="dia-nuevanota">
<form action="programa.php?p=procesarcrearnota" method="post" enctype="multipart/form-data">
	<br />
		<fieldset>
			<legend>Título del trabajo</legend>
			<input type="text" name="trabajo" maxlength="99" size="99">
		</fieldset>
	<br />
		<fieldset>
			<legend>Cliente</legend>
			<label for="cliente">Nombre:</label>
			<input type="text" name="cliente" maxlength="99" size="99"><br />
			<label for="notcli">Notas:</label>
			<textarea name="notcli" cols="40" rows="5"></textarea>
		</fieldset>
	<br />
		<fieldset>
		<legend>Atributos</legend>
			<label for="fecha_in">Fecha In:</label>
			<input id="crear_fecha_in" type="date" name="fecha_in" value="<?php echo date("Y-m-d"); ?>">
			<label for="fecha_out">Fecha Out:</label>
			<input id="crear_fecha_out" type="date" name="fecha_out"><br /><br />
			
			<label for="descripcion">Descripción:</label>
			<textarea name="descripcion" cols="30" rows="5">Descripción...</textarea>

			<label for="notas">Notas:</label>
			<textarea name="notas" cols="30" rows="5">Notas...</textarea><br /><br />

<label for="prioridad"> Prioridad:</label>
<select name="prioridad">
	<option value="0">0 - Blanco</option>
    <option value="1">1 - Verde</option>
    <option value="2">2 - Azul</option>
    <option value="3">3 - Amarillo</option>
    <option value="4">4 - Naranja</option>
    <option value="5">5 - Rojo</option>
</select>

<label for="estado"> Estado:</label>
<select name="estado">
	<option value="0">0 - Stand by...</option>
    <option value="1">1 - Pendiente Diseño</option>
    <option value="2">2 - Pendiente Materiales</option>
    <option value="3">3 - Pendiente Impresión</option>
    <option value="4">4 - Pendiente Manipulado</option>
    <option value="5">5 - Pendiente Instalación</option>
    <option value="6">5 - Pendiente Recogida/Entrega</option>
    <option value="7">5 - Pendiente Facturar</option>
    <option value="8">5 - Pendiente Pago</option>
</select><br /><br />

<label for="precio">Precio:</label>
<input type="text" name="precio"> €<br />

</fieldset>
<br />
<fieldset>
	<legend>Notas</legend>
	<div id="notascrearnota">
	<ul>
		<li><a href="#ncn_1">General</a></li>
		<li><a href="#ncn_2">Impresión</a></li>
		<li><a href="#ncn_3">Manipulado</a></li>
		<li><a href="#ncn_4">Entrega</a></li>
	</ul>
	<div id="ncn_1">
		<textarea name="notas" cols="50" rows="5"></textarea>
	</div>
	<div id="ncn_2">
		<textarea name="notas" cols="50" rows="5"></textarea>
	</div>
	<div id="ncn_3">
		<textarea name="notas" cols="50" rows="5"></textarea>
	</div>
	<div id="ncn_4">
		<textarea name="notas" cols="50" rows="5"></textarea>
	</div>
</div>



</fieldset>



<br />
<fieldset>
<legend>Archivos</legend>
<label for="file[]">Archivos:</label>
<input type="file" name="file[]" multiple="multiple"><br>
</fieldset>
</form>
</div>
