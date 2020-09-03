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
                        <img src='https://projet4.paul-barbara.eu/img/<?= htmlspecialchars($chapitre->getTitle()); ?>.png'></a>
                    <p><?= substr(($chapitre->getContent()), 0, 400); ?>...</p>
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