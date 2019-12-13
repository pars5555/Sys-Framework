<!DOCTYPE html>
<html lang="{$lang}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="shortcut icon" href="https:{SITE_PATH}/favicon.ico" type="image/x-icon"/>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">
        
        <meta name="author" content="Vahagn Sookiasian (vahagnsookiasyan@gmail.com)">
        <link href="/out/{SUB_DOMAIN_DIR_FILE_NAME}/sys.css?{$sys_config.VERSION}" type="text/css" rel="stylesheet">
       
    </head>
    <body>
        <div id="fb-root"></div>
        
 {include file="$VIEWS_DIR/main/header.tpl"}
        <section id="mainContent" class="main_content">
            {sn}Not Found{/sn}
        </section>
        {include file="$VIEWS_DIR/main/footer.tpl"}
    </body>
</html>