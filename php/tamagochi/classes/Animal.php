<?php

class Animal {
    private $nom;
    private $faim;
    private $soif;
    private $sante;
    private $humeur;
    private $age;

    public function __construct(string $nom) {
        $this->nom = $nom;
        $this->faim = 50;
        $this->soif = 50;
        $this->humeur = 100;
        $this->sante = 100;
        $this->age = 0;
    }
}

