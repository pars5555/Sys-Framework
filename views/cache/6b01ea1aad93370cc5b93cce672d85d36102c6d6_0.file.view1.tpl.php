<?php
/* Smarty version 3.1.30, created on 2016-09-09 20:08:13
  from "D:\xampp\htdocs\Pars-Framework\views\main\view1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d2fa8d30d043_63293317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b01ea1aad93370cc5b93cce672d85d36102c6d6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Pars-Framework\\views\\main\\view1.tpl',
      1 => 1473444491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./view2.tpl' => 1,
  ),
),false)) {
function content_57d2fa8d30d043_63293317 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Welcome</h1>
<?php echo $_smarty_tpl->tpl_vars['model1']->value;?>

<?php $_smarty_tpl->_subTemplateRender("file:./view2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
