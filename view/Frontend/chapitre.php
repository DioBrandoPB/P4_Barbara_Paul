<?php $this->title = "chapitre"; ?>
<div class="chapitres">
    
    <h2><?= htmlspecialchars($chapitre->getTitle());?></h2>
    <?php echo"<img src='$Images' name='' alt=''"; ?>
    <p><?= htmlspecialchars($chapitre->getContent());?></p>
    <p><?= htmlspecialchars($chapitre->getAuthor());?></p>
    <p>Créé le : <?= date_format(date_create($chapitre->getCreatedAt()), 'd/m/Y');?></p>
    <a href="index.php?route=chapitres">Retour à la liste des chapitres</a>
</div>
<br>

<div id="comments">
    
    <h3>Commentaires</h3>
    
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
            <p><a href="../index.php?route=signalCommentaire&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p></div>
            <?php
        }
    }
    ?>

</div>