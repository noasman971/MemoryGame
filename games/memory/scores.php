<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $pageTitle = 'Score';
    include "../../partials/head.php";
    ?>
</head>
<body>

<?php include "../../partials/header.php"; ?>

<header></header>

<div class="titre">
    <h1>Scores</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, autem blanditiis cumque.</p>
</div>

<?php
include '../../utils/database.php';
$db = connectToDbAndGetPdo();
$request = $db->query("SELECT game.name, users.pseudo, scores.difficulty, scores.scores, scores.time_party
                           FROM game, users 
                           INNER JOIN scores 
                           ON scores.id_users = users.id
                           ORDER BY scores.scores ASC LIMIT 15;");
$datas = $request->fetchAll(PDO::FETCH_ASSOC);
$numero = 1;
?>
<form method="post" id="recherche">
    <input type="search" id="site-search" name="filtre" placeholder="rechercher..."/>
    <input type="submit" name="ok">
</form>

<section id="principal" style="overflow: scroll">

    <?php
    if (isset($_POST["ok"])) {
        $request = $db->prepare("SELECT game.name, users.pseudo, scores.difficulty, scores.scores, scores.time_party, users.id as userId
                                     FROM scores
                                     JOIN game ON scores.id_game = game.id 
                                     JOIN users ON scores.id_users = users.id
                                     WHERE users.pseudo = :pseudo
                                     order by scores ASC limit 30;");
        $request->execute(['pseudo' => $_POST["filtre"]]);
        $datas = $request->fetchAll(PDO::FETCH_ASSOC);

    }
    ?>

    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nom du jeu</th>
            <th>Pseudo du joueur</th>
            <th>Niveau de difficulté de la partie jouée</th>
            <th>Score du joueur (en secondes pour notre jeu de mémoire)</th>
            <th>Date et heure de la partie</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($datas as $element):

            ?>


            <tr class="<?php echo $element['pseudo'] == $_SESSION['pseudo'] ? 'linecolor' : 'linenormal'; ?>">
                <td><?php echo $numero++; ?></td>
                <td><?php echo $element['name']; ?></td>
                <td><?php echo $element['pseudo']; ?></td>
                <td><?php echo $element['difficulty']; ?></td>
                <td><?php echo $element['scores']; ?></td>
                <td><?php echo $element['time_party']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (!isset($_SESSION['userId'])) {
        echo "Erreur : utilisateur non connecté";}
    else {
        include "../../chatbox.php";
    }
    ?>

</section>

<div id="retour_haut_page">
    <a id="texte_haut_page" href="#" class="btn btn-default">Retour en haut ↑</a>
</div>

<?php include "../../partials/footer.php"; ?>

</body>
</html>
