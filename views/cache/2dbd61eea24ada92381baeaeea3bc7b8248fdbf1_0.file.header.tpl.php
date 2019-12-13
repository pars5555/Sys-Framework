<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:26:47
  from "D:\xampp\htdocs\Sys-Framework\views\admin\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f407446f28_24514296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2dbd61eea24ada92381baeaeea3bc7b8248fdbf1' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\admin\\header.tpl',
      1 => 1576267755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f407446f28_24514296 (Smarty_Internal_Template $_smarty_tpl) {
?>
<header class="header-main">
    <div class="container">
        <div class="table">
            <div class="table-cell logo-cell">
                <div class="logo-content">
                    <a href="javascript:void(0)" class="block"></a>
                </div>
            </div>
            <div class="table-cell action-cell">
                <div class="logged-user-name inline"><?php echo $_smarty_tpl->tpl_vars['sys_auth_user']->value->getName();?>
</div>
                <a href="/_sys_actions/Logout" class="inline logout-btn">
                    logout
                </a>
            </div>
        </div>
    </div>
</header><?php }
}
