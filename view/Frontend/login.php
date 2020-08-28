<?php $this->title = "Connexion"; ?>

<section id="Connexion">
        <div class="container-fluid">
        <?= $this->session->show('error_login'); ?>

    <form method="post" action="index.php?route=login">
    <br><label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input class="btn btn-primary" type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a href="index.php">Retour à l'accueil</a>


        </div>
    </section>