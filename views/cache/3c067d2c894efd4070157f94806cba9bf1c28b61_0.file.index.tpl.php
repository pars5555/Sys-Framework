<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:26:47
  from "D:\xampp\htdocs\Sys-Framework\views\admin\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f407432835_96688661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c067d2c894efd4070157f94806cba9bf1c28b61' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\admin\\index.tpl',
      1 => 1576267247,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f407432835_96688661 (Smarty_Internal_Template $_smarty_tpl) {
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
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['VIEWS_DIR']->value)."/admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <div id="success_error_msg" class="success_error_msg"></div>
        <section id="admin" class="wrapper-content table">
            <div class="table-cell sidebar-cell" id="sidebar">
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['VIEWS_DIR']->value)."/admin/left_sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
            <div class="table-cell content-cell" id="rightSideContent">
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['included_in_index']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
        </section>        
        <div id="loader" class="loader">
            <div class="spinner"></div>
        </div>        

    </body>
</html><?php }
}
