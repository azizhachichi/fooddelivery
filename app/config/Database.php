<?php
class Database {
    public static function connect() {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=fooddelivery;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }
}
