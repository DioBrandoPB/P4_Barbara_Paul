<?php $this->title = "Chapitres"; ?>
    <h3>Chapitres</h3>
    <div class="Chapitres">
    <?php
    foreach ($chapitres as $chapitre)
    {
        ?>
        <div class="Billets">
        <figure class="chapitre col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Fantastique">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                <figcaption><h3><a href="index.php?route=chapitre&chapitreId=<?= htmlspecialchars($chapitre->getId());?>"><?= htmlspecialchars($chapitre->getTitle());?></a></h3>
            <p><?= htmlspecialchars($chapitre->getContent());?></p>
            <p>de <?= htmlspecialchars($chapitre->getAuthor());?></p>
            <p>Créé le : <?= htmlspecialchars($chapitre->getCreatedAt());?></p>
            </figcaption>
            </figure>
        </div>
        <?php
    }
    ?>
</div>

