
<?php $this->titre = "Inscription"; ?>
<?= $this->session->show('erreurinscription'); ?>
<section id="Connexion">
        <div class="container-fluid">


        <form method="post" action="index.php?route=inscription">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>" onfocus="verificationVide3()" onblur="verificationVide3()" onkeyup="verificationVide3()"><br>
        <label for="mail"  >mail</label><br>
        <input type="mail" id="mail" name="mail" onfocus="verificationVide3()" onblur="verificationVide3()" onkeyup="verificationVide3()"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password" onfocus="verificationVide3()" onblur="verificationVide3()" onkeyup="verificationVide3()"><br>
        <input class="btn btn-primary" type="submit" id="btnInscription" value="Inscription" id="submit" name="submit">
    </form>
    <a href="index.php">Retour à l'accueil</a>


        </div>
    </section>