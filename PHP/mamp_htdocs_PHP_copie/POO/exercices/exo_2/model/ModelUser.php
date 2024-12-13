<?php
class ModelUser {
    private ?int $id;
    private ?string $name;
    private ?string $firstname;
    private ?string $email;
    private ?string $password;
    private ?PDO $bdd;

    //CONSTRUCTEUR
    public function __construct($name,$firstname,$email,$password,$id){
        $this->bdd = new PDO('mysql:host=localhost;dbname=task','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    //GETTER ET SETTER
    public function getId():?int{
        return $this->id;
    }
    public function getName(): ?string { 
        return $this->name; 
    }
    public function getFirstname(): ?string { 
        return $this->firstname; 
    }
    public function getPassword(): ?string { 
        return $this->password; 
    }
    public function getEmail():?string{
        return $this->email;
    }
    public function getBdd():?PDO{
        return $this->bdd;
    }
    public function setId(int $id): self { 
        $this->id = $id; return $this; 
    }
    public function setName(string $newName):?ModelUser{
        $this->name = $newName;
        return $this;
    }
    public function setFirstname(string $newFirstname):?ModelUser{
        $this->firstname = $newFirstname;
        return $this;
    }
    public function setEmail(string $newEmail):?ModelUser{
        $this->email = $newEmail;
        return $this;
    }
    public function setPassword(string $newPassword):?ModelUser{
        $this->password = $newPassword;
        return $this;
    }
    public function setBdd(?PDO $newBdd):ModelUser{
        $this->bdd = $newBdd;
        return $this;
    }

    //METHODS

    public function readUsers():array | string {
        try{
            $req = $this->getBdd()->prepare("SELECT id_users, name_user, firstname_user, email_user, mdp_user FROM users");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    public function readUserByMail():array | string {
        try{
            $req = $this->getBdd()->prepare("SELECT id_users, name_user, firstname_user, email_user, mdp_user FROM users WHERE email_user = ?");
            $email = $this->getEmail();
            $req->bindParam(1,$email,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    public function createUser(): string { 
        try { 
            $req = $this->getBdd()->prepare("INSERT INTO users (name_user, firstname_user, email_user, mdp_user) VALUES (?, ?, ?, ?)");

            $name = $this->name;
            $firstname = $this->firstname;
            $email = $this->email;
            $password = $this->password;

            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$firstname,PDO::PARAM_STR);
            $req->bindParam(3,$email,PDO::PARAM_STR);
            $req->bindParam(4,$password,PDO::PARAM_STR);

            $req->execute();

            return "Utilisateur créé avec succes"; 
            
        } catch (Exception $error) { 
            return $error->getMessage(); 
        } 
    }

    public function updateUser(): string { 
        try { 
            $req = $this->getBdd()->prepare("UPDATE users SET name_user = ?, firstname_user = ?, email_user = ?, mdp_user = ? WHERE id_users = ?");

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
            
            $req->execute(); 

            return "Utilisateur mis à jour avec succès"; 

        } catch (Exception $error) { 
            return $error->getMessage(); 
        } 
    }
}
?>