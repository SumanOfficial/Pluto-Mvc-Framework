<?php

class Controller
{
    // loading the model
    public function model($model)
    {
        require_once '../App/models/' . $model . '.php';
        // instanciate the model 
        return new $model();
    }

    // loading the view 
    public function view($view, $data = [])
    {
        // check for the view file 
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("view dose not exists");
        }
    }
}
