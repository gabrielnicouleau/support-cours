CREATE DATABASE supergame;
USE supergame;
CREATE TABLE joueurs(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    pseudo VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    score INT(10)
)ENGINE=innoDB;

INSERT INTO joueurs (pseudo, email, score) VALUES ("Crocus","crocmou@gmail.com",500),("Fazer","wing-commander@aol.net",900),("Chuck Norris","beyondgod@hotmail.com",100);

