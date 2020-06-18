<?php $this->title = "Chapitres"; ?>
    <h1>Chapitres</h1>
    <div class="Chapitres">
    <?php
    foreach ($articles as $article)
    {
        ?>
        <div class="Billets">
        <figure class="chapitre col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Fantastique">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                <figcaption><h3><a href="index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h3>
            <p><?= htmlspecialchars($article->getContent());?></p>
            <p>de <?= htmlspecialchars($article->getAuthor());?></p>
            <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
            </figcaption>
            </figure>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>
