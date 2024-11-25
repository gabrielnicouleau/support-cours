USE judoka;

UPDATE judoka SET id_niveau = id_niveau + 1
WHERE id_judoka BETWEEN 1 AND 5;