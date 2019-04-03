<?php

/**
 *
 */
class Chapitres extends Controller
{
 // déclaration des propriétés
 private $chapterModel;
 private $bookModel;
 private $commentModel;

 public function __construct()
 {
  $this->chapterModel = $this->model('AdminChapter');
  // $this->bookModel needed for the navigation
  $this->bookModel = $this->model('AdminBook');
  $this->commentModel = $this->model('Comment');
 }

 public function index($id = null)
 {
  $chapters = $this->chapterModel->getChapters();
  $chapter = $this->chapterModel->getChapterById($id);
  $books = $this->bookModel->getBooks();
  $commentsByChapterId = $this->commentModel->getCommentsbyChapterId($id);
  $commentsCount = $this->commentModel->countCommentsbychapter($id);

  $data = [
   'chapters' => $chapters,
   'chapter' => $chapter,
   'books' => $books,
   'commentsByChapterId' => $commentsByChapterId,
   'commentsCount' => $commentsCount,
  ];

  if (is_null($id)) {
   $this->view('pages/chapitres', $data);
  } else {
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize POST
    // $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
     // 'firstname' => htmlspecialchars($_POST['firstname']),
     // 'lastname' => htmlspecialchars($_POST['lastname']),
     // 'comment' => htmlspecialchars($_POST['comment']),
     // 'chapter_id' => htmlspecialchars($_POST['chapter_id']),
     'firstname' => $_POST['firstname'],
     'lastname' => $_POST['lastname'],
     'comment' => $_POST['comment'],
     'chapter_id' => $_POST['chapter_id'],
    ];

    if ($this->commentModel->addComment($data)) {
     flash('comment_message', 'Commentaire ajouté!');
     header('Location: ' . URLROOT . '/' . 'chapitres/' . $id . '#comment-flash');
    } else {
     die('Something went wrong');
    }
   } else {
    if (!$chapter) {
     $this->view('pages/404');
    } else {
     $this->view('pages/chapitre', $data);
    }
   }
  }
 }

 public function flag($id)
 {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $data = [
    'comment_id' => $_POST['comment_id'],
    'flag' => $_POST['flag'],
   ];

   if (isset($_POST['flag'])) {
    $this->commentModel->addflag($data);

    flash('comment_message', 'Commentaire signalé!');
    header('Location: ' . URLROOT . '/' . 'chapitres/' . $id . '#comment-flash');
   } else {
    die('something went wrong');
   }
  } else {
   if (is_null($id)) {
    redirect('Chapitres');
   }

   $data = [
    'comment_id' => '',
    'flag' => 0,
   ];

   $this->view('pages/chapitres', $data);
  }
 }
}
