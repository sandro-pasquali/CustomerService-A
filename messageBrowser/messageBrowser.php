<html>
<head>
	<title>ActiveWidgets Grid :: Examples</title>
	<style> body, html {margin:0px; padding: 0px; overflow: hidden;} </style>

	<!-- ActiveWidgets stylesheet and scripts -->
	<link href="ActiveWidgets/runtime/styles/xp/grid.css" rel="stylesheet" type="text/css" ></link>
	<script src="ActiveWidgets/runtime/lib/grid.js"></script>

	<!-- grid format -->

	<style>

		.active-controls-grid {height: 100%; font: menu;}

		.active-column-0 {width: 40px;}
		.active-column-1 {width: 46px;}
		.active-column-2 
		  {
		  	width: 100px; 
		  	cursor:pointer; 
		  	cursor:hand;
		  }

		.active-column-3 
		  {
		  	width: 100px; 
		  	cursor:pointer; 
		  	cursor:hand;
		  }

		.active-column-4 {width: 300px;}

		.active-column-5 {width: 150px;}

		.active-box-image {height: 16px;} /* for firefox 0.8 */

	</style>
</head>
<body>
	<xml id="xmlDataIsland">
		<messages>
			<message>
				<priority>*</priority>
				<flagged>*</flagged>
				<skin>adultac</skin>
				<from>paddrocker</from>
				<subject>Why doesn't anyone love me???</subject>
				<received>8/20/2004 4:01 P.M.</received>
			</message>
			<message>
				<priority>*</priority>
				<flagged>*</flagged>
				<skin>default</skin>
				<from>gsimm1</from>
				<subject>Your site doesn't work!</subject>
				<received>8/20/2004 4:02 P.M.</received>
			</message>
			<message>
				<priority>*</priority>
				<flagged>*</flagged>
				<skin>adultac</skin>
				<from>hornet</from>
				<subject>Why am I so poor!</subject>
				<received>8/20/2004 4:03 P.M.</received>
			</message>
			<message>
				<priority>*</priority>
				<flagged> </flagged>
				<skin>adultac</skin>
				<from>johnson</from>
				<subject>Yeah, god bless america (sic)</subject>
				<received>8/20/2004 4:04 P.M.</received>
			</message>
			<message>
				<priority>*</priority>
				<flagged>*</flagged>
				<skin>flirtingcams</skin>
				<from>LizaJBee</from>
				<subject>I don't know why nobody loves you.</subject>
				<received>8/20/2004 4:05 P.M.</received>
			</message>
		</messages>
	</xml>
	<script>

	//	create ActiveWidgets data model - XML-based table
	var table = new Active.XML.Table;

	//  get reference to the xml data island node
	var xml, node = document.getElementById("xmlDataIsland");

	//	IE
	if (window.ActiveXObject) {
		xml = node;
	}
	//	Mozilla
	else {
		xml = document.implementation.createDocument("","", null);
		xml.appendChild(node.selectSingleNode("*"));
	}
	
	//	provide data XML
	table.setXML(xml);

	//	define column labels
	var columns = ['<img src="images/priority.gif" />', '<img src="images/flagged.gif" />', "skin", "from", "subject", "received"];

	//	create ActiveWidgets Grid javascript object
	var obj = new Active.Controls.Grid;

	// lose row numbering
  obj.setRowHeaderWidth("0px");
  
	//	set the second column template to image+text

	obj.setColumnTemplate(new Active.Templates.Image, 1);

	//	provide column labels
	obj.setColumnProperty("texts", columns);

	//	provide external model as a grid data source
	obj.setDataModel(table);
	
  obj.setAction("click", function(src)
    {

      var rowIndex = src.getProperty("item/index");

      var columnIndex = src.getColumnProperty("index");

      switch(columnIndex) 
        {
          case 2:
            //alert(this.getDataProperty("text", rowIndex, columnIndex));
          break;
          
          case 3:
             alert(this.getDataProperty("text", rowIndex, columnIndex));
          break;
          
          default:
            //window.open(this.getDataProperty("text", rowIndex, columnIndex),"blah");
          break;

        } ;

    }); 

	//	write grid html to the page
	document.write(obj);
	
	</script>

</body>
</html>