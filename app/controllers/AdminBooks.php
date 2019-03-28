<?php

  /**
   *
   */
  class AdminBooks extends Controller
  {
    // déclaration des propriétés

    private $bookModel;

    function __construct()
    {
      if (!isset($_SESSION['user_id'])) {
       redirect('/users/login');
      }

      $this->bookModel = $this->model('AdminBook');
    }

    /**
      * index
      * Voir tous les livres
      * @return void
      */
     public function index()
     {

      $books = $this->bookModel->getBooks();

      $data = [
       'books' => $books,
      ];

      $this->view('adminbooks/index', $data);
     }

     /**
  * add
  * Rajouter un livre (CREATE)
  * @return void
  */
 public function add()
 {

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   // die('submitted');

   $data = [
    'title' => $_POST['title'],
    'summary' => $_POST['summary'],
    'genre' => $_POST['genre'],
    'image' => str_replace(' ', '', $_FILES['myfile']['name']),

    'title_err' => '',
    'summary_err' => '',
    'image_err' => '',
   ];

   $currentDir = getcwd();
   $uploadDirectory = "/uploads/";

   // $errors = []; // Store all foreseen and unforseen errors here
   $data['image_err'] = []; // Store all foreseen and unforseen errors here

   $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions

   $fileName = str_replace(' ', '', $_FILES['myfile']['name']); // Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
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
   if (empty($data['summary'])) {
    $data['summary_err'] = 'Ce champ ne peut pas être vide';
   }

   if (!in_array($fileExtension, $fileExtensions)) {
    $data['image_err'][] = "Les fichiers autorises sont: .jpg, .jpeg, .png";
   }
   if ($fileSize > 2000000) {
    $data['image_err'][] = "Le fichier ne doit pas depasser les 2MB";
   }

   // Make sure there are no errors with the title and content
   if (empty($data['title_err']) && empty($data['summary_err']) && empty($data['image'])) {

    // if image uploaded without errors, we add the book into the database

    // if ($this->bookModel->addBook($data)) {
    //  //  die('SUCCESS');
    //  flash('book_message', 'Livre ajouté sans image');
    //  redirect('adminBooks');
    // } else {
    //  die('Il y a eu une erreur');
    // }

    $this->bookModel->addbooktest($data);
    flash('book_message', 'Livre ajouté sans image');
    redirect('adminBooks');

   } else if (empty($data['title_err']) && empty($data['summary_err']) && empty($data['image_err']) && !empty($data['image'])) {

    // Validated (no image errors)

    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if ($didUpload) {
     // if image uploaded without errors, we add the bookinto the database
     if ($this->bookModel->addBookWithImage($data)) {
      // die('SUCCESS');
      flash('book_message', 'Livre ajouté avec image');
      redirect('adminBooks');
     } else {
      die('Il y a eu une erreur');
     }
    }

   } else {
    $this->view('adminbooks/add', $data);
   }

  } else {
   $data = [
    'title' => '',
    'summary' => '',
    'genre' => '',
    'image' => '',
   ];
   $this->view('adminbooks/add', $data);
  }

 }

     /**
    * show
    * Voir un livre (READ)
    * @param mixed $id
    * @return void
    */
    public function show($id)
    {

    $book = $this->bookModel->getBookById($id);

    $data = [
     'book' => $book,
    ];

    $this->view('adminbooks/show', $data);
    }

    /**
  * edit
  * Modifier un livre (UPDATE)
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
    'summary' => $_POST['summary'],
    'image' => $_FILES['myfile']['name'],

    'title_err' => '',
    'summary_err' => '',
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
   if (empty($data['summary'])) {
    $data['summary_err'] = 'Ce champ ne peut pas être vide';
   }

   if (!in_array($fileExtension, $fileExtensions)) {
    $data['image_err'][] = "Les fichiers autorises sont: .jpg, .jpeg, .png";
   }
   if ($fileSize > 2000000) {
    $data['image_err'][] = "Le fichier ne doit pas depasser les 2MB";
   }

   // Make sure there are no errors with the title and content
   if (empty($data['title_err']) && empty($data['summary_err']) && empty($data['image'])) {
    // if image uploaded without errors, we add the book into the database
    if ($this->bookModel->updateBook($data)) {
     //  die("success");
     flash('book_message', 'Livre modifié sans image');
     redirect('adminBooks');
    } else {
     die('Il y a eu une erreur');
    }
   } else if (empty($data['title_err']) && empty($data['summary_err']) && empty($data['image_err']) && !empty($data['image'])) {

    // Validated (no image errors)

    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if ($didUpload) {
     // if image uploaded without errors, we add the book into the database
     if ($this->bookModel->updateBookWithImage($data)) {
      //  die('SUCCESS');
      flash('book_message', 'Livre modifié avec image');
      redirect('adminBooks');
     } else {
      die('Il y a eu une erreur');
     }
    }

   } else {
    $this->view('adminbooks/edit', $data);
   }

  } else {

   // Get existing book from model
   $book = $this->bookModel->getBookById($id);

   $data = [
    'id' => $id,
    'title' => $book->title,
    'summary' => $book->summary,
    'image' => $book->image,
   ];
   $this->view('adminbooks/edit', $data);
  }
 }

 /**
* deletebook
* Supprimer un livre (DELETE)
* @param mixed $id
* @return void
*/
public function deletebook($id)
{
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//Execute
if ($this->bookModel->deleteBook($id)) {
 // Redirect to login
 flash('book_message', 'Livre supprimé');
 redirect('adminBooks/index');
} else {
 die('Something went wrong');
}
} 
}




  }
