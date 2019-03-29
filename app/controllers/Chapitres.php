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
    }

    public function index($id = null)
    {
        $chapters = $this->chapterModel->getChapters();
        $chapter = $this->chapterModel->getChapterById($id);

        $data = [
         'chapters' => $chapters,
         'chapter' => $chapter,
        ];

        if (is_null($id)) {
            $this->view('pages/chapitres', $data);
        } else {
            $this->view('pages/chapitre', $data);
        }
    }
}
