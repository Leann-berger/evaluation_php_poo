<?php

namespace App\Entity;

class Game
{
    //Attributs
    private ?int $idGame = null;
    private string $title;
    private string $type;
    private string $publishAt;
    private int $idConsole;
    //Constructeur
    public function __construct(
        string $title,
        string $type,
        string $publishAt,
        int $idConsole
    ){
        $this->title = $title;
        $this->type = $type;
        $this->publishAt = $publishAt;
        $this->idConsole = $idConsole;
    }

    //Getters et Setters
    public function getId(): ?int
    {
        return $this->idGame;
    }

    public function setId(?int $idGame): void
    {
        $this->idGame = $idGame;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getPublishAt(): string
    {
        return $this->publishAt;
    }

    public function setPublishAt(string $publishAt): void
    {
        $this->publishAt = $publishAt;
    }

    public function getIdConsole(): string
    {
        return $this->idConsole;
    }

    public function setIdConsole(string $idConsole): void
    {
        $this->idConsole = $idConsole;
    }
}
