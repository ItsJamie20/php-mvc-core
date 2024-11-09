<?php

namespace jamiegumbrell\phpmvc;

use jamiegumbrell\phpmvc\exception\NotFoundException;

class Router{

    public Request $request;
    public Response $response;
    protected array $routes = [];
    protected array $params = [];

    public function __construct(Request $request, Response $response){
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function getParams($path, $callback, $params){
        $this->routes['get'][$path] = $callback;
        $this->params = $params;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if(!$callback) {
            throw new NotFoundException();
            exit;
        }
        if(is_string($callback)){
            echo 'isString';
            return  Application::$app->view->renderView($callback);
        }
        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $controller = Application::$app->controller;
            $controller->action = $callback[1];
            foreach($controller->getMiddlewares() as $middleware){
                $middleware->execute();
            }
            $callback[0] = $controller;
        }
        return call_user_func($callback, $this->request, $this->response, $this->params);
    }

}