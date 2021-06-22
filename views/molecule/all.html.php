<?php

// session_start();


include Config::DOSSIER_VIEWS . '/parties/entete.php'; 
var_dump( est_connecte());?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Molécule</th>
            <th>Formule</th>
            <th>Composition des atomes dans la molécule</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody> 

            <tr>

        }
        <?= $j=0;?>
        <?php foreach ($molecules as $m) : ?>
            <tr>
                <td scope="row"><?= $m['id'] ?></td>
                <?php 
                    // $requete1='SELECT id_atome, qtte_atome FROM atome_molecule WHERE id_molecule='.$m['id'];
                    // $reponse = $bdd->query($requete1);
                    // $AtomeMolecule = $reponse->fetchAll();
                ?>
                <td><?= $m['nom'] ?></td>
                <td><?= $m['formule'] ?></td>
                <td>
                <?php
                foreach($atomes as $a){
                    if($a['id_molecule']==$m['id']){
                        ?>
                        <p>Descriptif de l'atome <?=$a['nom']?>:<br/>
                        Quantité dans la molécule -> <?=$a['qtte_atome']?><br/>
                        Symbole de l'atome' -> <?=$a["symbole"]?><br/>
                        Masse atomique de l'atome' -> <?=$a["masse_atomique"]?><br/>
                        <br/><br/><br/></p>
                    <?php
                    }
                    ?>
                    <?php
                }
                ?>

                </td>
                <td><a href="<?= url('/supprimer-molecule') . '?id=' . $m['id'] ?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include Config::DOSSIER_VIEWS . '/parties/pied_de_page.php'; ?>