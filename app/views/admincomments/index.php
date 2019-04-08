<?php require APPROOT . '/views/inc/adminHeader.php';?>

<header id="admin-main-header" class="py-2 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><i class="fas fa-comments"></i> Commentaires - Un Billet Simple Pour L'Alaska</h1>
      </div>
    </div>
  </div>
</header>

<div class="container my-2">
  <?php flash('comment_message');?>
</div>


<section class="py-4">
  <div class="container">
    <div class="">
      <table class="table table-hover table-comments">
        <thead>
          <tr>
            <th class="col">Chapitres</th>
            <th class="col">Prénom</th>
            <th class="col">Nom</th>
            <th class="col">Commentaire</th>
            <th class="col">Ajouté le:</th>
            <th class="col">Signalement</th>
            <th class="col">Ajouté le:</th>
            <th class="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['comments'] as $comment): ?>
          <tr>
            <td class="col"><?php echo htmlspecialchars($comment->title); ?></td>
            <td class="col"><?php echo htmlspecialchars($comment->firstname); ?></td>
            <td class="col"><?php echo htmlspecialchars($comment->lastname); ?></td>
            <td class="col"><?php if (strlen($comment->comment) > 20): ?>
              <?php echo htmlspecialchars(substr($comment->comment, 0, strrpos(substr($comment->comment, 0, 20), ' '))); ?> ...
              <?php else: ?>
              <?php echo htmlspecialchars($comment->comment) . ' ...'; ?>
              <?php endif;?></td>
            <?php
$timeStamp = $comment->commentDate;
setlocale(LC_TIME, "fr_FR");
$timeStamp = strftime("%A %d %B %G", strtotime($timeStamp));
?>
            <td class="col"><?php echo utf8_encode($timeStamp); ?></td>
            <td class="col"><?php echo htmlspecialchars($comment->flag); ?></td>
            <?php
$timeStamp = $comment->flagDate;
setlocale(LC_TIME, "fr_FR");
$timeStamp = strftime("%A %d %B %G", strtotime($timeStamp));
?>
            <?php if (isset($comment->flagDate)): ?>
            <td class="col"><?php echo utf8_encode($timeStamp); ?></td>
            <?php else: ?>
            <td></td>
            <?php endif;?>
            <td class="col"><a href="<?php echo URLROOT; ?>/adminComments/show/<?php echo $comment->commentId; ?>"><i class="fas fa-external-link-square-alt"></i></a></td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php require APPROOT . '/views/inc/adminFooter.php';?>
