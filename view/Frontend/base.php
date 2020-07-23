<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <script src="js/galerie.js" ></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
            <a class="navbar-brand" href="index.php?route=accueil">Jean Forteroche</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php?route=chapitres">Chapitres</a></li>
                <li><a href="index.php?route=biographie">À Propos</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?route=livres">Livres</a></li>
                <li><a href="index.php?route=contact">Contact</a></li>
                <li><a href="index.php?route=admin">Administration</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>

</header>
    <div class="wide">
        <div class="col-xs-5 line">
            <hr>
        </div>
        <div class="col-xs-2 logo">Un Billet Simple pour l'Alaska</div>
        <div class="col-xs-5 line">
            <hr>
        </div>
    </div>
    <!-- /.container -->


        <?= $content ?>

    <footer>
    <!-- Footer contenant les liens vers les réseaux sociaux -->
    <div class="reseauxSociaux">
        <a class="social facebook" href="#"><i class="fab fa-facebook-f"></i></a>
        <a class="social twitter" href="#"><i class="fab fa-twitter"></i></a>
        <a class="social linkedin" href="#"><i class="fab fa-linkedin"></i></a>
        <a class="social instagram" href="#"><i class="fab fa-instagram"></i></a>
    </div>
</footer>

</body>
</html>
