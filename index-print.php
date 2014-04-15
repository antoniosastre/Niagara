<html>
<head>
	<?php include "print.php" ?>
</head>
<body>

<p>Buscando impresora...</p>
	<button onClick=setPrinter("raw") >Set</button>
<p>Imprimiendo...</p>
	<textarea cols="30" rows="4" id="texto"></textarea><br>
	<button onClick=print(document.getElementById("texto").value)>Print</button>
	<p id="result">Resultado</p>
</body>
</html>