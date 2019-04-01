<?php require APPROOT . '/views/inc/header.php';?>

<body class="page-template">

  <?php require APPROOT . '/views/inc/nav.php';?>

  <div id="container">
    <div class="page-banner">
      <button class="menu-btn">&#9776;</button>
      <div class="container">
        <div class="d-flex justify-content-center align-items-center">
          <h2 class="page-title">Chapitres</h2>
        </div>
      </div>
    </div>

    <section>
      <div class="container">
        <ul class="chapters_list equal-heights">
          <?php foreach ($data['chapters'] as $chapter): ?>
          <li class="list__item">
            <div class="py-3">
              <figure class="text-center">
                <?php if (!empty($chapter->image)): ?>
                <img class="img-fluid" src="<?php echo URLROOT; ?>/uploads/<?php echo $chapter->image; ?>" alt="prologue">
                <?php endif;?>
              </figure>
              <div class="chapter_title_box">
                <a href="<?php echo URLROOT; ?>/chapitres/<?php echo $chapter->id; ?>">
                  <h3 class="chapter_title text-center text-dark"><?php echo $chapter->title; ?></h3>
                </a>
              </div>
              <?php if (strlen($chapter->body) > 350): ?>
              <?php echo substr($chapter->body, 0, strpos($chapter->body, ' ', 350)) ?> ...</p>
              <?php else: ?>
              <?php echo $chapter->body; ?>
              <?php endif;?>
              <div class="text-center">
                <a href="<?php echo URLROOT; ?>/chapitres/<?php echo $chapter->id; ?>" class="btn btn-red text-white my-4"><i class="fa fa-paper-plane"></i> Lire le Chapitre</a></div>
            </div>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </section>

  </div>


  <?php require APPROOT . '/views/inc/footer.php';?>
