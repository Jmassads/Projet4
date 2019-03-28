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
      }

      public function index()
      {
          $chapters = $this->chapterModel->getChapters();
          $books = $this->bookModel->getBooks();

          $data = [
       'chapters' => $chapters,
       'books' => $books
      ];
          $this->view('pages/index', $data);
      }
  }
