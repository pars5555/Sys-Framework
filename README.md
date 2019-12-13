# Sys-Framework
PHP most simple Framework


Key features<br>
1 . JSON Routing<br>
2 . JSON configs<br>
3 . Smarty Templator<br>
4 . MVC  (Model View Controller) architecture<br>
5 . Javascript Framework corresponding to PHP Views.<br>
6 . Mysql Connection Wrapper for easy query management<br>
7 . Easy setup (no commandline need)

apache vhosts

```
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host.example.com
    DocumentRoot "D:/xampp/htdocs/Sys-Framework/public"
    ServerName example.com
    ServerAlias www.example.com admin.example.com
    RewriteEngine On
    RewriteCond %{DOCUMENT_ROOT}%{REQUEST_URI} !-f
    RewriteRule (.*) /start.php [NS,L,QSA]   
    ErrorLog "logs/host.example.com-error.log"
    CustomLog "logs/host.example.com-access.log" common
</VirtualHost>
```
