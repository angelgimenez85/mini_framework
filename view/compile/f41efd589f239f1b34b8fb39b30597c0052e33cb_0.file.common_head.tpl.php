<?php
/* Smarty version 3.1.30, created on 2018-07-05 18:06:17
  from "/home/angel/webs/books-dev.com/view/templates/common_head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b3e8849c59ea3_43644669',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f41efd589f239f1b34b8fb39b30597c0052e33cb' => 
    array (
      0 => '/home/angel/webs/books-dev.com/view/templates/common_head.tpl',
      1 => 1519769274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3e8849c59ea3_43644669 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>

    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
">
    <meta name="author" content="Angel Gimenez">

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['styles']->value, 'style');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['style']->value) {
?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
" rel="stylesheet">
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


  </head><?php }
}
