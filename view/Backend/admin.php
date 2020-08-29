<?php $this->title = 'Administration'; ?>

<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<section id="admin">
<?php if ($this->session->get('role') === 'admin') { ?>
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
            foreach ($chapitres as $chapitre) {
            ?>
                <tr>
                    <td><?= htmlspecialchars($chapitre->getId()); ?></td>
                    <td><a href="index.php?route=article&articleId=<?= htmlspecialchars($chapitre->getId()); ?>"><?= htmlspecialchars($chapitre->getTitle()); ?></a></td>
                    <td><?= substr(htmlspecialchars($chapitre->getContent()), 0, 150); ?></td>
                    <td><?= htmlspecialchars($chapitre->getAuthor()); ?></td>
                    <td>Créé le : <?= htmlspecialchars($chapitre->getCreatedAt()); ?></td>
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
                <td>Validé</td>
                <td>Actions</td>
            </tr>
            <?php
            foreach ($comments as $comment) {
            ?>
                <tr>
                    <td><?= htmlspecialchars($comment->getId()); ?></td>
                    <td><?= htmlspecialchars($comment->getPseudo()); ?></td>
                    <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?></td>
                    <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt()); ?></td>
                    <td class="signalement"><?= htmlspecialchars($comment->signalement()); ?></td>
                    <td class="validation"><?= htmlspecialchars($comment->validation()); ?></td>
                    <td>
                        <?php
                        if ($comment->signalement()) {
                        ?>
                            <a class="btn btn-primary" href="index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler</a>
                            <p><a class="btn btn-primary" href="index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer</a></p>
                        <?php
                        } else {
                        ?>
                            <p><a class="btn btn-primary" href="index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer</a></p>
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
    <?php
        } else {?>
            
            
            
            <div class="container-fluid"><img src="img/stop.png" alt="Panneau Stop"></div>
            
            
        <?php } ?>
</section>

<script>

document.querySelectorAll('.signalement').forEach(el =>{
   if(el.textContent.trim() === '0'){
      el.textContent = 'Aucun'
   }
   if(el.textContent.trim() === '1'){
      el.textContent = 'Oui'
   }
});
document.querySelectorAll('.validation').forEach(el =>{
   if(el.textContent.trim() === '0'){
      el.textContent = 'Non'
   }
   if(el.textContent.trim() === '1'){
      el.textContent = 'Oui'
   }
});

</script>