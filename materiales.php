<html>
<head>
<meta charset="utf-8">
</head>
<body>

<div id="materialcreator">


<?php

include 'db.php';

if (isset($_POST["submit"])) {
    insertMaterial($_POST['name'],$_POST['subtype'],$_POST['description'],$_POST['comment']);
}
?>

<form action="materiales.php" method="post" id="newmaterial">
    Name: <br /><input type="text" name="name"><br /><br />
    Subtype: <br />

<select name="subtype" form="newmaterial">
  <?php

  $res = allSubtypesWithTypes();

    while ($linea = mysqli_fetch_array($res)){
      

      if ($actual != $linea['type']) {
        $actual = $linea['type'];
        echo "<option disabled> • ".$linea['type']."</option>";
      }

      echo "<option value=\"".$linea['id']."\">".$linea['subtype']."</option>";
    }


  ?>
  



</select>



    <br /><br />
    Description: <br /><input type="text" name="description"><br /><br />
    Comment: <br /><input type="text" name="comment"><br /><br />
    <input class="btn btn-info" type="submit" value="Añadir" name="submit">
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
 <td>".$material['type']."</td>
 <td>".$material['subtype']."</td>
 <td>".$material['description']."</td>
 <td>".$material['comment']."</td>
 </tr>";
        
      
  }
  
?>
</table>
</div>




</body>
</html>
