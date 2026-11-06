<?php

class Animal
{
    public $faim;
    public $soif;
    public $sante;
    public $humeur;
    public $age;

    public function __construct($sante) {
        $this->faim = 50;
        $this->soif = 50;
        $this->sante = $sante;
        $this->humeur = 100;
        $this->age = 0;
    }

    /**
     * Nourir l'animal.
     */
    public function nourir($provision) {}

    /**
     * Soigner l'animal.
     *
     */
    public function soigner() {}

    /**
     * Caresser l'animal.
     */
    public function caresser() {}

    /**
     * Nourir l'animal.
     */
    public function provision() {}






    // GETTERS
    public function getFaim() {
        return $this->faim;
    }

    public function getSoif() {
        return $this->soif;
    }

    public function getSante() {
        return $this->sante;
    }

    public function getHumeur() {
        return $this->humeur;
    }

    public function getAge() {
        return $this->age;
    }
}