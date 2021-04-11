<?php
if(!isset($_COOKIE['test']))
{  
    setcookie('test', 'Hello world!');
}
else
{
    echo "Cookie value: " . $_COOKIE['test'];    
}