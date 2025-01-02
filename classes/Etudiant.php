<?php

namespace App;

class Etudiant extends Utilisateur
{
    private $matricule;
    private $classeId;
    private $emailParent;
    private $statutFinancier;

    public function __construct($id, $nom, $prenom, $email, $motDePasse, $matricule, $classeId, $emailParent, $statutFinancier = 'insolvable')
    {
        parent::__construct($id, $nom, $prenom, $email, 'etudiant', $motDePasse);
        $this->matricule = $matricule;
        $this->classeId = $classeId;
        $this->emailParent = $emailParent;
        $this->statutFinancier = $statutFinancier;
    }

    public function getMatricule() { return $this->matricule; }
    public function getClasseId() { return $this->classeId; }
    public function getEmailParent() { return $this->emailParent; }
    public function getStatutFinancier() { return $this->statutFinancier; }

    public function setStatutFinancier($statut) { $this->statutFinancier = $statut; }

    public function estSolvable()
    {
        return $this->statutFinancier === 'solvable';
    }
}
