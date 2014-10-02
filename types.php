<html>
<head>
<?php include 'head.php'; ?>
</head>
<body>
<?php include 'topmenu.php'; ?>

<div id="wrapper">
    <div id="content">

<div id="typescreator">


<?php

if (isset($_POST["submit"]) && $_GET['new']=='type') {
    insertType($_POST['name']);
}

if (isset($_POST["submit"]) && $_GET['new']=='subtype') {
    //echo "insertSubType(".$_POST['name'].", ".$_POST['type'].");";
    insertSubType($_POST['name'], $_POST['type']);
}
?>

<table>
  <tr>
    <td><h2>Nuevo Tipo</h2></td>
    <td><h2>Nuevo Subtipo</h2></td>
  </tr>

<tr>
    <td>

<form action="types.php?new=type" method="post" id="newtype">
    Name: <br /><input type="text" name="name"><br /><br />
    <input class="btn btn-info" type="submit" value="Añadir" name="submit">
</form>

    </td>
    <td>


<form action="types.php?new=subtype" method="post" id="newsubtype">
    Name: <br /><input type="text" name="name"><br /><br />
    Type: <br />

<select name="type" form="newsubtype">
  <?php

  $res = allTypes();

    while ($linea = mysqli_fetch_array($res)){
      echo "<option value=\"".$linea['id']."\">".$linea['type']."</option>";
    }
  ?>
</select>
    <input class="btn btn-info" type="submit" value="Añadir" name="submit">
</form>


    </td>
  </tr>

</table>


</div>

<div id="typescontainer">
<table border="1">
<tr>
 <td>Type</td>
 <td>Subtype</td>
 </tr>
<?php 

  $resulta = allTypesWithSubtypes();

   while($material = mysqli_fetch_array($resulta)){
 
 echo "<tr>
 <td>".$material['type']."</td>
 <td>".$material['subtype']."</td>
 </tr>";
        
      
  }
  
?>
</table>
</div>


    </div>
</div>

</body>
</html>
