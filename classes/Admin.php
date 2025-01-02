<?php

namespace App;

class Admin extends Utilisateur
{
    public function __construct($id, $nom, $prenom, $email, $motDePasse)
    {
        parent::__construct($id, $nom, $prenom, $email, 'admin', $motDePasse);
    }

    public function ajouterEtudiant($db, Etudiant $etudiant)
    {
        $query = $db->prepare("
            INSERT INTO utilisateurs (nom, prenom, email, role, mot_de_passe) 
            VALUES (?, ?, ?, 'etudiant', ?)
        ");
        $result = $query->execute([
            $etudiant->getNom(),
            $etudiant->getPrenom(),
            $etudiant->getEmail(),
            password_hash($etudiant->motDePasse, PASSWORD_DEFAULT)
        ]);

        if ($result) {
            $id = $db->lastInsertId();
            $queryEtudiant = $db->prepare("
                INSERT INTO etudiants (id, matricule, classe_id, email_parent, statut_financier) 
                VALUES (?, ?, ?, ?, ?)
            ");
            return $queryEtudiant->execute([
                $id,
                $etudiant->getMatricule(),
                $etudiant->getClasseId(),
                $etudiant->getEmailParent(),
                $etudiant->getStatutFinancier()
            ]);
        }
        return false;
    }
}
