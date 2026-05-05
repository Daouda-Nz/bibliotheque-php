<?php
require_once "../classes/Emprunt.php";
require_once "../classes/Livre.php";

$emp = new Emprunt();
$livre = new Livre();

// ajouter emprunt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp->ajouter(
        $_POST["livre_id"],
        $_POST["nom"],
        date("Y-m-d")
    );
    header("Location: emprunts.php");
    exit;
}

// retour
if (isset($_GET["retour"])) {
    $emp->retourner($_GET["retour"]);
    header("Location: emprunts.php");
    exit;
}

$liste = $emp->afficher();
$livres = $livre->afficher();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Emprunts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header><h1>📚 Emprunts</h1></header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="auteurs.php">Auteurs</a>
    <a href="categories.php">Catégories</a>
    <a href="livres.php">Livres</a>
    <a href="emprunts.php">Emprunts</a>
</nav>

<div class="container">

<h2>Nouvel emprunt</h2>

<form method="POST">
    <select name="livre_id">
        <?php foreach ($livres as $l) { ?>
            <option value="<?= $l["id"] ?>">
                <?= $l["titre"] ?>
            </option>
        <?php } ?>
    </select>

    <input type="text" name="nom" placeholder="Nom emprunteur">
    <button>Emprunter</button>
</form>

<h2>Liste des emprunts</h2>

<?php foreach ($liste as $e) { ?>
    <div class="card">
        <div>
            <b><?= $e["titre"] ?></b><br>
            <?= $e["nom_emprunteur"] ?><br>
            Emprunt : <?= $e["date_emprunt"] ?><br>
            Retour : <?= $e["date_retour"] ?? "Non retourné" ?>
        </div>

        <?php if (!$e["date_retour"]) { ?>
            <a href="?retour=<?= $e["id"] ?>">↩ Retour</a>
        <?php } ?>
    </div>
<?php } ?>

</div>

</body>
</html>