<?php
require_once 'app/models/User.php';


class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            if ($this->userModel->register($nom, $email, $password, $role)) {
                echo "Inscription réussie. <a href='?action=login'>Se connecter</a>";
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            include 'app/views/register.php';
        }
    }

 // Dans app/controllers/AuthController.php
public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userModel->login($email, $password);

        if ($user) {
            $_SESSION['user'] = $user;

            // Redirection selon le rôle
            switch ($user['role']) {
                case 'client':
                    header('Location: index.php?action=client_home');
                    break;
                case 'restaurant':
                    header('Location: index.php?action=restaurant_dashboard');
                    break;
                case 'livreur':
                    header('Location: index.php?action=livreur_dashboard');
                    break;
                case 'admin':
                    header('Location: index.php?action=admin_dashboard');
                    break;
            }
            exit;
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    } else {
        include 'app/views/login.php';
    }
}

}
