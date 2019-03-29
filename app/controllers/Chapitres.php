<?php

/**
 *
 */
class Chapitres extends Controller
{
    // déclaration des propriétés
    private $chapterModel;

    public function __construct()
    {
        $this->chapterModel = $this->model('AdminChapter');
        // $this->bookModel needed for the navigation
        $this->bookModel = $this->model('AdminBook');
    }

    public function index($id = null)
    {
        $chapters = $this->chapterModel->getChapters();
        $chapter = $this->chapterModel->getChapterById($id);
        $books = $this->bookModel->getBooks();

        $data = [
         'chapters' => $chapters,
         'chapter' => $chapter,
         'books' => $books,
        ];

        if (is_null($id)) {
            $this->view('pages/chapitres', $data);
        } else {
            if (!$chapter) {
                $this->view('pages/404');
            } else {
                $this->view('pages/chapitre', $data);
            }
        }
    }
}
