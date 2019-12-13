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
</html>