<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>
          <?php echo $data['chapter']->title; ?>
        </h1>
      </div>
    </div>
  </div>
</header>

<div class="container py-2">
  <figure class="text-center">
    <img class="img-fluid p-3" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['chapter']->image; ?>" alt="<?php echo $data['chapter']->title;?>">
  </figure>
  <p class="text-left">
    <?php echo $data['chapter']->body; ?>
  </p>
  <div class="d-flex justify-content-end">
    <a href="<?php echo URLROOT; ?>/adminChapters/edit/<?php echo $data['chapter']->id; ?>" class="btn btn-dark">Modifier</a>
    <form class="ml-2" action="<?php echo URLROOT; ?>/adminChapters/deletechapter/<?php echo $data['chapter']->id; ?>" method="post">
      <button type="submit" class="btn btn-danger"> Supprimer</button>
    </form>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
