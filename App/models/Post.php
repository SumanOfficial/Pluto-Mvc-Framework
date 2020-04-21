<?php

    /*
     * Model Class
     * get post model
     */

     class Post{
        //  Database referance property
        private $db;

        // default constructor
        public function __construct()
        {
            $this->db = new Database;
        }
     }
