<?php require APPROOT . '/views/inc/adminHeader.php';?>



<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><i class="fas fa-pencil-alt"></i> Chapitres</h1>
      </div>
    </div>
  </div>
</header>

<div class="container my-2">
  <?php flash('chapter_message');?>
</div>

<div class="container py-3">
  <div class="d-flex justify-content-end">
    <a href="<?php echo URLROOT; ?>/adminChapters/add" class="btn btn-outline-dark">Ajouter un Chapitre</a>
  </div>
</div>

<div class="container">
  <ul class="chapters_list">
    <?php foreach ($data['chapters'] as $chapter): ?>
    <div class="list__item card card-body mb-3">
      <h4 class="card-title">
        <?php echo $chapter->title; ?>
      </h4>
      <?php
$timeStamp = $chapter->created_at;
setlocale(LC_TIME, "fr_FR");
$timeStamp = strftime("%A %d %B %G", strtotime($timeStamp));
?>
      <div class="bg-light p-2 mb-3">Publié le
        <?php echo $timeStamp; ?>
      </div>
      <p class="card-text">
        <?php if (strlen($chapter->body) > 350): ?>
        <?php echo substr($chapter->body, 0, strpos($chapter->body, ' ', 350)) ?> ...</p>
      <?php else: ?>
      <?php echo $chapter->body; ?>
      <?php endif;?>
      <a href="<?php echo URLROOT; ?>/adminChapters/show/<?php echo $chapter->id; ?>" class="btn btn-dark">Voir le
        chapitre</a>
    </div>
    <?php endforeach;?>
  </ul>
</div>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
