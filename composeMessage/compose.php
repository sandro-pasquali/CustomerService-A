<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	
	<style type="text/css">
	
	BODY
	  {
	  	border: 0px;
	  	margin: 2px;
	  	padding: 0px;
	  }
	
	</style>

	<script language="JavaScript" type="text/javascript" src="richtext.js"></script>
	
</head>
<body>


<form name="RTEDemo" action="demo.htm" method="post" onsubmit="return submitForm();">
<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync before submitting form
	//to sync only 1 rte, use updateRTE(rte)
	//to sync all rtes, use updateRTEs
	updateRTE('rte1');
	//updateRTEs();
	alert("rte1 = " + document.RTEDemo.rte1.value);
	
	//change the following line to true to submit form
	return false;
}

//Usage: initRTE(imagesPath, includesPath, cssFile)
initRTE("images/", "", "");
//-->
</script>

<table width="100%">
<form id="compose">
<tr><td width="50">

To: </td><td><input type="text" style="width: 99%;" />

</td></tr>

<tr><td width="50">

Subject: </td><td><input type="text" style="width: 99%;" />

</td></tr>
</form>
</table>

<br />

<script language="JavaScript" type="text/javascript">

writeRichText('rte1', '<P class="MsoNormal" style="MARGIN: 0cm 0cm 0pt"></P>', '99%', '344', true, false);



</script>

</form>

</body>
</html>