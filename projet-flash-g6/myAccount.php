<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    $pageTitle = 'compte';
    include "./partials/head.php";
    include "./utils/userConnexion.php";
    $db = connectToDbAndGetPdo();
    ?>

</head>

<?php include "./partials/header.php"?>

<header></header>

<?php

if (!isset($_SESSION['userId'])){
    echo '<meta http-equiv="refresh" content="1;url=/projet-flash-g6/login.php" />';
}

?>


<div class="titre">
    <h1><?php
        echo $_SESSION['pseudo'];
        ?>
    </h1>
</div>

<?php
// Définir le fichier qui contiendra le nom de l'image
$filename = 'image_name.txt';

// Vérifiez si un fichier a été téléchargé
if (isset($_POST['updateProfil_img']) && isset($_FILES['image_Profil'])) {

    // Définir le dossier de destination
    $targetDir = __DIR__ . './userFiles/';

    // Récupérer les informations du fichier
    $fileName = basename($_FILES['image_Profil']['name']);
    $targetFilePath = $targetDir . $fileName;

    // Déplacer le fichier téléchargé vers le dossier cible
    if (move_uploaded_file($_FILES['image_Profil']['tmp_name'], $targetFilePath)) {
        // Sauvegarder le nom de l'image dans le fichier
        file_put_contents($filename, $fileName);
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}

// Lire le nom du fichier depuis le fichier texte si disponible
$imageName = file_exists($filename) ? file_get_contents($filename) : null;
?>




<!-- Formulaire HTML pour télécharger une image -->
<form class="imageee" method="post" enctype="multipart/form-data">
    <div class="in">
    <input type="file" name="image_Profil" id="image_Profil" required>
    <input type="submit" name="updateProfil_img" value="modifier">
    </div>
    <?php
    // Si un fichier d'image existe, afficher l'image
    if ($imageName) {
        $fileUrl = './userfiles/' . $imageName; // Assurez-vous que ce chemin est correct pour votre structure de dossiers
        echo "<br><img src='$fileUrl' id='imageChange' alt='Image Profil' />";
    }
    ?>


</form>


<section id="modif_email">

    <form method="post">
    <h2 class="titre_modif">Modifier votre adresse mail</h2>
    <div id="champ_modif_email">
        <input class="bouton_modif" type="email" name="old_email" placeholder="Ancienne adresse email"/>
        <input class="bouton_modif" type="email" name="new_email" placeholder="Nouvelle adresse email"/>
        <input class="bouton_modif" type="password" name="mot_de_passe" placeholder="Mot de passe"/>
        <input id="validation_modif" class="bouton_connection" type="submit" value="Valider" name="updateMail"/>
    </div>
    </form>
</section>

<div id="modif_mdp">
    <form method="post">
    <h2 class="titre_modif" >Modifier votre mot de passe</h2>
    <div id="champ_modif_mdp">
        <input class="bouton_modif" type="password" name="old_mdp" placeholder="Ancien mot de passe"/>
        <input class="bouton_modif" type="password" name="new_mdp" placeholder="Nouveau mot de passe"/>
        <input class="bouton_modif" type="password" name="confirm_mdp" placeholder="Confirmer mot de passe"/>
        <input id="validation_modif_mdp" class="bouton_connection" type="submit" value="Valider" name="updatePassword"/>
    </div>
    </form>
</div>












<div id="retour_haut_page">
    <a id="texte_haut_page" href="#" class="btn btn-default">Retour en haut ↑</a>
</div>



<?php
// Traitement du formulaire modification de l'e-mail
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateMail"])) {
    $email = $_POST["old_email"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $newMail = $_POST["new_email"];
    mailUpdate($email, $mot_de_passe, $newMail);
    validateEmail($email,$db);
}

// Traitement du formulaire de modification du mot de passe
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updatePassword"])) {
    $mot_de_passe = $_POST["old_mdp"];
    $newpassword = $_POST["new_mdp"];
    passwordUpdate($mot_de_passe, $newpassword);
    validatePassword($mot_de_passe, $newpassword);
}
?>
<?php include "../projet-flash-g6/partials/footer.php"?>


</body>
</html>
