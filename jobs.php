<html>
<head>
<?php include 'head.php'; ?>

<script>
	$(function() {

			$( ".element-job").width(400).height(600).css({'float':'left', 'margin-top':'20px', 'margin-right':'20px'});

			$("#jobscontainer").sortable({
				connectWith: ".element-job",
				items: ".element-job",
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

<button id="open-new-job">Nueva</button>

<div id="jobscontainer">

<?php 

	$resulta = allJobs();

	//echo "<script>var tickets = new Array(2);</script>";
	//echo "<script>tickets[0] = new Array(".mysqli_num_rows($resulta).");</script>";
	//echo "<script>tickets[1] = new Array(".mysqli_num_rows($resulta).");</script>";
	$numjob = 0;
	 while($job = mysqli_fetch_array($resulta)){
  			include 'jobs/element.php';
  			$numjob++;
  		
  }
  
?>

</div>
<div style="clear: both;"></div>
 </div>
</div>

</body>
</html>
