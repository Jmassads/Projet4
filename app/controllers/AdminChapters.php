<?php
/**
 *
 */
class AdminChapters extends Controller
{
  private $chapterModel;

  function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
   redirect('/users/login');
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

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Nous récupérons ici les données postées par le formulaire
   // les champs textuels (text, select, textarea, ...) sont copiés dans le tableau superglobal $_POST ;
   $data = [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'image' => $_FILES['myfile']['name'],

    'title_err' => '',
    'body_err' => '',
    'image_err' => '',
   ];

   $currentDir = getcwd();
   $uploadDirectory = "/uploads/";

   // $errors = []; // Store all foreseen and unforseen errors here
   $data['image_err'] = []; // Store all foreseen and unforseen errors here

   $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions

   // les informations concernant les champs de type file sont enregistrées dans le tableau superglobal $_FILES ;

   $fileName = $_FILES['myfile']['name']; // Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
   $fileSize = $_FILES['myfile']['size']; // La taille du fichier en octets.
   $fileTmpName = $_FILES['myfile']['tmp_name']; // L'adresse vers le fichier uploadé dans le répertoire temporaire.
   $fileType = $_FILES['myfile']['type'];
   $tmp = explode('.', $fileName);
   $fileExtension = strtolower(end($tmp));

   $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

   // Validate data
   if (empty($data['title'])) {
    $data['title_err'] = 'Ce champ ne peut pas être vide';
   }
   if (empty($data['body'])) {
    $data['body_err'] = 'Ce champ ne peut pas être vide';
   }

   if (!in_array($fileExtension, $fileExtensions)) {
    $data['image_err'][] = "Les fichiers autorises sont: .jpg, .jpeg, .png";
   }
   if ($fileSize > 2000000) {
    $data['image_err'][] = "Le fichier ne doit pas depasser les 2MB";
   }

   // Make sure there are no errors with the title and content
   if (empty($data['title_err']) && empty($data['body_err']) && empty($data['image'])) {

    // if image uploaded without errors, we add the chapter into the database
    if ($this->chapterModel->addChapter($data)) {
     //  die('SUCCESS');
     flash('chapter_message', 'Chapitre ajouté sans image');
     redirect('adminChapters');
    } else {
     die('Il y a eu une erreur');
    }
   } else if (empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err']) && !empty($data['image'])) {

    // Validated (no image errors)

    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if ($didUpload) {
     // if image uploaded without errors, we add the chapter into the database
     if ($this->chapterModel->addChapterWithImage($data)) {
      //  die('SUCCESS');
      flash('chapter_message', 'Chapitre ajouté avec image');
      redirect('adminChapters');
     } else {
      die('Il y a eu une erreur');
     }
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
    'image' => $_FILES['myfile']['name'],

    'title_err' => '',
    'body_err' => '',
    'image_err' => '',
   ];

   $currentDir = getcwd();
   $uploadDirectory = "/uploads/";

   // $errors = []; // Store all foreseen and unforseen errors here
   $data['image_err'] = []; // Store all foreseen and unforseen errors here

   $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions

   $fileName = $_FILES['myfile']['name']; // Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
   $fileSize = $_FILES['myfile']['size']; // La taille du fichier en octets.
   $fileTmpName = $_FILES['myfile']['tmp_name']; // L'adresse vers le fichier uploadé dans le répertoire temporaire.
   $fileType = $_FILES['myfile']['type'];
   $tmp = explode('.', $fileName);
   $fileExtension = strtolower(end($tmp));

   $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

   // Validate data
   if (empty($data['title'])) {
    $data['title_err'] = 'Ce champ ne peut pas être vide';
   }
   if (empty($data['body'])) {
    $data['body_err'] = 'Ce champ ne peut pas être vide';
   }

   if (!in_array($fileExtension, $fileExtensions)) {
    $data['image_err'][] = "Les fichiers autorises sont: .jpg, .jpeg, .png";
   }
   if ($fileSize > 2000000) {
    $data['image_err'][] = "Le fichier ne doit pas depasser les 2MB";
   }

   // Make sure there are no errors with the title and content
   if (empty($data['title_err']) && empty($data['body_err']) && empty($data['image'])) {
    // if image uploaded without errors, we add the chapter into the database
    if ($this->chapterModel->updateChapter($data)) {
     //  die("success");
     flash('chapter_message', 'Chapitre modifié sans image');
     redirect('adminChapters');
    } else {
     die('Il y a eu une erreur');
    }
   } else if (empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err']) && !empty($data['image'])) {

    // Validated (no image errors)

    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if ($didUpload) {
     // if image uploaded without errors, we add the chapter into the database
     if ($this->chapterModel->updateChapterWithImage($data)) {
      //  die('SUCCESS');
      flash('chapter_message', 'Chapitre modifié avec image');
      redirect('adminChapters');
     } else {
      die('Il y a eu une erreur');
     }
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

}
