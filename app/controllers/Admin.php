<?php

  /**
   *
   */
  class Admin extends Controller
  {

    function __construct()
    {
      if (!isset($_SESSION['user_id'])) {
       redirect('users/login');
      }
    }

    public function index(){
      $this->view('admin/index');
    }
  }
