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

        $data = [
         'chapters' => $chapters
        ];

        if (is_null($id)) {
            $this->view('pages/chapitres', $data);
        }
    }
}
