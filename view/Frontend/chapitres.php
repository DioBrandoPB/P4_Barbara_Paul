<?php $this->title = "Chapitres"; ?>
<?= $this->session->show('add_article'); ?>


<div class="Chapitres">
    <div class="Billets">

        <?php
        foreach ($chapitres as $chapitre) {
        ?>

            <figure>
                <figcaption>
                    <h2><?= htmlspecialchars($chapitre->getTitle()); ?></h2>
                    <a href="index.php?route=chapitre&chapitreId=<?= htmlspecialchars($chapitre->getId()); ?>">
                        <img src='https://projet4.paul-barbara.eu/img/<?= htmlspecialchars($chapitre->getImages()); ?>.png'></a>
                    <p><?= htmlspecialchars($chapitre->getExtrait()); ?></p>
                    <p>de <?= htmlspecialchars($chapitre->getAuthor()); ?></p>
                    <p>Créé le : <?= date_format(date_create($chapitre->getCreatedAt()), 'd/m/Y'); ?></p>

                    <a class="btn btn-primary" href="index.php?route=chapitre&chapitreId=<?= htmlspecialchars($chapitre->getId()); ?>">
                        Lire Plus</a>
                </figcaption>
            </figure>

        <?php
        }
        ?></div>
</div>