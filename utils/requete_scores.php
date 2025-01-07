<?php
session_start();
include "./database.php";

// Lire les données JSON envoyées
$json = json_decode(file_get_contents("php://input"), true);

if (isset($json['difficulty'], $json['score'])) {

    $difficulty = $json['difficulty'];
    $score = $json['score'];
    $userId = $_SESSION['userId'];
    $dateTime = date("Y-m-d H:i:s ");
    $newDateTime = date("Y-m-d H:i:s", strtotime($dateTime . " +1 hour"));

    $date = "+1 hour . $dateTime";
    $id_game=1;

    // Préparer la requête d'insertion
    $bd = connectToDbAndGetPdo();
    $query = $bd->prepare("INSERT INTO scores (id_users,id_game, difficulty, scores, time_party) VALUES (:id_users, :id_game, :difficulty, :scores, :time_party)");

    // Exécuter la requête avec les paramètres
    $success = $query->execute([
        'id_users' => $userId,
        'difficulty' => $difficulty,
        'scores' => $score,
        'time_party' => $newDateTime,
        'id_game' => $id_game,
    ]);
}