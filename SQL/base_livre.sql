-- creation et utilisation de la BDD
CREATE DATABASE IF NOT EXISTS livres CHARSET utf8mb4;
USE livres;

-- creation des tables
CREATE TABLE IF NOT EXISTS livre(
id_livre INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
titre VARCHAR(50) NOT NULL,
`resume` TEXT NOT NULL, -- backtips car le terme 'resume' est utilisé par SQL
date_sortie DATE NOT NULL 
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS genre(
id_genre INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
libele VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS livre_genre(
id_livre INT,
id_genre INT,
PRIMARY KEY(id_livre, id_genre)
)ENGINE=InnoDB;

-- creation des contraintes de cle etrangere
ALTER TABLE livre_genre
ADD CONSTRAINT fk_completer_livre
FOREIGN KEY(id_livre)
REFERENCES livre(id_livre);

ALTER TABLE livre_genre
ADD CONSTRAINT fk_completer_genre
FOREIGN KEY(id_genre)
REFERENCES genre(id_genre);