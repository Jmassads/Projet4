<?php

/**
 *
 */
class AdminProfile extends Controller
{
    // déclaration des propriétés
    private $userModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('/users/login');
        }

        $this->userModel = $this->model('User');
    }

    /**
  * index
  * Profile show
  * @return void
  */
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        } else {
            $id = $_SESSION['user_id'];
            $currentUser = $this->userModel->getCurrentUser($id);

            $data = [
              'currentUser' => $currentUser,
              'password' => '',
              'confirm_password' => '',
              'name' => '',
              'email' => '',
              'bio' => '',
             ];

            $this->view('adminprofile/index', $data);
        }
    }

    /**
  * edit
  * Profile Update
  * @return void
  */
    public function edit()
    {
        $id = $_SESSION['user_id'];
        $currentUser = $this->userModel->getCurrentUser($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
              'currentUser' => $currentUser,
              'password' => '',
              'confirm_password' => '',
              'name' => $_POST['name'],
              'email' => $_POST['email'],
              'user_id' => $_SESSION['user_id'],
              'image' => str_replace(' ', '', $_FILES['myfile']['name']),

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

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            if (!in_array($fileExtension, $fileExtensions)) {
                $data['image_err'][] = "Les fichiers autorises sont: .jpg, .jpeg, .png";
            }
            if ($fileSize > 2000000) {
                $data['image_err'][] = "Le fichier ne doit pas depasser les 2MB";
            }

            // Make sure there are no errors with the title and content
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['image'])) {
                // if image uploaded without errors, we add the book into the database
                if ($this->userModel->updateProfile($data)) {
                    //  die("success");
                    flash('profile_message', 'Votre profile à bien été modifié (image non changée)');
                    redirect('adminProfile/index');
                } else {
                    die('Il y a eu une erreur');
                }
            } elseif (empty($data['email_err']) && empty($data['name_err']) && empty($data['image_err'])) {

    // Validated
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

                if ($didUpload) {

     // if image uploaded without errors, we add the info the database
                    if ($this->userModel->updateprofilewidthImage($data)) {
                        flash('profile_message', 'Votre profile à bien été modifié (image changée)');
                        redirect('adminProfile/index');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                flash('profile_error', 'Erreur, veuillez réeassayer');
                $this->view('adminprofile/edit', $data);
            }
        } else {
            $id = $_SESSION['user_id'];
            $currentUser = $this->userModel->getCurrentUser($id);

            $data = [
              'currentUser' => $currentUser,
              'password' => '',
              'confirm_password' => '',
              'name' => '',
              'email' => '',
              'image' => '',
             ];

            $this->view('adminprofile/edit', $data);
        }
    }
}
