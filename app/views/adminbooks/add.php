<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><i class="fas fa-pencil-alt"></i> Ajouter un livre</h1>
      </div>
    </div>
  </div>
</header>

<div class="container py-2">
  <div class="card card-body bg-light mt-5">
    <form action="<?php echo URLROOT; ?>/adminBooks/add" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Titre: <sup>*</sup></label>
        <input type="text" name="title"
          class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
          value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback">
          <?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="summary">Sommaire: <sup>*</sup></label>
        <textarea class="mytextarea" name="summary"
          class="form-control form-control-lg <?php echo (!empty($data['summary_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['summary']; ?></textarea>
        <span class="invalid-feedback">
          <?php echo $data['summary_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="genre">Sélectionner un genre:</label>
        <select name="genre" required="required" class="form-control" id="genre">
          <option value="">Sélectionnez le genre du livre</option>
          <option value="fiction">Fiction</option>
          <option value="suspense">Suspense</option>
          <option value="aventure">Aventure</option>
        </select>
      </div>
      <div class="form-group">
        <label>Sélectionner une image: (330 * 462 pixels recommendée)</label>
        <input type="file" class="form-control-file" name="myfile">
        <?php if (isset($data['image_err'])): ?>
        <?php foreach ($data['image_err'] as $error): ?>
        <span><?php echo $error . '</br>'; ?></span>
        <?php endforeach;?>
        <?php endif;?>
        <div class="mt-4">
          <input type="submit" class="btn btn-success" value="Publier">
        </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
