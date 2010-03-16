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
	 * Context-Menu
	 */
	tree.on('click', alertID);
	tree.on('contextmenu', prepareMenu);

	var sm = tree.getSelectionModel();

	function alertID(node) {
		Ext.Ajax.request({
	       url : '../typo3conf/ext/kiddog_news/Classes/Controller/AjaxController.php',
	       method: 'POST',
	       params :{'node':'getCategoryInfoByUid','category':node.id},
	       
	       success: function(response, opts) {
	    	   var obj = Ext.decode(response.responseText);
	    	   console.dir(obj);
	           
	    	   Ext.Msg.alert('Info', 'response.status: '+ response.status);
	       },
	       
	       failure: function(result, request) {
	    	   var jsonData = Ext.util.JSON.decode(result.responseText);
	           var resultMessage = jsonData.data.result;
	           Ext.Msg.alert('Info', 'failure: '+resultMessage);
	       }
	   });
	};
	
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
	
	function editNode() {
		Ext.Msg.alert('Edit', 'Edit Node')
	}	
	
	function deleteNode() {
		Ext.Msg.alert('Delete', 'Delete Node')
	}

});