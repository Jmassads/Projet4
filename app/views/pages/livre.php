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
    <div class="page-banner">
      <button class="menu-btn">&#9776;</button>
      <div class="container">
        <div class="d-flex justify-content-center align-items-center">
          <h2 class="page-title text-center"><?php echo $data['book']->title; ?></h2>
        </div>
      </div>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <figure class="text-center">
            <img class="img-fluid p-3" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['book']->image; ?>" alt="">
          </figure>
        </div>
        <div class="col-sm-6">
          <p class="text-left"><?php echo $data['book']->summary; ?></p>
        </div>
      </div>
    </div>
  </section>
  
  </div>


  <?php require APPROOT . '/views/inc/footer.php';?>
