USE jeucombat;

-- 10: Supprimer le premier personnage du premier joueur de la BDD.
-- On repère d'abord l'id_personnage concerné
SELECT id_personnage FROM personnage WHERE id_joueurs = 1 AND id_personnage = (
SELECT MIN(id_personnage) FROM personnage WHERE id_joueurs = 1);
-- Puis on le supprime de la base de donnée en commencant par la table d'association,
-- puis les tables contenant sa clé étrangèreet enfin la table personnage.
DELETE FROM obtenir WHERE id_personnage = 1; 
DELETE FROM achat WHERE id_personnage = 1; 
DELETE FROM combats WHERE id_vaincu = 1 OR id_vainqueur = 1;
DELETE FROM personnage WHERE id_personnage = 1;

-- 11: Supprimer le deuxième joueur de la BDD
-- On le supprime en suivant la même procédure que pour l'exo 10:
-- d'abord les tables d'association
DELETE FROM contenir WHERE id_joueurs = 2 OR id_carnet_amis = 2;
DELETE FROM obtenir WHERE id_personnage IN(SELECT id_personnage FROM personnage WHERE id_joueurs = 2);
-- ensuite les tables contenant une clé d'association
DELETE FROM combats WHERE id_vaincu =2 OR id_vainqueur = 2 OR id_vaincu = 6 OR id_vainqueur = 6; 
DELETE FROM achat WHERE id_joueurs = 2;  
DELETE FROM messages WHERE id_auteur = 2 OR id_destinataire = 2;
DELETE FROM personnage WHERE id_joueurs = 2;
-- puis dans la table joueur
DELETE FROM joueurs WHERE id_joueurs = 2;
-- enfin, on supprime son carnet d'amis de la table carnet_amis
DELETE FROM carnet_amis WHERE id_carnet_amis = 2; 