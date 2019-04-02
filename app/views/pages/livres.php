<?php require APPROOT . '/views/inc/header.php';?>

<body class="page-template">

  <?php require APPROOT . '/views/inc/nav.php';?>

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

  <!--/books section -->
  <div id="books" class="books">
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
  </div>
  <!--/ end books section-->

  <?php require APPROOT . '/views/inc/footer.php';?>
