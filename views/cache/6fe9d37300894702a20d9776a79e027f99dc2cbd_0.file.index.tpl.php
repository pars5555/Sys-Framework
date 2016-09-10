<?php
/* Smarty version 3.1.30, created on 2016-09-10 09:54:59
  from "D:\xampp\htdocs\Pars-Framework\views\main\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d3bc53b6feb7_33442303',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fe9d37300894702a20d9776a79e027f99dc2cbd' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Pars-Framework\\views\\main\\index.tpl',
      1 => 1473494098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d3bc53b6feb7_33442303 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0,width=device-width">
        <link href="/out/all.css" type="text/css" rel="stylesheet">
        <?php echo '<script'; ?>
 type="text/javascript" src="/out/all.js"><?php echo '</script'; ?>
>
        <title>Title</title>
    </head>
    <body>
        <section id="main" class="content">
            <header>
                <div class="welcome">
                    <h1>Welcome to Pars Framework</h1>
                </div>
            </header>
        </section>
        <section class="content">            
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['VIEWS_DIR']->value)."/main/view1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </section>
    </body>
</html>
<?php }
}
