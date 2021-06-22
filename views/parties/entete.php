<!doctype html>
<html lang="en">

<head>
    <title>Chimie</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <ul class="nav nav-tabs" id="nav">
            <li class="nav-item">
                <a href=<?= url('/molecules')?> class="nav-link">Molécules</a>
            </li>

            <?php if (est_connecte()) : ?>
                <li class="nav-item">
                    <a href= <?= url('/creer-molecule')?> class="nav-link">Ajouter une molécule</a>
                </li>
                <li class="nav-item">
                    <a href= <?= url('/deconnexion')?> class="nav-link">Se déconnecter</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a href= <?= url('/connexion')?> class="nav-link">Se connecter</a>
                </li>
            <?php endif; ?>
        </ul>