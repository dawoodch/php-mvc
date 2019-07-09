<?php


class Router
{
    protected $params = [];
    protected $routes = [];

    public function add($route , $params = []){
//        $this->routes[$route] = $param;
        // convert route to regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/' , $route);
        // convert variables e.g {controller}
        $route = preg_replace('/\{([a-z]+)\}/' , '(?P<\1>[a-z-]+)',$route);
        // add start and end delimiters and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
//        var_dump($this->routes);
    }

    public function getRoutes(){
        return $this->routes;
    }

    public function match($url){
//        foreach ($this->routes as $route => $params):
//            if ($url == $route):
//                $this->params = $params;
//                return true;
//            endif;
//        endforeach;
//
//        return false;




        // Match to the fixed URL format /controller/action
//        $reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

//        if(preg_match($reg_exp,$url,$matches)){
//            $params = [];
//            foreach ($matches as $key => $match){
//                if (is_string($key)){
//                    $params[$key] = $match;
//                }
//            }
//            $this->params=$params;
//            return true;
//        }


        foreach ($this->routes as $route => $params) {
            if(preg_match($route,$url,$matches)){
                // get named capture group values
                // params=[]
                foreach ($matches as $key => $match) {
                    if (is_string($key)){
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

}