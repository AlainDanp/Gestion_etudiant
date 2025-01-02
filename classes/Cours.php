<?php

namespace App;

class Cours
{
    private $id;
    private $nom;
    private $classeId;
    private $credit;

    public function __construct($id, $nom, $classeId, $credit)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->classeId = $classeId;
        $this->credit = $credit;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getClasseId() { return $this->classeId; }
    public function getCredit() { return $this->credit; }

    public function setNom($nom) { $this->nom = $nom; }
    public function setClasseId($classeId) { $this->classeId = $classeId; }
    public function setCredit($credit) { $this->credit = $credit; }
}
