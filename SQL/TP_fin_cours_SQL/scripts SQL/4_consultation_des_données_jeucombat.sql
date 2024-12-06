USE jeucombat;

-- Consultation des données
-- 1:
SELECT pseudo_joueur FROM joueurs;

-- 2:
SELECT pseudo_joueur,mail_joueur FROM joueurs WHERE id_joueurs =3;

-- 3:
SELECT j.pseudo_joueur, group_CONCAT(p.nom_personnage) liste_personnages FROM personnage AS p
INNER JOIN joueurs AS j ON j.id_joueurs = p.id_joueurs
WHERE j.id_joueurs = 1;

-- 4:
SELECT j.pseudo_joueur, p.nom_personnage, group_CONCAT(c.nom_costume) liste_costumes FROM achat AS a
INNER JOIN joueurs AS j ON j.id_joueurs = a.id_joueurs
INNER JOIN personnage AS p ON p.id_personnage = a.id_personnage
INNER JOIN costume AS c ON c.id_costume = a.id_costume
WHERE j.id_joueurs = 1
GROUP BY j.pseudo_joueur, p.nom_personnage;

-- 5:
SELECT j.pseudo_joueur, SUM(c.prix) total FROM achat AS a
INNER JOIN joueurs AS j ON j.id_joueurs = a.id_joueurs
INNER JOIN personnage AS p ON p.id_personnage = a.id_personnage
INNER JOIN costume AS c ON c.id_costume = a.id_costume
GROUP BY j.pseudo_joueur ORDER BY total DESC;

-- 6:
SET @amis = (SELECT group_CONCAT(j.pseudo_joueur SEPARATOR ', ') FROM contenir AS ct
INNER JOIN carnet_amis AS c ON c.id_carnet_amis = ct.id_carnet_amis
INNER JOIN joueurs AS j ON j.id_joueurs = ct.id_joueurs
WHERE c.id_carnet_amis = 3);
SELECT pseudo_joueur, @amis FROM joueurs WHERE id_joueurs = 3;

-- 7:
SET @messages_envoyes = (SELECT group_CONCAT(m.message SEPARATOR ' | ') FROM messages AS m
INNER jOIN joueurs AS j ON j.id_joueurs = m.id_auteur
WHERE j.id_joueurs = 3);
SET @messages_recus = (SELECT group_CONCAT(m.message SEPARATOR ' | ') FROM messages AS m
INNER jOIN joueurs AS j ON j.id_joueurs = m.id_destinataire
WHERE j.id_joueurs = 3);
SELECT pseudo_joueur, @messages_envoyes, @messages_recus FROM joueurs WHERE id_joueurs =3;

-- 8:
SELECT c.date_combat, a.nom_arene, j1.pseudo_joueur AS vainqueur, j2.pseudo_joueur AS vaincu FROM combats AS c 
INNER JOIN joueurs AS j1 ON j1.id_joueurs = c.id_vainqueur 
INNER JOIN joueurs AS j2 ON j2.id_joueurs = c.id_vaincu 
INNER JOIN arene AS a ON a.id_arene = c.id_arene 
WHERE c.id_vaincu = 1 OR c.id_vainqueur = 1;

-- 10:
SELECT p.nom_personnage AS personnage, i.nom_item AS item,
(t.attaque + COALESCE(SUM(i.bonus_attaque), 0)) AS attaque_totale, 
(t.defense + COALESCE(SUM(i.bonus_defense), 0)) AS defense_totale, 
(t.point_de_vie + COALESCE(SUM(i.bonus_point_de_vie), 0)) AS point_de_vie_total FROM personnage AS p 
INNER JOIN type_personnages AS t ON t.id_type_personnages = p.id_type_personnages 
LEFT JOIN obtenir AS o ON o.id_personnage = p.id_personnage 
LEFT JOIN item AS i ON i.id_item = o.id_item WHERE p.id_joueurs = 1 
GROUP BY p.nom_personnage, i.nom_item, t.attaque, t.defense, t.point_de_vie;