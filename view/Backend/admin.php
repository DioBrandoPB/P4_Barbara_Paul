<?php $this->title = 'Administration'; ?>

<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<section id="admin">
<div class="container-fluid">
<h2>Chapitres</h2>
<table class="chapitresTableau">
    <tr>
        <td>N°</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($chapitres as $chapitre)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($chapitre->getId());?></td>
            <td><a href="index.php?route=article&articleId=<?= htmlspecialchars($chapitre->getId());?>"><?= htmlspecialchars($chapitre->getTitle());?></a></td>
            <td><?= substr(htmlspecialchars($chapitre->getContent()), 0, 150);?></td>
            <td><?= htmlspecialchars($chapitre->getAuthor());?></td>
            <td>Créé le : <?= htmlspecialchars($chapitre->getCreatedAt());?></td>
            <td>
                <a class="btn btn-primary" href="index.php?route=editArticle&articleId=<?= $chapitre->getId(); ?>">Modifier</a>
                <a class="btn btn-primary" href="index.php?route=deleteArticle&articleId=<?= $chapitre->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</div>

<div class="container-fluid">
<h2>Commentaires</h2>
<table class="commentairesTableau">
    <tr>
        <td>N°</td>
        <td>Pseudo</td>
        <td>Message</td>
        <td>Date</td>
        <td>Signalement</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($comment->getId());?></td>
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
            <td id="signalement"><?= htmlspecialchars($comment->signalement());?></td>
            <td>
            <?php
        if($comment->signalement()) {
            ?>
            <a class="btn btn-primary" href="index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
            <p><a class="btn btn-primary" href="index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></p>
            <?php
        } else {
            ?>
            <p><a class="btn btn-primary" href="index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></p>
            <?php
        }
        ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</div>

<h2>Utilisateurs</h2>

</section>

<script>                if (document.getElementById("signalement").innerHTML === "0") {
                    document.getElementById("signalement").innerHTML = "Aucun";
                }
                else if (document.getElementById("signalement").innerHTML != "0") {
                    document.getElementById("signalement").innerHTML = "Oui";
                }  </script>