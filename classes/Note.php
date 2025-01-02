<?php

namespace App;

class Note
{
    private $id;
    private $etudiantId;
    private $coursId;
    private $typeNote;
    private $valeur;
    private $anneeScolaire;

    public function __construct($id, $etudiantId, $coursId, $typeNote, $valeur, $anneeScolaire)
    {
        $this->id = $id;
        $this->etudiantId = $etudiantId;
        $this->coursId = $coursId;
        $this->typeNote = $typeNote;
        $this->valeur = $valeur;
        $this->anneeScolaire = $anneeScolaire;
    }

    public function getId() { return $this->id; }
    public function getEtudiantId() { return $this->etudiantId; }
    public function getCoursId() { return $this->coursId; }
    public function getTypeNote() { return $this->typeNote; }
    public function getValeur() { return $this->valeur; }
    public function getAnneeScolaire() { return $this->anneeScolaire; }

    public function setValeur($valeur) { $this->valeur = $valeur; }
    public function setTypeNote($typeNote) { $this->typeNote = $typeNote; }
}
