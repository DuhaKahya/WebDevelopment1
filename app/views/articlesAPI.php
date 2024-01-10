<h1> Articles  </h1>

<?php

foreach ($articles as $article) {
    ?>

    <h3><?= ucfirst($article->getTitle()) ?></h3>
    <p><?= $article->getDescription() ?></p>
    <p><?= $article->getPrice() ?></p>
    <p><?= $article->getStock() ?></p>
    <p><?= $article->getCategory() ?></p>
    <?php
}
?>