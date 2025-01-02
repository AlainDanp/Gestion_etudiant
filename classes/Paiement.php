<?php

namespace App;

class Paiement
{
    private $id;
    private $etudiantId;
    private $montant;
    private $dateVersement;

    public function __construct($id, $etudiantId, $montant, $dateVersement)
    {
        $this->id = $id;
        $this->etudiantId = $etudiantId;
        $this->montant = $montant;
        $this->dateVersement = $dateVersement;
    }

    public function getId() { return $this->id; }
    public function getEtudiantId() { return $this->etudiantId; }
    public function getMontant() { return $this->montant; }
    public function getDateVersement() { return $this->dateVersement; }
}
