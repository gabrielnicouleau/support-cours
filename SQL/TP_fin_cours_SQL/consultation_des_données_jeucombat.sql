USE jeucombat;

-- Consultation des données
SELECT pseudo_joueur FROM joueurs;

SELECT pseudo_joueur,mail_joueur FROM joueurs WHERE id_joueurs =3;

SELECT j.pseudo_joueur, group_CONCAT(p.nom_personnage) liste_personnages FROM personnage AS p
INNER JOIN joueurs AS j ON j.id_joueurs = p.id_joueurs
WHERE j.id_joueurs = 1;

SELECT j.pseudo_joueur, p.nom_personnage, group_CONCAT(c.nom_costume) liste_costumes FROM achat AS a
INNER JOIN joueurs AS j ON j.id_joueurs = a.id_joueurs
INNER JOIN personnage AS p ON p.id_personnage = a.id_personnage
INNER JOIN costume AS c ON c.id_costume = a.id_costume
WHERE j.id_joueurs = 1
GROUP BY j.pseudo_joueur, p.nom_personnage;

SELECT j.pseudo_joueur, SUM(c.prix) total FROM achat AS a
INNER JOIN joueurs AS j ON j.id_joueurs = a.id_joueurs
INNER JOIN personnage AS p ON p.id_personnage = a.id_personnage
INNER JOIN costume AS c ON c.id_costume = a.id_costume
GROUP BY j.pseudo_joueur ORDER BY total DESC;

SET @amis = (SELECT group_CONCAT(j.pseudo_joueur SEPARATOR ', ') FROM contenir AS ct
INNER JOIN carnet_amis AS c ON c.id_carnet_amis = ct.id_carnet_amis
INNER JOIN joueurs AS j ON j.id_joueurs = ct.id_joueurs
WHERE c.id_carnet_amis = 3);
SELECT pseudo_joueur, @amis FROM joueurs WHERE id_joueurs = 3;


