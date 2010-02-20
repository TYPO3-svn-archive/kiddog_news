<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_kiddognews_domain_model_post'] = array(
	'ctrl' => $TCA['tx_kiddognews_domain_model_post']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'type,title,date,author,teaser,post,comments,categories,tags,related_posts,files,links,images'
	),
	'types' => array(
		'1' => array('showitem' => 'type,title,date,author,teaser,post,comments,categories,tags,related_posts,files,links,images')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(

		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)', // TODO
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		
		'date' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.date',
			'config'  => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => '0',
				'default' => time()
			)
		),
		
		'author' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.author',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		
		'teaser' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.teaser',
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
                'wizards' => array(
                    '_PADDING' => 2,
                    'RTE' => array(
                        'notNewRecords' => 1,
                        'RTEonly'       => 1,
                        'type'          => 'script',
                        'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
                        'icon'          => 'wizard_rte2.gif',
                        'script'        => 'wizard_rte.php',
                    ),
                ),
            )
		),
		
		'post' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.post',
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '10',
                'wizards' => array(
                    '_PADDING' => 2,
                    'RTE' => array(
                        'notNewRecords' => 1,
                        'RTEonly'       => 1,
                        'type'          => 'script',
                        'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
                        'icon'          => 'wizard_rte2.gif',
                        'script'        => 'wizard_rte.php',
                    ),
                ),
            )
		),
		
		'comments' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.comments',
			'config' => array(
				'type' => 'inline',
				'loadingStrategy' 		=> 'proxy',
				'foreign_class' 		=> 'Tx_KiddogNews_Domain_Model_Comment',
				'foreign_table' 		=> 'tx_kiddognews_domain_model_comment',
				'foreign_field' 		=> 'foreign_uid',
				'foreign_table_field' 	=> 'foreign_table',
				'maxitems'      => 50,
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 0,
				),
			)
		),			
		
		'categories' => array(
			'exclude' => 1,
			'label' => 'categories',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_kiddognews_domain_model_category',
				'MM' => 'tx_kiddognews_post_category_mm',
				'wizards' => Array(
		             '_PADDING' => 1,
		             '_VERTICAL' => 1,
		             'edit' => Array(
		                 'type' => 'popup',
		                 'title' => 'Edit',
		                 'script' => 'wizard_edit.php',
		                 'icon' => 'edit2.gif',
		                 'popup_onlyOpenIfSelected' => 1,
		                 'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
		             ),
		             'add' => Array(
		                 'type' => 'script',
		                 'title' => 'Create new',
		                 'icon' => 'add.gif',
		                 'params' => Array(
		                     'table'=>'tx_kiddognews_domain_model_category',
		                     'pid' => '###CURRENT_PID###',
		                     'setValue' => 'prepend'
		                 ),
		                 'script' => 'wizard_add.php',
		             ),
		         )
			)
		),
		
		'related_posts' => Array (
			'exclude' => 1,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.related_posts',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_kiddognews_domain_model_post',
				'foreign_table' => 'tx_kiddognews_domain_model_post',
				'foreign_table_where' => 'AND uid!=###UID###', // Funktioniert noch nicht !!!
				'MM' => 'tx_kiddognews_post_post_mm',
				'size' => '3',
				'autoSizeMax' => 10,
				'maxitems' => '200',
				'minitems' => '0',
				'show_thumbs' => '1',
				'wizards' => array(
					'suggest' => array(
						'type' => 'suggest'
					)
				)
			)
		),		
		
		'tags' => array(
			'exclude' => 1,
			'label' => 'tags',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_kiddognews_domain_model_tag',
				'MM' => 'tx_kiddognews_post_tag_mm',
				'wizards' => Array(
		             '_PADDING' => 1,
		             '_VERTICAL' => 1,
		             'edit' => Array(
		                 'type' => 'popup',
		                 'title' => 'Edit',
		                 'script' => 'wizard_edit.php',
		                 'icon' => 'edit2.gif',
		                 'popup_onlyOpenIfSelected' => 1,
		                 'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
		             ),
		             'add' => Array(
		                 'type' => 'script',
		                 'title' => 'Create new',
		                 'icon' => 'add.gif',
		                 'params' => Array(
		                     'table'=>'tx_kiddognews_domain_model_tag',
		                     'pid' => '###CURRENT_PID###',
		                     'setValue' => 'prepend'
		                 ),
		                 'script' => 'wizard_add.php',
		             ),
		         )
			)
		),		

		'type' => Array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.type',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.type.I.0', 0),
					Array('LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.type.I.1', 1)
				),
				'default' => 0
			)
		),		
		
		'files' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.files',
			'config' => array(
				'type' => 'inline',
				'loadingStrategy' 		=> 'proxy',
				'foreign_class' 		=> 'Tx_KiddogNews_Domain_Model_File',
				'foreign_table' 		=> 'tx_kiddognews_domain_model_file',
				'foreign_field' 		=> 'foreign_uid',
				'foreign_table_field' 	=> 'foreign_table',
				'maxitems'      => 50,
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 0,
				),
			)
		),			
		
		'links' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.links',
			'config'  => array(
				'type' => 'inline',
				'foreign_table' => 'tx_kiddognews_domain_model_link',
				'foreign_field' => 'post',
				'maxitems'      => 999999,
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			)
		),
		
		'images' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_post.images',
			'config' => array(
				'type' => 'inline',
				'loadingStrategy' 		=> 'proxy',
				'foreign_class' 		=> 'Tx_KiddogNews_Domain_Model_Image',
				'foreign_table' 		=> 'tx_kiddognews_domain_model_image',
				'foreign_field' 		=> 'foreign_uid',
				'foreign_table_field' 	=> 'foreign_table',
				'maxitems'      => 50,
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 0,
				),
			)
		),			
	),
);

$TCA['tx_kiddognews_domain_model_comment'] = array(
	'ctrl' => $TCA['tx_kiddognews_domain_model_comment']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'date,name,e_mail,website,comment'
	),
	'types' => array(
		'1' => array('showitem' => 'date,name,e_mail,website,comment')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(

		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)', // TODO
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		
		'date' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_comment.date',
			'config'  => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => '0',
				'default' => time()
			)
		),		
		
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_comment.name',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),

		'e_mail' => array(
        		'exclude' => 0,
        		'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_comment.e_mail',
        		"config" =>
        			array (
			          	"type" => "input",
			          	"size" => "15",
			          	"max" => "255",
			          	"checkbox" => "",
			          	"eval" => "trim",
			        	  "wizards" => array(
			        	    "_PADDING" => 2,
							'link' => array(
			    				'type' => 'popup',
								'title' => 'Link',
						    	'icon' => 'link_popup.gif',
								'script' => 'browse_links.php?mode=wizard',
								'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
								)
			        		)
			        	)
        	),		

		'website' => array(
        		'exclude' => 0,
        		'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_comment.website',
        		"config" =>
        			array (
			          	"type" => "input",
			          	"size" => "15",
			          	"max" => "255",
			          	"checkbox" => "",
			          	"eval" => "trim",
			        	  "wizards" => array(
			        	    "_PADDING" => 2,
							'link' => array(
			    				'type' => 'popup',
								'title' => 'Link',
						    	'icon' => 'link_popup.gif',
								'script' => 'browse_links.php?mode=wizard',
								'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
								)
			        		)
			        	)
        	),		
		
		'comment' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_comment.comment',
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '10',
                'wizards' => array(
                    '_PADDING' => 2,
                    'RTE' => array(
                        'notNewRecords' => 1,
                        'RTEonly'       => 1,
                        'type'          => 'script',
                        'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
                        'icon'          => 'wizard_rte2.gif',
                        'script'        => 'wizard_rte.php',
                    ),
                ),
            )
		),
		
	),
);

$TCA['tx_kiddognews_domain_model_category'] = array(
	'ctrl' => $TCA['tx_kiddognews_domain_model_category']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name,description,image,sub_categories'
	),
	'types' => array(
		'1' => array('showitem' => 'name,description,image,sub_categories')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(

		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)', // TODO
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_category.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
        'description' => array (        
            'exclude' => 1,        
            'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_category.description',        
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5',
                'wizards' => array(
                    '_PADDING' => 2,
                    'RTE' => array(
                        'notNewRecords' => 1,
                        'RTEonly'       => 1,
                        'type'          => 'script',
                        'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
                        'icon'          => 'wizard_rte2.gif',
                        'script'        => 'wizard_rte.php',
                    ),
                ),
            )
        ),	

		'sub_categories' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_category.sub_categories',
			'config' => array(
				'type' => 'inline',
				'loadingStrategy' 		=> 'proxy',
				'foreign_class' 		=> 'Tx_KiddogNews_Domain_Model_Category',
				'foreign_table' 		=> 'tx_kiddognews_domain_model_category',
				'foreign_field' 		=> 'foreign_uid',
				'foreign_table_field' 	=> 'foreign_table',
                
				'maxitems'      => 999999,
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			)		
		),		
		
		'image' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_category.image',
			'config' => array(
				'type' => 'inline',
				'loadingStrategy' 		=> 'proxy',
				'foreign_class' 		=> 'Tx_KiddogNews_Domain_Model_Image',
				'foreign_table' 		=> 'tx_kiddognews_domain_model_image',
				'foreign_field' 		=> 'foreign_uid',
				'foreign_table_field' 	=> 'foreign_table',
				'maxitems'      => 1,
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 0,
				),
			)
		),		
		
	),
);

$TCA['tx_kiddognews_domain_model_file'] = array(
	'ctrl' => $TCA['tx_kiddognews_domain_model_file']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,file'
	),
	'types' => array(
		'1' => array('showitem' => 'title,file')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(

		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)', // TODO
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_file.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
        'file' => array (        
            'exclude' => 0,        
            'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_file.file',
            'config' => array (
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => '',    
                'disallowed' => 'php,php3',    
                'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],    
                'uploadfolder' => 'uploads/tx_kiddognews',
                'show_thumbs' => 1,    
                'size' => 1,    
                'minitems' => 0,
                'maxitems' => 1,
            )
        ),
		
	),
);

$TCA['tx_kiddognews_domain_model_image'] = array(
	'ctrl' => $TCA['tx_kiddognews_domain_model_image']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'image,alt,title,description'
	),
	'types' => array(
		'1' => array('showitem' => 'image,alt,title,description')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(

		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)', // TODO
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		
		'alt' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_image.alt',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
        'description' => array (        
            'exclude' => 1,        
            'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_category.description',        
            'config' => array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '5'
            )
        ),	

		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_image.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),		
		
        'image' => array (        
            'exclude' => 0,        
            'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_image.file',
            'config' => array (
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],    
                'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],      
                'uploadfolder' => 'uploads/tx_kiddognews',
                'show_thumbs' => 1,    
                'size' => 1,    
                'minitems' => 0,
                'maxitems' => 1
            )
        ),
	),
);

$TCA['tx_kiddognews_domain_model_link'] = array(
	'ctrl' => $TCA['tx_kiddognews_domain_model_link']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'link'
	),
	'types' => array(
		'1' => array('showitem' => 'link')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(

		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)', // TODO
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		
		'link' => array(
        		'exclude' => 0,
        		'label'   => 'LLL:EXT:kiddog_news/Resources/Private/Language/locallang_db.xml:tx_kiddognews_domain_model_link.link',
        		"config" =>
        			array (
        	  			"type" => "input",
        	  			"size" => "15",
        	  			"max" => "255",
        	  			"checkbox" => "",
        	  			"eval" => "trim",
        	  			"wizards" => array(
        	    			"_PADDING" => 2,
							'link' => array(
   		 						'type' => 'popup',
								'title' => 'Link',
						    	'icon' => 'link_popup.gif',
								'script' => 'browse_links.php?mode=wizard',
								'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
							)
        				)
                    )
        
        		),
		
		'post' => array(
			'config' => array(
				'type' => 'passthrough',
			)
		),
		
	),
);

$TCA['tx_kiddognews_domain_model_tag'] = array(
	'ctrl' => $TCA['tx_kiddognews_domain_model_tag']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name, posts'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'Name',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'posts' => array(
			'exclude' => 1,
			'label' => 'Posts',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_kiddognews_domain_model_post',
				'MM' => 'tx_kiddognews_post_tag_mm',
				'MM_opposite_field' => 'tags',
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name, posts')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>