<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
</head>

<body>
    <h1>Créer un livre</h1>

    <?php if (isset($erreur)) { ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Fermer</span>
            </button>
            <?= $erreur ?>
        </div>
    <?php } ?>

    <form action="<?= url('/creer-livre') ?>" method="post">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre" required autofocus>
        <br>

        <label for="isbn">ISBN</label>
        <input type="text" id="isbn" name="isbn" maxlength="15" required>
        <br>

        <label for="date">Date de publication</label>
        <input type="date" id="date" name="date" required>
        <br>

        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" min="0" step="1" max="127" required>
        <br>

        <label for="auteur">ID de l'auteur</label>
        <input type="number" min="1" step="1" id="auteur" name="auteur" required>
        <br>

        <input type="submit" value="Ajouter ce livre">
    </form>
</body>

</html>