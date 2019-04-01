<?php require APPROOT . '/views/inc/header.php';?>

<body class="page-template">

  <?php require APPROOT . '/views/inc/nav.php';?>

  <div id="container">
    <div class="page-banner">
      <button class="menu-btn">&#9776;</button>
      <div class="container">
        <div class="d-flex justify-content-center align-items-center">
          <h2 class="page-title text-center"><?php echo $data['book']->title; ?></h2>
        </div>
      </div>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <figure class="text-center">
            <img class="img-fluid p-3" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['book']->image; ?>" alt="">
          </figure>
        </div>
        <div class="col-sm-6">
          <p class="text-left"><?php echo $data['book']->summary; ?></p>
        </div>
      </div>
    </div>
  </section>

  </div>


  <?php require APPROOT . '/views/inc/footer.php';?>
