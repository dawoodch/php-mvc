<?php


    require '../Core/Router.php';

//    add routes

    $router = new Router();

    $router->add('', ['controller'=>'Home','action'=>'index']);
    $router->add('posts',['controller'=>'Posts','action'=>'index']);
//    $router->add('/new',['controller'=>'Posts','action'=>'new']);
    $router->add('{controller}/{action}');
    $router->add('admin/{action}/{controller}');
    var_dump($router->getRoutes());
    

//    $check = $router->getRoutes();
//    echo '<pre>';
//    var_dump($check['posts/new']['controller']);
//    echo '</pre>';

    $url = $_SERVER['QUERY_STRING'];

    if ($router->match($url)):
        echo "Router Found: ";
        echo '<pre>';
        var_dump($router->getParams());
        echo '</pre>';
    else:
        echo "No routes found for the URL" . $url;
    endif;

