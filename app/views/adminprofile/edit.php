<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><i class="fas fa-pencil-alt"></i> Modifier le profile</h1>
      </div>
    </div>
  </div>
</header>

<!-- PROFILE -->
<section class="my-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="<?php echo URLROOT; ?>/adminProfile/edit" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Nom</label>
                <input id="nom" type="text" name="name"
                  class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $data['currentUser']->name; ?>">
                <span class="invalid-feedback">
                  <?php echo $data['name_err']; ?></span>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email"
                  class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $data['currentUser']->email; ?>">
                <span class="invalid-feedback">
                  <?php echo $data['email_err']; ?></span>
              </div>
              <div class="form-group">
                <p>Image actuelle:
                  <?php echo $data['image']; ?>
                </p>
                <label>Sélectionner une nouvelle image:</label>

                <input type="file" name="myfile"
                  class="form-control-file <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>">
                <?php if (isset($data['image_err'])): ?>
                <?php foreach ($data['image_err'] as $error): ?>
                <span class="invalid-feedback"><?php echo $error . '</br>'; ?></span>
                <?php endforeach;?>
                <?php endif;?>
              </div>
              <div class="form-actions mt-4">
              <button type="submit" name="modifybio" class="btn btn-secondary mt-4">Modifier</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require APPROOT . '/views/inc/adminFooter.php';?>