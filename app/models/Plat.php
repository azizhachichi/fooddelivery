<?php
require_once __DIR__ . '/../config/Database.php';

class Plat {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect(); // Utilise la méthode statique
    }

    public function getByRestaurant($restaurantId) {
        $stmt = $this->conn->prepare("SELECT * FROM plats WHERE restaurant_id = ?");
        $stmt->execute([$restaurantId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($nom, $description, $prix, $restaurantId) {
        $stmt = $this->conn->prepare("INSERT INTO plats (nom, description, prix, restaurant_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nom, $description, $prix, $restaurantId]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM plats WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
