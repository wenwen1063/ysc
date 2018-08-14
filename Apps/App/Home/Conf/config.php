<?php
$arr  = include './config.php';
$arr2 = array(
    'URL_MODEL'     => 1, //启动路由功能
    'URL_ROUTER_ON' => true,
);
return array_merge($arr, $arr2);
