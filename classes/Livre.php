<?php

require_once "Database.php";

class Livre {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // 🔥 AJOUTER LIVRE
    public function ajouter($titre, $isbn, $annee, $quantite, $auteur_id, $categorie_id) {
        $sql = "INSERT INTO livres (titre, isbn, annee, quantite, auteur_id, categorie_id)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$titre, $isbn, $annee, $quantite, $auteur_id, $categorie_id]);
    }

    // 🔥 AFFICHER LIVRES
    public function afficher() {
        $sql = "SELECT l.*, a.nom AS auteur, c.libelle AS categorie
                FROM livres l
                JOIN auteurs a ON l.auteur_id = a.id
                JOIN categories c ON l.categorie_id = c.id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔥 SUPPRIMER
    public function supprimer($id) {
        $sql = "DELETE FROM livres WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}

?>
