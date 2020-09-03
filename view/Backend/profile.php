<?php $this->title = 'Mon profil'; ?>


<section id="Connexion">
    <div class="container-fluid">
        <?= $this->session->show('update_password'); ?>
        <div>
            <h1><?= $this->session->get('pseudo'); ?></h1>

            <a class="btn btn-primary" href="index.php?route=majMDP">Modifier son mot de passe</a><br>

            <a class="btn btn-primary" href="index.php?route=logout">Déconnexion</a>
        </div>
    </div>
</section>