<?php

class ManagerUser extends ModelUser{

    //methods
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