<?php
/* Smarty version 3.1.30, created on 2019-12-14 00:38:24
  from "D:\xampp\htdocs\Sys-Framework\views\main\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5df3f6c0bf5ae4_63615092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35f4e38d04d11c2131d7a44f6745a1f910e32600' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Sys-Framework\\views\\main\\index.tpl',
      1 => 1576269501,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df3f6c0bf5ae4_63615092 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="shortcut icon" href="https:<?php echo SITE_PATH;?>
/favicon.ico?<?php echo $_smarty_tpl->tpl_vars['sys_config']->value['VERSION'];?>
" type="image/x-icon"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8157753975df3f6c0be3300_63060235', "meta_page_description");
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8474414005df3f6c0be6a99_09115714', "meta_page_keywords");
?>

        <meta name="author" content="Vahagn Sookiasian (vahagnsookiasyan@gmail.com)"/>

        <link href="/out/<?php echo SUB_DOMAIN_DIR_FILE_NAME;?>
/sys.css?<?php echo $_smarty_tpl->tpl_vars['sys_config']->value['VERSION'];?>
" type="text/css" rel="stylesheet">
        <?php if ($_smarty_tpl->tpl_vars['sys_env']->value == 'prod') {?>
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['VIEWS_DIR']->value)."/main/_sys_/js_include_".((string)$_smarty_tpl->tpl_vars['sys_config']->value['VERSION']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <?php } else { ?>
            <?php echo '<script'; ?>
 type="text/javascript" src="/out/<?php echo SUB_DOMAIN_DIR_FILE_NAME;?>
/sys.js?<?php echo $_smarty_tpl->tpl_vars['sys_config']->value['VERSION'];?>
"><?php echo '</script'; ?>
>
        <?php }?>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17154893015df3f6c0bf12d8_51241628', "head");
?>

        <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14962014195df3f6c0bf2cb1_97749956', "title");
?>
</title>
    </head>
    <body class="body lang_<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
">
        <div id="fb-root"></div>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['VIEWS_DIR']->value)."/main/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


        <section id="mainContent" class="main_content">
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['included_in_index']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </section>

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['VIEWS_DIR']->value)."/main/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>




        <div id="loading" class="hidden">
            <div class="element">
                <div class="sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>

    </body>
</html>




<?php }
/* {block "meta_page_description"} */
class Block_8157753975df3f6c0be3300_63060235 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php if (isset($_smarty_tpl->tpl_vars['meta_page_description']->value)) {?>
                <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['meta_page_description']->value;?>
">
            <?php }?>
        <?php
}
}
/* {/block "meta_page_description"} */
/* {block "meta_page_keywords"} */
class Block_8474414005df3f6c0be6a99_09115714 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php if (isset($_smarty_tpl->tpl_vars['meta_page_keywords']->value)) {?>
                <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['meta_page_keywords']->value;?>
">
            <?php }?>
        <?php
}
}
/* {/block "meta_page_keywords"} */
/* {block "head"} */
class Block_17154893015df3f6c0bf12d8_51241628 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php
}
}
/* {/block "head"} */
/* {block "title"} */
class Block_14962014195df3f6c0bf2cb1_97749956 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['page_title']->value)) {
echo $_smarty_tpl->tpl_vars['page_title']->value;
} else { ?>Title<?php }
}
}
/* {/block "title"} */
}
