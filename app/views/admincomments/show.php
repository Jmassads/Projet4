<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Commentaire
        </h1>
      </div>
    </div>
  </div>
</header>

<div class="container py-2">
  <p class="text-left">
    <?php echo htmlspecialchars($data['comment']->comment); ?>
  </p>
  <div class="d-flex justify-content-end">
    <form class="ml-2" action="<?php echo URLROOT; ?>/adminComments/deletecomment/<?php echo $data['comment']->id; ?>"
      method="post">
      <button type="submit" class="btn btn-danger"> Supprimer</button>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
