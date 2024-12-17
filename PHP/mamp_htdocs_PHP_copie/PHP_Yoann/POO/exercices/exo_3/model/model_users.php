<?php
/************************************************************************
 * LE MODEL QUI POSSEDE LES FONCTIONS POUR ENVOYER DES REQUETES A LA BDD
 ************************************************************************/
class ModelUser{
    //ATTRIBUTS
    private ?int $id;
    private ?string $name;
    private ?string $firstname;
    private ?string $email;
    private ?string $password;
    private ?PDO $bdd;

    //CONSTRUCTEUR
    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=task','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    //GETTER ET SETTER
    public function getBdd():?PDO{
        return $this->bdd;
    }
    public function setBdd(?PDO $newBdd):ModelUser{
        $this->bdd = $newBdd;
        return $this;
    }
    
    public function getId(): ?int { 
        return $this->id; 
    }
    public function setId(?int $id): ModelUser { 
        $this->id = $id; return $this; 
    }

    public function getName(): ?string { 
        return $this->name; 
    }
    public function setName(?string $name): ModelUser { 
        $this->name = $name; return $this; 
    }

    public function getFirstname(): ?string { 
        return $this->firstname; 
    }
    public function setFirstname(?string $firstname): ModelUser { 
        $this->firstname = $firstname; return $this; 
    }

    public function getEmail(): ?string { 
        return $this->email; 
    }
    public function setEmail(?string $email): ModelUser { 
        $this->email = $email; return $this; 
    }

    public function getPassword(): ?string { 
        return $this->password; 
    }
    public function setPassword(?string $password): ModelUser { 
        $this->password = $password; return $this; 
    }

}
?>