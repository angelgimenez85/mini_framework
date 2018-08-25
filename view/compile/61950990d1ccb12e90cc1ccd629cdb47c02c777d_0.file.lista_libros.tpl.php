<?php
/* Smarty version 3.1.30, created on 2018-07-05 17:40:55
  from "/home/angel/webs/myframework/view/templates/lista_libros.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b3e8257718483_93010182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61950990d1ccb12e90cc1ccd629cdb47c02c777d' => 
    array (
      0 => '/home/angel/webs/myframework/view/templates/lista_libros.tpl',
      1 => 1530813806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common_head.tpl' => 1,
    'file:common_foot.tpl' => 1,
  ),
),false)) {
function content_5b3e8257718483_93010182 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
    <h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['libros']->value, 'libro');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['libro']->value) {
?>  
        <?php echo $_smarty_tpl->tpl_vars['libro']->value->getId();?>
<br/>
        <?php echo $_smarty_tpl->tpl_vars['libro']->value->getTitulo();?>
<br/><br/><br/>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
    
    <?php $_smarty_tpl->_subTemplateRender("file:common_foot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
