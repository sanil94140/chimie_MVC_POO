<?php
    $bdd = new PDO('mysql:host=localhost;dbname=chimie', 'root', '');
    $reponse = $bdd->query('SELECT * FROM molecule');
    $molecules = $reponse->fetchAll(PDO::FETCH_ASSOC);

    $tableau1=array('foo' => 'bar');
    $tableau1["fii"]=array('fol' => 'blar');
    var_dump($tableau1);
    ?>

<?php

$requete1='SELECT * FROM molecule INNER JOIN atome_molecule ON molecule.id=atome_molecule.id_molecule  
                                INNER JOIN atome ON atome.id=atome_molecule.id_molecule';
$reponse = $bdd->query($requete1);
$molecules = $reponse->fetchAll();
?>

<!-- <pre>
<?php var_dump($molecules); ?>
</pre> -->

<?php 
foreach($molecules as $m){?>
<pre>
<?php var_dump($m); ?>
</pre>
<?php

    echo $m['id_atome'].'<br/>';
    echo $m["qtte_atome"].'<br/>';

?>
<?php
}
?>



<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Molécule</th>
            <th>Formule</th>
            <th>Quantité d'atomes</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($molecules as $m) : ?>
            <tr>
                <td scope="row"><?= $m['id'] ?></td>
                <?php 
                    $requete1='SELECT id_atome, qtte_atome FROM atome_molecule WHERE id_molecule='.$m['id'];
                    $reponse = $bdd->query($requete1);
                    $AtomeMolecule = $reponse->fetchAll();
                ?>
                <td><?= $m['nom'] ?></td>
                <td><?= $m['formule'] ?></td>
                <td>
                <?php
                print_r($m);
                echo '<br/>';
                echo '<br/>';
                echo '<br/>';
                print_r($AtomeMolecule);
                echo '<br/>';
                echo '<br/>';
                echo '<br/>';

                foreach($AtomeMolecule as $m){
                    $requete2='SELECT * FROM atome WHERE id='.$m["id_atome"];
                    $reponse = $bdd->query($requete2);
                    $Atome = $reponse->fetchAll();
                    var_dump($Atome);
                    ?>
                    <p>Quantité de l'atome <?=$Atome[0]['nom']?>: <?=$m['qtte_atome']?></p>
                    <?php
                }
                ?>
                    <br/>
                    <br/>
                    <br/>
                </td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>