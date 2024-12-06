USE jeucombat;

-- insertion des données dans la BDD
INSERT INTO type_personnages (type_personnage,point_de_vie,defense,attaque)
VALUES ("Barbare",125,5,15),("Guerrier",100,10,10),("Chevalier",75,15,5);

INSERT INTO arene (nom_arene)
VALUES ("Colisée"),("Muraille"),("Armurerie");

INSERT INTO item (nom_item,bonus_point_de_vie,bonus_defense,bonus_attaque)
VALUES ("Arme de base",0,0,0),("Bouclier de la Méduse",25,15,10),("Marteau de Thor",25,5,20),("Excalibur",20,10,20),("Egide",20,30,0),("Sainte Lance",10,10,30);

INSERT INTO costume (nom_costume)
VALUES ("La Faucheuse"),("Le Lapin de Pâque"),("La Banchee"),("Jeanne d'Arc"),("Phénix");

INSERT INTO carnet_amis (nom_carnet)
VALUES ("Ma Liste"),("Mes Amis"),("Super Friends"),("The Crew"),("Famille de Coeur");

INSERT INTO joueurs (pseudo_joueur,mdp_joueur,mail_joueur,id_carnet_amis)
VALUES ("Dark Schneider","12345","dark.s@gmail.com",1),("Perceval","Kaamelott31","alexast@sfr.fr",2),("Guts","berserker#666","ceska@orange.fr",3),("Broly","cacarot974","guillaume@gmail.com",4),("Suskiki666","NarutoIsTheBest","hinatainlove@sfr.fr",5);

INSERT INTO personnage (nom_personnage,id_joueurs,id_type_personnages)
VALUES ("Power Killer",1,1),("Mordred",2,3),("Griffith",3,3),("Vegeta",4,2),("Kakashi",5,2),("Bohort",2,1),("Lars",1,3);

INSERT INTO combats (date_combat,id_arene,id_vainqueur,id_vaincu)
VALUES ("2022-06-23",1,1,2),("2022-06-23",2,3,2),("2022-07-01",3,6,5),("2022-07-13",1,5,7),("2022-07-15",1,4,1),("2022-07-17",1,4,1);

INSERT INTO obtenir (id_item,id_personnage,equipe)
VALUES (6,1,false),(6,2,false),(6,3,false),(6,4,false),(6,5,false),(6,6,true),(6,7,true),(1,1,true),(2,1,false),(3,2,true),(4,3,true),(5,4,true),(1,5,true),(3,3,false),(4,1,false);

INSERT INTO contenir (id_carnet_amis,id_joueurs)
VALUES (3,1),(1,3),(3,2),(2,3),(1,4),(4,1),(4,5),(5,4),(5,2),(2,5),(5,3),(3,5);

INSERT INTO messages (id_auteur,id_destinataire,date_message,sujet,message)
VALUES (1,3,"2022-06-21","Hey","Salut bro ! Comment tu vas ?"),
(3,1,"2022-06-21","Re:Hey","Salut poto ! Ca va super. C'est l'éclate ce jeu. :D"),
(1,3,"2022-06-22","ReRe:Hey","Ha ha, t'as vu, je te l'avais dis. Heureusement que je t'ai bassiné avec pendant des plombes. ;)"),
(3,1,"2022-06-22","ReReRe:Hey","J'avoue XD  Au passage, je viens de me payer la tenue de Jeane D'Arc. Tu sais, la version Fate Apocryphe"),
(1,2,"2022-06-23","Salut","Coucou toi. Je savais que t'étais sur le jeu. Comment tu vas"),
(2,3,"2022-06-23","Dis, t'aurais pas gaffé","Hé toi, par hasard, t'aurai pas dit à ton pote que j'étais sur le jeu. Non parce que ce relou vient de m'envoyer un message.");
