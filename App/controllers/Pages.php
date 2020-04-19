<?php

class Pages extends Controller
{
    public function __construct()
    {
        echo "this is the page controller </br>";
    }

    public function index()
    {
        echo "This is the index function </br>";
    }
    public function about()
    {
        $this->view('About');
    }
}
