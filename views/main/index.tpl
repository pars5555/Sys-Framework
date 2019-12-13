<!DOCTYPE html>
<html lang="{$lang}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="shortcut icon" href="https:{SITE_PATH}/favicon.ico?{$sys_config.VERSION}" type="image/x-icon"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">
        {block name="meta_page_description"}
            {if isset($meta_page_description)}
                <meta name="description" content="{$meta_page_description}">
            {/if}
        {/block}
        {block name="meta_page_keywords"}
            {if isset($meta_page_keywords)}
                <meta name="keywords" content="{$meta_page_keywords}">
            {/if}
        {/block}
        <meta name="author" content="Vahagn Sookiasian (vahagnsookiasyan@gmail.com)"/>

        <link href="/out/{SUB_DOMAIN_DIR_FILE_NAME}/sys.css?{$sys_config.VERSION}" type="text/css" rel="stylesheet">
        {if $sys_env == 'prod'}
            {include file="$VIEWS_DIR/main/_sys_/js_include_`$sys_config.VERSION`.tpl"}
        {else}
            <script type="text/javascript" src="/out/{SUB_DOMAIN_DIR_FILE_NAME}/sys.js?{$sys_config.VERSION}"></script>
        {/if}
        {block name="head"}
        {/block}
        <title>{block name="title"}{if isset($page_title)}{$page_title}{else}Title{/if}{/block}</title>
    </head>
    <body class="body lang_{$lang}">
        <div id="fb-root"></div>
        {include file="$VIEWS_DIR/main/header.tpl"}

        <section id="mainContent" class="main_content">
            {include file=$included_in_index}
        </section>

        {include file="$VIEWS_DIR/main/footer.tpl"}



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




