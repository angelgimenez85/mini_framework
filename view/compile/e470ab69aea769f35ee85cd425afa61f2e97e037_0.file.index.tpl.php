<?php
/* Smarty version 3.1.30, created on 2018-07-05 18:06:17
  from "/home/angel/webs/books-dev.com/view/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b3e8849c49e16_25475191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e470ab69aea769f35ee85cd425afa61f2e97e037' => 
    array (
      0 => '/home/angel/webs/books-dev.com/view/templates/index.tpl',
      1 => 1530681360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common_head.tpl' => 1,
    'file:common_foot.tpl' => 1,
  ),
),false)) {
function content_5b3e8849c49e16_25475191 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
    <h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>    
    <?php $_smarty_tpl->_subTemplateRender("file:common_foot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
