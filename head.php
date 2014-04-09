<link href="css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include 'db.php' ?>

<script>
	$(function() {

			$( "#tabs" ).tabs();
			$( ".notas-de-nota" ).tabs();
			$( ".trabajos-de-nota" ).tabs();
			$( "#notascrearnota" ).tabs();
			$( "#selectornotas" ).buttonset();
			$( ".elemento-nota").width(400).height(600).css({'float':'left', 'margin-top':'20px', 'margin-right':'20px'});

			$("#dia-nuevanota").dialog({
				autoOpen: false,
				modal: true,
				buttons: [
					{text: "Cancelar", click: function() { $(this).dialog("close");}},
					{text: "Guardar", click: function() { $(this).dialog("close");}}
					],
				hide: true,
				position: "top+10",
				width: 800
			});
			$("#abrir-nuevanota").button().click(function () {
				$("#dia-nuevanota").dialog("open");
			});

		});
</script>

<!-- <script>
	$(function() {
		
		$( "#accordion" ).accordion();
		

		
		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		$( "#autocomplete" ).autocomplete({
			source: availableTags
		});
		

		
		$( "#button" ).button();
		$( "#radioset" ).buttonset();
		

		
		$( "#tabs" ).tabs();
		

		
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 400,
			buttons: [
				{
					text: "Ok",
					click: function() {
						$( this ).dialog( "close" );
					}
				},
				{
					text: "Cancel",
					click: function() {
						$( this ).dialog( "close" );
					}
				}
			]
		});

		// Link to open the dialog
		$( "#dialog-link" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
		});
		

		
		$( "#datepicker" ).datepicker({
			inline: true
		});
		

		
		$( "#slider" ).slider({
			range: true,
			values: [ 17, 67 ]
		});
		

		
		$( "#progressbar" ).progressbar({
			value: 20
		});
		

		// Hover states on the static widgets
		$( "#dialog-link, #icons li" ).hover(
			function() {
				$( this ).addClass( "ui-state-hover" );
			},
			function() {
				$( this ).removeClass( "ui-state-hover" );
			}
		);
	});
	</script> -->

<style>
	body{
		font: 62.5% "Trebuchet MS", sans-serif;
		margin: 50px;
	}

	#notacontainer:before,
	#notacontainer:after {
 		 content:"";
  		display:table;
	}
	#notacontainer:after {
		  clear:both;
	}
	#notacontainer {
	  zoom:1; /* For IE 6/7 (trigger hasLayout) */
	}

	#tabla-menu-notas {
		font: 100% "Trebuchet MS", sans-serif;
	}
	</style>

<!--		
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	 -->