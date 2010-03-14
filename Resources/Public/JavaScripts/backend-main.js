Ext.onReady(function() {
    
    var tree = new Ext.tree.TreePanel({
        el: 'tree-reorder',
        frame:true,
        width: 250,
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
            text: 'News Categorys',
            draggable: false,
            id: 'project'
        }
    });

    tree.render();
    tree.getRootNode().expand(true);
});
