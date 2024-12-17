<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include './utils/functions.php';
include './model/model_users.php';
include './manager/manager_users.php';
include './view/view_connexion.php';
include './controller.php';

class ControllerConnexion extends Controller {
    private ModelUser $modelUser;
    private ViewConnexion $connexion;

    public function __construct() {
        parent::__construct();
        $this->modelUser = new ManagerUser();
        $this->connexion = new ViewConnexion();
    }

    public function getModelUser(): ModelUser {
        return $this->modelUser;
    }

    public function setModelUser(ModelUser $modelUser): ControllerConnexion {
        $this->modelUser = $modelUser;
        return $this;
    }

    public function getConnexion(): ViewConnexion {
        return $this->connexion;
    }

    public function setConnexion(ViewConnexion $connexion): ControllerConnexion {
        $this->connexion = $connexion;
        return $this;
    }

    public function logInUser(): void {
        if (isset($_POST['submitConnexion'])) {
            if (isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['password']) && !empty($_POST['password'])) {

                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $email = sanitizeYoyo($_POST['email']);
                    $password = sanitizeYoyo($_POST['password']);

                    $this->modelUser->setEmail($email)->setPassword($password);
                    $data = $this->modelUser->readUserByMail();

                    if (!empty($data) && password_verify($password, $data[0]['mdp_user'])) {
                        $_SESSION['id'] = $data[0]['id_users'];
                        $_SESSION['name'] = $data[0]['name_user'];
                        $_SESSION['firstname'] = $data[0]['firstname_user'];
                        $_SESSION['email'] = $data[0]['email_user'];

                        header('Location:controller_compte.php');
                        exit;
                    } else {
                        $this->connexion->setMessage("Email et/ou mot de passe incorrect !");
                    }
                } else {
                    $this->connexion->setMessage("L'email n'est pas au bon format !");
                }
            } else {
                $this->connexion->setMessage("Veuillez remplir tous les champs !");
            }
        }
    }

    public function renderViews(): void {
        $this->logInUser();
        parent::renderViews();
        echo $this->connexion->render();
    }
}

$controllerConnexion = new ControllerConnexion();
$controllerConnexion->renderViews();
?>

