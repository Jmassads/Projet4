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
   redirect('Users/login');
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

   $uploader = new Uploader();
   $uploader->uploadFile('myfile');
   $error_message = $uploader->getError();
   $data['image_err'] = $error_message;

   // Validate Email
   if (empty($data['email'])) {
    $data['email_err'] = 'Please enter email';
   }

   // Validate Name
   if (empty($data['name'])) {
    $data['name_err'] = 'Please enter name';
   }

   // Make sure there are no errors with the title and content
   if (empty($data['email_err']) && empty($data['name_err']) && empty($data['image'])) {
    // if image uploaded without errors, we add the book into the database
    if ($this->userModel->updateProfile($data)) {
     //  die("success");
     flash('profile_message', 'Votre profile à bien été modifié (image non changée)');
     redirect('AdminProfile/index');
    } else {
     die('Il y a eu une erreur');
    }
   } elseif (empty($data['email_err']) && empty($data['name_err']) && empty($data['image_err']) && !empty($data['image'])) {

    // Validated
    // Hash Password
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    // if image uploaded without errors, we add the info the database
    if ($this->userModel->updateprofilewidthImage($data)) {
     flash('profile_message', 'Votre profile à bien été modifié (image changée)');
     redirect('AdminProfile/index');
    } else {
     die('Something went wrong');
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

 public function editPassword()
 {

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifypassword'])) {

   $id = $_SESSION['user_id'];
   $currentUser = $this->userModel->getCurrentUser($id);

   $data = [
    'currentUser' => $currentUser,
    'password' => $_POST['password'],
    'confirm_password' => $_POST['confirm_password'],
    'user_id' => $_SESSION['user_id'],

    'name' => '',
    'email' => '',
    'bio' => '',
   ];

   // Validate Password
   if (empty($data['password'])) {
    $data['password_err'] = 'Please enter password';
   } elseif (strlen($data['password']) < 6) {
    $data['password_err'] = 'Password must be at least 6 characters';
   }

   // Validate Confirm Password
   if (empty($data['confirm_password'])) {
    $data['confirm_password_err'] = 'Please confirm password';
   } else {
    if ($data['password'] != $data['confirm_password']) {
     $data['confirm_password_err'] = 'Passwords do not match';
    }
   }
   // Make sure errors are empty
   if (empty($data['password_err']) && empty($data['confirm_password_err'])) {
    // Validated

    // Hash Password
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    if ($this->userModel->updatePassword($data)) {
     flash('profile_message', 'Votre mot de passe à bien été modifié');
     redirect('adminProfile');
    } else {
     die('Something went wrong');
    }

   } else {
    // Load view with errors
    flash('password_error', 'Erreur, veuillez réeassayer');

    $this->view('adminprofile/index', $data);
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
    'bio' => '',

   ];

   $this->view('adminprofile/index', $data);
  }

 }
}
