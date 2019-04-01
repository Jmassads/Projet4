<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><i class="fas fa-pencil-alt"></i> Ajouter un chapitre</h1>
      </div>
    </div>
  </div>
</header>


<div class="container py-2">
  <div class="card card-body bg-light mt-5">
    <form action="<?php echo URLROOT; ?>/adminChapters/add" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Titre: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback">
          <?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">Contenu: <sup>*</sup></label>
        <textarea name="body" class="mytextarea form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback">
          <?php echo $data['body_err']; ?></span>
      </div>
      <div class="form-group">
        <label>Sélectionner une image:</label>
        <input type="file" name="myfile" class="form-control-file <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>">
        <?php if (isset($data['image_err'])): ?>
        <?php foreach ($data['image_err'] as $error):?>
        <span class="invalid-feedback"><?php echo $error . '</br>';?></span>
        <?php endforeach;?>
        <?php endif;?>
      </div>
      <div class="form-actions mt-4">
        <input type="submit" class="btn btn-success" value="Publier">
      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
