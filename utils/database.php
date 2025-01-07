<?php
function connectToDbAndGetPdo() {
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'Manga_of_memory';
    $db_port = "8889";

    try {
        $db = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_db", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
connectToDbAndGetPdo();