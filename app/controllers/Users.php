<?php

  /**
   *
   */
  class Users extends Controller
  {
      public function __construct()
      {
          $this->userModel = $this->model('User');
      }

      /**
  * register
  *
  * @return void
  */
      public function register()
      {
          if (!isset($_SESSION['user_id'])) {
              redirect('users/login');
          }
          // Check if POST
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // Sanitize POST
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
    'name' => trim($_POST['name']),
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password']),
    'confirm_password' => trim($_POST['confirm_password']),
    'name_err' => '',
    'email_err' => '',
    'password_err' => '',
    'confirm_password_err' => '',
   ];

              // Validate email
              if (empty($data['email'])) {
                  $data['email_err'] = 'Veuillez indiquer une adresse de courriel';
                  // Validate name
                  if (empty($data['name'])) {
                      $data['name_err'] = 'Veuillez indiquer votre nom';
                  }
              } else {
                  // Check Email
                  if ($this->userModel->findUserByEmail($data['email'])) {
                      $data['email_err'] = 'Cet email est déjà pris';
                  }
              }

              // Validate password
              if (empty($data['password'])) {
                  $password_err = 'Merci de saisir un mot de passe';
              } elseif (strlen($data['password']) < 6) {
                  $data['password_err'] = 'Le mot de passe doit comporter au moins six caractères';
              }

              // Validate confirm password
              if (empty($data['confirm_password'])) {
                  $data['confirm_password_err'] = 'Merci de confirmer le mot de passe';
              } else {
                  if ($data['password'] != $data['confirm_password']) {
                      $data['confirm_password_err'] = 'Les mots de passe ne correspondent pas';
                  }
              }

              // Make sure errors are empty
              if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                  // SUCCESS - Proceed to insert

                  // Hash Password
                  // Crée une clé de hachage pour un mot de passe
                  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                  //Execute
                  if ($this->userModel->register($data)) {
                      // Redirect to login
                      flash('register_success', '
     Vous êtes maintenant inscrit et pouvez vous connecter');
                      redirect('users/login');
                  } else {
                      die('Something went wrong');
                  }
              } else {
                  // Load View
                  $this->view('users/register', $data);
              }
          } else {
              // IF NOT A POST REQUEST

              // Init data
              $data = [
    'name' => '',
    'email' => '',
    'password' => '',
    'confirm_password' => '',
    'name_err' => '',
    'email_err' => '',
    'password_err' => '',
    'confirm_password_err' => '',
   ];

              // Load View
              $this->view('users/register', $data);
          }
      }

      /**
  * login
  *
  * @return void
  */
      public function login()
      {
          // Check for POST
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // Process form
              // Sanitize POST data
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              // Init data
              $data = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'email_err' => '',
    'password_err' => '',
   ];

              // Validate Email
              if (empty($data['email'])) {
                  $data['email_err'] = 'Veuillez entrer votre adresse email';
              }

              // Validate Password
              if (empty($data['password'])) {
                  $data['password_err'] = 'Veuillez indiquer un mot de passe';
              }

              // Check for user/email

              if (empty($data['email_err']) && empty($data['password_err'])) {
                  if ($this->userModel->findUserByEmail($data['email'])) {
                      // User found
                  } else {
                      // User not found
                      $data['email_err'] = 'Utilisateur non trouvé';
                  }
              }

              // Make sure errors are empty
              if (empty($data['email_err']) && empty($data['password_err'])) {
                  // Validated
                  // Check and set logged in user
                  $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                  if ($loggedInUser) {
                      // Create Session
                      $this->createUserSession($loggedInUser);
                  } else {
                      $data['password_err'] = 'Mot de passe incorrect';

                      $this->view('users/login', $data);
                  }
              } else {
                  // Load view with errors
                  $this->view('users/login', $data);
              }
          } else {
              // Init data
              $data = [
    'email' => '',
    'password' => '',
    'email_err' => '',
    'password_err' => '',
   ];

              // Load view
              $this->view('users/login', $data);
          }
      }

      /**
       * createUserSession
       *
       * @param mixed $user
       * @return void
       */
      public function createUserSession($user)
      {
          $_SESSION['user_id'] = $user->id;
          $_SESSION['user_email'] = $user->email;
          $_SESSION['user_name'] = $user->name;
          redirect('admin');
      }

      /**
       * logout
       *
       * @return void
       */
      public function logout()
      {
          unset($_SESSION['user_id']);
          unset($_SESSION['user_email']);
          unset($_SESSION['user_name']);
          session_destroy();
          redirect('users/login');
      }
  }
