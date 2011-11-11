
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>formal</title>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="en-us" />
<meta name="ROBOTS" content="ALL" />
<meta name="Copyright" content="Copyright (c) Jeebus" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" />

<style type="text/css">

BODY
  {
    color: black;
	  font-family: Verdana, Arial;
	  font-size: 11px;
	  background-color: gainsboro;
	  padding: 6px;
	  margin: 0px;
	  border: 0px;
  }
  
.check
  {
    position: static;
    font: 11px verdana, arial, sans-serif;
    font-family: Tahoma, Verdana, Arial, sans-serif;
    font-size: 11px;
	  font-weight: bold;
	  color: crimson;
	  padding: 2px;
  }	
  
.additionalInfo
  {
    font-family: Tahoma, Verdana, Arial, sans-serif;
    font-size: 10px;
	  font-weight: bold;
	  color: crimson;
	  padding-left: 4px;
	  cursor: hand;
	  cursor: pointer;
  }  
  
.formElement
  {
  	padding: 0px;
  	border: 0px;
  	margin: 0px;
  	
  	padding-bottom: 10px;
  }
  
</style>

<script type="text/javascript" src="Validator.js"></script>
<script type="text/javascript">

function initTree()
  {
  	top.frames['FAQ'].document.location.href = 'faq.html';
  }

function selectedFolder()
  {
  	return(top.frames['FAQ'].MenuRef.lastSelectedItem);
  }

function confirmSubmit()
  {
  	/* on load, the menu has nothing (no element reference)
  	 * this checks for an actual element reference (tagName),
  	 * which would mean a folder is selected.
  	 */
  	if(selectedFolder().tagName)
  	  {
  	  	var fID = selectedFolder().id;
  	  	
  	  	var frm = document.getElementById('daform');
  	  	frm.action = 'updateFolders.php';
  	  	
  	  	/*
  	  	 * root elements (elements attached to tree root)
  	  	 * have no id. this translates into a
  	  	 * parentID of 0(zero) in the DB table
  	  	 */
  	  	frm.parentID.value = (fID == '') ? 0 : fID;

  	  	frm.submit();
  	  }
  	else
  	  {
  	  	alert('No folder selected');
  	  }
  }

</script>

</head>
<body onload="initTree()">

<form class="formContainer" id="daform" method="post" action="javascript:confirmSubmit()">

<div id="label" class="formElement">
  <label>
   	Item Label:
	 	<span class="formElementInput">
   		<input 	type="text" 
		   	   		size="20" 
			   			maxlength="30" 
		  	 			name="label" 
		   				value="" />
  	</span>
	</label>
</div>

<div id="userLevel" class="formElement">
  <label>Folder Viewable by:
    <label>
   	  Members
	 	  <span class="formElementInput">
   		  <input 	type="radio" 
		  	 			  name="userLevel" 
		   				  value="2" />
  	  </span>
    </label>
    <label>
     	Guests
	 	  <span class="formElementInput">
   		  <input 	type="radio" 
		    	 			name="userLevel" 
		     				value="1" />
  	  </span>
    </label>
    <label>
      All
	 	  <span class="formElementInput">
   		  <input 	type="radio" 
		  	   			name="userLevel" 
		   		  		value="3" 
		   	  			checked="true" />
  	  </span>
    </label>
  </label>
</div>

				
<div id="siteSkin" class="formElement">
  	<label>
    	Site Skin:
  		<span class="formElementInput">
			<select name="siteSkin">
        <option value="default" selected>DateCam</option>
        <option value="cupid">CupidCams</option>
        <option value="ggwild">GirlsGoneWild</option>
        <option value="ratecam">RateCam</option>
        <option value="adultac">AdultActionCam</option>
        <option value="shempcam">ShempCam</option>
        <option value="sexycamfinder">SexyCamFinder</option>
        <option value="gcruise">GCruise</option>
        <option value="flirtingcams">Flirtingcams</option>
        <option value="coedactioncam">coedactioncam</option>
			</select>
  		</span>
	</label>
</div>

<div id="icon" class="formElement">
  <label>
   	Icon:
	 	<span class="formElementInput">
   		<input 	type="text" 
		   	   		size="20" 
			   			maxlength="30" 
		  	 			name="icon" 
		   				value="" 
		   				validate="false" />
  	</span>
	</label>
</div>

<div id="submitButton" class="formSubmitButton">
	<input 	type="button" 
			onclick="return Validator.attemptSubmit(this);" 
			value="Append to tree" />
</div>

<input type="hidden" name="parentID" value="" />

</form>

</body>
</html>