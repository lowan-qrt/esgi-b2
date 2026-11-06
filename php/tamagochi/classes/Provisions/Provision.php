<?php

namespace Provisions;

abstract class Provision
{
    protected $impactSoif = 0;
    protected $impactFaim = 0;
    protected $impactSante = 0;
    protected $impactHumeur = 0;
    protected $nom;

    public function getImpactSoif()
    {
        return $this->impactSoif;
    }

    public function getImpactFaim()
    {
        return $this->impactFaim;
    }

    public function getImpactSante()
    {
        return $this->impactSante;
    }

    public function getImpactHumeur()
    {
        return $this->impactHumeur;
    }

    public function getNom()
    {
        return $this->nom;
    }
}