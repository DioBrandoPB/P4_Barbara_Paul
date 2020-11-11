<?php $this->titre = 'Administration'; ?>
<div id="msgSession">


<?= $this->session->show('ajouter_chapitre'); ?>
<?= $this->session->show('modifier_chapitre'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('publierChapitre'); ?>
<?= $this->session->show('brouillonnerChapitre'); ?>
<?= $this->session->show('supprimer_comm'); ?>
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
                foreach ($commentaires as $commentaire) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($commentaire->getPseudo()); ?></td>
                        <td><?= substr(htmlspecialchars($commentaire->getContent()), 0, 150); ?></td>
                        <td>Créé le : <?= date_format(date_create($commentaire->getCreatedAt()), 'd/m/Y'); ?></td>
                        <td class="signalement"><?= htmlspecialchars($commentaire->signalement()); ?></td>
                        <td class="validation"><?= htmlspecialchars($commentaire->validation()); ?></td>
                        <td>
                            <?php
                            if ($commentaire->signalement()) {
                            ?>
                                <a class="btn btn-primary" href="index.php?route=designalerComm&commentId=<?= $commentaire->getId(); ?>">Désignaler</a>
                                <p><a class="btn btn-primary" href="index.php?route=supprimerComm&commentId=<?= $commentaire->getId(); ?>">Supprimer</a></p>
                            <?php
                            } else if ($commentaire->validation()) {
                            ?>
                                <p><a class="btn btn-primary" href="index.php?route=supprimerComm&commentId=<?= $commentaire->getId(); ?>">Supprimer</a></p>

                            <?php
                            } else { ?>
                                <p><a class="btn btn-primary" href="index.php?route=validéCommentaire&commentId=<?= $commentaire->getId(); ?>">Validé</a></p>
                                <p><a class="btn btn-primary" href="index.php?route=supprimerComm&commentId=<?= $commentaire->getId(); ?>">Supprimer</a></p>
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
                foreach ($utilisateurs as $utilisateur) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($utilisateur->getPseudo()); ?></td>
                        <td>Créé le : <?= date_format(date_create($utilisateur->getCreatedAt()), 'd/m/Y'); ?></td>
                        <td><?= htmlspecialchars($utilisateur->getRole()); ?></td>
                        <td><?= htmlspecialchars($utilisateur->getMail()); ?></td>
                        <td><?php
                            if ($utilisateur->getRole() != 'admin') {
                            ?>
                                <p></p><a class="btn btn-primary" href="index.php?route=supprimerUtilisateur&utilisateurId=<?= $utilisateur->getId(); ?>">Supprimer</a></p>
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
        <div class="container-fluid">
            <h2>Messages</h2>
            <table>
                <tr>
                    <td>Nom</td>
                    <td>Mail</td>
                    <td>Message</td>
                    <td>Sujet</td>
                    <td>Répondre</td>
                </tr>
                <?php
                foreach ($contacts as $contact) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($contact->getNom()); ?></td>
                        <td><?= htmlspecialchars($contact->getMail()); ?></td>
                        <td><?= htmlspecialchars($contact->getMessage()); ?></td>
                        <td><?= htmlspecialchars($contact->getSujet()); ?></td>
                        <td><a class="btn btn-primary" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= htmlspecialchars($contact->getMail()); ?>&su=JeanForteroche&body=body_here">répondre</a></td>
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