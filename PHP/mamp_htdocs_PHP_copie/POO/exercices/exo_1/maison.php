<?php
class Maison{
    //attributs:
    private ?string $nom;
    private ?float $longueur;
    private ?float $largeur;
    private ?int $nbrEtage;
    //constructeur:
    public function __construct($nom,$longueur,$largeur,$nbrEtage){
        $this->nom = $nom;
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->nbrEtage =$nbrEtage;
    }
    //getter et setter:
    //getter:
    public function getNom():?string{
        return $this->nom;
    }
    public function getLongueur():?float{
        return $this->longueur;
    }
    public function getLargeur():?float{
        return $this->largeur;
    }
    public function getNbrEtage():?int{
        return $this->nbrEtage;
    }
    //setter:
    public function setNom(?string $newNom):Maison{
        return $this->nom = $newNom;
    }
    public function setLongueur(?float $newLongueur):Maison{
        return $this->longueur = $newLongueur;
    }
    public function setLargeur(?float $newLargeur):Maison{
        return $this->largeur = $newLargeur;
    }
    public function setNbrEtage(?int $newNbrEtage):Maison{
        return $this->nbrEtage = $newNbrEtage;
    }
    //Methods:
    public function surface(){
        $result = $this->getLongueur() * $this->getLargeur() * ($this->getNbrEtage() + 1);
        echo "<p>La surface de ma maison {$this->getNom()} est de $result m²</p>";
        return $result;
    }
};
?>