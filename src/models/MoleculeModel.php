<?php

class MoleculeModel extends Model{

    
    public function recuperTousLesMolecules(){
        $requete = 'SELECT * FROM molecule';
        $reponse = $this->bdd->query($requete);
        $molecules = $reponse->fetchAll(PDO::FETCH_ASSOC);

        return $molecules;
    }

    public function recuperTousLesAtomes(){
        $requete = 'SELECT * FROM atome JOIN atome_molecule WHERE atome.id=atome_molecule.id_atome';
        $reponse = $this->bdd->query($requete);
        $atomes = $reponse->fetchAll(PDO::FETCH_ASSOC);

        return $atomes;
    }

    public function recuperLIntermediaire(){
        $requete = 'SELECT * FROM atome_molecule';
        $reponse = $this->bdd->query($requete);
        $molecules = $reponse->fetchAll(PDO::FETCH_ASSOC);

        return $molecules;
    }

    public function creerUneMolecule($nom, $formule) {
        $requete = 'INSERT INTO molecule VALUE (NULL, ?, ?)';

        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $nom,
            $formule
        ]);
    }

    public function supprimerMolecule($id){
        $requete = 'DELETE FROM molecule WHERE id = ?';
        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $id
        ]);

        $requete = 'DELETE FROM atome_molecule WHERE id_molecule = ?';
        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $id
        ]);
    }
}