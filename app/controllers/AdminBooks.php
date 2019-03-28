<?php

  /**
   *
   */
  class AdminBooks extends Controller
  {
    // déclaration des propriétés

    private $bookModel;

    function __construct()
    {
      if (!isset($_SESSION['user_id'])) {
       redirect('/users/login');
      }

      $this->bookModel = $this->model('AdminBook');
    }

    /**
      * index
      * Voir tous les livres
      * @return void
      */
     public function index()
     {

      $books = $this->bookModel->getBooks();

      $data = [
       'books' => $books,
      ];

      $this->view('adminbooks/index', $data);
     }
  }
