-- creation et utilisation de la BDD
CREATE DATABASE jeucombat CHARSET utf8mb4;
USE jeucombat;
 
 -- creation des tables sans clé étrangère
 CREATE TABLE carnet_amis(
 id_carnet_amis INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 nom_carnet VARCHAR(50) NOT NULL
 )Engine=InnoDB;
 
 CREATE TABLE costume(
 id_costume INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 nom_costume VARCHAR(50) NOT NULL UNIQUE
 )Engine=InnoDB;
 
  CREATE TABLE item(
 id_item INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 nom_item VARCHAR(50) NOT NULL UNIQUE,
 bonus_point_de_vie INT,
 bonus_defense INT,
 bonus_attaque INT
 )Engine=InnoDB;
 
 CREATE TABLE type_personnages(
 id_type_personnages INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 type_personnage VARCHAR(50) NOT NULL UNIQUE,
 attaque INT,
 point_de_vie INT,
 defense INT
 )Engine=InnoDB;
 
  CREATE TABLE arene(
 id_arene INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 nom_arene VARCHAR(50) NOT NULL UNIQUE
 )Engine=InnoDB;
 
 -- creation des tables avec clé étrangères
  CREATE TABLE achat(
 id_achat INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 date_achat DATETIME NOT NULL,
 id_personnage INT,
 id_costume INT,
 id_joueurs INT
 )Engine=InnoDB;
 
  CREATE TABLE messages(
 id_messages INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 date_message DATETIME NOT NULL,
 sujet VARCHAR(50) NOT NULL,
 message TEXT NOT NULL,
 id_auteur INT,
 id_destinataire INT
 )Engine=InnoDB;
 
  CREATE TABLE combats(
 id_combats INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 date_combat DATETIME NOT NULL,
 id_arene INT,
 id_vaincu INT,
 id_vainqueur INT
 )Engine=InnoDB;
 
  CREATE TABLE personnage(
 id_personnage INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 nom_personnage VARCHAR(50) NOT NULL UNIQUE,
 id_type_personnages INT,
 id_joueurs INT
 )Engine=InnoDB;
 
  CREATE TABLE joueurs(
 id_joueurs INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 pseudo_joueur VARCHAR(50) NOT NULL UNIQUE,
 mdp_joueur VARCHAR(150) NOT NULL,
 mail_joueur VARCHAR(100) NOT NULL UNIQUE,
 id_carnet_amis INT
 )Engine=InnoDB;
 
 -- creation des tables d'association
 CREATE TABLE contenir(
 id_joueurs INT,
 id_carnet_amis INT,
 PRIMARY KEY (id_joueurs,id_carnet_amis)
 )Engine=InnoDB;
 
  CREATE TABLE obtenir(
 id_personnage INT,
 id_item INT,
 PRIMARY KEY (id_personnage,id_item),
 equipe TINYINT NOT NULL
 )Engine=InnoDB;
 
 -- creation des contraintes de clé étrangères
 ALTER TABLE joueurs
 ADD CONSTRAINT fk_posseder_carnet_amis
 FOREIGN KEY (id_carnet_amis)
 REFERENCES carnet_amis(id_carnet_amis);
 
  ALTER TABLE messages
 ADD CONSTRAINT fk_recevoir_destinataire
 FOREIGN KEY (id_destinataire)
 REFERENCES joueurs(id_joueurs);
 
  ALTER TABLE messages
 ADD CONSTRAINT fk_envoyer_auteur
 FOREIGN KEY (id_auteur)
 REFERENCES joueurs(id_joueurs);
 
  ALTER TABLE personnage
 ADD CONSTRAINT fk_typer_type_personnages
 FOREIGN KEY (id_type_personnages)
 REFERENCES type_personnages(id_type_personnages);
 
  ALTER TABLE personnage
 ADD CONSTRAINT fk_incarner_joueurs
 FOREIGN KEY (id_joueurs)
 REFERENCES joueurs(id_joueurs);
 
  ALTER TABLE combats
 ADD CONSTRAINT fk_remporter_vainqueur
 FOREIGN KEY (id_vainqueur)
 REFERENCES personnage(id_personnage);
 
  ALTER TABLE combats
 ADD CONSTRAINT fk_perdre_vaincu
 FOREIGN KEY (id_vaincu)
 REFERENCES personnage(id_personnage);
 
  ALTER TABLE achat
 ADD CONSTRAINT fk_apparaitre_costume
 FOREIGN KEY (id_costume)
 REFERENCES costume(id_costume);
 
  ALTER TABLE achat
 ADD CONSTRAINT fk_associer_personnage
 FOREIGN KEY (id_personnage)
 REFERENCES personnage(id_personnage);
 
  ALTER TABLE achat
 ADD CONSTRAINT fk_acheter_joueurs
 FOREIGN KEY (id_joueurs)
 REFERENCES joueurs(id_joueurs);
 
  ALTER TABLE contenir
 ADD CONSTRAINT fk_contenir_joueurs
 FOREIGN KEY (id_joueurs)
 REFERENCES joueurs(id_joueurs);
 
  ALTER TABLE contenir
 ADD CONSTRAINT fk_contenir_carnet_amis
 FOREIGN KEY (id_carnet_amis)
 REFERENCES carnet_amis(id_carnet_amis);
 
  ALTER TABLE obtenir
 ADD CONSTRAINT fk_obtenir_personnage
 FOREIGN KEY (id_personnage)
 REFERENCES personnage(id_personnage);
 
  ALTER TABLE obtenir
 ADD CONSTRAINT fk_obtenir_item
 FOREIGN KEY (id_item)
 REFERENCES item(id_item);