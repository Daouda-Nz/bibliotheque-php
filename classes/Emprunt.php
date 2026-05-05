<?php
require_once "Database.php";

class Emprunt {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Ajouter emprunt
    public function ajouter($livre_id, $nom, $date) {
        $sql = "INSERT INTO emprunts (livre_id, nom_emprunteur, date_emprunt)
                VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$livre_id, $nom, $date]);
    }

    // Afficher
    public function afficher() {
        $sql = "SELECT e.*, l.titre
                FROM emprunts e
                JOIN livres l ON e.livre_id = l.id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Retourner livre
    public function retourner($id) {
        $sql = "UPDATE emprunts SET date_retour = CURDATE() WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}