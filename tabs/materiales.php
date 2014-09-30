<div style="clear: both;"></div>

<div id="materialcreator">


<?php
if (isset($_POST['submit'])) {

    insertMaterial($_POST['name'],$_POST['subtype'],$_POST['description'],$_POST['comment']);
    echo "Droplet Successfully Added!";

}
?>

<form action="tabs/createMaterial.php" method="post">
    Name: <br /><input type="text" name="name"><br /><br />
    Subtype: <br /><input type="text" name="subtype"><br /><br />
    Description: <br /><input type="text" name="description"><br /><br />
    Comment: <br /><input type="text" name="comment"><br /><br />
    <input class="btn btn-info" type="submit" value="Añadir">
</form>




</div>

<div id="materialcontainer">
<table border="1">
<tr>
 <td>ID</td>
 <td>Nombre</td>
 <td>Tipo</td>
 <td>Subtipo</td>
 <td>Descripción</td>
 <td>Comentario</td>
 </tr>
<?php 

	$resulta = allmaterials();

	 while($material = mysqli_fetch_array($resulta)){
 
 echo "<tr>
 <td>".$material['id']."</td>
 <td>".$material['name']."</td>
 <td>".typeNameById($material['type'])."</td>
 <td>".subtypeNameById($material['subtype'])."</td>
 <td>".$material['description']."</td>
 <td>".$material['comment']."</td>
 </tr>";
  			
  		
  }
  
?>
</table>
</div>