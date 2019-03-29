<?php
/**
 *
 */
class Livres extends Controller
{
    // déclaration des propriétés
    private $bookModel;
    private $chapterModel;

    public function __construct()
    {
        $this->bookModel = $this->model('AdminBook');
        // $this->chapterModel needed for the navigation
        $this->chapterModel = $this->model('AdminChapter');
    }

    public function index($id = null)
    {
        $books = $this->bookModel->getBooks();
        $book = $this->bookModel->getBookById($id);
        $chapters = $this->chapterModel->getChapters();

        $data = [
         'books' => $books,
         'book' => $book,
         'chapters' => $chapters,
        ];
        // type $id has to be integer
        if (is_null($id)) {
            $this->view('pages/livres', $data);
        } else {
            if (!$book) {
                $this->view('pages/404');
            } else {
                $this->view('pages/livre', $data);
            }
        }
    }
}
