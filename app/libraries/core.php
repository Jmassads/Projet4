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
       // This variable is the key to everything
       // echo $_GET['url'];
       // We now need to break it up into an array
       $url = rtrim($_GET['url'], '/');
       // Supprime tous les caractères sauf les lettres, chiffres et $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
       $url = filter_var($url, FILTER_SANITIZE_URL);
       $url = explode('/', $url);
       //  print_r($url);
       print_r($url);
       return $url;

     }


   }
