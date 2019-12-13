<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:25:14
  from "D:\xampp\htdocs\Sys-Framework\views\admin\page_titles\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f3aaca58c1_31489030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef0a6f265c3ca26ffc7e91632bac4035ce1cb014' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\admin\\page_titles\\index.tpl',
      1 => 1550013388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f3aaca58c1_31489030 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="table main-table responsive-table real-voters">
    <ul class="table-row headline-row">
        <li class="table-cell">Page</li>
        <li class="table-cell">English</li>
        <li class="table-cell">Armenian</li>
        <li class="table-cell">Russian</li>
    </ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <ul class="table-row table-row-item">
            <li class="table-cell"><?php echo $_smarty_tpl->tpl_vars['row']->value->getUrl();?>
</li>
            <li class="table-cell"><input type="text" id="en_<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getEn();?>
" style="width: 100%"/></li>
            <li class="table-cell"><input type="text" id="hy_<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getHy();?>
" style="width: 100%"/></li>
            <li class="table-cell"><input type="text" id="ru_<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getRu();?>
" style="width: 100%"/></li>
            <li class="table-cell centered"><a data-rowid="<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" class="button btn-primary f_save btn">Save</a></li>
        </ul>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div><?php }
}
