<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
        $pageTitle = 'Inscription';
        include "./partials/head.php"?>
    </head>

    <body>

        <?php include "./partials/header.php"?>

        <header></header>
        <div class="titre">
          <h1>Inscription</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, autem blanditiis cumque </p>
        </div>

        <section>
          <div class="corps-formulaire">
            <form method="POST">
                <div class="groupe">
                  <input type="email" name="email" placeholder="test@test.fr" required>
                  <input type="text" name="pseudo" placeholder="PseudoTest85" required>

                  <div class="pwd">
                      <input type="password" id="password" class="password" name="mot_de_pass" placeholder="Mot de passe">
                      <span id="toggle" onclick="toggle()">
                          <i class="fas fa-eye"></i>
                      </span>

                      <div class="strength_pwdBar">
                          <div class="strength_pwd">
                              <div class="line_bar">
                                  <div class="bar"></div>
                              </div>
                              <p class="msg"></p>
                          </div>
                      </div>
                      <div class="valide_pwdBox">
                          <span>?</span>
                          <div class="valide_pwd">
                              <p style="list-style: none"><b>Le mot de passe doit être composé de :</b></p>
                              <p>Au moins 1 majuscule</p>
                              <p>Au moins 1 minuscule</p>
                              <p>Au moins 1 caractère special</p>
                              <p>Au moins 8 caractères</p>
                              <p>Maximum 20 caractères</p>
                          </div>
                      </div>
                  </div>


                  <input type="password" id="conf_password" name="conf_mdp" placeholder="Confirmer votre mot de passe" required>

                  <input type="submit" name="inscription" placeholder="S'inscrire">

                  <a href="login.php">Deja inscrit ?</a>
                </div>
             </form>
            </div>
        </section>

        <div id="retour_haut_page">
            <a id="texte_haut_page" href="#" class="btn btn-default">Retour en haut ↑</a>
        </div>


        <?php include "./partials/footer.php"?>

        <?php
        // inscription
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["inscription"])) {
            include "./utils/userConnexion.php";
            $db = connectToDbAndGetPdo();

            $email = $_POST["email"];
            $mot_de_pass = $_POST["mot_de_pass"];
            $pseudo = $_POST["pseudo"];
            $conf_mdp = $_POST["conf_mdp"];

            validateEmail($email, $db);
            validatePseudo($pseudo, $db);
            validatePassword($mot_de_pass, $conf_mdp);
            registerUser($email, $mot_de_pass, $pseudo, $db);
            echo '<meta http-equiv="refresh" content="1;url=/projet-flash-g6/login.php">" />';
        }
        ?>

        <script src="password.js"></script>

    </body>
</html>
