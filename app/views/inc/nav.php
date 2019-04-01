<!-- Pushy Menu -->
<nav class="pushy pushy-left">
  <div class="pushy-content">
    <ul>
      <!-- Submenu -->
      <li class="pushy-link"><a href="<?php echo URLROOT; ?>">Accueil</a></li>
      <li class="pushy-submenu">
        <button>Un Billet Simple pour l'Alaska</button>
        <ul>
          <li class="pushy-link"><a href="<?php echo URLROOT; ?>/chapitres">Tous les chapitres</a></li>
          <?php foreach ($data['chapters'] as $chapter): ?>
          <li class="pushy-link"><a href="<?php echo URLROOT; ?>/chapitres/<?php echo $chapter->id; ?>"><?php echo $chapter->title; ?></a>
          </li>
          <?php endforeach;?>
        </ul>
      </li>
      <li class="pushy-submenu">
        <button>Livres</button>
        <ul>
          <li class="pushy-link"><a href="<?php echo URLROOT; ?>/livres">Tous les livres</a></li>
          <?php foreach ($data['books'] as $book): ?>
          <li class="pushy-link"><a href="<?php echo URLROOT; ?>/livres/<?php echo $book->id; ?>"><?php echo $book->title; ?></a></li>
          <?php endforeach;?>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>
