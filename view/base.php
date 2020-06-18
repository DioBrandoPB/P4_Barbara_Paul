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

    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    
    <?php include('../header.php'); ?>
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

    <div id="content"></div>
        <?= $content ?>
    </div>
    <?php include('../footer.php'); ?>
</body>
</html>
