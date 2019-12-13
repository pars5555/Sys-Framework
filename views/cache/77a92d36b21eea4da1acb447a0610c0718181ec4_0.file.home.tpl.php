<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:34:54
  from "D:\xampp\htdocs\Sys-Framework\views\main\home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f5ee6b8586_62139743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77a92d36b21eea4da1acb447a0610c0718181ec4' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\main\\home.tpl',
      1 => 1576269291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f5ee6b8586_62139743 (Smarty_Internal_Template $_smarty_tpl) {
$_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['sn'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['sn'][0] : null;
if (!is_callable($_block_plugin1)) {
throw new SmartyException('block tag \'sn\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('sn', array());
$_block_repeat1=true;
echo $_block_plugin1(array(), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>
home<?php $_block_repeat1=false;
echo $_block_plugin1(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>



<?php if (!empty($_smarty_tpl->tpl_vars['sys_auth_user']->value)) {?>
    <p>user logged in</p>
<?php }
}
}
