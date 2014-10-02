<html>
<head>
<?php include 'head.php'; ?>

<script>
	$(function() {

			$( ".elemento-task").width(400).height(600).css({'float':'left', 'margin-top':'20px', 'margin-right':'20px'});

			$("#notacontainer").sortable({
				connectWith: ".elemento-task",
				items: ".elemento-task",
				opacity: 0.5,
				coneHelperSize: true,
				forcePlaceholderSize: true,
				tolerance: "pointer"
			});


		});
</script>



</head>
<body>
<?php include 'topmenu.php'; ?>

<div id="wrapper">
    <div id="content">
<?php include 'db.php'; ?>

<button id="abrir-nuevanota">Nueva</button>

<div id="notacontainer">

<?php 

	$resulta = allTasks();

	//echo "<script>var tickets = new Array(2);</script>";
	//echo "<script>tickets[0] = new Array(".mysqli_num_rows($resulta).");</script>";
	//echo "<script>tickets[1] = new Array(".mysqli_num_rows($resulta).");</script>";
	$numnota = 0;
	 while($task = mysqli_fetch_array($resulta)){
  			include 'tasks/element.php';
  			$numnota++;
  		
  }
  
?>

</div>
<div style="clear: both;"></div>
 </div>
</div>

</body>
</html>
