<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:22:46
  from "D:\xampp\htdocs\Sys-Framework\views\admin\snippets\content.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f316f397c6_72016911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5acceb048492d733db3d8c8c053ab7700370214' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\admin\\snippets\\content.tpl',
      1 => 1550013388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f316f397c6_72016911 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="table main-table responsive-table real-voters">
    <ul class="table-row headline-row">
        <li class="table-cell">Name</li>
        <li class="table-cell">English</li>
        <li class="table-cell">Armenian</li>
        <li class="table-cell">Russian</li>
        <li class="table-cell">Actions</li>
    </ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['snippets']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <ul class="table-row table-row-item">
            <li class="table-cell"><?php echo $_smarty_tpl->tpl_vars['row']->value->getName();?>
</li>
            <li class="table-cell"><textarea class="textarea-default" type="text" rows="2" id="phrase_en_<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" ><?php echo $_smarty_tpl->tpl_vars['row']->value->getEn();?>
</textarea></li>
            <li class="table-cell"><textarea class="textarea-default" type="text" rows="2" id="phrase_hy_<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" ><?php echo $_smarty_tpl->tpl_vars['row']->value->getHy();?>
</textarea></li>
            <li class="table-cell"><textarea class="textarea-default" type="text" rows="2" id="phrase_ru_<?php echo $_smarty_tpl->tpl_vars['row']->value->getId();?>
" ><?php echo $_smarty_tpl->tpl_vars['row']->value->getRu();?>
</textarea></li>
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
