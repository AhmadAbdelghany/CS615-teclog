<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-05 13:53:02
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13985634f4b94c3728-88682014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a7eb6c4a0018c376f270ab34683b32a6c74114a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1446726887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13985634f4b94c3728-88682014',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5634f4b94d15b1_13334746',
  'variables' => 
  array (
    'title' => 0,
    'Name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5634f4b94d15b1_13334746')) {function content_5634f4b94d15b1_13334746($_smarty_tpl) {?><html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</title>
    <link rel="stylesheet" lang="text/css" href="styles.css"/>
	
	<!-- including the reference to NicEdit -->
	<?php echo '<script'; ?>
 src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"><?php echo '</script'; ?>
>
	
	<!-- initializing the RTF editor -->
	<?php echo '<script'; ?>
 type="text/javascript">
		bkLib.onDomLoaded(
			function() { 
				// create a new RTF editor replacing the textarea field with id=content
				new nicEditor().panelInstance('content');
			}
		);
	<?php echo '</script'; ?>
>
</head>
<body>
<?php }} ?>
