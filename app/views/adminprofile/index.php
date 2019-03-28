<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <h1><i class="fas fa-user-circle"></i> Profile</h1>
            <a href="" class="btn btn-outline-light" data-toggle="modal" data-target='#updatePasswordModal'>
                <i class="fas fa-lock"></i> Modifier Mot de Passe
            </a>
        </div>
    </div>
</header>

<div class="container my-2">
    <?php flash('profile_message');?>
</div>

<!-- PASSWORD MODAL -->
<div class="modal fade" id="updatePasswordModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifiez votre mot de passe</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo URLROOT; ?>/adminProfile/editPassword">
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg
                    <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg
                    <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="modifypassword" class="btn btn-outline-dark">Sauvegarder</button>
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom-red" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<!-- PROFILE -->
<section class="my-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

            </div>
        </div>
    </div>
</section>

<section id="profile">
    <div class="container py-2">
        <figure class="text-center">

        </figure>
        <p class="">
            <strong>Nom: </strong> <?php echo $data['currentUser']->name; ?>
        </p>
        <p class="">
            <strong>Email: </strong> <?php echo $data['currentUser']->email; ?>
        </p>
        <?php if (!empty($data['currentUser']->image)): ?>
        <div class="row">
            <div class="col-sm-4">
                <p><strong>Image: </strong></p>
                <img class="img-fluid" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['currentUser']->image; ?>"
                    alt="">
            </div>
        </div>

        <?php endif;?>
        <div class="d-flex justify-content-end">
            <a href="<?php echo URLROOT; ?>/adminProfile/edit" class="btn btn-dark mt-4">Modifier</a>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
