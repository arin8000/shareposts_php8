<?php
/*
 * App Core class
 * creates URL & loads core controller
 * URL Format - /controller/method/params
 */
namespace App\Libs;

class Core {
    public $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
//        print_r($this->getUrl());
        $url = $this->getUrl();

        // look in controllers for first value
        if (isset($_GET['url'])) {
            if (file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) {
                // if exists, set as controller
                $this->currentController = ucwords($url[0]);
                // unset 0 index
                unset($url[0]);
            }
        }

        // instantiate controller class
        $cname = "App\\Controllers\\" . $this->currentController;
        $this->currentController = new $cname;


        // check for second part of url
        if (isset($url[1])) {
            // check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // unset 1 index
                unset($url[1]);
            }
        }
        // Get params
//        print_r($url);
        $this->params = $url ? array_values($url) : [];
//
//        if (!empty($this->params)) {
//            $this->params = $this->params[0];
//        }


        // call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
//        call_user_func([$this->currentController, $this->currentMethod], $this->params);
////        $this->params[0] ? !empty($this->params[0]) : null;

    }

    public function getUrl()
    {
        if (isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}