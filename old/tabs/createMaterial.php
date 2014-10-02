<?php

include 'db.php';

if (isset($_POST['submit'])) {

    insertMaterial($_POST['name'],$_POST['subtype'],$_POST['description'],$_POST['comment']);
    echo "Droplet Successfully Added!";

}else{
	echo "Un mojón."
}
?>