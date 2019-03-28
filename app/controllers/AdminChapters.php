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

  public function add(){
    $this->view('adminchapters/add');
  }

  public function show($id){
      echo ($id);
  }

  public function edit($id){
      echo ($id);
  }

}
