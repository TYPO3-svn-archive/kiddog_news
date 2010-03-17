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
	       params :{'node':'getCategoryByUid','category':node.id},
	       
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
		       params :{'node':'getCategoryByUid','category':2},
		       
		       success: function (result, request) {
		    	   var jsonData = Ext.util.JSON.decode(result.responseText);
		    	   
		    	   // JavaScript Form
		    	   // title, description, image, parent_category
		    	   var form = new Ext.form.FormPanel({
		    	        baseCls: 'x-plain',
		    	        labelWidth: 55,
		    	        defaultType: 'textfield',

		    	        items: 
		    	        [{
		    	            fieldLabel: 'Uid',
		    	            name: 'TxKiddognewsDomainModelCategory[uid]',
		    	            anchor:'100%',
		    	            value:jsonData[0]['uid']
		    	        },{
		    	            fieldLabel: 'Title',
		    	            name: 'TxKiddognewsDomainModelCategory[name]',
		    	            anchor:'100%',
		    	            value:jsonData[0]['name']
		    	        },{
		    	            fieldLabel: 'Image',
		    	            name: 'TxKiddognewsDomainModelCategory[image]',
		    	            anchor:'100%',
		    	            value:jsonData[0]['image']
		    	        },{
		    	            fieldLabel: 'Parent Category',
		    	            name: 'TxKiddognewsDomainModelCategory[foreignUid]',
		    	            anchor: '100%',
		    	            value:jsonData[0]['foreignUid']
		    	        },{
		    	        	fieldLabel: 'Description',
		    	            xtype: 'textarea',
		    	            hideLabel: true,
		    	            name: 'TxKiddognewsDomainModelCategory[description]',
		    	            value:jsonData[0]['description'],
		    	            anchor: '100% -53'  // anchor width by percentage and height by raw adjustment
		    	        }]
		    	    });

		    	    var window = new Ext.Window({
		    	        title: 'Edit Category',
		    	        width: 500,
		    	        height:300,
		    	        minWidth: 300,
		    	        minHeight: 200,
		    	        layout: 'fit',
		    	        plain:true,
		    	        bodyStyle:'padding:5px;',
		    	        buttonAlign:'center',
		    	        items: form,

		    	        buttons: [{
		    	            text: 'Save',
		    	            handler: function(){
		    	             		form.getForm().submit({
		    	             	    params :{'node':'setCategoryByUid'},
		    	        			url : '../typo3conf/ext/kiddog_news/Classes/Controller/AjaxController.php',
		    	        	        waitMsg: 'Processing Request',
		    	        	        success: function(loginForm, resp){		    	             	    	
		    	        				Ext.Msg.alert('Success', 'Category is updated');
		    	        	        }
		    	        		});
		    	        	}		    	            
		    	        },{
		    	            text: 'Cancel',
	                        handler: function(){
	                        window.hide();
	                    }		    	            
		    	        }]
		    	    });
		    	    window.show();
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