
<?php $this->title = "Inscription"; ?>

<section id="Connexion">
        <div class="container-fluid">
        <?= $this->session->show('error_login'); ?>

        <form method="post" action="index.php?route=register">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="mail">mail</label><br>
        <input type="mail" id="mail" name="mail"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input class="btn btn-primary" type="submit" value="Inscription" id="submit" name="submit">
    </form>
    <a href="index.php">Retour à l'accueil</a>


        </div>
    </section>