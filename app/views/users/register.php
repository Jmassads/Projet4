<?php require APPROOT . '/views/inc/header.php';?>

<div class="container">
<div class="row justify-content-center mt-4">
<div class="admin_logo">
<img class="img-fluid" src="<?php echo URLROOT; ?>/img/logo.png" alt="">
</div>
</div>
<div class="row">
    <div class="col-sm-10 col-md-8 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 class="mb-4 text-center">Inscription</h2>
            <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                <div class="form-group">
                    <label for="name">Nom: <sup>*</sup></label>
                    <input id="name" type="text" name="name" class="form-control form-control-lg
                    <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input id="email" type="email" name="email" class="form-control form-control-lg
                    <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Mot de Passe: <sup>*</sup></label>
                    <input id="password" type="password" name="password" class="form-control form-control-lg
                    <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirmez le mot de passe: <sup>*</sup></label>
                    <input id="confirm_password" type="password" name="confirm_password" class="form-control form-control-lg
                    <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" name="submit" value="Inscription" class="btn btn-custom-red btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<?php require APPROOT . '/views/inc/footer.php';?>
