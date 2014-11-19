<?php

echo "<meta charset=\"utf-8\">";
echo "<link href=\"css/smoothness/jquery-ui-1.10.4.custom.min.css\" rel=\"stylesheet\">";
echo "<script src=\"js/jquery-2.1.0.min.js\"></script>";
echo "<script src=\"js/jquery-ui-1.10.4.custom.min.js\"></script>";
echo "<link rel=\"stylesheet\" href=\"style.css\">";


?>
	
	<script type="text/javascript">

	$(document).ready(function () {
    	//$('#dialog').dialog(); 
    	$('#buttonEditJob-1').click(function () {
        	//alert('Ok');
        	$('#editJob-1').dialog();
        	//return false;
   	 	});
	
  		$(function() { $( ".tasks" ).tabs(); });

	});

 	 </script>
