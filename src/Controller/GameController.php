<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Entity\Console;
use App\Entity\Game;
use App\Utils\Tools;


class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return void Retourne le template
     */
    public function addGame(): void 
    {   
        
        if (isset($_POST["submit"])) {
            if (!empty($_POST["title"]) && !empty($_POST["type"]) && !empty($_POST["publish_at"])){
                $title = Tools::sanitize($_POST["title"]);
                $type = Tools::sanitize($_POST["type"]);
                $publishAt = Tools::sanitize($_POST["publish_at"]);
                $idConsole = Tools::sanitize($_POST["console"]);
                $newGame = new Game($title, $type, $publishAt, $idConsole);
                $this->gameRepository->saveGame($newGame);

                $data["msg"] = "Le formulaire à été soumis avec";
            } else {
                $data["msg"] = "Veuillez remplir le champ du formulaire";
            }

            
        }
        $data =  [];
        $consoles = $this->consoleRepository->findAllConsoles();
        $data['consoles'] = $consoles;
        $this->render('add_game', 'Games', $data);
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return void Retourne le template
     */
    public function showAllGames(): void 
    {
        $data =  [];
        $data['games'] = $this->gameRepository->findAllGames();
        $this->render("show_all_games","all games", $data);
    }
}
