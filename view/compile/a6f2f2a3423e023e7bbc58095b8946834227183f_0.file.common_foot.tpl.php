<?php
/* Smarty version 3.1.30, created on 2018-07-06 00:06:26
  from "/home/angel/webs/desarrollo/view/templates/common_foot.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b3edcb25777c5_46798950',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6f2f2a3423e023e7bbc58095b8946834227183f' => 
    array (
      0 => '/home/angel/webs/desarrollo/view/templates/common_foot.tpl',
      1 => 1530826115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3edcb25777c5_46798950 (Smarty_Internal_Template $_smarty_tpl) {
?>
   
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['scripts']->value, 'script');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['script']->value) {
?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
"><?php echo '</script'; ?>
>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php if (isset($_smarty_tpl->tpl_vars['scripts_extra']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['scripts_extra']->value, 'script');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['script']->value) {
?>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
"><?php echo '</script'; ?>
>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php }?>
    <?php }
}
