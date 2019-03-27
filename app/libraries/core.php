<?php

  /*
   * Main Core /**
    * Creates URL & loads core controller
    * URL FORMAT = /controller/method/params
    */

   class Core
   {
     protected $currentController = 'Home';
     protected $currentMethod = 'Index';
     protected $params = [];

     function __construct()
     {
       // code...
       $this->getUrl();
     }

     public function getUrl(){
       echo $_GET['url'];
     }


   }
