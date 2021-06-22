<?php

session_start();

include __DIR__ . '/functions.php';

$bdd = se_connecter();
$reponse = $bdd->query('SELECT * FROM molecule');
$molecules = $reponse->fetchAll(PDO::FETCH_ASSOC);

include __DIR__ . '/parties/entete.php'; ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Molécule</th>
            <th>Formule</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($molecules as $m) : ?>
            <tr>
                <td scope="row"><?= $m['id'] ?></td>
                <td><?= $m['nom'] ?></td>
                <td><?= $m['formule'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/parties/pied_de_page.php'; ?>