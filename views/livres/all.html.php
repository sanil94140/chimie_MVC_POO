<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les livres de la bibliothèque</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>ISBN</th>
            <th>Date de publication</th>
            <th>Stock</th>
            <th>ID de l'auteur</th>
            <th>Supprimer</th>
        </tr>

        <?php foreach ($livres as $livre) { ?>

            <tr>
                <td><?php echo $livre['id']; ?></td>
                <td><?php echo $livre['titre']; ?></td>
                <td><?php echo $livre['isbn']; ?></td>
                <td><?php echo $livre['date_publication']; ?></td>
                <td><?php echo $livre['stock']; ?></td>
                <td><?php echo $livre['auteur_id']; ?></td>
                <td><a href="<?= url('/supprimer-livre') . '?id=' . $molecule['id'] ?>">Supprimer</a></td>
            </tr>

        <?php } ?>

    </table>
</body>

</html>