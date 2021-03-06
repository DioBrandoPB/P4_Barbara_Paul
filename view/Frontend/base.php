<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title><?= $titre ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?route=accueil"><i class="fas fa-home"></i>&nbsp;Jean Forteroche</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php?route=chapitres">Chapitres</a></li>
                    <li><a href="index.php?route=livres">Livres</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?route=biographie">À Propos</a></li>
                    <li><a href="index.php?route=contact">Contact</a></li>
                    <li>
                        <div class="menuDeroulant">
                            <button class="menuBtn"><i class="fas fa-user"></i></button>
                            <div class="index">
                                <?php
                                if ($this->session->get('pseudo')) {
                                ?>
                                    <a href="index.php?route=profile">Profil</a>
                                    
                                    <?php if ($this->session->get('role') === 'admin') { ?>
                                        <a href="index.php?route=admin">Administration</a>
                                        <a href="index.php?route=ajouterChapitre">Nouveau Chapitre</a>
                                    <?php } ?>
                                    
                                    <a href="index.php?route=deconnexion">Déconnexion</a>
                                <?php
                                } else {
                                ?>
                                    <a href="index.php?route=connexion">Connexion</a>
                                    <a href="index.php?route=inscription">Inscription</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>

    </header>
    <div class="Titre">

        <div class="col-xs-2 logo">
            <h1>Un Billet Simple pour l'Alaska</h1>
            <div class="titreDynamique"><?= $titre ?></div>
        </div>


    </div>
    <!-- /.container -->

    <?= $contenu ?>

    <footer>
        <!-- Footer contenant les liens vers les réseaux sociaux -->
        <div class="reseauxSociaux">
            <a class="social facebook" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="social twitter" href="#"><i class="fab fa-twitter"></i></a>
            <a class="social linkedin" href="#"><i class="fab fa-linkedin"></i></a>
            <a class="social instagram" href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <script src="js/galerie.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/adminTrad.js"></script>
</body>

</html>