<?php

spl_autoload_register(function($class){
    if(file_exists($class . ".php")){
        require_once $class . ".php";
    }
});

$class = isset($_REQUEST["class"]) ? $_REQUEST["class"] : "ListaPalestra";
$method = isset($_REQUEST["method"]) ? $_REQUEST["method"] : null;


if(class_exists($class)){
    $pagina = new $class($_REQUEST);

    if(!(empty($method)) and method_exists($class, $method)){
        $pagina->$method($_REQUEST);
    }

    $pagina->show();
}