<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="initial-scale=1.0,width=device-width">
        <link href="/out/{SUB_DOMAIN_DIR_FILE_NAME}/sys.css?{$sys_config.VERSION}" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="/out/{SUB_DOMAIN_DIR_FILE_NAME}/sys.js?{$sys_config.VERSION}"></script>
        <title>Title</title>
    </head>
    <body>
        {include file="$VIEWS_DIR/admin/header.tpl"}
        <div id="success_error_msg" class="success_error_msg"></div>
        <section id="admin" class="wrapper-content table">
            <div class="table-cell sidebar-cell" id="sidebar">
                {include file="$VIEWS_DIR/admin/left_sidebar.tpl"}
            </div>
            <div class="table-cell content-cell" id="rightSideContent">
                {include file="$included_in_index"}
            </div>
        </section>        
        <div id="loader" class="loader">
            <div class="spinner"></div>
        </div>        

    </body>
</html>