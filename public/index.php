<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    // require '../Core/Router.php';
    // require '../App/Controllers/Posts.php';

    spl_autoload_register(function ($class){
        $root = dirname(__DIR__); // get the parent directory
        $file = $root. '/' . str_replace('\\','/',$class).'.php';
        if(is_readable($file)){
            require $root.'/'. str_replace('\\','/',$class).'.php';
        }    
    });


//    add routes

    $router = new Core\Router();

    $router->add('', ['controller'=>'Home','action'=>'index']);
    $router->add('posts',['controller'=>'Posts','action'=>'index']);
//    $router->add('/new',['controller'=>'Posts','action'=>'new']);
    $router->add('{controller}/{action}');
    $router->add('admin/{action}/{controller}');
    $router->add('{controller}/{id:\}/{action}');
    
    
    // var_dump($router->getRoutes());
//    $check = $router->getRoutes();
//    echo '<pre>';
//    var_dump($check['posts/new']['controller']);
//    echo '</pre>';

    $url = $_SERVER['QUERY_STRING'];

    // if ($router->match($url)):
    //     echo "Router Found: ";
    //     echo '<pre>';
    //     var_dump($router->getParams());
    //     echo '</pre>';
    // else:
    //     echo "No routes found for the URL" . $url;
    // endif;

    $router->dispatch($url);