<?php

/*
    * App Core Class
    * Creates URL & Loads Core
    * URL FORMAT - /controller/method/params
*/


class Core
{
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $currentParams = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // ===============================
        // check if the first value exists

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // set the value as the current controller
            $this->currentController = ucwords($url[0]);

            // unset the value
            unset($url[0]);
        }
        // required the controller file
        require_once '../app/controllers/' . $this->currentController . '.php';

        // init the current controller
        $this->currentController = new $this->currentController;

        // =============================
        //checks the second value exitts

        if (isset($url[1])) {
            // looks for the method in current controller
            if (method_exists($this->currentController, $url[1])) {
                // set the value
                $this->currentMethod = $url[1];

                // // unset the value 
                unset($url[1]);
            }
        }
        //echo $this->currentMethod . "</br>";

        // ===============================
        // Getting the Parameters
        $this->currentParams = $url ? array_values($url) : [];

        // call a callback with array of parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->currentParams);
    }
    public function getUrl()
    {
        // check is url has set
        if (isset($_GET['url'])) {
            // trim the url
            $url = rtrim($_GET['url'], '/');
            // sanatize the url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // trun into array
            $url = explode('/', $url);

            return $url;
        }
    }
}
