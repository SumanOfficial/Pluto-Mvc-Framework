<?php
/*
    * App Core Class
    * Creates URL & Loads Core
    * URL FORMAT - /controller/method/params
*/


class Core
{
    protected $currentController = "pages";
    protected $currentMethod = "index";
    protected $currentParams = [];

    public function __construct()
    {
        $this->getUrl();
    }
    public function getUrl()
    {
        echo $_GET["url"];
    }
}
