<?php

  /**
   *
   */
  class Admin extends Controller
  {
      // déclaration des propriétés
      private $chapterModel;
      private $bookModel;

      public function __construct()
      {
          if (!isset($_SESSION['user_id'])) {
              redirect('users/login');
          }

          $this->chapterModel = $this->model('AdminChapter');
          $this->bookModel = $this->model('AdminBook');
      }

      public function index()
      {
          $chaptersCount = $this->chapterModel->countChapters();
          $booksCount = $this->bookModel->countBooks();

          $data = [
           'chaptersCount' => $chaptersCount,
           'booksCount' => $booksCount,
          ];

          $this->view('admin/index', $data);
      }
  }
