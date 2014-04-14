<html>
<head>
</head>
<body>
	<input type=button onClick="print()" value="Print">
<applet id="qz" name="QZ Print Plugin" code="qz.PrintApplet.class" archive="./qz-print.jar" width="100" height="100">
      <param name="printer" value="raw">
</applet>

<script>
      function print() {
         var qz = document.getElementById('qz');
         qz.append('A37,503,0,1,2,3,N,PRINTED USING QZ-PRINT\n');
         // ZPLII
         // qz.append('^XA^FO50,50^ADN,36,20^FDPRINTED USING QZ-PRINT^FS^XZ');  
         qz.print();
      }
</script>
</body>
</html>