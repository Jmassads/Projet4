<!DOCTYPE html>
<html lang="fr">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Jean Forteroche | Écrivain - Projet OpenClassrooms - Julia Assad</title>

  <meta name="description" content="Jean Forteroche, écrivain, travaille sur son prochain roman, Un Billet simple pour l'Alaska et le publie par épisode en ligne" />

  <link rel="canonical" href="https://juliaassad.fr/projet4/" />
  <meta property="og:locale" content="fr_FR" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Jean Forteroche | Écrivain - Projet OpenClassrooms - Julia Assad" />
  <meta property="og:description" content="Jean Forteroche, écrivain, travaille sur son prochain roman, Un Billet simple pour l'Alaska et le publie par épisode en ligne" />
  <meta property="og:url" content="https://juliaassad.fr/projet4/" />
  <meta property="og:site_name" content="Jean Forteroche" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="Jean Forteroche, écrivain, travaille sur son prochain roman, Un Billet simple pour l'Alaska et le publie par épisode en ligne" />
  <meta name="twitter:title" content="Jean Forteroche | Écrivain - Projet OpenClassrooms - Julia Assad" />

  <!-- Icons -->
  <link rel="shortcut icon" href="<?php echo URLROOT; ?>/img/logo.ico">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link href="<?php echo URLROOT; ?>/dist/main.css" rel="stylesheet" type="text/css" media="screen">

  <!-- Custom styles -->
  <link href="<?php echo URLROOT; ?>/dist/admin.css" rel="stylesheet" type="text/css" media="screen">

  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=prdte4ybij6mu30q8a7qo4pf5aj26up92ct59lgswpopxodr">
  </script>

  <script>
    tinymce.init({
      selector: '.mytextarea',
      height: 400,
      plugins: 'colorpicker image emoticons textcolor link media',
      paste_data_images: true,
      toolbar: 'insertfile | formatselect | bold italic strikethrough forecolor backcolor | link | image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat ',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ],
      paste_data_images: true,
      image_advtab: true,
    file_picker_callback: function(callback, value, meta) {
      if (meta.filetype == 'image') {
        $('#upload').trigger('click');
        $('#upload').on('change', function() {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function(e) {
            callback(e.target.result, {
              alt: ''
            });
          };
          reader.readAsDataURL(file);
        });
      }
    }

    });
  </script>


</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 px-3">
  <div class="container">
    <a href="<?php echo URLROOT; ?>/" class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="Aller sur le site"><i class="fas fa-home"></i>
    </a>
    <button class="navbar-toggler" data-toggle='collapse' data-target='#navbarCollapse'>
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item px-2">
          <a href="<?php echo URLROOT; ?>/Admin" class="nav-link active">Tableau de bord</a>
        </li>
        <li class="nav-item px-2">
          <a href="<?php echo URLROOT; ?>/AdminChapters" class="nav-link">Chapitres</a>
        </li>
        <li class="nav-item px-2">
          <a href="<?php echo URLROOT; ?>/AdminBooks" class="nav-link">Livres</a>
        </li>
        <li class="nav-item px-2">
          <a href="<?php echo URLROOT; ?>/AdminComments" class="nav-link">Commentaires</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mr-3">
          <a href="#" class="nav-link dropdown-toggle" data-toggle='dropdown'><i class="fas fa-user"></i>
            Bonjour
            <?php echo $_SESSION['user_name']; ?></a>
          <div class="dropdown-menu">
            <a href="<?php echo URLROOT; ?>/AdminProfile" class="dropdown-item"><i class="fas fa-user-circle"></i>
              Profile</a>
          </div>
        </li>
        <li class="nav-item dropdown mr-3">
          <a href="#" class="nav-link dropdown-toggle" data-toggle='dropdown'><i class="fas fa-plus"></i>
            Créer
          </a>
          <div class="dropdown-menu">
            <a href="<?php echo URLROOT; ?>/Users/register" class="dropdown-item">
              Utilisateur</a>
          </div>
        </li>
        <?php if (isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
          <a href="<?php echo URLROOT; ?>/Users/logout" class="nav-link">Logout <i class="fas fa-sign-out-alt"></i></a>
        </li>
        <?php endif;?>
      </ul>
    </div>
  </div>
</nav>
