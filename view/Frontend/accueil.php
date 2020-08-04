<?php $this->title = "Accueil"; ?>
<?php $this->titrepage = "titrepage"; ?>
<div id="BlocPages">
    <h1>Accueil</h1></div>


    <section id="Billet">
        <div class="container-fluid ">

            <h2>Bienvenue sur mon site </h2>
            <p>
                Je suis Jean Forteroche, auteur de Roman vivant à Paris. Sur ce site Vous trouvez mon Blog avec ses différents chapitres, mes autres ouvrages,
                 ma biographie ainsi qu'une page de contact si vous avez des questions. Chaque publication périodique qui composera le roman 
                 "Billet simple pour l'Alaska" sera l'occasion de faire entendre votre voix. Exprimez votre ressenti sur la progression de
                  l'histoire, réagissez sur les décisions des personnages, proposez vos interprétations, échangez vos idées et je répondrait peut etre !
            </p>
        </div>
    </section>
    <section id="livresAccueil">
        <div class="blocLivres">
    <h3>Mes derniers romans :</h3>
    <figure class="chapitre col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Romance">
    <a href="index.php?route=livres"><img src="img/9.png" class="img-responsive"></a>
                <figcaption><h4>Demain II</h4>
            </figcaption>
            </figure>
            <figure class="chapitre col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Fantastique">
            <a href="index.php?route=livres"><img src="img/10.png" class="img-responsive"></a>
                <figcaption><h4>7 ans après</h4>
            </figcaption>
            </figure>
            <figure class="chapitre col-lg-4 col-md-4 col-sm-4 col-xs-6 filter Fantastique">
            <a href="index.php?route=livres"><img src="img/11.png" class="img-responsive"></a>
                <figcaption><h4>L'appel de l'ange</h4>
            </figcaption>
            </figure>
        </div>
            </section>
            <section id="Accroche">
            <div class="blocAccroche">
                <h3>Pourquoi un Roman en ligne ? </h3>
            <p>À l'heure du tout connecté et de l'omniprésence des réseaux sociaux, nous (Jean Forteroche et les personnes concernées par le projet) avons décidé de transposer le nouveau récit de Jean Forteroche en ligne, sous la forme de chapitres périodiques et interactifs, afin d'établir une communication bilatérale qu'empêche le support papier.
Ce roman est un cadeau pour vous, la communauté de lecteurs qui s'est constituée au fil des histoires abracadabrantesques dont seul Jean Forteroche détient le secret. Un cadeau pour faire entendre votre voix, et pour vous récompenser de votre indéfectible loyauté.</p>
            </div>
            </section>
            <section class="BilletsIndex">
            <h3>Billet simple pour l'Alaska : </h3>
        <div class="DernierBillet">

        <?php
    foreach ($chapitres as $chapitre)
    {
        ?>
        
        <figure>
        <p>Dernier chapitre paru :</p>
                <img src='<?= htmlspecialchars($chapitre->getImages());?>'>
                <p><?= htmlspecialchars($chapitre->getExtrait());?></p>
                <a href="index.php?route=chapitre&chapitreId=<?= htmlspecialchars($chapitre->getId());?>">
            <input class="btn btn-primary" type="submit" value="Lire Plus" /></a>
            <p>de <?= htmlspecialchars($chapitre->getAuthor());?></p>
            <p>Créé le : <?= date_format(date_create($chapitre->getCreatedAt()), 'd/m/Y');?></p>
            </figcaption>
            </a>
            </figure>
        
        <?php
    }
    ?>
        </div></section>
</body>
</html>