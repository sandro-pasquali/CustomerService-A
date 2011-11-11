<?php

require_once("../../../../includes/functions.php");
require_once("../../../../includes/inc_dbconfig.php");
require_once("../../../../includes/inc_dbconnect.php"); 
require_once("../../scripts/XmlWriter.php");


/*
 * going to get all folder information and convert it
 * into a data structure that will later be turned into
 * xml, which is sent back to requesting client.
 *
 * expecting some vars to exist in $_GET collection:
 */

/*
 * XML output vars
 * 
 * showItemID -- if true, elements itemID (table id)
 * will become its element id
 */
$showItemID = true;

$rootLabel = "Customer Service";

$tableName = "CSFolders";
$DBConditionals = "userLevel = 3 OR userLevel = 1";

$icon = 'folder';
 
$q = "SELECT * FROM $tableName WHERE $DBConditionals ORDER BY parentID ASC";
$result = @mysql_query($q,$SQL_READ_ID);

$list = array();
$parents = array();

/*
 * first, separate all the folders which are attached to
 * the root from all other items.  $parents gets root
 * items; $list gets all others (items with parents)
 */
while($record = @mysql_fetch_array($result, MYSQL_ASSOC))
  {
	  if($record['parentID'] == 0)
	    {
	    	$parents[$record['itemID']] = array();
	    	$parents[$record['itemID']]['info'] = $record;
	    }
	  $list[$record['itemID']] = array('info' => $record, 'children' => array());
  }

/* 
 * now union of children with parents.
 * simply go through $list and attach all 
 * children to their parent[children] array.
 * 
 * this produces a $list with all parent/child
 * information.
 */
 
foreach($list as $fID => $fRec)
  {
	  $parentID = $fRec['info']['parentID'];
	      
	  if($parentID != 0)
	    {
	      $list[$parentID]['children'][] = $fID;
	    }
  }	  
  
/*
 * now build final tree ($parents) by properly nesting
 * all $items within $parents[$fID]['children']. Note
 * that traceTree() is recursive.
 */
foreach($list as $fID => $fRec)
  {
  	// find only root elements and build out children tree
  	if($fRec['info']['parentID'] == 0)
  	  {
  	  	foreach($list[$fID]['children'] as $pos => $childID)
  	  	  {
  	  	  	$parents[$fID]['children'][$pos] = traceTree($childID);
  	  	  }
  	  }
  }

function traceTree($cID)
  {
  	global $list;
  	
  	$retOb['children'] = $list[$cID]['children'];
  	if(count($retOb['children']) > 0)
  	  {
  	  	foreach($retOb['children'] as $pos => $childID)
  	  	  {
  	  	  	$retOb['children'][$pos] = traceTree($childID);
  	  	  }
  	  }
  	$retOb['info'] = $list[$cID]['info'];
  	return($retOb);
  }
  
/*
print '<pre>';
print_r($parents);
print '</pre>';
*/


/*
 * now write the xml
 */

$xml = new XmlWriter();

/*
 * container, which contains the skin settings
 */
 
$xml->push('div', array('id' => 'menuContainer','styleSheet'	=> 'menu.css','iconSet' => 'defaultIcons.xml'));

/*
 * set up root element, which is LEVEL
 */
 
$xml->push('div', array('class' => 'rootElement'));	
$xml->element('div', $rootLabel, array('class' => 'subElementLabel', 'state' => 'closed', 'icon' => $icon, 'id' => 'rootLabel'));

/*
 * now go through parents and create tree
 */
 
foreach($parents as $pID => $data)
  {
  	$itemID = $data['info']['itemID']; 
  	
  	/*
  	 * if there are no children, treat as a normal element
  	 */
  	if(count($data['children']) > 0)
  	  {
  	    $xml->push('div', array('class' => 'subElement'));
    
        $xml->element('div', $data['info']['label'], array('class' => 'subElementLabel', 'state' => 'closed', 'id' => $itemID, 'icon' => $icon));
        
        addChildElement($data['children']);
    
        $xml->pop();
      }
    else
      {
      	$xml->element('div',$data['info']['label'], array('class' => 'element', 'id' => $itemID));
      }
  }

function addChildElement($children)
  {
  	global $xml;
  	
  	foreach($children as $pos => $data)
  	  {
  	  	$itemID = $data['info']['itemID'];  
  	  	$icon = $data['info']['icon'];  
  	  	
  	    if(count($data['children']) > 0)
  	      {
  	        $xml->push('div', array('class' => 'subElement'));
    
            $xml->element('div', $data['info']['label'], array('class' => 'subElementLabel', 'state' => 'closed', 'id' => $itemID, 'icon' => $icon));
        
            addChildElement($data['children']);
    
            $xml->pop();
          }
        else
          {
      	    $xml->element('div',$data['info']['label'], array('class' => 'element', 'id' => $itemID));
          }
  	  }
  }
					       
$xml->pop();
$xml->pop();	

header('Content-Type: text/xml');

print $xml->getXml();


?>  

<!--

print'<div id="menuContainer" styleSheet="menu.css" iconSet="defaultIcons.xml">
  <div class="rootElement" itemID="">
    <div class="subElementLabel" state="closed" itemID="">Root</div>
	    <div class="element" itemID="">Element</div>
	    <div class="element" itemID="">Element</div>
      <div class="subElement" itemID="">
        <div class="subElementLabel" state="closed" itemID="">Sublevel</div>
	      <div class="element" itemID="">Element</div>
			  <div class="element" itemID="">Element</div>
        <div class="subElement" itemID="">
		      <div class="subElementLabel" state="closed" itemID="">Sublevel</div>
	        <div class="element" itemID="">Element</div>
	        <div class="element" itemID="">Element</div>
	        <div class="element" itemID="">Element</div>
	        <div class="element" itemID="">Element</div>
        </div>
        <div class="element" itemID="">Element</div>
      </div>
    <div class="element" itemID="">Element</div>
    <div class="element" itemID="">Element</div>
  </div>
</div>';

-->