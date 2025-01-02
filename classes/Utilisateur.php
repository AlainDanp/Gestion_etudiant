<?php

namespace App;

class Utilisateur
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $role;
    protected $motDePasse;

    public function __construct($id, $nom, $prenom, $email, $role, $motDePasse)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->role = $role;
        $this->motDePasse = $motDePasse;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getEmail() { return $this->email; }
    public function getRole() { return $this->role; }

    public function verifierMotDePasse($motDePasse)
    {
        return password_verify($motDePasse, $this->motDePasse);
    }
}
