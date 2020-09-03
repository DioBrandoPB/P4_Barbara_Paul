<?php $this->title = 'Modifier mon mot de passe'; ?>
<section id="mdpUpdate">
    <div class="container-fluid">



        <form method="post" action="index.php?route=majMDP">
            <br><label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <label for="confpassword">Confirmation</label><br>
            <input type="password" id="password" name="password"><br>
            <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p><br>
            <input class="btn btn-primary" type="submit" value="Mettre à jour" id="submit" name="submit">
        </form>
        <a class="btn btn-primary" href="index.php">Retour à l'accueil</a>
    </div>
</section>