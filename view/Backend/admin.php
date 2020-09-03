<?php $this->title = 'Administration'; ?>
<div id="msgSession">


<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('publierChapitre'); ?>
<?= $this->session->show('brouillonnerChapitre'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>
</div>
<section id="admin">
    <?php if ($this->session->get('role') === 'admin') { ?>
        <div class="container-fluid">
            <h2>Chapitres</h2>
            <table class="chapitresTableau">
                <tr>
                    <td>Titre</td>
                    <td>Contenu</td>
                    <td>Auteur</td>
                    <td>Date</td>
                    <td class="status">Statut</td>
                    <td>Actions</td>
                </tr>
                <?php
                foreach ($chapitres as $chapitre) {
                ?>
                    <tr>
                        <td><a href="index.php?route=chapitre&chapitreId=<?= htmlspecialchars($chapitre->getId()); ?>"><?= htmlspecialchars($chapitre->getTitle()); ?></a></td>
                        <td><?= substr(($chapitre->getContent()), 0, 400); ?>...</td>
                        <td><?= htmlspecialchars($chapitre->getAuthor()); ?></td>
                        <td>Créé le : <?= date_format(date_create($chapitre->getCreatedAt()), 'd/m/Y'); ?></td>
                        <td class="statut"> <?= htmlspecialchars($chapitre->getStatut()); ?></td>
                        <td>
                            <a class="btn btn-primary" href="index.php?route=modifierChapitre&chapitreId=<?= $chapitre->getId(); ?>">Modifier</a>
                            <?php
                            if ($chapitre->getStatut()) {
                            ?>
                            <a class="btn btn-primary" href="index.php?route=publierChapitre&chapitreId=<?= $chapitre->getId(); ?>">Publier</a>
                            <a class="btn btn-primary" href="index.php?route=deleteChapitre&chapitreId=<?= $chapitre->getId(); ?>">Supprimer</a>
                            <?php
                            } else { ?>
                            <a class="btn btn-primary" href="index.php?route=brouillonnerChapitre&chapitreId=<?= $chapitre->getId(); ?>">Brouillon</a>
                                <a class="btn btn-primary" href="index.php?route=deleteChapitre&chapitreId=<?= $chapitre->getId(); ?>">Supprimer</a>
                            <?php   } ?>
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
                        <td><?= htmlspecialchars($comment->getPseudo()); ?></td>
                        <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?></td>
                        <td>Créé le : <?= date_format(date_create($comment->getCreatedAt()), 'd/m/Y'); ?></td>
                        <td class="signalement"><?= htmlspecialchars($comment->signalement()); ?></td>
                        <td class="validation"><?= htmlspecialchars($comment->validation()); ?></td>
                        <td>
                            <?php
                            if ($comment->signalement()) {
                            ?>
                                <a class="btn btn-primary" href="index.php?route=designalerComm&commentId=<?= $comment->getId(); ?>">Désignaler</a>
                                <p><a class="btn btn-primary" href="index.php?route=supprimerComm&commentId=<?= $comment->getId(); ?>">Supprimer</a></p>
                            <?php
                            } else if ($comment->validation()) {
                            ?>
                                <p><a class="btn btn-primary" href="index.php?route=supprimerComm&commentId=<?= $comment->getId(); ?>">Supprimer</a></p>

                            <?php
                            } else { ?>
                                <p><a class="btn btn-primary" href="index.php?route=validéCommentaire&commentId=<?= $comment->getId(); ?>">Validé</a></p>
                                <p><a class="btn btn-primary" href="index.php?route=supprimerComm&commentId=<?= $comment->getId(); ?>">Supprimer</a></p>
                            <?php   } ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="container-fluid">
            <h2>Utilisateurs</h2>
            <table>
                <tr>
                    <td>Pseudo</td>
                    <td>Date</td>
                    <td>Rôle</td>
                    <td>Mail</td>
                    <td>Actions</td>
                </tr>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($user->getPseudo()); ?></td>
                        <td>Créé le : <?= date_format(date_create($user->getCreatedAt()), 'd/m/Y'); ?></td>
                        <td><?= htmlspecialchars($user->getRole()); ?></td>
                        <td><?= htmlspecialchars($user->getMail()); ?></td>
                        <td><?php
                            if ($user->getRole() != 'admin') {
                            ?>
                                <p></p><a class="btn btn-primary" href="index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a></p>
                            <?php } else {
                            ?>
                                Suppression impossible
                            <?php
                            }
                            ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    <?php
    } else { ?>



        <div class="container-fluid"><img src="img/stop.png" alt="Panneau Stop"></div>


    <?php } ?>
</section>