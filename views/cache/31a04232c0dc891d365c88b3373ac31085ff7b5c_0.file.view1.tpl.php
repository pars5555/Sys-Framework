<?php
/* Smarty version 3.1.30, created on 2016-09-10 09:55:28
  from "D:\xampp\htdocs\Pars-Framework\views\main\view1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d3bc701a9746_12566103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31a04232c0dc891d365c88b3373ac31085ff7b5c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Pars-Framework\\views\\main\\view1.tpl',
      1 => 1473494127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d3bc701a9746_12566103 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Welcome</h1>
<?php echo $_smarty_tpl->tpl_vars['model1']->value;?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['VIEWS_DIR']->value)."/main/view2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
