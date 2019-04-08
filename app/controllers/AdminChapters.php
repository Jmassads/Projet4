<?php
/**
 *
 */
class AdminChapters extends Controller
{
 private $chapterModel;

 public function __construct()
 {
  if (!isset($_SESSION['user_id'])) {
   redirect('Users/login');
  }
  // $this est une référence à l'objet
  // Instantiate model AdminChapter
  $this->chapterModel = $this->model('AdminChapter');
 }
 /**
  * On retrouve tous les éléments d'un CRUD :

  * Create : création des chapitres
  * Read : lecture de chapitres
  * Update : mise à jour de chapitres
  * Delete : suppression de chapitres

  */
 /**
  * index
  * Read : lecture de tous les chapitres
  * @return void
  */
 public function index()
 {
  $chapters = $this->chapterModel->getChapters();

  $data = [
   'chapters' => $chapters,
  ];

  $this->view('adminchapters/index', $data);
 }

 /**
  * add
  * Create: création des chapitres
  * @return void
  */
 public function add()
 {
  // Si le formulaire est soumis avec la méthode POST
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   // Nous récupérons ici les données postées par le formulaire
   // les champs textuels (text, select, textarea, ...) sont copiés dans le tableau superglobal $_POST ;
   $data = [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'image' => str_replace(' ', '', $_FILES['myfile']['name']),

    'title_err' => '',
    'body_err' => '',
    'image_err' => '',
   ];

   // Validate data
   if (empty($data['title'])) {
    $data['title_err'] = 'Ce champ ne peut pas être vide';
   }
   if (empty($data['body'])) {
    $data['body_err'] = 'Ce champ ne peut pas être vide';
   }

   $uploader = new Uploader();
   $uploader->uploadFile('myfile');
   $error_message = $uploader->getError();
   $data['image_err'] = $error_message;
   // Make sure there are no errors with the title and content
   if (empty($data['title_err']) && empty($data['body_err']) && empty($data['image'])) {
    // Si la méthode retourne TRUE

    if ($this->chapterModel->addChapter($data)) {
     //  die('SUCCESS');
     flash('chapter_message', 'Chapitre ajouté sans image');
     redirect('AdminChapters');
    } else {
     die('Il y a eu une erreur');
    }
   } elseif (empty($data['title_err']) && empty($data['body_err']) && !empty($data['image']) && empty($data['image_err'])) {
    if ($this->chapterModel->addChapterWithImage($data)) {
     //  die('SUCCESS');
     flash('chapter_message', 'Chapitre ajouté avec image');
     redirect('AdminChapters');
    } else {
     die('Il y a eu une erreur');
    }
   } else {
    $this->view('adminChapters/add', $data);
   }
  } else {
   $data = [
    'title' => '',
    'body' => '',
    'image' => '',
   ];
   $this->view('adminchapters/add', $data);
  }
 }

 /**
  * show
  * Read : lecture d'un chapitre
  * @param mixed $id
  * @return void
  */
 public function show($id)
 {
  $chapter = $this->chapterModel->getChapterById($id);

  $data = [
   'chapter' => $chapter,
  ];

  $this->view('adminchapters/show', $data);
 }

 /**
  * edit
  * Update : mise à jour de chapitres
  * @param mixed $id
  * @return void
  */
 public function edit($id)
 {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // die('submitted');
   // Sanitize POST array

   //  $_POST = filter_input_array(INPUT_POST);

   $data = [
    'id' => $id,
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'image' => str_replace(' ', '', $_FILES['myfile']['name']),

    'title_err' => '',
    'body_err' => '',
    'image_err' => '',
   ];

   // Validate data
   if (empty($data['title'])) {
    $data['title_err'] = 'Ce champ ne peut pas être vide';
   }
   if (empty($data['body'])) {
    $data['body_err'] = 'Ce champ ne peut pas être vide';
   }

   $uploader = new Uploader();
   $uploader->uploadFile('myfile');
   $error_message = $uploader->getError();
   $data['image_err'] = $error_message;

   // Make sure there are no errors with the title and content
   if (empty($data['title_err']) && empty($data['body_err']) && empty($data['image'])) {
    // if image uploaded without errors, we add the chapter into the database
    if ($this->chapterModel->updateChapter($data)) {
     //  die("success");
     flash('chapter_message', 'Chapitre modifié sans image');
     redirect('AdminChapters');
    } else {
     die('Il y a eu une erreur');
    }
   } elseif (empty($data['title_err']) && empty($data['body_err']) && !empty($data['image']) && empty($data['image_err'])) {
    if ($this->chapterModel->updateChapterWithImage($data)) {
     //  die('SUCCESS');
     flash('chapter_message', 'Chapitre modifié avec image');
     redirect('AdminChapters');
    } else {
     die('Il y a eu une erreur');
    }
   } else {
    $this->view('adminChapters/edit', $data);
   }
  } else {

   // Get existing chapter from model
   $chapter = $this->chapterModel->getChapterById($id);

   $data = [
    'id' => $id,
    'title' => $chapter->title,
    'body' => $chapter->body,
    'image' => $chapter->image,
   ];
   $this->view('adminchapters/edit', $data);
  }
 }

 /**
  * deletechapter
  * Delete : suppression de chapitres
  * @param mixed $id
  * @return void
  */
 public function deletechapter($id)
 {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //Execute
   if ($this->chapterModel->deleteChapter($id)) {
    // Redirect to login
    flash('chapter_message', 'Chapitre supprimé');
    redirect('AdminChapters/index');
   } else {
    die('Something went wrong');
   }
  }
 }
}
