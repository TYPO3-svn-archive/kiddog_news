<?php

########################################################################
# Extension Manager/Repository config file for ext "kiddog_news".
#
# Auto generated 18-02-2010 21:43
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'News-System',
	'description' => 'Ein News-System welches im Rahmen der Semesterarbeit an der HSZ-T erstellt wurde.',
	'category' => '',
	'author' => 'Juerg Langhard',
	'author_email' => 'langhard@greenbanana.ch',
	'author_company' => 'GreenBanana',
	'shy' => '',
	'dependencies' => 'cms,extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => 'uploads/tx_kiddognews',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.0.8',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'extbase' => '',
			'fluid' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:61:{s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"d4c6";s:14:"ext_tables.php";s:4:"ef16";s:14:"ext_tables.sql";s:4:"1e20";s:16:"kickstarter.json";s:4:"2b76";s:41:"Classes/Controller/CategoryController.php";s:4:"11d7";s:40:"Classes/Controller/CommentController.php";s:4:"21b8";s:37:"Classes/Controller/LinkController.php";s:4:"64ef";s:37:"Classes/Controller/PostController.php";s:4:"b593";s:33:"Classes/Domain/Model/Category.php";s:4:"0442";s:32:"Classes/Domain/Model/Comment.php";s:4:"e0ed";s:29:"Classes/Domain/Model/File.php";s:4:"2226";s:30:"Classes/Domain/Model/Image.php";s:4:"03e7";s:29:"Classes/Domain/Model/Link.php";s:4:"dff3";s:29:"Classes/Domain/Model/Post.php";s:4:"a18f";s:28:"Classes/Domain/Model/Tag.php";s:4:"d2b0";s:48:"Classes/Domain/Repository/CategoryRepository.php";s:4:"7ee8";s:47:"Classes/Domain/Repository/CommentRepository.php";s:4:"28e7";s:44:"Classes/Domain/Repository/PostRepository.php";s:4:"28f4";s:42:"Classes/ViewHelpers/GravatarViewHelper.php";s:4:"eefc";s:42:"Classes/ViewHelpers/LightboxViewHelper.php";s:4:"87f7";s:41:"Configuration/FlexForms/flexform_list.xml";s:4:"a83e";s:25:"Configuration/TCA/tca.php";s:4:"5ab8";s:34:"Configuration/TypoScript/setup.txt";s:4:"8749";s:40:"Resources/Private/Language/locallang.xml";s:4:"5f31";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"0bfb";s:38:"Resources/Private/Layouts/default.html";s:4:"b91b";s:48:"Resources/Private/Partials/categoryMenuTree.html";s:4:"87db";s:36:"Resources/Private/Partials/menu.html";s:4:"b216";s:46:"Resources/Private/Partials/postCategories.html";s:4:"988e";s:44:"Resources/Private/Partials/postComments.html";s:4:"baef";s:49:"Resources/Private/Partials/postFeEditingMenu.html";s:4:"a46c";s:41:"Resources/Private/Partials/postFiles.html";s:4:"299f";s:41:"Resources/Private/Partials/postLinks.html";s:4:"6a15";s:48:"Resources/Private/Partials/postRelatedPosts.html";s:4:"30ed";s:40:"Resources/Private/Partials/postTags.html";s:4:"829a";s:46:"Resources/Private/Templates/Category/edit.html";s:4:"9077";s:45:"Resources/Private/Templates/Comment/edit.html";s:4:"0974";s:44:"Resources/Private/Templates/Link/create.html";s:4:"d41d";s:42:"Resources/Private/Templates/Link/edit.html";s:4:"d41d";s:42:"Resources/Private/Templates/Post/edit.html";s:4:"39f6";s:41:"Resources/Private/Templates/Post/new.html";s:4:"3e31";s:48:"Resources/Private/Templates/Post/showarchiv.html";s:4:"4836";s:48:"Resources/Private/Templates/Post/showlatest.html";s:4:"47f0";s:46:"Resources/Private/Templates/Post/showlist.html";s:4:"083d";s:45:"Resources/Private/Templates/Post/showrss.html";s:4:"d403";s:48:"Resources/Private/Templates/Post/showsingle.html";s:4:"ceba";s:51:"Resources/Public/CSS/jquery.tools.overlay-apple.css";s:4:"6e65";s:38:"Resources/Public/CSS/overlayconfig.css";s:4:"bad6";s:41:"Resources/Public/CSS/overlayconfigIE7.css";s:4:"060b";s:67:"Resources/Public/Icons/icon_tx_kiddognews_domain_model_category.png";s:4:"0fc5";s:66:"Resources/Public/Icons/icon_tx_kiddognews_domain_model_comment.png";s:4:"a22a";s:63:"Resources/Public/Icons/icon_tx_kiddognews_domain_model_file.png";s:4:"e9eb";s:64:"Resources/Public/Icons/icon_tx_kiddognews_domain_model_image.png";s:4:"82ab";s:63:"Resources/Public/Icons/icon_tx_kiddognews_domain_model_link.png";s:4:"a5dc";s:63:"Resources/Public/Icons/icon_tx_kiddognews_domain_model_post.png";s:4:"a9f5";s:62:"Resources/Public/Icons/icon_tx_kiddognews_domain_model_tag.png";s:4:"8205";s:42:"Resources/Public/Icons/Frontend/delete.png";s:4:"6846";s:42:"Resources/Public/Icons/Frontend/pencil.png";s:4:"a34e";s:55:"Resources/Public/JavaScripts/jQuery/jquery.tools.min.js";s:4:"878d";s:52:"Resources/Public/JavaScripts/jQuery/overlayconfig.js";s:4:"20bf";}',
);

?>