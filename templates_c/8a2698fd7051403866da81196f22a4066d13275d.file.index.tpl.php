<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-05 13:53:01
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82095634f4b8a56912-46049729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a2698fd7051403866da81196f22a4066d13275d' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1446726753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82095634f4b8a56912-46049729',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5634f4b92b9411_74168747',
  'variables' => 
  array (
    'notes' => 0,
    'note' => 0,
    'ACTIVE_NOTE_ID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5634f4b92b9411_74168747')) {function content_5634f4b92b9411_74168747($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'E:\\mu\\gitrepo\\lib\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'E:\\mu\\gitrepo\\lib\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"miNotes"), 0);?>


<div id="container">
    
    <div id="notes-list">
        <div id="notes-list-header" class="header">
            <span class="left">miNotes</span>
            <span class="right"><a href="index.php?action=new"><img src="images/CreateNote.png" alt="Create new note."></a></span>
        </div>
        <?php  $_smarty_tpl->tpl_vars['note'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['note']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['note']->key => $_smarty_tpl->tpl_vars['note']->value) {
$_smarty_tpl->tpl_vars['note']->_loop = true;
?>
            <div class="notes-list-item">
                <span class="notes-list-item-title"><a href="index.php?action=navigate&id=<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['note']->value['id']==$_smarty_tpl->tpl_vars['ACTIVE_NOTE_ID']->value) {?>class='active'<?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['note']->value['content'],20);?>
</a></span>
                <span class="notes-list-item-timestamp"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['note']->value['last_modified'],"%b %d");?>
</span>
            </div>      
        <?php } ?>
    </div>
    
    <div id="notepad">
        <div id="notepad-header" class="header">
            <span>
			<!-- Make sure you save the NicEditor content back to the textarea before submitting the form-->
			<a href="#" onclick="nicEditors.findEditor('content').saveContent();document.getElementById('updateForm').submit();">Save</a></span>&nbsp;|&nbsp;<span><a href="index.php?action=delete">Delete</a></span>
            <span class="right">Fname Lname</span>
        </div>
        <div>
            <?php  $_smarty_tpl->tpl_vars['note'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['note']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['note']->key => $_smarty_tpl->tpl_vars['note']->value) {
$_smarty_tpl->tpl_vars['note']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['note']->value['id']==$_smarty_tpl->tpl_vars['ACTIVE_NOTE_ID']->value) {?>
                <span id="timestamp"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['note']->value['last_modified'],"%B %d, %r");?>
</span>
                <form action="index.php" method="POST" id="updateForm">
                    <div id="tinymce-holder">
                        <textarea rows="20" cols="90" id="content" name="content" ><?php echo $_smarty_tpl->tpl_vars['note']->value['content'];?>
</textarea>
                    </div>  
                    <input type="hidden" name="action" value="update"/>
                </form>
                <?php }?>
            <?php } ?>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
