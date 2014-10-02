<html>
<head>
<meta charset="utf-8">
</head>
<body>

<div id="materialcreator">


<?php

include 'db.php';

if (isset($_POST["submit"])) {
    if (isset($_GET["sm"])) {
      updateMaterial($_GET["sm"],$_POST['name'],$_POST['subtype'],$_POST['description'],$_POST['comment']);
    }else{
      insertMaterial($_POST['name'],$_POST['subtype'],$_POST['description'],$_POST['comment']);
    }
}


if (isset($_GET["dm"])) {
    deleteMaterial($_GET['dm']);
}



if (isset($_GET["em"])) {


echo "<form action=\"materiales.php?sm=".$_GET["em"]."\" method=\"post\" id=\"editmaterial\">";


 echo "Name: <br /><input type=\"text\" name=\"name\" value=\"".materialNameById($_GET["em"])."\"><br /><br />";
    echo "Subtype: <br />";

echo "<select name=\"subtype\" form=\"editmaterial\">";

  $res = allSubtypesWithTypes();

    while ($linea = mysqli_fetch_array($res)){
      

      if ($actual != $linea['type']) {
        $actual = $linea['type'];
        echo "<option disabled> • ".$linea['type']."</option>";
      }

      if(materialSubtypeIdById($_GET["em"]) == $linea['id']){
        echo "<option selected value=\"".$linea['id']."\">".$linea['subtype']."</option>";
      }else{
        echo "<option value=\"".$linea['id']."\">".$linea['subtype']."</option>";
      }
      
    }

echo "</select>";



echo "<br /><br />";
echo "Description: <br /><input type=\"text\" name=\"description\" value=\"".materialDescriptionById($_GET["em"])."\"><br /><br />";
echo "Comment: <br /><input type=\"text\" name=\"comment\" value=\"".materialCommentById($_GET["em"])."\"><br /><br />";
echo "<input class=\"btn btn-info\" type=\"submit\" value=\"Añadir\" name=\"submit\">";
echo "</form>";

}else{

echo "<form action=\"materiales.php\" method=\"post\" id=\"newmaterial\">";
echo "Name: <br /><input type=\"text\" name=\"name\"><br /><br />";
echo "Subtype: <br />";

echo "<select name=\"subtype\" form=\"newmaterial\">";

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

<?php

}

?>







</div>

<div id="materialcontainer">
<table border="1">
<tr>
 <td>Acciones</td>
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
 <td><a href=\"materiales.php?dm=".$material['id']."\"><img src=\"img/trash.png\" height=\"20\" width=\"20\"></a> <a href=\"materiales.php?em=".$material['id']."\"><img src=\"img/edit.png\" height=\"16\" width=\"16\"></a></td>
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
