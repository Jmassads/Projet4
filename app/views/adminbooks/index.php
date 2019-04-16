<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><i class="fas fa-book"></i> Livres</h1>
      </div>
    </div>
  </div>
</header>

<div class="container my-2">
  <?php flash('book_message');?>
</div>

<div class="container py-3">
  <div class="d-flex justify-content-end">
    <a href="<?php echo URLROOT; ?>/adminBooks/add" class="btn btn-outline-dark">Ajouter un Livre</a>
  </div>
</div>

<div id="chapters" class="container">
  <ul class="chapters_list">
    <?php foreach ($data['books'] as $book): ?>
    <div class="list__item card card-body mb-3">
      <h4 class="card-title">
        <?php echo $book->title; ?>
      </h4>
      <p class="card-text">
        <?php if (strlen($book->summary) > 350): ?>
        <?php echo substr($book->summary, 0, strpos($book->summary, ' ', 350)) ?> ...</p>
      <?php else: ?>
      <?php echo $book->summary; ?>
      <?php endif;?>
      <a href="<?php echo URLROOT; ?>/adminBooks/show/<?php echo $book->id; ?>" class="btn btn-dark mt-3">Voir le
        livre</a>
    </div>
    <?php endforeach;?>
  </ul>
</div>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
