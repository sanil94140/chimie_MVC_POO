<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signaler un emprunt</title>
</head>

<body>

    <h1>Emprunter un livre le <?= date('d/m/Y') ?></h1>

    <?php if (isset($erreur)) { ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Fermer</span>
            </button>
            <?= $erreur ?>
        </div>
    <?php } ?>

    <form action="<?= url('/creer-emprunt') ?>" method="post">

        <label for="livre">Livre</label>
        <input type="number" min="1" step="1" name="livre" id="livre" required autofocus>
        <br>

        <label for="emprunteur">Emprunteur</label>
        <input type="number" min="1" step="1" name="emprunteur" id="emprunteur" required>
        <br>

        <input type="submit" value="Emprunter">
    </form>
</body>

</html>