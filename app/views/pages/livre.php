<?php require APPROOT . '/views/inc/header.php';?>

<body class="page-template">

  <?php require APPROOT . '/views/inc/nav.php';?>

  <div id="container">
    <div class="page-banner">
      <button class="menu-btn">&#9776;</button>
      <div class="container">
        <div class="d-flex justify-content-center align-items-center">
          <h2 class="page-title text-center"><?php echo $data['book']->title; ?></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="book_single">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <figure class="text-center">
            <img class="img-fluid p-3" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['book']->image; ?>" alt="">
          </figure>
        </div>
        <div class="col-sm-6">
          <?php echo $data['book']->summary; ?>
          <?php if ($data['book']->title == "Un Billet Simple pour l'Alaska"): ?>
          <a href="<?php echo URLROOT; ?>/Chapitres" class='btn btn-outline-dark mt-3'>
          <i class="fab fa-readme"> Lire les Chapitres</i>
          </a>
          <?php else: ?>
          <a href="" class="btn btn-outline-dark btn-lg mt-3">
            <i class="fab fa-amazon"> Acheter sur Amazon</i>
          </a>
          <a href="#" class='btn btn-outline-dark btn-lg mt-3'>
            <i class="fab fa-itunes"> Acheter sur iTunes</i>
          </a>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php';?>