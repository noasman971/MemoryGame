<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>


  <?php
  $pageTitle = 'Memory';
  include "../../partials/head.php"?>
</head>
<body>

<?php include "../../partials/header.php"?>
<?php include "../../utils/database.php" ?>
<header></header>
<div class="titre">
    <h1>The Power of memory</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, autem blanditiis cumque Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, repellat. </p>
</div>

<div class="separateur"><h1>MEMORY</h1></div>
<div class="sec">
    <div class="on">
        <select name="anime-choice" id="anime"  size="1" required="required">
            <option value="">Choisissez un theme</option>
            <option value="anime">anime</option>
            <option value="objet-anime">objet anime</option>
            <option value="lieu">lieu iconique</option>
        </select>
            <select name="difficulty-choice" id="difficulty" size="1" required="">
                <option value="">Choisissez une difficultée</option>
                <option value="1">facile</option>
                <option value="2">moyen</option>
                <option value="3">difficile</option>
            </select>
        <input type="submit" name="button" id="button"  value="Généré le memory et commencer !" required>
    </div>
</div>
<div id="timerDiv">
    <p id="affichageTimer" >0</p>
    <h2 id="score"></h2>
</div>

<section class="jeu1">
    <div class="wrapper" id="wrapper"></div>
</section>


    <?php if (!isset($_SESSION['userId'])) {
        echo "Erreur : utilisateur non connecté";}
    else {
        include "../../chatbox.php";
    }
    ?>
<div id="retour_haut_page">
  <a id="texte_haut_page" href="#" class="btn btn-default">Retour en haut ↑</a>
</div>

<div id="customConfirm" class="confirm-overlay" style="display: none;">
    <div class="confirm-box">
        <p id="confirmMessage"></p>
        <div class="confirm-buttons">
            <button id="confirmYes">Oui</button>
            <button id="confirmNo">Non</button>
        </div>
    </div>
</div>

    <?php include "../../partials/footer.php"?>
<script src="../../assets/js/function_ajax.js"></script>
<script src="../../assets/js/memory.js"></script>
<script src="../../assets/js/timer.js"></script>

</body>
</html>
