<?php require APPROOT . '/views/inc/header.php';?>

<body class="page-template">

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
            <li class="pushy-link"><a href="<?php echo URLROOT; ?>/chapitres/<?php echo $chapter->id; ?>">
                <?php echo $chapter->title; ?></a></li>
            <?php endforeach;?>
          </ul>
        </li>
        <li class="pushy-submenu">
          <button>Livres</button>
          <ul>
            <li class="pushy-link"><a href="<?php echo URLROOT; ?>/livres">Tous les livres</a></li>
            <?php foreach ($data['books'] as $book): ?>
            <li class="pushy-link"><a href="<?php echo URLROOT; ?>/livres/<?php echo $book->id; ?>">
                <?php echo $book->title; ?></a></li>
            <?php endforeach;?>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Site Overlay -->
  <div class="site-overlay"></div>


  <div id="container">
    <div class="page-banner">
      <button class="menu-btn">&#9776;</button>
      <div class="container">
        <div class="d-flex justify-content-center align-items-center">
          <h2 class="page-title">Livres</h2>
        </div>
      </div>
    </div>
  </div>

  <!--/portfolio section -->
  <section id="books" class="books">

    <div class="books__toolbar">
      <button class="btn books-btn-active rounded-0" data-filter="*">Tous les livres</button>
      <button class="btn rounded-0" data-filter=".fiction">Fiction</button>
      <button class="btn rounded-0" data-filter=".suspense">Suspense</button>
      <button class="btn rounded-0" data-filter=".aventure">Aventure</button>
    </div>

    <div class="container">
      <div class="grid">
        <?php foreach ($data['books'] as $book): ?>
        <div class="grid-item <?php echo $book->genre; ?>" data-category="<?php echo $book->genre; ?>">
          <div class="imageholder">
            <a class="hvr-grow" href="<?php echo URLROOT; ?>/livres/<?php echo $book->id; ?>">
              <?php if (!empty($book->image)): ?>
              <img src="<?php echo URLROOT; ?>/uploads/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>">
              <?php endif;?>
            </a>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </section>
  <!--/ end portfolio section-->

  <footer class="py-4 text-center">
    <div class="container">
      <p>© 2018 Julia Assad - Projet 4 Openclassrooms</p>
    </div>
  </footer>
  </div>

  <?php require APPROOT . '/views/inc/footer.php';?>
