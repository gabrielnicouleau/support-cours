<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Utils\Tools;

class UserController
{
    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function save()
    {
        
        Tools::JsonResponse(["message"=>"Un compte a été ajouté avec succés"], 201);
    }


    public function showAll() :void {
        //Tableau d'objets User
        $users = $this->repository->findAll();
        //Tester si le tableau est vide
        if(empty($users)) {
            //retourne un  Réponse JSON
            Tools::JsonResponse(["Message"=>"Aucun utilisateur trouvé"], 404);
            exit;
        }
        //Stocker les tableaux d'utilisateurs
        $userTab = [];
        //boucle sur le tableau d'objets User
        foreach ($users as $user) {
            //ajouter au tableau $userTab la objet transformé en tableau
            $userTab[] = $user->toArray();
        }
        //retourne un  Réponse JSON
        Tools::JsonResponse(["Utilisateurs"=>$userTab], 200);
    }

    public function showUser() : void  
    {
        //Tester si les paramétres de l'url existent (get => id)
        if (isset($_GET["id"])) {
            //Appeler la méthode find de UserRepository
            $user = $this->repository->find($_GET["id"]);

            if (!empty($user)) {
                // Retourner une réponse JSON avec les détails de l'utilisateur
                Tools::JsonResponse($user->toArray(), 200);
            } else {
                // Retourner une réponse JSON avec un message et une erreur 404
                Tools::JsonResponse(["Message" => "Utilisateur non trouvé"], 404);
            }
        } else {
            //retourner une Reponse JSON avec un message et une erreur 404
            Tools::JsonResponse(["Message" => "Le paramètre id n'existe pas"], 404);
        }
    }
}