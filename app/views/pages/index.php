<?php require APPROOT . '/views/inc/header.php';?>

<body class="front-page">

  <?php require APPROOT . '/views/inc/nav.php';?>

  <div id="container">
    <header class="d-flex flex-column justify-content-center align-items-center">
      <button class="menu-btn">&#9776;</button>
      <h1>Jean Forteroche</h1>
      <ul class="author-jobs list-unstyled">
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

        <div class="row justify-content-center align-items-center pt-4">
          <div class="col-sm-6">
            <img class="img-fluid" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['author']->image; ?>" alt="Photo de Jean Forteroche">
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

    <section id="latest-book">
      <div class="container">
        <div class="row latest-book">
          <?php foreach ($data['books'] as $book): ?>
          <?php if ($book->title === "Un Billet Simple pour l'Alaska"): ?>
          <div class="col-md-7">
            <div class="wrapper">
              <div class="wrapper-info box1">
                <div class="d-flex">
                  <div>
                    <h2 class="sub-title color-light-gray text-uppercase">Découvrez son nouveau roman</h2>
                    <h3 class="heading-title py-2">Un Billet Simple Pour L'Alaska</h3>
                  </div>
                </div>
                <?php echo $book->summary; ?>
              </div>
              <div><a href="<?php echo URLROOT; ?>/chapitres">Lire les chapitres </a><i class="fas fa-angle-double-right color-custom-red"></i></div>
            </div>
          </div>
          <div class="col-md-5">
            <img class="img-fluid" src="<?php echo URLROOT; ?>/uploads/<?php echo $book->image; ?>" alt="">
          </div>
          <?php endif;?>
          <?php endforeach;?>
        </div>
      </div>
    </section>

    <section id="books-section">
      <div class="container">
        <div class="books-headings text-center">
          <h2 class="heading-sub-title accent-color">Romans</h2>
          <h3 class="heading-title">La lumière est dans le livre, laissez-le rayonner.</h3>
        </div>
        <div class="book-list">
          <?php foreach ($data['books'] as $book): ?>
          <div class="book-item">
            <img class="img-fluid" src="<?php echo URLROOT; ?>/uploads/<?php echo $book->image; ?>" alt="">
            <div class="book-info">
              <a href="<?php echo URLROOT; ?>/livres/<?php echo $book->id; ?>">
                <p class="title text-center p-2"><?php echo $book->title; ?></p>
              </a>
            </div>
          </div>
          <?php endforeach;?>
        </div>
        <div class="d-flex justify-content-end">
          <a class="text-uppercase" href="<?php echo URLROOT; ?>/livres">Tous les livres <i class="fas fa-angle-double-right color-custom-red"></i></a></div>
      </div>
    </section>

  </div>

  <?php require APPROOT . '/views/inc/footer.php';?>
