/*
 * requires XMLHTTP.js
 * requires $Error.js
 */
 
function Menu(spd) 
  {
	  // Animation of the menu runs on a cycle(speed = spd), with each show/hide instruction 
		// placed on a stack.  Every tick of this clock causes one instruction to be executed.
	  this.startClock(spd || 1);
	} 

Menu.prototype.startClock = function(spd)
  {
	  Menu.prototype.instructionStack = new Array();
	  Menu.prototype.timer = setInterval('Menu.prototype.cycle()',spd);
	}	
	
Menu.prototype.cycle = function()
  {
	  try
		  {
		    // fifo
	      var ob = Menu.prototype.instructionStack.shift();
        this.toggleItemState(ob.ob);
			}
		catch(e) {;} 
	}
	
Menu.prototype.addInstruction = function(el)
  {
	  Menu.prototype.instructionStack[Menu.prototype.instructionStack.length] =
		  {
			  ob: el
			};
	}	
	
Menu.prototype.toggleItemState = function(el)
  {
    var obs = el.style;

    // toggle its state
    if(obs.visibility=='inherit')
	    {
        obs.position='absolute';
        obs.visibility='hidden';
      } 
		else 
		  {
        obs.position='static';
        obs.visibility='inherit';
      }
  }	
	
Menu.prototype.activate = function(el,recur)
  {
	  if(el)
	   {
		   /*
		    * open/close selected branch.  Only operate on initial
		    * click (where recur is not sent) to change control
		    * icon, colorize, etc. same function then recursively
		    * called until all siblings are opened
		    */
		   if(!recur)
			   {
			   	 Menu.prototype.colorize(el);
			   	 
				   try
					   {
               this.recordClick(el);
               
  				   	 var elState = el.attributes.getNamedItem('state');
					   	 
					   	 /*
					   	  * check if this elements state value is set to
					   	  * 'empty'. if so, this is an empty folder, so it
					   	  * should not get the state value
					   	  */
					   	 if(elState.value != 'empty')
					   	   {
					   	   	 var iconInfo = (elState.value == 'open') ? this.getIcon('closed') : this.getIcon('open');
						       el.childNodes.item(0).src = iconInfo.path;
							     elState.value = (elState.value == 'open') ? 'closed' : 'open';

                   /*
                    * note that we no longer bother with iconInfo.class, since
                    * the className on the element has been set initially, and does
                    * not change
                    */
                 }
						 }
					 catch(e) { $Error.alert(e); }
				 }
				 
	     tempEl=el.nextSibling;
       if(tempEl)
		     {
    	     if(tempEl.nodeType==1)
				     {
						   /*
						    * add (open/close) animation to the stack if this 
						    * activate command is the result of a user request.
						    * if this is a function of replayClicks(), just open
						    * the subelements instantaneously.
						    */
						   if(this.replaying)
						     {
						       this.toggleItemState(tempEl);	
						     }
						   else
						   	 {
                   this.addInstruction(tempEl);
                 }
        	   } 
						this.activate(tempEl,1);
    	    }
    	}
  }	
	
Menu.prototype.serialize = function(obj)
  {
	  try
		  {
			  var s = new XMLSerializer();
				var ser = s.serializeToString(obj);
			}
		catch(e)
			{
				var ser = obj.xml;
			}	
		return(ser);
	}

Menu.prototype.load = function(dataFile,container,waitTime)
/*
 * loads the menu's data from dataFile
 * NOTE: assumes dataFile is an XML file.
 * NOTE: container is a string representing an element id
 *
 * Since we cannot load another menu until previous loads are complete,
 * load() will wait until a previous load is finished.
 */
	{
	  var wt = waitTime || 0;
	  if(this.menuLoaded)
		  {
		    // Announce that the menu is loading
		    Menu.prototype.menuLoaded = false; 
		
	      Menu.prototype.container = document.getElementById(container) || document.body;
        // Since the menu will arrive unformatted, lets hide it for now
        Menu.prototype.hideMenu();
		
        this.connection = new XMLHTTP();
        
        this.connection.loadXML(dataFile,this.buildMenus);
			}
		else if(wt < Menu.prototype.timeout)
		  {
			  setTimeout('Menu.prototype.load("' + dataFile + '","' + container + '",' + (wt+25) + ')',25);
			}
		else // timeout
		  {
			  $Error.alert(new Object(),'The menu has not loaded properly and may behave strangely.');
			}		
  }
	
Menu.prototype.hideMenu = function()
  {
	  Menu.prototype.container.style.visibility = 'hidden';
	}
	
Menu.prototype.showMenu = function()
  {
	  Menu.prototype.container.style.visibility = 'visible';
	}

Menu.prototype.buildMenus = function(re)
/* the callback function which fires when this menu's XML
 * description has been loaded (via this.load).  passes the xml doc ref.
 */
  {		
	  // store the xml representation
		Menu.prototype.tree = re;
		
		/* The XML is constructed with html compatible tags, we need only to serialize
		 * it and attach it to the body.  
		 */
    Menu.prototype.container.innerHTML = Menu.prototype.serialize(Menu.prototype.tree);

		// Make sure the menu insertion was successful and can be referenced 
	  try
		  {
			  /* containerID is the menu's containing xml tag (the id of the root
				 * element of this menu's XML representation.  Icon set and
				 * style sheet properties may be stored here.
				 */
		    var doc = document.getElementById(Menu.prototype.containerID);
			}
		catch(e)
		  {
			  $Error.alert(e,'The menu has not loaded properly and may behave strangely, or not at all.');
				return;
			}
				
		// Announce that the menu has loaded properly
		Menu.prototype.menuLoaded = true; 
		
		// First, see if there is a stylesheet to apply 
	  try
		  {
		    // load the style sheet definition, if any
		    Menu.prototype.loadStyleSheet(doc.attributes.getNamedItem('styleSheet').value);
			}
		catch(e) { ; } // no default style sheet
		
		// Try for a default icon set
		try
		  {
		    // load the icon set definition, if any
		    Menu.prototype.loadIconSet(doc.attributes.getNamedItem('iconSet').value);
			}
		catch(e) { ; } // no default iconset for menu
		
		// show the menu
    Menu.prototype.showMenu();
    
    /*
     * run clicks
     */
    Menu.prototype.replayClicks();
  }	
	
Menu.prototype.loadStyleSheet = function(file)
  {
		try
		  {
			  var style = document.getElementById(this.styleID);
				style.href = file;
			}
		catch(e)
		  {
        // style object doesn't exist.  create it.
				var head = document.createElement("link");
        head.setAttribute("id",this.styleID);
        head.setAttribute("rel","stylesheet");
        head.setAttribute("type","text/css");
        head.setAttribute("href",file);
        document.getElementsByTagName("head").item(0).appendChild(head);
			}
	}	
	
Menu.prototype.loadIconSet = function(file,waitTime)
/*
 * Load an icon set.  Because the icons cannot be attached until the menu
 * structure exists, we need to continuously call this function until
 * the menu is fully loaded.  
 *
 */
  {
	  var wt = waitTime || 0;
	  if(this.menuLoaded)
		  {
			  // hold further menu actions until icon set is loaded
			  this.menuLoaded = false;
				
        this.connection = new XMLHTTP();
        this.connection.loadXML(file,this.parseIconSet);
			}
		else if(wt < Menu.prototype.timeout)
		  {
			  setTimeout('Menu.prototype.loadIconSet("' + file + '",' + (wt+25) + ')',25);
			}
		else // timeout
		  {
			  $Error.alert(new Object(),'The menu has not loaded properly and may behave strangely.');
			}
	}
	
Menu.prototype.getIcon = function(id)
  {
	  var iconInf = new Object();
	  for(i=0; i<this.iconSet.length; i++)
		  {
			  el = this.iconSet;
				if(el[i].id == id)
					{
						iconInf.path = el[i].location;
						iconInf.path += el[i].fileName;
						iconInf.path += '.' + el[i].extension;
						
						iconInf.className = el[i].className;
						break;
					}
			}
		return(iconInf);
  }
	
Menu.prototype.parseIconSet = function(re)
/*
 * Callback from loadIconSet(). Take the icon set that has been loaded and 
 * create a local representation used by getIcon() to fetch icon definitions
 */
  {
	  var els = re.getElementsByTagName('icon');
		Menu.prototype.iconSet = new Array();
		for(q=0; q<els.length; q++)
			{
			  Menu.prototype.iconSet[Menu.prototype.iconSet.length] = 
				  {
					  id: els.item(q).attributes.getNamedItem('id').value,
						location: els.item(q).attributes.getNamedItem('location').value,
						fileName: els.item(q).attributes.getNamedItem('fileName').value,
						extension: els.item(q).attributes.getNamedItem('extension').value,
						className: els.item(q).attributes.getNamedItem('className').value
					};
			}
    Menu.prototype.attachIcons();
		
		// ok now to continue building menus
		Menu.prototype.menuLoaded = true;
  }	

Menu.prototype.stylizeTerminalLink = function(el)
  {
	  /*
		 * set terminal link for last element
		 */
		if(el.className != 'element')
		  {
		   	/*
		   	 * find last child of this container, and if it
		   	 * has a className of 'element' change that
		   	 * className to 'terminalElement'. 
		   	 */
		   	var nds = el.childNodes;
		   	var lastNd = null;
		   	for(n=0; n<nds.length; n++)
		   	  {
		   	  	if((nds.item(n).className == 'element') || (nds.item(n).className == 'subElement'))
		   	  	  {
		   	  	  	lastNd = nds.item(n);
		   	  	  }
		   	  }
		   	if(lastNd)
		   	  {
		   	  	lastNd.className = (lastNd.className == 'element') ? 'terminalElement' : 'terminalSubElement';
		   	  }
		  }
  }
  
Menu.prototype.setParentHandlers = function(el)
  {
    /*
     * subElementLabels will get click handler
     * allowing opening/closing of nodes
     */
	  if(el.className == 'subElementLabel')
	    {
	   	  el.onclick = function() 
	   	    { 
	   	    	MenuRef.activate(this); 
	   	    }
	    }  	
  }

Menu.prototype.attachIcons = function()
  {
		var d = Menu.prototype.container.getElementsByTagName('div');
		var st,ic,control,icon;
		for(x=0; x<d.length; x++)
		  {
			  try
				  {
			      st = d.item(x).attributes.getNamedItem('state').value;
			      /*
			       * no icon for empty folders (state = 'empty')
			       */
			      if(st && (st != 'empty'))
			        {
				  	    var iconInfo = this.getIcon(st);
						    control = '<img class="' + iconInfo.className + '" src="' + iconInfo.path + '" />';
						  }
						else
							{
								control = '';
							}
					}
				catch(e) { control = ''; }
				
			  try
				  {
				    ic = d.item(x).attributes.getNamedItem('icon').value;
				  	var iconInfo = this.getIcon(ic);
				    icon = '<img class="' + iconInfo.className + '" src="' + iconInfo.path + '" />';
					}
				catch(e) { icon = ''; }
				
				d[x].innerHTML = control + icon + d[x].innerHTML;  

        // handle terminal links
        this.stylizeTerminalLink(d[x]);
			    
        // add onclick event to parent nodes
        this.setParentHandlers(d[x]);
      }
  }

Menu.prototype.clickRefExists = function(el)
  {
    for(c=0; c < this.clicks.length; c++)
      {
  	    if(this.clicks[c] == el.id)
  	  	  {
  	  	  	return(true);
  	  	  }
  	  }
  	return(false);
  }

Menu.prototype.recordClick = function(el)
  {
  	if(this.replaying == false)
  	  {
  	  	/*
  	  	 * obviously, a set of actions may include
  	  	 * an open followed by a close. we don't want
  	  	 * to replay both.  This duality allows us
  	  	 * to assume that if a second action is performed
  	  	 * on an element, we can simply delete that
  	  	 * element from the click list -- + & - == 0
  	  	 */

  	  	if(this.clickRefExists(el)) 
  	  	  {
  	  	  	delete this.clicks[c];
  	  	  	return;
  	  	  }
  	  	  
  	    this.clicks[this.clicks.length] = el.id;
  	  }
  }
  
Menu.prototype.replayClicks = function()
  { 
  	/*
  	 * while this is running, tell .recordClick
  	 * to stop recording
  	 */
  	this.replaying = true; 

  	for(a=0; a < this.clicks.length; a++)
  	  {
  	  	try
  	  	  {
  	  	  	if(this.isIE())
  	  	  	  {
  	  	  	  	this.activate(document.getElementById(this.clicks[a]));
  	  	  	  }
  	  	  	else
  	  	  		{
  	  	  	    /*
  	  	  	     * all the crazy timeout stuff below shouldn't be
  	  	  	     * necessary, but the line above confuses Moz. 
  	  	  	     * Perhaps too many instructions too quickly?
  	  	  	     * Introduced delays; the code below seems to work.
  	  	  	     */
  	  	  	    setTimeout("Menu.prototype.activate(document.getElementById('"+this.clicks[a]+"'))",200);
  	  	  	  }
  	  	  }
  	  	catch(E){}
  	  }
  	
  	// fork, as described above...
  	if(this.isIE())
  	  {  
  	    this.replaying = false;  
  	  }
  	else
  		{
  			setTimeout("Menu.prototype.replaying = false",1000);
  		}
  }
  
/*
 * used by .recordClick() and replayClicks()
 */ 
Menu.prototype.replaying = false;

/*
 * used by .recordClick() and replayClicks()
 */
Menu.prototype.clicks = new Array();

// browser check
Menu.prototype.isIE = function()
  {
  	return(navigator.appVersion.indexOf("MSIE")!=-1)
  }

// Flagged when the callback function for load() has executed.
// initialized to true so that the first load call is immediately accepted
Menu.prototype.menuLoaded = true;

// The id of the link anchor which contains this menu's style sheet
// This link is dynamically created whenever a stylesheet load is tried.
Menu.prototype.styleID = 'menuStyle';

// This will contain a reference to the menu tree upon successful menu load
Menu.prototype.container = null;

// Set to the id of the root element of this menu's XML representation
Menu.prototype.containerID = 'menuContainer';

// Set to the maximum number of milliseconds any queued load 
// requests will wait before failing
Menu.prototype.timeout = 20000;

// select text color
Menu.prototype.selectedItemTextcolor = '#ff0000';

/*
 * last clicked item.
 * create a positive style value so that
 * activate() will have a value to work with
 */
Menu.prototype.lastSelectedItem = {style:true};

Menu.prototype.colorize = function(el) {}



