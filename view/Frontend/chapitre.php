<?php $this->titre = "Lecture"; ?>
<div id="BlocPages"></div>

<div class="chapitres">

    <h2><?= htmlspecialchars($chapitre->getTitle());?></h2>
    <p><?= ($chapitre->getContent());?></p>
    <p><?= htmlspecialchars($chapitre->getAuthor());?></p>
    <p>Créé le : <?= date_format(date_create($chapitre->getCreatedAt()), 'd/m/Y');?></p>
    <a href="index.php?route=chapitres">Retour à la liste des chapitres</a>
</div>
<br>

    
<div id="commentaires" >
    <h3>Ajouter un commentaire</h3>
    <?php include 'form_commentaire.php';?>
    <h3>Commentaires</h3>
    <div class="commentaires">
    <?php
    foreach ($commentaires as $commentaire)
    {
        ?>
        <div class="comment">
            
        <h4><?= htmlspecialchars($commentaire->getPseudo());?></h4>
        <p><?= htmlspecialchars($commentaire->getContent());?></p>
        <p>Posté le <?= date_format(date_create($commentaire->getCreatedAt()), 'd/m/Y');?></p>

        <?php
        if($commentaire->signalement()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p></div>
            <?php
        } else {
            ?>
            <p><a href="index.php?route=signalCommentaire&commentId=<?= $commentaire->getId(); ?>">Signaler le commentaire</a></p>
            <?php
        }
        ?>

        <br></div>
        <?php
        
    }
    ?>
</div></div>