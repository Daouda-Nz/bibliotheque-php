<?php include "menu.php"; ?>
<?php
require_once "../classes/Categorie.php";

$cat = new Categorie();

// AJOUT
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat->ajouter($_POST["libelle"]);
    header("Location: categories.php");
    exit;
}

// SUPPRESSION
if (isset($_GET["delete"])) {
    $cat->supprimer($_GET["delete"]);
    header("Location: categories.php");
    exit;
}

$liste = $cat->afficher();
?>

<h2>Ajouter une catégorie</h2>

<form method="POST">
    <input type="text" name="libelle" placeholder="Libellé">
    <button type="submit">Ajouter</button>
</form>

<hr>

<h2>Liste des catégories</h2>

<?php foreach ($liste as $c) { ?>
    <p>
        <?= $c["id"] ?> - <?= $c["libelle"] ?>

        <a href="categories.php?delete=<?= $c["id"] ?>">Supprimer</a>
    </p>
<?php } ?>