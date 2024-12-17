<?php

session_start();

include './utils/functions.php';
include './model/model_users.php';
include './manager/manager_users.php';
include './view/view_accueil.php';
include './controller.php';

class ControllerAccueil extends Controller{

    private ModelUser $user;
    private ViewAccueil $accueil;

    public function __construct() {
        parent::__construct();
        $this->user = new ManagerUser();
        $this->accueil = new ViewAccueil();
    }

    public function registerUser(): void {
        if (isset($_POST['submitInscription'])) {
            if (isset($_POST['name']) && !empty($_POST['name']) &&
                isset($_POST['firstname']) && !empty($_POST['firstname']) &&
                isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['password']) && !empty($_POST['password']) &&
                isset($_POST['passwordVerify']) && !empty($_POST['passwordVerify'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    if ($_POST['password'] === $_POST['passwordVerify']) {
                        $name = sanitizeYoyo($_POST['name']);
                        $firstname = sanitizeYoyo($_POST['firstname']);
                        $email = sanitizeYoyo($_POST['email']);
                        $password = sanitizeYoyo($_POST['password']);
                        $password = password_hash($password, PASSWORD_BCRYPT);

                        $this->user->setName($name)->setFirstname($firstname)->setEmail($email)->setPassword($password);

                        $data = $this->user->readUserByMail();

                        if (empty($data)) {
                            $this->accueil->setMessage($this->user->createUser());
                        } else {
                            $this->accueil->setMessage("Cet email est déjà utilisé par un autre compte !");
                        }
                    } else {
                        $this->accueil->setMessage("Vos deux mots de passe ne correspondent pas !");
                    }
                } else {
                    $this->accueil->setMessage("Votre email n'est pas au bon format !");
                }
            } else {
                $this->accueil->setMessage("Veuillez remplir tous les champs !");
            }
        }
    }

    public function displayUsers(): void {
        $data = $this->user->readUsers();
        $listeUsers = '';
        foreach ($data as $user) {
            $listeUsers .= $this->accueil->cardUser($user);
        }
        $this->accueil->setListUsers($listeUsers);
    }

    public function renderViews(): void {
        $this->registerUser();
        $this->displayUsers();
        parent::renderViews();
        echo $this->accueil->render();
    }
}

$controllerAccueil = new ControllerAccueil();
$controllerAccueil->renderViews();

?>