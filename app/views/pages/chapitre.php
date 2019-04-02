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

    <section id="comments" class="comments">
      <div class="container">
        <div class="comments_wrapper">
          <div class="comments-header d-flex justify-content-between align-items-center">
            <?php if ($data['commentsCount'] > 1 || $data['commentsCount'] === 0): ?>
            <h2><span class="commentsCount"><?php echo $data['commentsCount']; ?></span> Commentaires</h2>
            <?php else: ?>
            <h2><span class="commentsCount"><?php echo $data['commentsCount']; ?></span> Commentaire</h2>
            <?php endif;?>
            <div class="add-comment">
            <button class="btn">Ajouter un commentaire</button>
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
          <div class="row">
            <div class="col-12">
              <?php foreach ($data['commentsByChapterId'] as $commentByChapterId): ?>
              <div class="comment">
                <div class="d-flex align-items-center">
                  <p class="text-uppercase font-weight-bold">
                    <?php echo $commentByChapterId->firstname . ' ' . $commentByChapterId->lastname; ?></p>
                  <p class="medium-gray ml-4">
                    <?php
$timeStamp = $commentByChapterId->date_added;
setlocale(LC_TIME, "fr_FR");
$timeStamp = strftime("%A %d %B %G", strtotime($timeStamp));
?>
                    <?php echo $timeStamp; ?></p>
                  <span class="ml-auto flagModal" data-toggle="modal"
                    data-target="#flagModal<?php echo $commentByChapterId->id; ?>"><i
                      class="fas fa-ellipsis-h"></i></span>
                </div>
                <div class="row">
                  <div class="col-8">
                    <p class="text-black justify-content">
                      <?php echo $commentByChapterId->comment; ?>
                    </p>
                    <!-- <p><?php echo $commentByChapterId->id; ?></p> -->
                  </div>
                </div>


              </div>
              <!-- Flag Modal -->

              <?php endforeach;?>
            </div>
          </div>

          <div id="comment-flash">
            <?php flash('comment_message');?>
          </div>
        </div>
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



  </div>

  <?php require APPROOT . '/views/inc/footer.php';?>