<?php

class MoleculeController {

    public function afficherTousLesMolecules(){
        $model= new MoleculeModel;
        $molecules=$model->recuperTousLesMolecules();
        $model2=new MoleculeModel;
        $atomes=$model2->recuperTousLesAtomes();
        $model3=new MoleculeModel;
        $liaison=$model3->recuperLIntermediaire();
        include Config::DOSSIER_VIEWS . '/molecule/all.html.php';
    }

    public function supprimerMolecule(){
        $MoleculeModel= new MoleculeModel;
        $MoleculeModel->supprimerMolecule($_GET['id']);
        rediriger('/molecules');

    }

    public function creerMolecule() {
        if (!empty($_POST)) {
            $model = new MoleculeModel;
            if (
                !empty($_POST['nom'])
                && !empty($_POST['formule'])
            ) {

                $model->creerUneMolecule(
                    htmlspecialchars($_POST['nom']),
                    htmlspecialchars($_POST['formule'])
                );

                rediriger('/molecules');
            } else {
                $erreur = 'Formulaire mal rempli.';
            }
        }

        include Config::DOSSIER_VIEWS . '/molecule/creer.html.php';
    }
}