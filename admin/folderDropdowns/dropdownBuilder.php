<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
	
<style type="text/css">

BODY
  {
  	margin: 0px;
  	border: 0px;
  	padding: 0px;
  }

input
  {

  }

.selectBox
  {

  }

</style>	
	
</head>

<body>

<?php
 
require_once("../../dbaseLibrary.php");

/*
 * In order to run, this script expects some 
 * variables to exist in $_GET collection.
 *
 * $views_1 		> can see level 1 info ("level" aka site group) > bool
 * $views_2 		> can see level 2 info > bool
 * $views_3 		> can see level 3 info > bool
 *
 * $user_id 		> a customer id
 * $accountID  	> an employee id NOTE: either user_id or accountID, not both
 *
 * $formTarget	> where to direct the 
 */
 
/* 
 * go through the CSFolders dbase, grabbing all folder info
 * and build a proper data structure for the dropdown
 * object
 */
 
/*
 * build the level query limits. 
 * if $user_id, then get user $site_group info
 * and use that.  if $accountID
 */ 
 
$levelQ = ' 
 
?>


<form id="folderDrops">

<script language="Javascript">

colleges = eval(colleges);

var revCollegeLookup = new Array();
var revCount = 0;
var fOut = '';

fOut += '<select class="selectBox" name="stateName" onchange="getColleges(this.form)">';

for(stateName in colleges)
  {
    var resolvedStateName = stateName.replace('_',' ');
	  fOut += '<option value="' + stateName + '">' + resolvedStateName + '</option>\n';
	  revCollegeLookup[stateName.toUpperCase()] = revCount;
	  ++revCount;
  }
  
fOut += '</select>';

fOut += '<select class="selectBox" name="stateColleges" onchange="getCampuses(this.form)"></select><select class="selectBox" name="collegeCampuses"></select>';
  
document.writeln(fOut);

function showCampuses()
  {
    var cForm = document.getElementById('collegesForm');
    cForm.collegeCampuses.style.visibility = 'visible';
  }
  
function hideCampuses()
  {
    var cForm = document.getElementById('collegesForm');
    cForm.collegeCampuses.style.visibility = 'hidden';
  }

function getColleges(form)
  {
    var sName = form.stateName.options[form.stateName.selectedIndex].value;
	  form.stateColleges.options.length = 0 ; // clear this form
	  form.collegeCampuses.options.length = 0 ; // clear the next form
	
	  var collegeList = colleges[sName];

    if(collegeList)
      {
	      for(i=0; i<collegeList.length; i++)
	        {
		        var cName = collegeList[i]['n'].replace('_',' ');
	          form.stateColleges.options[i] = new Option(cName,i);
	        }
	    }
	  
	  form.stateColleges.selectedIndex = 0;
	  
	  getCampuses(form);
  }
  
function getCampuses(form)
  {
    var sName = form.stateName.options[form.stateName.selectedIndex].value;
    var cIndex = form.stateColleges.selectedIndex;
	  var campusList = colleges[sName][cIndex]['s'];
	  form.collegeCampuses.options.length = 0 ; // clear the next form
    
    if(campusList)
      {
        showCampuses();
        for(i=0; i<campusList.length; i++)
	        {
	          var cName = campusList[i];
		        var resName = campusList[i].replace('_',' ');
	          form.collegeCampuses.options[i] = new Option(resName,i);
		      }
		  }
		else
		  {
		    hideCampuses();
		  }
	  
	  form.collegeCampuses.selectedIndex = 0; 
  }

</script>

</form>

<script language="Javascript">

var cForm = document.getElementById('collegesForm');

cForm.stateName.selectedIndex = 1;  
getColleges(cForm);
cForm.stateColleges.selectedIndex = 71;
getCampuses(cForm);

</script>




</body>
</html>