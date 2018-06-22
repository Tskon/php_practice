<nav class="nav">
  <ul class="nav__list container">
    <?php foreach ($data['categories'] as $val) { ?>
      <li class="nav__item">
        <a href="all-lots.html"><?= $val ?></a>
      </li>
    <?php } ?>

  </ul>
</nav>