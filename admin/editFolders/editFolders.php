
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Untitled</title>

<script language="Javascript" type="text/javascript" src="../../menu/$Error.js"></script>
<script language="Javascript" type="text/javascript" src="../../menu/XMLHTTP.js"></script>
<script language="JavaScript" type="text/javascript" src="../../menu/Menu.js"></script>

<script language="Javascript">

var MenuRef = new Menu();

function init()
  {
	  // disable text selection in IE
	  document.onselectstart = function() { return false; }
		// disable text selection in others
		document.onmousedown = function() { return false; }
		document.onclick = function() { return true; }

		// load the menu
		MenuRef.load('getFolderTree.php','mContainer');
  }
	
</script>

</head>
<body onload="init()">

<table width=100%><tr><td valign=top><div class="container" id="mContainer"></div></td><td valign=top><div id="mContainer2"></div></td></tr></table>

</body>
</html>
