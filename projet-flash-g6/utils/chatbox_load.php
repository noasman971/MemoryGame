<?php

session_start();
require 'database.php';

$db = connectToDbAndGetPdo();
$request = $db->prepare("SELECT message, time_message, users.pseudo, id_expediteur 
                         FROM messages 
                         JOIN users ON id_expediteur = users.id 
                         WHERE time_message >= NOW() - INTERVAL 1 DAY ");
$request->execute();
$messages = $request->fetchAll(PDO::FETCH_ASSOC);


$json = file_get_contents('https://api.thecatapi.com/v1/images/search?mime_types=gif');
$decode = json_decode($json, true);
$gif = $decode[0]["url"];
echo "<img src=$gif >" ;



foreach ($messages as $message) {

    if ($_SESSION['userId'] == $message["id_expediteur"]) {
        echo "<div class='user' >";
        echo "<span>{$message['time_message']}</span>";
        echo "<div class='message' id='messuser'><p>{$message['message']}</p></div>";
        echo "</div>";
    }

    else{

        echo "<div class='useronline'>";
        echo "<span>{$message['pseudo']}</span>";
        echo "<span>{$message['time_message']}</span>";
        echo "<div class='message'><p>{$message['message']}</p></div>";
        echo "</div>";
    }

}

;
