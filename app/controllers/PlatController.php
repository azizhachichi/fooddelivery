<?php
require_once 'app/models/Plat.php';

class PlatController {
    private $model;

    public function __construct() {
        $this->model = new Plat();
    }

    public function index() {
        $plats = $this->model->getByRestaurant($_SESSION['user']['id']);
        include 'app/views/restaurant/plats.php';
    }

    public function ajouter() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->add($_POST['nom'], $_POST['description'], $_POST['prix'], $_SESSION['user']['id']);
            header('Location: index.php?action=restaurant_plats');
        } else {
            include 'app/views/restaurant/ajouter_plat.php';
        }
    }

    public function supprimer() {
        if (isset($_GET['id'])) {
            $this->model->delete($_GET['id']);
            header('Location: index.php?action=restaurant_plats');
        }
    }
}
