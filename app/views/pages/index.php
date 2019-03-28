<?php require APPROOT . '/views/inc/header.php';?>

<body class="front-page">

  <!-- Pushy Menu -->
  <nav class="pushy pushy-left">
    <div class="pushy-content">
      <ul>
        <!-- Submenu -->
        <li class="pushy-link"><a href="<?php echo URLROOT; ?>">Accueil</a></li>
        <li class="pushy-submenu">
          <button>Un Billet Simple pour l'Alaska</button>
          <ul>
            <li class="pushy-link"><a href="<?php echo URLROOT; ?>/chapitres">Tous les chapitres</a></li>
            <?php foreach ($data['chapters'] as $chapter): ?>
            <li class="pushy-link"><a href="<?php echo URLROOT; ?>/chapitres/<?php echo $chapter->id; ?>"><?php echo $chapter->title; ?></a>
            </li>
            <?php endforeach;?>
          </ul>
        </li>
        <li class="pushy-submenu">
          <button>Livres</button>
          <ul>
            <li class="pushy-link"><a href="<?php echo URLROOT; ?>/livres">Tous les livres</a></li>
            <?php foreach ($data['books'] as $book): ?>
            <li class="pushy-link"><a href="<?php echo URLROOT; ?>/livres/<?php echo $book->id; ?>"><?php echo $book->title; ?></a></li>
            <?php endforeach;?>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Site Overlay -->
  <div class="site-overlay"></div>

  <div id="container">
    <header class="d-flex flex-column justify-content-center align-items-center">
      <button class="menu-btn">&#9776;</button>
      <h1>Jean Forteroche</h1>
      <ul class="author-jobs">
        <li>Écrivain</li>
        <li>Acteur</li>
        <li>Aventurier</li>
      </ul>
    </header>

    <section id="about">
      <div class="container">
        <h2 class="heading-sub-title  accent-color">À Propos</h2>
        <h3 class="heading-title">Écrivain dans l'âme</h3>
        <p>Jean Forteroche, né le 12 Avril 1980 à Boston dans le Massachussetts, est un écrivain Français (bénéficiant aussi par sa naissance d'un passeport américain).</p>
        <p>Jean Forteroche publie son premier livre, intitulé L'enfant qui venait des étoiles, en 1998. Il a obtenu le prix des libraires avec L'ombre du vent en 2003. Son roman le plus connu, l'écho de ton souvenir, est traduit dans 15 langues à
          travers le monde.</p>
        <p>Actuellement, Jean Forteroche travaille sur son prochain roman, <strong>"Billet simple pour l'Alaska"</strong> et le publie par épisode en ligne sur ce site.</p>

        <div class="row justify-content-center align-items-center">
          <div class="col-sm-6">
            <img class="img-fluid" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['author']->image; ?>" alt="">
          </div>
          <div class="col-sm-6 mt-4">
            <blockquote class="blockquote text-center">
              <p>Chaque secret de l'âme d'un écrivain, chaque expérience de sa vie, chaque qualité de son esprit est écrit en grand dans ses œuvres.</p>
              <footer class="blockquote-footer">Jean Forteroche</footer>
            </blockquote>
          </div>
        </div>
      </div>
    </section>


    <footer class="py-4 text-center">
      <div class="container">
        <p>© 2018 Julia Assad - Projet 4 Openclassrooms</p>
      </div>
    </footer>
  </div>

  <?php require APPROOT . '/views/inc/footer.php';?>
