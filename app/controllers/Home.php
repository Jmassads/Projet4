<?php

  /**
   *
   */
  class Home extends Controller
  {
      // déclaration des propriétés
      private $chapterModel;
      private $bookModel;

      public function __construct()
      {
          $this->chapterModel = $this->model('AdminChapter');
          $this->bookModel = $this->model('AdminBook');
          $this->userModel = $this->model('User');
      }

      public function index()
      {
          $id = 1; // user with id 1 is Jean Forteroche
          $chapters = $this->chapterModel->getChapters();
          $books = $this->bookModel->getBooks();
          $author = $this->userModel->getCurrentUser($id);

          $data = [
             'chapters' => $chapters,
             'books' => $books,
             'author' => $author
            ];
          $this->view('pages/index', $data);
      }
  }
