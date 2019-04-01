<?php require APPROOT . '/views/inc/header.php';?>

<body class="page-template">

  <?php require APPROOT . '/views/inc/nav.php';?>

  <div id="container">
    <div class="page-banner">
      <button class="menu-btn">&#9776;</button>
      <div class="container">
        <div class="d-flex justify-content-center align-items-center">
          <h2 class="page-title">
            <?php echo $data['chapter']->title; ?>
          </h2>
        </div>
      </div>
    </div>

    <section>
      <div class="container">
        <?php echo $data['chapter']->body; ?>
      </div>
    </section>


    <div class="share-chapter">
      <div class="container">
        <div class="d-flex align-items-center">
          <p class="mr-3"><strong>Partagez:</strong></p>
          <ul class="d-flex social-icons">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-tumblr"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="add-comment my-4">
      <div class="container">
        <button class="btn btn-outline-dark"><strong>Ajoutez un commentaire</strong></button>
      </div>
    </div>
    <section class="add-comment-form">
      <div class="container">
        <form action="<?php echo URLROOT; ?>/Chapitres/<?php echo $data['chapter']->id; ?>" method="post">
          <div class="form-group">
            <label for="firstname">Prénom</label>
            <input name="firstname" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="lastname">Nom</label>
            <input name="lastname" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="comment">Commentaire</label>
            <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
          </div>
          <input type="hidden" name="chapter_id" value="<?php echo $data['chapter']->id; ?>">
          <input type="submit" class="btn btn-dark" value="Publier">
        </form>
      </div>
    </section>

  </div>

  <?php require APPROOT . '/views/inc/footer.php';?>
