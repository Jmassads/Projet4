<?php

  /**
   *
   */
  class Admin extends Controller
  {

    function __construct()
    {
      // code...
    }

    public function index(){
      $this->view('admin/index');
    }
  }
