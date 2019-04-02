<?php
class AdminComments extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('/users/login');
        }

        $this->chapterModel = $this->model('AdminChapter');
        $this->commentModel = $this->model('Comment');
    }

    // Page des Commentaires
    public function index()
    {
        $comments = $this->commentModel->getComments();

        $data = [
         'comments' => $comments,
        ];

        $this->view('admincomments/index', $data);
    }

    public function show($id)
    {
        $comment = $this->commentModel->getCommentById($id);

        $data = [
         'comment' => $comment,
        ];

        $this->view('admincomments/show', $data);
    }

    public function deletecomment($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Execute
            if ($this->commentModel->deleteComment($id)) {
                // Redirect to login
                flash('comment_message', 'Commentaire supprimé');
                redirect('adminComments/index');
            } else {
                die('Something went wrong');
            }
        } else {
            // CHECK THIS
            redirect('');
        }
    }
}