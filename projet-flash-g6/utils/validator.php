<?php

function validateEmail($email, $db) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Erreur : L'adresse mail est invalide");
    }

    $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE mail = :mail");
    $stmt->execute(['mail' => $email]);
    if ($stmt->fetchColumn() > 0) {
        die("Erreur : Ce mail est déjà utilisé");
    }
}

function validatePseudo($pseudo, $db) {
    if (strlen($pseudo) < 4) {
        die('Erreur: Le pseudo doit faire une longueur de 4 caractères');
    }

    $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE pseudo = :pseudo");
    $stmt->execute(['pseudo' => $pseudo]);
    if ($stmt->fetchColumn() > 0) {
        die("Erreur : Ce pseudo est déjà utilisé");
    }
}

function validatePassword($mot_de_pass, $conf_mdp) {
    if ($mot_de_pass !== $conf_mdp) {
        die("Erreur : Les mots de passe sont différents");
    }

    if (strlen($mot_de_pass) < 8 ||
        !preg_match('/[A-Z]/', $mot_de_pass) ||
        !preg_match('/[0-9]/', $mot_de_pass) ||
        !preg_match('/[\W]/', $mot_de_pass)) {
        die("Erreur : Le mot de passe doit faire au moins 8 caractères, contenir au moins une majuscule, un chiffre et un caractère spécial");
    }
}