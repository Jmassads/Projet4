<?php require APPROOT . '/views/inc/header.php';?>

<main class="main mt-5">
  <div class="container">
    <div class="row justify-content-center mt-4">
      <div class="admin_logo">
        <img class="img-fluid" src="<?php echo URLROOT; ?>/img/logo.png" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-10 col-md-8 mx-auto">
        <div class="card card-body bg-light mt-5 py-4">
          <?php flash('register_success');?>
          <h2 class="text-center pb-4">Veuillez saisir vos identifiants pour vous connecter</h2>
          <form action="<?php echo URLROOT; ?>/users/login" method="post">
            <div class="form-group">
              <label for="email">Email: <sup>*</sup></label>
              <input id="email" type="email" name="email"
                class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['email']; ?>">
              <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe: <sup>*</sup></label>
              <input id="password" type="password" name="password"
                class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="row">
              <div class="col">
                <input type="submit" value="Login" class="btn-custom-red btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php';?>
