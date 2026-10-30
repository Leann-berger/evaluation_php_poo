<?php

namespace App\Controller;

use App\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function __construct() {}

    /**
     * Méthode pour afficher la page d'accueil
     * @return void Retourne le template
     */
    public function index(): void
    {

        $this->render("home", "accueil");
    }
}
