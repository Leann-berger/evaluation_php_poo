CREATE DATABASE IF NOT EXISTS game CHARSET utf8mb4;

USE game;

CREATE TABLE IF NOT EXISTS console(
id_console INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(50) NOT NULL UNIQUE,
manufacturer VARCHAR(50) NOT NULL
)engine=InnoDB;

CREATE TABLE IF NOT EXISTS video_game(
id_video_game INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
title VARCHAR(50) NOT NULL,
`type` VARCHAR(50) NOT NULL,
publish_at DATE NOT NULL,
id_console INT NOT NULL,
CONSTRAINT fk_video_game_console FOREIGN KEY (id_console) REFERENCES console(id_console) ON DELETE CASCADE
)engine=InnoDB;



INSERT INTO console (`name`, manufacturer) 
VALUES ("PlayStation 5", "Sony"), 
("Switch", "Nintendo"),
("Xbox Series X", "Microsoft"),
("Steam Deck", "Valve");



