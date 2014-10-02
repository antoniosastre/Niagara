	/**
	* Optionally used to deploy multiple versions of the applet for mixed
	* environments.  Oracle uses document.write(), which puts the applet at the
	* top of the page, bumping all HTML content down.
	*/
	deployQZ();
	
	/**
	* Deploys different versions of the applet depending on Java version.
	* Useful for removing warning dialogs for Java 6.  This function is optional
	* however, if used, should replace the <applet> method.  Needed to address 
	* MANIFEST.MF TrustedLibrary=true discrepency between JRE6 and JRE7.
	*/
	function deployQZ() {
		var attributes = {id: "qz", code:'qz.PrintApplet.class', 
			archive:'qz-print.jar', width:1, height:1};
		var parameters = {jnlp_href: 'qz-print_jnlp.jnlp', 
			cache_option:'plugin', disable_logging:'false', 
			initial_focus:'false'};
		if (deployJava.versionCheck("1.7+") == true) {}
		else if (deployJava.versionCheck("1.6+") == true) {
			attributes['archive'] = 'jre6/qz-print.jar';
			parameters['jnlp_href'] = 'jre6/qz-print_jnlp.jnlp';
		}
		deployJava.runApplet(attributes, parameters, '1.5');
		findPrinter("raw");
	}
	
	/**
	* Automatically gets called when applet has loaded.
	*/
	function qzReady() {
		// Setup our global qz object
		window["qz"] = document.getElementById('qz');
		var title = document.getElementById("title");
		if (qz) {
			try {
				title.innerHTML = title.innerHTML + " " + qz.getVersion();
				document.getElementById("content").style.background = "#F0F0F0";

			} catch(err) { // LiveConnect error, display a detailed meesage
				document.getElementById("content").style.background = "#F5A9A9";
				alert("ERROR:  \nThe applet did not load correctly.  Communication to the " + 
					"applet has failed, likely caused by Java Security Settings.  \n\n" + 
					"CAUSE:  \nJava 7 update 25 and higher block LiveConnect calls " + 
					"once Oracle has marked that version as outdated, which " + 
					"is likely the cause.  \n\nSOLUTION:  \n  1. Update Java to the latest " + 
					"Java version \n          (or)\n  2. Lower the security " + 
					"settings from the Java Control Panel.");
		  }
	  }
	}
	
	/**
	* Returns whether or not the applet is not ready to print.
	* Displays an alert if not ready.
	*/
	function notReady() {
		// If applet is not loaded, display an error
		if (!isLoaded()) {
			return true;
		}
		// If a printer hasn't been selected, display a message.
		else if (!qz.getPrinter()) {
			alert('Please select a printer first by using the "Detect Printer" button.');
				  findPrinter("raw");
			return true;
		}
		return false;
	}
	
	/**
	* Returns is the applet is not loaded properly
	*/
	function isLoaded() {
		if (!qz) {
			alert('Error:\n\n\tPrint plugin is NOT loaded!');
			return false;
		} else {
			try {
				if (!qz.isActive()) {
					alert('Error:\n\n\tPrint plugin is loaded but NOT active!');
					return false;
				}
			} catch (err) {
				alert('Error:\n\n\tPrint plugin is NOT loaded properly!');
				return false;
			}
		}
		return true;
	}
	
	/**
	* Automatically gets called when "qz.print()" is finished.
	*/
	function qzDonePrinting() {
		// Alert error, if any
		if (qz.getException()) {
			alert('Error printing:\n\n\t' + qz.getException().getLocalizedMessage());
			qz.clearException();
			return; 
		}
		
		// Alert success message
		//alert('Successfully sent print data to "' + qz.getPrinter() + '" queue.');
	}
	
	
	/***************************************************************************
	* Prototype function for finding the closest match to a printer name.
	* Usage:
	*    qz.findPrinter('zebra');
	*    window['qzDoneFinding'] = function() { alert(qz.getPrinter()); };
	***************************************************************************/
	function findPrinter(name) {
		// Get printer name from input box
		//var p = document.getElementById('printer');
		//if (name) {
		//	p.value = name;
		//}
		
		if (isLoaded()) {
			// Searches for locally installed printer with specified name
			qz.findPrinter(name);
			
			// Automatically gets called when "qz.findPrinter()" is finished.
			window['qzDoneFinding'] = function() {
				var p = document.getElementById('printer');
				var printer = qz.getPrinter();
				
				// Alert the printer name to user
				alert(printer !== null ? 'Printer found: "' + printer + 
					'" after searching for "' + p.value + '"' : 'Printer "' + 
					p.value + '" not found.');
				
				// Remove reference to this function
				window['qzDoneFinding'] = null;
			};
		}
	}
	 
	/***************************************************************************
	* Prototype function for printing raw ESC/POS commands
	* Usage:
	*    qz.append('\n\n\nHello world!\n');
	*    qz.print();
	***************************************************************************/
	function apendarimp(text) {

	while( text.indexOf("\\n") > -1)
      {
        text = text.replace("\\n", "\n");
      }


		if (notReady()) { return; }
		
			cabeceraImp();

		while( text.indexOf(chr(31)) > -1)
      {

      	var nulo = text.indexOf(chr(31));

      	qz.append(text.substring(0,nulo));
      	qz.appendHex("x00");
      	text = text.substring(nulo+1);
       
      }

			qz.append(text);

			pieImp();

			qz.print();
			
			// Remove any reference to this function
			window['qzDoneAppending'] = null;
	}


	function cabeceraImp(){
		qz.setEncoding("ISO8859-15");
		qz.append("\x1B\x40");
		qz.appendHex("x1Bx74x28");
		qz.appendHex("x1Dx62x31");

	}

	function pieImp(){

		qz.append(" \r\n");
		qz.append(" \r\n");
		qz.append("\x1D\x56\x41");
		qz.append("\x1B\x40"); 

	}

	/***************************************************************************
	* Prototype function for printing a text or binary file containing raw 
	* print commands.
	* Usage:
	*    qz.appendFile('/path/to/file.txt');
	*    window['qzDoneAppending'] = function() { qz.print(); };
	***************************************************************************/ 
	function printFile(file) {
		if (notReady()) { return; }
		
		// Append raw or binary text file containing raw print commands
		qz.appendFile(getPath() + "misc/" + file);
		
		// Automatically gets called when "qz.appendFile()" is finished.
		window['qzDoneAppending'] = function() {
			// Tell the applet to print.
			qz.print();
			
			// Remove reference to this function
			window['qzDoneAppending'] = null;
		};
	}
	
	/***************************************************************************
	* Prototype function for printing a graphic to a PostScript capable printer.
	* Not to be used in combination with raw printers.
	* Usage:
	*    qz.appendImage('/path/to/image.png');
	*    window['qzDoneAppending'] = function() { qz.printPS(); };
	***************************************************************************/ 
	function printImage(scaleImage) {
		if (notReady()) { return; }
		
		// Optional, set up custom page size.  These only work for PostScript printing.
		// setPaperSize() must be called before setAutoSize(), setOrientation(), etc.
		if (scaleImage) {
			qz.setPaperSize("8.5in", "11.0in");  // US Letter
			//qz.setPaperSize("210mm", "297mm");  // A4
			qz.setAutoSize(true);
			//qz.setOrientation("landscape");
			//qz.setOrientation("reverse-landscape");
			//qz.setCopies(3); //Does not seem to do anything
		}
		
		// Append our image (only one image can be appended per print)
		qz.appendImage(getPath() + "img/image_sample.png");
		
		// Automatically gets called when "qz.appendImage()" is finished.
		window['qzDoneAppending'] = function() {
			// Tell the applet to print PostScript.
			qz.printPS();
			
			// Remove reference to this function
			window['qzDoneAppending'] = null;
		};
	}
	

	
	/***************************************************************************
	* Prototype function to force Unix to use the terminal/command line for
	* printing rather than the Java-to-CUPS interface.  This will write the 
	* raw bytes to a temporary file, then execute a shell command. 
	* (i.e. lpr -o raw temp_file).  This was created specifically for OSX but 
	* may work on several Linux versions as well.
	*    qz.useAlternatePrinting(true);
	*    qz.append('\n\nHello World!\n\n');
	*    qz.print();
	***************************************************************************/ 
	function useAlternatePrinting() {
		if (isLoaded()) {
			var alternate = qz.isAlternatePrinting();
			qz.useAlternatePrinting(!alternate);
			alert('Alternate CUPS printing set to "' + !alternate + '"');
		}
	}
	
	/***************************************************************************
	****************************************************************************
	* *                          HELPER FUNCTIONS                             **
	****************************************************************************
	***************************************************************************/
	
	
	/***************************************************************************
	* Gets the current url's path, such as http://site.com/example/dist/
	***************************************************************************/
	function getPath() {
		var path = window.location.href;
		return path.substring(0, path.lastIndexOf("/")) + "/";
	}
	
	/**
	* Fixes some html formatting for printing. Only use on text, not on tags!
	* Very important!
	*   1.  HTML ignores white spaces, this fixes that
	*   2.  The right quotation mark breaks PostScript print formatting
	*   3.  The hyphen/dash autoflows and breaks formatting  
	*/
	function fixHTML(html) {
		return html.replace(/ /g, "&nbsp;").replace(/’/g, "'").replace(/-/g,"&#8209;"); 
	}
	
	/**
	* Equivelant of VisualBasic CHR() function
	*/
	function chr(i) {
		return String.fromCharCode(i);
	}
	
	/***************************************************************************
	* Prototype function for allowing the applet to run multiple instances.
	* IE and Firefox may benefit from this setting if using heavy AJAX to
	* rewrite the page.  Use with care;
	* Usage:
	*    qz.allowMultipleInstances(true);
	***************************************************************************/ 
	function allowMultiple() {
	  if (isLoaded()) {
		var multiple = qz.getAllowMultipleInstances();
		qz.allowMultipleInstances(!multiple);
		alert('Allowing of multiple applet instances set to "' + !multiple + '"');
	  }
	}