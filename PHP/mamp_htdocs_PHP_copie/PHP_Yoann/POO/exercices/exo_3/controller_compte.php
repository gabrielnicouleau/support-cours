

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Démarre ma session
session_start();

// Import des ressources nécessaires
include './utils/functions.php';
include './model/model_users.php';
include './manager/manager_users.php';
include './view/view_compte.php';
include './controller.php';

class ControllerCompte extends Controller {
    private ViewCompte $compte;

    public function __construct() {
        parent::__construct();
        $this->compte = new ViewCompte();
    }

    // Getter et Setter
    public function getCompte(): ViewCompte {
        return $this->compte;
    }

    public function setCompte(ViewCompte $compte): ControllerCompte {
        $this->compte = $compte;
        return $this;
    }

    public function isConnect(): void {
        if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
            header('Location:controller_connexion.php');
            exit;
        }
    }

    public function renderViews(): void {
        $this->isConnect();
        $this->getCompte()->setPrenom($_SESSION['firstname'])->setNom($_SESSION['name'])->setEmail($_SESSION['email']);
        parent::renderViews();
        echo $this->compte->render();
    }
}

$controllerCompte = new ControllerCompte();
$controllerCompte->renderViews();
?>

