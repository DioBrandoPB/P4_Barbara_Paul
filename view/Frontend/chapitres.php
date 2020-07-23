<?php $this->title = "Chapitres"; ?>
    <h3>Roman en ligne</h3>
    <div class="Chapitres"><div class="Billets">
    <a href="index.php?route=addArticle">Nouvel article</a>
    <?php
    foreach ($chapitres as $chapitre)
    {
        ?>
        
        <figure>
        
                <figcaption><h3><?= htmlspecialchars($chapitre->getTitle());?></h3>
                <img src='<?= htmlspecialchars($chapitre->getImages());?>'>
            <p><?= htmlspecialchars($chapitre->getContent());?></p>
            <p>de <?= htmlspecialchars($chapitre->getAuthor());?></p>
            <p>Créé le : <?= date_format(date_create($chapitre->getCreatedAt()), 'd/m/Y');?></p>
            </figcaption>
            <a href="index.php?route=chapitre&chapitreId=<?= htmlspecialchars($chapitre->getId());?>"><input class="btn btn-primary" type="submit" value="Lire Plus" /></a>
            </figure>
        
        <?php
    }
    ?></div>
</div>

