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
    echo $_POST['name']."<br>".$_POST['subtype']."<br>".$_POST['description']."<br>".$_POST['comment'];
}
?>

<form action="materiales.php" method="post">
    Name: <br /><input type="text" name="name"><br /><br />
    Subtype: <br /><input type="text" name="subtype"><br /><br />
    Description: <br /><input type="text" name="description"><br /><br />
    Comment: <br /><input type="text" name="comment"><br /><br />
    <input class="btn btn-info" type="submit" value="Añadir" name="submit">
</form>



Hola <?php echo htmlspecialchars($_POST['name']); ?>.
Usted tiene <?php echo (int)$_POST['subtype']; ?> años.


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




</body>
</html>
