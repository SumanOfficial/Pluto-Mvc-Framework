<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->model('Post');
    }

    public function index()
    {
        $data = [
            'title' => 'Pluto MVC'
        ];
        $this->view('/pages/index', $data);
    }
}
