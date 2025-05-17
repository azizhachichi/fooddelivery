<?php
session_start();

require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/PlatController.php';

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        (new AuthController())->login();
        break;
    case 'register':
        (new AuthController())->register();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    case 'plats':
        (new PlatController())->index();
        break;
    case 'ajouter_plat':
        (new PlatController())->ajouter();
        break;
    case 'supprimer_plat':
        (new PlatController())->supprimer();
        break;
    default:
        echo "404 - Page non trouvée";
        break;
}
