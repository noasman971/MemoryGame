var secondes = 0;

// où afficher le décompte
var affichage = document.getElementById("affichageTimer");

// initialise l'intervalle du chrono
var chrono;

function startChrono() {
    secondes = 0;
    affichage.innerHTML = secondes;
    // Arrete l'ancien chrono s'il existe
    clearInterval(chrono);
    // lance un nouvel intervalle
    chrono = setInterval(timer, 1000);
}
function CustomConfirm(score, callback) {
    // Insère tout le texte du message en une seule fois
    document.getElementById('confirmMessage').textContent = 'Votre score est de ' + score + ' secondes.\nVoulez-vous rejouer ?';

    // Affiche la boîte de confirmation
    const customConfirm = document.getElementById('customConfirm');
    customConfirm.style.display = 'flex';

    // Bouton "Oui"
    document.getElementById('confirmYes').onclick = function() {
        customConfirm.style.display = 'none';
        callback(true);
    };

    // Bouton "Non"
    document.getElementById('confirmNo').onclick = function() {
        customConfirm.style.display = 'none';
        callback(false);
    };
}

// Démarre le chronomètre lorsque le bouton est cliqué
document.getElementById('button').addEventListener('click', startChrono);

function timer() {
    secondes++;
    affichage.innerHTML = secondes;
    let isWin= isGameCompleted()
    if (secondes == 1000000 || isWin==true) {
        clearInterval(chrono); // arrete le chronometre
        let difficulty = document.querySelector('#difficulty').value;
        let anime = document.querySelector('#anime').value;

        // choix de la difficulté
        let difficulty_nom;
        switch (difficulty) {
            case "2":
                difficulty_nom = "moyen";
                break;
            case "3":
                difficulty_nom = "difficile";
                break;
            default:
                difficulty_nom = "facile";
        }

        // Préparer les données pour l'envoi
        let postData = {
            difficulty: difficulty_nom,
            score: secondes
        };
        ajaxPost(postData, '/utils/requete_scores.php'); // Envoie les données

        // envoie de confirmation et lancement de la prochaine partie
        CustomConfirm(secondes, function(result) {
            if (result) {
                GenererGrille(difficulty, anime); // Relance la grille
                startChrono(); // Relance le chronomètre
                alert('La partie va se relancer');
            }
        });
    }
}

