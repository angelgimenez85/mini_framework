<?php
/* Smarty version 3.1.30, created on 2018-07-05 15:12:30
  from "/home/angel/webs/myframework/view/templates/common_foot.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b3e5f8e3116a2_51410764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc08ff048ba9b9ed2678d28db2ce07d909942406' => 
    array (
      0 => '/home/angel/webs/myframework/view/templates/common_foot.tpl',
      1 => 1520513333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3e5f8e3116a2_51410764 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <div id="loadingMessage">
        <!-- <p><b>Cargando...</b></p> -->
        <div class="message">        
            <img src="/img/loading.gif" style="width: 100px;">   
        </div>
    </div>
    
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
