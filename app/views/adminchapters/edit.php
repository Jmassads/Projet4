<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><i class="fas fa-pencil-alt"></i> Modifier le chapitre</h1>
      </div>
    </div>
  </div>
</header>

<div class="container py-2">
  <div class="card card-body bg-light mt-5">
    <form action="<?php echo URLROOT; ?>/adminChapters/edit/<?php echo $data['id']; ?>" method="post"
      enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Titre: <sup>*</sup></label>
        <input type="text" name="title"
          class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
          value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback">
          <?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">Contenu: <sup>*</sup></label>
        <textarea class="mytextarea" name="body"
          class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback">
          <?php echo $data['body_err']; ?></span>
      </div>
      <div class="form-group">
        <p>Image actuelle:
          <?php echo $data['image']; ?>
        </p>
        <label>Sélectionner une nouvelle image:</label>
        <input type="file" class="form-control-file" name="myfile">

        <?php if (isset($data['image_err'])): ?>
        <?php foreach ($data['image_err'] as $error): ?>
        <span><?php echo $error . '</br>'; ?></span>
        <?php endforeach;?>
        <?php endif;?>

        <div class="mt-4">
          <input type="submit" class="btn btn-success" value="Modifier">
        </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
