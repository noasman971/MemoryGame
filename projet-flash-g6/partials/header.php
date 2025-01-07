<style>

    nav{
        display: flex;
        align-items: center;
        justify-content: space-around;
        height: 100px;
        width: 100%;
        color: #000000;
        background-color:white;
    }
    nav h2{
        font-size: 2em;
        font-family: "KashimaDemo";
        background-color:white;
    }
    nav p{
        margin-left: 50px;
        font-size: 1.2em;
    }
    nav .onglets{
        display: flex;
        justify-content: center;
        flex-direction: row;
        align-items: center;
        background-color:white;
    }

    nav .onglets a {
        margin-left: 40px;
        text-decoration: none;
        color: rgb(0, 0, 0);
        font-size: 20px;
        background-color:white;
    }

    nav a.active {
        color: #FF5733;
    }
    
    @media screen and (max-width: 768px) {
        header{
            height: 17vh;
        }
        nav{
            display: flex;
            flex-direction: column;
        }
        nav .onglets{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
        }
        nav .onglets a{
            font-size: 12px;
            margin: 4px;
        }
        nav h2{
            font-size: 2.5em;
            padding-top: 10px;
        }

        .titre h1{
            font-size: 4em;
            text-align: center;
        }
        .titre p{
            text-align: center;

        }
    }

    /* Pour les très petits écrans (écrans de moins de 480px de large) */
    @media screen and (max-width: 480px) {

        nav{
            display: flex;
            flex-direction: column;
        }
        nav .onglets{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            font-size: 12px;
        }
        nav .onglets a{
            font-size: 10px;
            margin: 7px;
        }
        nav h2{
            font-size: 2.5em;
            padding-top: 10px;
        }
        .titre h1{
            font-size: 4em;
            text-align: center;
        }
        .titre p{
            text-align: center;

        }
    }

</style>


<?php
session_start();
?>

<?php
// Recupaire l'URL de la page courrente (obtenir le chemin relatif du fichier)
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->

<nav>
    <h2>The Power of Memory</h2>
    <div class="onglets">
        <a href="/projet-flash-g6/index.php" class="<?= $currentPage == 'index.php' ? 'active' : ''?>">Accueil</a>
        <a href="/projet-flash-g6/games/memory/memory.php" class="<?= $currentPage == 'memory.js' ? 'active' : ''?>">Jeu</a>
        <a href="/projet-flash-g6/games/memory/scores.php" class="<?= $currentPage == 'scores.php' ? 'active' : ''?>">Score</a>
        <a href="/projet-flash-g6/contact.php" class="<?= $currentPage == 'contact.php' ? 'active' : ''?>">Contact</a>

        <?php if (isset($_SESSION['userId'])): ?>
           <a href="/projet-flash-g6/myAccount.php" class="<?= $currentPage == 'myAccount.php' ? 'active' : ''?>">My Account</a>
            <a href="/projet-flash-g6/utils/deconnexion.php" class="<?= $currentPage == 'deconnexion.php' ? 'active' : ''?>">Déconnexion</a>
            <a href="/projet-flash-g6/myAccount.php" ><?php echo "Pseudo : " . $_SESSION['pseudo'];?></a>
        <?php else: ?>
            <a href="/projet-flash-g6/login.php" class="<?= $currentPage == 'login.php' ? 'active' : ''?>">Se Connecter</a>
        <?php endif; ?>
    </div>
</nav>


<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->
<!-- ------------------------------------- DONT TOUCH ------------------------------------------------------- -->