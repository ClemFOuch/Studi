<?php
session_start();
session_destroy();
foreach($_COOKIE as $cookie_name => $cookie_value){
    unset($_COOKIE[$cookie_name]);
    setcookie($cookie_name, '', time() - 4200, '/');
 }
header('Location: '.$router->url('Ventalis'));
exit();