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
    
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): ModelUser { $this->id = $id; return $this; }

    public function getName(): ?string { return $this->name; }
    public function setName(?string $name): ModelUser { $this->name = $name; return $this; }

    public function getFirstname(): ?string { return $this->firstname; }
    public function setFirstname(?string $firstname): ModelUser { $this->firstname = $firstname; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $email): ModelUser { $this->email = $email; return $this; }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(?string $password): ModelUser { $this->password = $password; return $this; }

    //METHODS
    public function readUsers():array | string{
        try{
            //Requete préparé
            $req = $this->getBdd()->prepare('SELECT id_users, name_user, firstname_user, email_user, mdp_user FROM users');
    
            //Exécution de la requête
            $req->execute();
    
            //Récupérer la réponse de la bdd : je reçois un tableau contenant des tableaux d'utilisateurs
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
    
            return $data;
    
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
    
    public function readUserByMail():array | string{
        try{
            //Préparation de ma requête SELECT
            $req = $this->getBdd()->prepare('SELECT id_users, name_user, firstname_user, email_user, mdp_user FROM users WHERE email_user = ? LIMIT 1');
    
            //Binding de Param :
            $email = $this->getEmail();
            $req->bindParam(1,$email,PDO::PARAM_STR);
    
            //Exécuter la requête
            $req->execute();
    
            //Récupération de la réponse de la BDD
            $data = $req->fetchAll();
    
            return $data;
    
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
    
    public function createUser():string{
        
        try{
            //Prepare notre requête d'INSERT
            $req = $this->getBdd()->prepare('INSERT INTO users (name_user, firstname_user, email_user, mdp_user) VALUES (?,?,?,?)');
    
            //Binding de Param :
            $name = $this->getName();
            $firstname = $this->getFirstname();
            $email = $this->getEmail();
            $password = $this->getPassword();

            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$firstname,PDO::PARAM_STR);
            $req->bindParam(3,$email,PDO::PARAM_STR);
            $req->bindParam(4,$password,PDO::PARAM_STR);
    
            //Exécution de la requête
            $req->execute();
    
            return "$firstname $name a été enregistré avec succès !";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    public function updateUser():string{
        try{
            //YD : requête préparée
            $req = $this->getBdd()->prepare('UPDATE users SET name_user = ?, firstname_user = ?, email_user = ?, mdp_user = ? WHERE id_users = ?');

            //YD : Binding de Param
            $name = $this->getName();
            $firstname = $this->getFirstname();
            $email = $this->getEmail();
            $password = $this->getPassword();
            $id = $this->getId();

            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$firstname,PDO::PARAM_STR);  
            $req->bindParam(3,$email,PDO::PARAM_STR);
            $req->bindParam(4,$password,PDO::PARAM_STR);   
            $req->bindParam(5,$id,PDO::PARAM_INT);

            //YD : Exécution de la requête
            $req->execute();

            //YD : retourner un message de confirmation
            return "L'utilisateur a été modifié avec succès !";

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}
?>