<?php $this->title = "Chapitres"; ?>
<div id="BlocPages">
    <h1>Liste des chapitres</h1>
    <div class="Chapitres"><div class="Billets">

    <?php
    foreach ($chapitres as $chapitre)
    {
        ?>
        
        <figure>
                <figcaption><h2><?= htmlspecialchars($chapitre->getTitle());?></h2>
                <a href="index.php?route=chapitre&chapitreId=<?= htmlspecialchars($chapitre->getId());?>">
                <img src='<?= htmlspecialchars($chapitre->getImages());?>'></a>
            <p><?= htmlspecialchars($chapitre->getExtrait());?></p>
            <p>de <?= htmlspecialchars($chapitre->getAuthor());?></p>
            <p>Créé le : <?= date_format(date_create($chapitre->getCreatedAt()), 'd/m/Y');?></p>
            </figcaption>
            <a href="index.php?route=chapitre&chapitreId=<?= htmlspecialchars($chapitre->getId());?>">
            <input class="btn btn-primary" type="submit" value="Lire Plus" /></a>
            </figure>
        
        <?php
    }
    ?></div>
</div></div>    <a href="index.php?route=addArticle">Nouvel article</a>