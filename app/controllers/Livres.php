<?php
/**
 *
 */
class Livres extends Controller
{
    // déclaration des propriétés
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = $this->model('AdminBook');
    }

    public function index($id = null)
    {
        $books = $this->bookModel->getBooks();
        $book = $this->bookModel->getBookById($id);

        $data = [
         'books' => $books,
         'book' => $book,
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
