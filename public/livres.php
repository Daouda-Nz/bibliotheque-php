<?php include "menu.php"; ?>
<?php
require_once "../classes/Livre.php";

$livre = new Livre();

// ajout test
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $livre->ajouter(
        $_POST["titre"],
        $_POST["isbn"],
        $_POST["annee"],
        $_POST["quantite"],
        $_POST["auteur_id"],
        $_POST["categorie_id"]
    );

    header("Location: livres.php");
    exit;
}

// suppression
if (isset($_GET["delete"])) {
    $livre->supprimer($_GET["delete"]);
    header("Location: livres.php");
    exit;
}

$liste = $livre->afficher();
?>

<h2>Ajouter un livre</h2>

<form method="POST">
    <input type="text" name="titre" placeholder="Titre"><br>
    <input type="text" name="isbn" placeholder="ISBN"><br>
    <input type="number" name="annee" placeholder="Année"><br>
    <input type="number" name="quantite" placeholder="Quantité"><br>
    <input type="number" name="auteur_id" placeholder="ID auteur"><br>
    <input type="number" name="categorie_id" placeholder="ID catégorie"><br>

    <button type="submit">Ajouter</button>
</form>

<hr>

<h2>Liste des livres</h2>

<?php foreach ($liste as $l) { ?>
    <p>
        <?= $l["titre"] ?> -
        <?= $l["auteur"] ?> -
        <?= $l["categorie"] ?> -

        <a href="livres.php?delete=<?= $l["id"] ?>">Supprimer</a>
    </p>
<?php } ?>