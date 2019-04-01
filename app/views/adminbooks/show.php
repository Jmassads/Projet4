<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>
          <?php echo $data['book']->title; ?>
        </h1>
      </div>
    </div>
  </div>
</header>

<div class="container py-2">
  <div class="row">
    <?php if (!empty($data['chapter']->image)):?>
    <div class="col-sm-6">
      <figure class="text-center">
        <img class="img-fluid p-3" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['book']->image; ?>" alt="<?php echo $data['book']->title;?>">
      </figure>
    </div>
    <?php endif;?>
    <div class="col-sm-6">
      <p class="text-left">
        <?php echo $data['book']->summary; ?>
      </p>
    </div>
  </div>
  <div class="d-flex justify-content-end">
    <a href="<?php echo URLROOT; ?>/adminBooks/edit/<?php echo $data['book']->id; ?>" class="btn btn-dark">Modifier</a>

    <form class="ml-2" action="<?php echo URLROOT; ?>/adminBooks/deletebook/<?php echo $data['book']->id; ?>" method="post">
      <input type="submit" value="Supprimer" class="btn btn-danger">
    </form>
  </div>
</div>


<?php require APPROOT . '/views/inc/adminFooter.php';?>
