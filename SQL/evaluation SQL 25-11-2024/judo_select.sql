USE judoka;

SELECT j.nom_judoka,j.prenom_judoka FROM judoka AS j
INNER JOIN niveau AS n ON j.id_niveau = n.id_niveau
WHERE n.couleur_ceinture = 'verte';

SELECT (COUNT(jc.id_judoka)) AS nombre_participants FROM judoka_competition AS jc
INNER JOIN competition AS c ON jc.id_cpt = c.id_cpt
WHERE c.nom_cpt = 'Judo31';

SELECT j.nom_judoka,j.prenom_judoka,j.age,j.sexe FROM judoka AS j
INNER JOIN judoka_competition AS jc ON jc.id_judoka = j.id_judoka
INNER JOIN competition AS c ON c.id_cpt = jc.id_cpt
WHERE c.nom_cpt = 'Judo81';

SELECT j.nom_judoka,j.prenom_judoka FROM judoka AS j
INNER JOIN niveau AS n ON n.id_niveau = j.id_niveau
WHERE n.couleur_ceinture = 'marron' AND j.age > 19;

SELECT j.nom_judoka,j.prenom_judoka,n.couleur_ceinture FROM judoka AS j
INNER JOIN niveau AS n ON n.id_niveau = j.id_niveau
ORDER BY j.nom_judoka ASC;