<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><i class="fas fa-cog"></i> Accueil</h1>
      </div>
    </div>
  </div>
</header>

<div class="container my-2">
  <?php flash('register_success');?>
</div>

<div class="dashboard-items container py-5">
  <a href="<?php echo URLROOT; ?>/adminChapters">
    <div class="card card-body bg-light mb-4">
      <p><i class="fas fa-pencil-alt"></i><strong>
          <?php echo $data['chaptersCount']; ?></strong> chapitres du livre 'Un Billet Simple Pour
        L'Alaska' ont été publiés</p>
    </div>
  </a>
  <a href="<?php echo URLROOT; ?>/adminBooks">
    <div class="card card-body bg-light mb-4">
      <p><i class="fas fa-book"></i><strong>
          <?php echo $data['booksCount']; ?></strong> livres</p>
    </div>
  </a>
  <a href="<?php echo URLROOT; ?>/adminComments">
    <div class="card card-body bg-light mb-4">
      <p><i class="fas fa-comments"></i><strong>
          <?php echo $data['commentsCount']; ?></strong> commentaires</p>
    </div>
  </a>

</div>


<?php require APPROOT . '/views/inc/adminFooter.php';?>
