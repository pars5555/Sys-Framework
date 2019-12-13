<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:25:57
  from "D:\xampp\htdocs\Sys-Framework\views\admin\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f3d5646b98_14914287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91ef90a0a3a8949f9b6cf322205c3766c938c980' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\admin\\login.tpl',
      1 => 1576267404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f3d5646b98_14914287 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="initial-scale=1.0,width=device-width">
        <link href="/out/<?php echo SUB_DOMAIN_DIR_FILE_NAME;?>
/sys.css?<?php echo $_smarty_tpl->tpl_vars['sys_config']->value['VERSION'];?>
" type="text/css" rel="stylesheet">
        <?php echo '<script'; ?>
 type="text/javascript" src="/out/<?php echo SUB_DOMAIN_DIR_FILE_NAME;?>
/sys.js?<?php echo $_smarty_tpl->tpl_vars['sys_config']->value['VERSION'];?>
"><?php echo '</script'; ?>
>
        <title>Title</title>
    </head>
    <body>
        <section id="main" class="main-content">
            <div class="login-content table">
                <div class="table-cell">
                    <div class="login-inner">
                        <div class="logo-content"></div>
                        <form class="form-group" action="/_sys_/actions/Login" method="POST">
                            <label class="field block">
                                <span class="field-label block">Email</span>
                                <input type="text" name="email"/>
                            </label>
                            <label class="field block">
                                <span class="field-label block">Password</span>
                                <input type="password" name="password"/>
                            </label>
                            <div class="buttons-content">
                                <button class="submit-button">login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html><?php }
}
