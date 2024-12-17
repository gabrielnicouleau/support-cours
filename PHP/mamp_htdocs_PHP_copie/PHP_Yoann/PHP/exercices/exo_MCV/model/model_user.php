<?php
//fonctions interagissant avec la BDD

//fonction de controle d'un mail déja enregistré en BDD
function controlMail($bdd,$email){
    try { 
        $req = $bdd->prepare("SELECT email_user,id_users,name_user,firstname_user,mdp_user FROM users WHERE email_user = ? LIMIT 1");
        $req->bindParam(1, $email, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $error) { 
        return $error->getMessage();
    }
};

//fonction de création d'un nouvel utilisateur en BDD
function addUser($bdd,$name,$firstname,$password,$email){
    try { 
            $req = $bdd->prepare("INSERT INTO users (name_user, firstname_user, mdp_user,email_user) VALUES (?,?,?,?)");
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$firstname,PDO::PARAM_STR);
            $req->bindParam(3,$password,PDO::PARAM_STR);
            $req->bindParam(4,$email,PDO::PARAM_STR);
            $req->execute();
            return "Bonjour, {$name} {$firstname}, vous avez bien été renregistré en BDD avec l'Email suivant: {$email}";
    } catch (Exception $error) { 
        return $error->getMessage();
    }
};

//fonction d'affichage de la liste des utilisateurs enregistrés en BDD
function listeUsers($bdd){
    try{
        $req = $bdd->prepare("SELECT id_users,name_user, firstname_user,email_user FROM users");
        $req->execute(); 
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $user){
            $listeUsers = $listeUsers. "<li>user n°{$user['id_users']}:{$user['name_user']} {$user['firstname_user']}, email: {$user['email_user']}</li>";
        }
        return $listeUsers;
    } catch (Exception $error) { 
        return $error->getMessage();
    };
};

?>