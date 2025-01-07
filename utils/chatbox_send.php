<?php

session_start();
require 'database.php';

$json = json_decode(file_get_contents('php://input'), true);


$message = htmlspecialchars($json['message']);
$userId = $_SESSION['userId'];

$db = connectToDbAndGetPdo();
$stmt = $db->prepare("INSERT INTO messages (id, id_game, message, id_expediteur, time_message, IsSender) 
                      VALUES (NULL, 1, ?, ?, NOW(), 1)");
$stmt->execute([$message, $userId]);





