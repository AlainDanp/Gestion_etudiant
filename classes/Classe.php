<?php

namespace App;

class Classe
{
    private $id;
    private $nom;
    private $pension;

    public function __construct($id, $nom, $pension)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->pension = $pension;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPension() { return $this->pension; }

    public function setNom($nom) { $this->nom = $nom; }
    public function setPension($pension) { $this->pension = $pension; }
}
