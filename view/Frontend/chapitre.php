<?php $this->title = "Lecture"; ?>
<div id="BlocPages"></div>

<div class="chapitres">

    <h2><?= htmlspecialchars($chapitre->getTitle());?></h2>
    <img src='https://projet4.paul-barbara.eu/img/<?= htmlspecialchars($chapitre->getImages()); ?><?= htmlspecialchars($chapitre->getId()); ?>.png' alt="image chapitre numéro <?= htmlspecialchars($chapitre->getId()); ?>">
    <p><?= ($chapitre->getContent());?></p>
    <p><?= htmlspecialchars($chapitre->getAuthor());?></p>
    <p>Créé le : <?= date_format(date_create($chapitre->getCreatedAt()), 'd/m/Y');?></p>
    <a href="index.php?route=chapitres">Retour à la liste des chapitres</a>
</div>
<br>

    
<div id="comments" >
    <h3>Ajouter un commentaire</h3>
    <?php include 'form_comment.php';?>
    <h3>Commentaires</h3>
    <div class="commentaires">
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <div class="comment">
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= date_format(date_create($comment->getCreatedAt()), 'd/m/Y');?></p>

        <?php
        if($comment->signalement()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p></div>
            <?php
        } else {
            ?>
            <p><a href="index.php?route=signalCommentaire&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
            <?php
        }
        ?>

        <br>
        <?php
    }
    ?>
</div></div></div>