<form method="post" action="index.php?route=ajoutComm&chapitreId=<?= htmlspecialchars($chapitre->getId()); ?>">
    <label for="pseudo">Pseudo*</label><br>
    <input type="text" id="pseudo" onfocus="verificationVide()" onblur="verificationVide()" onkeyup="verificationVide()" name="pseudo"><br>
    <label for="pseudo">E-Mail*</label><br>
    <input type="email" id="mail" onfocus="verificationVide()" onblur="verificationVide()" onkeyup="verificationVide()" name="mail"><br>
    <label for="content">Message*</label><br>
    <textarea id="content" onfocus="verificationVide()" onblur="verificationVide()" onkeyup="verificationVide()" name="content"></textarea><br>
    <p>* (champs obligatoire)</p>
    <input class="btn btn-primary" id="commBtn" type="submit" value="Ajouter" id="submit" name="submit">
</form>
