Ext.onReady(function() {
    
    var tree = new Ext.tree.TreePanel({
        el: 'tree-reorder',
        frame:true,
        width: 320,
        height:400,
        useArrows: true,
        autoScroll: true,
        animate: true,
        enableDD: true,
        containerScroll: true,
        border: false,
        dataUrl: '../typo3conf/ext/kiddog_news/Classes/Controller/AjaxController.php',
        root: {
            nodeType: 'async',
            text: 'News Categoryies',
            draggable: false,
            id: 'project'
        }
    });

    tree.render();
    tree.getRootNode().expand(true);
    
    /**
     * Edit Category-Node's
     */
    tree.on('click', alertID); 

    function alertID(node){
    	if(tree.getSelectionModel().isSelected(node)){
    		Ext.Msg.alert('Node-ID', node.id);
    	}else{
    		Ext.Msg.alert('else');
    	}
    };    
    
    /**
     * Context-Menu
     */
	tree.on('click', alertID);
	tree.on('contextmenu', prepareMenu); 

	var sm = tree.getSelectionModel(); 

	function alertID(node){
		if(tree.getSelectionModel().isSelected(node)){
			if (node.isLeaf()){
				Ext.Msg.alert('Die Node-ID ist ' + node.id + ' leaf: true');
			} else {
				Ext.Msg.alert('Die Node-ID ist ' + node.id + ' leaf: false');
			}
		}
	};
	var Menu = new Ext.menu.Menu({
		id:'menu',
		items: [{
			id:'editNode',
			handler:editNode,
			cls:'editNode',
			text:'edit'
			},{
			id:'remove',
			handler:removeNode,
			cls:'remove',
			text: 'delete'
			}]
	});
	function prepareMenu(node, e){
		node.select();
		Menu.items.get('remove')[node.attributes.allowDelete ? 'enable' : 'disable']();
		Menu.showAt(e.getXY());
	}
	function editNode(){
Ext.Msg.alert('Edit','Edit Node')
	}
	function expandAll(){
		Menu.hide();
		setTimeout(function(){
			Rroot.eachChild(function(n){
				n.expand(false, false);
			});
		}, 10);
	}
	function removeNode(){
		var n = sm.getSelectedNode();
		if(n && n.attributes.allowDelete){
			tree.getSelectionModel().selectPrevious();
			n.parentNode.removeChild(n);
		}
	}

    
    
    
});
