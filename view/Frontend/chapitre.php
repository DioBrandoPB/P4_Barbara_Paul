<?php $this->title = "chapitre"; ?>
<div class="chapitres">
    <h2><?= htmlspecialchars($chapitre->getTitle());?></h2>
    <p><?= htmlspecialchars($chapitre->getContent());?></p>
    <p><?= htmlspecialchars($chapitre->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($chapitre->getCreatedAt());?></p>
    <a href="index.php?route=chapitres">Retour à l'accueil</a>
</div>
<br>

<div id="comments">
    <h3>Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
        <?php
        if($comment->signalement()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p>
            <?php
        } else {
            ?>
            <p><a href="../index.php?route=signalCommentaire&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
            <?php
        }
    }
    ?>
</div>
