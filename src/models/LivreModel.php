<?php

class LivreModel extends Model {

    public function recupererTousLesLivres() {
        $requete = 'SELECT * FROM `livre` ORDER BY `titre` ASC';

        $reponse = $this->bdd->query($requete);

        $livres = $reponse->fetchAll(PDO::FETCH_ASSOC);

        return $livres;
    }

    public function supprimerLivre($id) {
        $requete = 'DELETE FROM livre WHERE id = ?';
        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $id
        ]);
    }


    public function creerUnLivre($titre, $isbn, $auteur, $date, $stock) {
        $requete = 'INSERT INTO livre VALUE (NULL, ?, ?, ?, ?, ?)';

        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $titre,
            $isbn,
            $auteur,
            $date,
            $stock
        ]);
    }


    /**
     * Vérifie que l'auteur existe dans la BDD
     * 
     * @param int $auteur_id L'id qu'on vérifier
     * @return bool Indique si l'auteur existe ou pas
     */
    function verifier_auteur(int $auteur_id): bool {

        $requete = 'SELECT * FROM auteur WHERE id = ?';

        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $auteur_id
        ]);

        $mon_auteur = $prep->fetch(PDO::FETCH_ASSOC);

        if ($mon_auteur === false) return false;    // Cas où on n'a pas d'auteur
        else return true;                            // Cas où on a un auteur
    }

    /**
     * Vérifie que l'id_livre fourni existe dans la table des livres
     * 
     * 
     * L'idée : Si un id_livre existe
     * Alors je suis capable d'aller chercher un livre qui a cet id
     */
    function verifier_livre($id_livre): bool {
        $requete = "SELECT * FROM livre WHERE ? = livre.id";
        $prep = $this->bdd->prepare($requete);
        $prep->execute([
            $id_livre
        ]);

        $livre = $prep->fetchAll();

        if (empty($livre)) return false;
        else return true;
    }
}
