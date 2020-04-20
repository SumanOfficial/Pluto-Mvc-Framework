<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Pluto MVC'
        ];
        $this->view('/pages/index', $data);
    }
}
