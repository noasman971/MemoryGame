<?php

include "./utils/database.php";
include "./utils/validator.php";

$db = connectToDbAndGetPdo();


function mailUpdate($email, $mot_de_passe, $newMail) {
    $db = connectToDbAndGetPdo();

    // Préparer la requête pour récupérer l'utilisateur
    $stmt = $db->prepare("SELECT id, mot_de_passe FROM users WHERE mail = :mail");
    $stmt->execute(['mail' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et que le mot de passe est correct
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        // Mettre à jour l'adresse e-mail
        $stmt = $db->prepare("UPDATE users SET mail = :newMail WHERE id = :id");
        $stmt->execute(['newMail' => $newMail, 'id' => $user['id']]);
        exit;
    }
    else {
        echo "Erreur : Le changement n'a pas pu être effectué";
    }
}

function passwordUpdate($mot_de_passe, $newpassword) {
    // Assurez-vous que l'utilisateur est connecté
    if (!isset($_SESSION['userId'])) {
        echo "Erreur : utilisateur non connecté";
        return;
    }

    $db = connectToDbAndGetPdo();
    $userId = $_SESSION['userId'];

    // Préparer la requête pour récupérer l'utilisateur avec son ID
    $stmt = $db->prepare("SELECT id, mot_de_passe FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et que le mot de passe est correct
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $hashed_password = password_hash($newpassword, PASSWORD_BCRYPT);


        // Mettre à jour le mot de passe
        $stmt = $db->prepare("UPDATE users SET mot_de_passe = :newpassword WHERE id = :id");
        $stmt->execute(['newpassword' => $hashed_password, 'id' => $userId]);
        exit;
    }
    else {
        echo "Erreur : Le changement n'a pas pu être effectué";
    }
}

function loginUser($email, $mot_de_passe) {
    $db = connectToDbAndGetPdo();

    // Préparer la requête pour récupérer l'utilisateur
    $stmt = $db->prepare("SELECT id,pseudo, mot_de_passe FROM users WHERE mail = :mail");
    $stmt->execute(['mail' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et que le mot de passe est correct
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        // Stocker l'ID utilisateur dans une variable de session
        $_SESSION['userId'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];


        echo '<meta http-equiv="refresh" content="1;url=/projet-flash-g6/index.php" />';    } else {
        echo "Erreur : Identifiants incorrects";
    }
}

function registerUser($email, $mot_de_pass, $pseudo, $db) {
  $dateTime = date("Y-m-d H:i:s");
  $hashed_password = password_hash($mot_de_pass, PASSWORD_BCRYPT);

  $requete = $db->prepare("INSERT INTO users (id, mail, mot_de_passe, pseudo, time_registration) VALUES (null, :mail, :mot_de_pass, :pseudo, :time_registration)");
  $requete->execute([
    "mail" => $email,
    "mot_de_pass" => $hashed_password,
    "pseudo" => $pseudo,
    "time_registration" => $dateTime
  ]);

  echo "Vous êtes inscrit avec succès";
}