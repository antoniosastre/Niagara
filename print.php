<script type="text/javascript" src="js/deployJava.js"></script>
<script type="text/javascript" src="js/funciones-imp.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/html2canvas.js"></script>
<script type="text/javascript" src="js/jquery.plugin.html2canvas.js"></script>



<?php 

function setPrinter($name){

	echo "<button onClick=findPrinter(\"".$name."\")>Find</button>";

}


function printText($text){

	echo "<button onClick=printESCP()>Find</button>";

}


?>