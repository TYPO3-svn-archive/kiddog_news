Ext.onReady(function() {
	/**
	 * Category-Tree
	 */
	var tree = new Ext.tree.TreePanel(
			{
				el : 'tree-reorder',
				frame : true,
				width : 320,
				height : 400,
				useArrows : true,
				autoScroll : true,
				animate : true,
				enableDD : true,
				containerScroll : true,
				border : false,
				dataUrl : '../typo3conf/ext/kiddog_news/Classes/Controller/AjaxController.php',
				root : {
					nodeType : 'async',
					text : 'News Categoryies',
					draggable : false,
					id : 'getCategoriesByParent'
				}
			});

	tree.render();
	tree.getRootNode().expand(true);

	/**
	 * Node-Klick-Function
	 */
	tree.on('click', alertID);

	function alertID(node) {
		Ext.Ajax.request({
	       url : '../typo3conf/ext/kiddog_news/Classes/Controller/AjaxController.php',
	       method: 'POST',
	       params :{'node':'getCategoryInfoByUid','category':node.id},
	       
	       success: function (result, request) {
	    	   var jsonData = Ext.util.JSON.decode(result.responseText);
	    	   Ext.Msg.alert('success', jsonData[0]['name']);
	       },
	       
	       
	       failure: function(result, request) {
	    	   var jsonData = Ext.util.JSON.decode(result.responseText);
	    	   Ext.Msg.alert('failure', jsonData[0]['name']);
	       }
	   });
	};
	
	/**
	 * Context-Menu
	 */
	
	tree.on('contextmenu', prepareMenu);
	var sm = tree.getSelectionModel();	
	
	var Menu = new Ext.menu.Menu( {
		id : 'menu',
		items : [ {
			id : 'newNode',
			handler : newNode,
			cls : 'newNode',
			text : 'New category into'
		}, {
			id : 'editNode',
			handler : editNode,
			cls : 'editNode',
			text : 'edit'
		}, {
			id : 'delete',
			handler : deleteNode,
			cls : 'delete',
			text : 'delete'
		} ]
	});
	
	function prepareMenu(node, e) {
		node.select();
		Menu.showAt(e.getXY());
	}
	
	function newNode() {
		Ext.Msg.alert('New', 'New Node')
	}
	
	// TODO: Node dynamisch uebergeben editNode(node)
	function editNode() {
		Ext.Ajax.request({
		       url : '../typo3conf/ext/kiddog_news/Classes/Controller/AjaxController.php',
		       method: 'POST',
		       params :{'node':'getCategoryInfoByUid','category':2},
		       
		       success: function (result, request) {
		    	   var jsonData = Ext.util.JSON.decode(result.responseText);
		    	   // FORM
		       },
		       
		       
		       failure: function(result, request) {
		    	   var jsonData = Ext.util.JSON.decode(result.responseText);
		    	   Ext.Msg.alert('edit', jsonData[0]['name']);
		       }
		   });
	}	
	
	function deleteNode() {
		Ext.Msg.alert('Delete', 'Delete Node')
	}

});