<?php

  /**
   *
   */
  class Home extends Controller
  {

    function __construct()
    {
      // code...
    }

    function index(){
      $data = [
        'title' => 'Bienvenue'
      ];

      $this->view('pages/index', $data);
    }
  }
