<?php

  /**
   *
   */
  class Admin extends Controller
  {
      // déclaration des propriétés
      private $chapterModel;
      private $bookModel;
      private $commentModel;

      public function __construct()
      {
          if (!isset($_SESSION['user_id'])) {
              redirect('users/login');
          }

          $this->chapterModel = $this->model('AdminChapter');
          $this->bookModel = $this->model('AdminBook');
          $this->commentModel = $this->model('Comment');
      }

      public function index()
      {
          $chaptersCount = $this->chapterModel->countChapters();
          $booksCount = $this->bookModel->countBooks();
          $commentsCount = $this->commentModel->countComments();

          $data = [
           'chaptersCount' => $chaptersCount,
           'booksCount' => $booksCount,
           'commentsCount' => $commentsCount,
          ];

          $this->view('admin/index', $data);
      }
  }
