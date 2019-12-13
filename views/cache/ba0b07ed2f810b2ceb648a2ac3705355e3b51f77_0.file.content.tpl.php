<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:23:51
  from "D:\xampp\htdocs\Sys-Framework\views\admin\settings\content.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f3572e7fb0_36155646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba0b07ed2f810b2ceb648a2ac3705355e3b51f77' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\admin\\settings\\content.tpl',
      1 => 1550013388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f3572e7fb0_36155646 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="table main-table responsive-table real-voters">
    <ul class="table-row headline-row">
        <li class="table-cell">Variable</li>
        <li class="table-cell">Value</li>
        <li class="table-cell">Description</li>
        <li class="table-cell"></li>
        <li class="table-cell"></li>
    </ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['settings']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <ul class="table-row table-row-item">
            <li class="table-cell"><?php echo $_smarty_tpl->tpl_vars['row']->value->getVar();?>
</li>
            <li class="table-cell "><input class="input-default" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getValue();?>
" id="value_<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
"/></li>
            <li class="table-cell "><textarea class="textarea-default" id="description_<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" type="text" rows="2"><?php echo $_smarty_tpl->tpl_vars['row']->value->getDescription();?>
</textarea></li>
            <li class="table-cell centered"><a data-row_id="<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" class="button btn-primary f_save btn">Save</a></li>
        </ul>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div><?php }
}
