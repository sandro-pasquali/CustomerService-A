<?php

$SR = $_SERVER['DOCUMENT_ROOT'];

require_once("$SR/includes/functions.php");
require_once("$SR/includes/inc_dbconfig.php");
require_once("$SR/includes/inc_dbconnect.php"); 

$SQL_WRITE_ID = dbWriteConnect();

$parentID 	= $_POST['parentID'];
$userLevel 	= $_POST['userLevel'];
$label 			= $_POST['label'];
$siteSkin 	= $_POST['siteSkin'];
$icon 			= $_POST['icon'];

$q = "INSERT INTO CSFAQ (parentID,userLevel,label,siteSkin,icon) VALUES('$parentID','$userLevel','$label','$siteSkin','$icon')";

@mysql_query($q,$SQL_WRITE_ID);

header("Location: folderEditor.php");

?>