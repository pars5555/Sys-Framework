<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:22:46
  from "D:\xampp\htdocs\Sys-Framework\views\admin\snippets\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f316ef2c72_32937227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1556c895abfbd8bb4c0d364fd9a5609e2ebfe0c5' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\admin\\snippets\\index.tpl',
      1 => 1550013388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f316ef2c72_32937227 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form autocomplete="off" class="page-options-block">
    <div class="page-limit-option default-legth">
        <select id="namespace_select">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['namespaces']->value, 'namespace');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['namespace']->value) {
?>
                <option value='<?php echo $_smarty_tpl->tpl_vars['namespace']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['selectedNamespace']->value == $_smarty_tpl->tpl_vars['namespace']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['namespace']->value;?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </select>
    </div>
    <div class="clear"></div>
</form>
<div id='selectedPageContent'>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['content']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

</div><?php }
}
