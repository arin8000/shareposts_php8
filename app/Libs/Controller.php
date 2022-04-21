<?php

/*
 * Base controller
 * loads the models and views
 */

namespace App\Libs;

class Controller {
    // load model
    public function model($model)
    {
        // require model file
//        require_once '../app/Models/' . $model . '.php';

        // instantiate model
        $cname = "App\\Models\\" . $model;
        return new $cname;
//        return new $model();
    }

    // load view
    public function view($view, $data = [])
    {
        // check for view file
        if(file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // view
            die('View does not exist');
        }
    }
}