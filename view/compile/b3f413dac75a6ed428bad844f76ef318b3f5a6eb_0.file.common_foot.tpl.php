<?php
/* Smarty version 3.1.30, created on 2018-07-05 18:28:39
  from "/home/angel/webs/books-dev.com/view/templates/common_foot.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b3e8d87e2e728_61731780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3f413dac75a6ed428bad844f76ef318b3f5a6eb' => 
    array (
      0 => '/home/angel/webs/books-dev.com/view/templates/common_foot.tpl',
      1 => 1530826115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3e8d87e2e728_61731780 (Smarty_Internal_Template $_smarty_tpl) {
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
