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

       public function __construct()
       {
           // code...
           $url = $this->getUrl();

           // Look in controllers for first value
           // ucword() function will capitalize the first letter
           if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
               // If exists, set as controller
               $this->currentController = ucwords($url[0]);
               // Unset the 0 Index
               unset($url[0]);
           }

           // Require the controller
           require_once '../app/controllers/' . $this->currentController . '.php';

           // Instantiate controller class
           $this->currentController = new $this->currentController;

           // Chech for the second part of the URL
           if (isset($url[1])) {
               // Check to see if method exists in controlelr
               if (method_exists($this->currentController, $url[1])) {
                   $this->currentMethod = $url[1];
                   // Unset 1 index
                   unset($url[1]);
               }
               // else {
               //     http_response_code(404);
               //     include APPROOT . '/views/pages/404.php'; // provide your own file for the error page
               //     die();
               // }
           }

           // Get params - opérateur ternaire
           $this->params = $url ? array_values($url) : [];
           // print_r($this->params);

           // https://www.php.net/manual/fr/function.call-user-func-array.php
           // cette fonction permet d'appeler une fonction - on appelle la fonction qui correspond à la methode dans notre controlleur
           // $this->currentController est la classe qui contient notre méthode
           // $this->currentMethod est le nom de notre méthode
           // $this->params sont les paramètres à utiliser

           // call_user_func_array EXAMPLE:

           // function favorite_movie($movie, $type, $year){
           //   echo "I love to watch $movie, it's my favorite $type movie which came out in $year !";
           // }

           // $function_name = 'favorite_movie';
           // $parameters = array('Braveheart', 'Drama', 1995);

           // call_user_func_array($function_name, $parameters);

           call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
       }

       public function getUrl()
       {
           // This variable is the key to everything
           // echo $_GET['url'];
           // We now need to break it up into an array
           // isset() - Cette fonction teste si une variable existe
           if (isset($_GET['url'])) {
               // variable superglobale $_GET
               $url = rtrim($_GET['url'], '/');
               // Supprime tous les caractères sauf les lettres, chiffres et $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
               // https://openclassrooms.com/fr/courses/1269536-les-filtres-en-php-pour-valider-les-donnees-utilisateur
               $url = filter_var($url, FILTER_SANITIZE_URL);
               $url = explode('/', $url);
               //  print_r($url);
               return $url;
           }
       }
   }
