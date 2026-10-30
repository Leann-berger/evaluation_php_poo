<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Console;
use App\Entity\Game;

class GameRepository
{
    //Attribut
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes

    /**
     * Méthode qui ajoute une jeu (Game) en BDD
     * @return void
     * @throws \Exception Erreurs SQL
     */
    public function saveGame(Game $game): void {
        try{
            $sql = "INSERT INTO video_game (`title`, `type`, publish_at, id_console) VALUE (?,?,?,?)";
            $stmt = $this->connect->prepare($sql);
            $stmt->bindValue(1, $game->getTitle(), \PDO::PARAM_STR);
            $stmt->bindValue(2, $game->getType(), \PDO::PARAM_STR);
            $stmt->bindValue(3, $game->getPublishAt(), \PDO::PARAM_STR);
            $stmt->bindValue(4, $game->getIdConsole(), \PDO::PARAM_INT);
            $stmt->execute();
            $id = $this->connect->lastInsertId();
            $game->setId($id);
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): array 
    {
        try {
            $sql = "SELECT v.`title`, v.`type`, v.publish_at, c.`name` FROM video_game As v
            INNER JOIN console As c ON c.id_console = v.id_console";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $data ?? [];
    }
    
}
