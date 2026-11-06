<?php

use Animaux\Animal;
use Provisions\Coca;
use Provisions\Eau;
use Provisions\Hamburger;
use Provisions\Pasteque;

class Jeu
{
    private static Jeu|null $instance = null;
    private array $animaux;
    private array $provisions;
    private int $points;

    private array $messages;

    /**
    * - initialise la session
    * - récupère (si c'est présent) la liste des animaux et des provisions
    */
    private function __construct()
    {
        session_start();

        // ici, j'ai un tableau $_SESSION qui contient peut etre des animaux
        $this->animaux = $_SESSION['animaux'] ?? [];
        $this->provisions = $_SESSION['provisions'] ?? [];
        $this->points = $_SESSION['points'] ?? 3;
        $this->messages = $_SESSION['messages'] ?? [];
    }

    public static function getInstance(): Jeu
    {
        if (Jeu::$instance === null) {
            Jeu::$instance = new Jeu();
        }

        return Jeu::$instance;
    }

    // executer action
    public function executeAction() 
    {
        if (isset($_GET['action'])) {

            $action = $_GET['action'];
            
            switch ($action) {

                case 'creerAnimal':
                    $this->actionCreerAnimal();
                    break;

                case 'nourrirAnimal':
                    $this->actionNourrirAnimal();
                    break;

                case 'soignerAnimal':
                    $this->actionSoignerAnimal();
                    break;

                case 'caresserAnimal':
                    $this->actionCaresserAnimal();
                    break;

                case 'rechercherProvisions':
                    $this->actionRechercherProvisions();
                    break;

                case 'armageddon':
                    $this->actionArmageddon();
                    break;

                case 'nuit':
                    $this->actionNuit();
                    break;
            }

            $this->sauvegarde();
            $this->recharge();
        }
    }

    // afficher interface
    public function afficheInterface() 
    {
        require 'interface.php';

        $this->videMessages();
        $this->sauvegarde();
    }

    public function ajouteAnimal(Animal $animal)
    {
        $this->animaux[] = $animal;
    }

    public function ajouteMessage($message)
    {
        $this->messages[] = $message;
    }

    public function videMessages()
    {
        $this->messages = [];
    }

    private function sauvegarde()
    {
        $_SESSION['animaux'] = $this->animaux;
        $_SESSION['provisions'] = $this->provisions;
        $_SESSION['points'] = $this->points;
        $_SESSION['messages'] = $this->messages;
    }

    private function recharge()
    {
        header('Location: index.php');
        exit();
    }

    // nourrir, caresser, ...

    private function actionNuit()
    {
        if ($this->points == 0) {

            // Faire dormir chaque animal

            foreach ($this->animaux as $animal) {
                $animal->dormir();
            }

            $this->points = 3;
        }
    }

    private function actionRechercherProvisions()
    {
        if ($this->points >= 1) {
            
            $this->points--;

            $aleatoire = rand(0, 100);

            if ($aleatoire <= 30) {
                $this->provisions[] = new Pasteque;
            } elseif ($aleatoire <= 50) {
                $this->provisions[] = new Hamburger;
            } elseif ($aleatoire <= 80) {
                $this->provisions[] = new Coca;
            } elseif ($aleatoire <= 90) {
                $this->provisions[] = new Eau;
            }
        }
    }

    private function actionCreerAnimal()
    {
        if ($this->points >= 1) {

            $this->points--;

            $nom = $_GET['nom'];
            $animal = new Animal($nom);
            $this->ajouteAnimal($animal);

            $this->messages[] = "L'animal $nom a bien été créé.";
        }
    }

    private function actionSoignerAnimal()
    {
        if ($this->points >= 3) {

            $id = $_GET['id'];
            $animal = $this->animaux[$id];

            if ($animal->estVivant()) {
                
                $this->points-= 3;
                
                $animal->soigner();
            }
            
        }
    }

    private function actionCaresserAnimal()
    {
        if ($this->points >= 2) {

            $id = $_GET['id'];
            $animal = $this->animaux[$id];

            if ($animal->estVivant()) {
                
                $this->points-= 2;
                
                $animal->caresser();
            }
            
        }
    }

    private function actionNourrirAnimal()
    {
        if ($this->points >= 1) {

            $id = $_GET['id'];
            $idProvision = $_GET['idProvision'];
            $animal = $this->animaux[$id];
            $provision = $this->provisions[$idProvision];

            if ($animal->estVivant()) {
                
                $this->points--;
                
                $animal->nourrir($provision);

                unset($this->provisions[$idProvision]);
            }
            
        }
    }

    private function actionArmageddon()
    {
        $this->animaux = [];
        $this->provisions = [];
        $this->points = 3;
    }


}