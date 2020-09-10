<?php $this->title = "Contact"; ?>

<div id="msgSession">



</div>
<section id="Contact">
        <div class="container-fluid">
            <div class="form-box">
                <h2>Posez moi vos questions</h2>
                <form method="post" action="index.php?route=ajoutMessage">
    <label for="pseudo">Pseudo*</label><br>
    <input type="text" id="pseudo" onfocus="verificationVide2()" onblur="verificationVide2()" onkeyup="verificationVide2()" name="Nom"><br>
    <label for="E-mail">E-Mail*</label><br>
    <input type="email" id="mail" onfocus="verificationVide2()" onblur="verificationVide2()" onkeyup="verificationVide2()" name="Mail"><br>
    <label for="sujet">Sujet*</label><br>
    <input type="text" id="sujet" onfocus="verificationVide2()" onblur="verificationVide2()" onkeyup="verificationVide2()" name="Sujet"><br>
    <label for="content">Message*</label><br>
    <textarea id="content" onfocus="verificationVide2()" onblur="verificationVide2()" onkeyup="verificationVide2()" name="Msg"></textarea><br>
    <p>* (champs obligatoire)</p>
    <input class="btn btn-primary" id="commBtn" type="submit" value="Envoyer" id="submit" name="submit">
</form>

            </div>

        </div>
    </section>

