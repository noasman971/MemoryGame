button.addEventListener('click', function(event) {
    let anime = document.querySelector('#anime').value,
        difficulty = document.querySelector('#difficulty').value;

    GenererGrille(difficulty, anime);
});
function GenererGrille(valeur, theme){
    let gridSize = document.querySelector('.wrapper');
    gridSize.innerHTML = "";

    let nbrcase = 0;
    let colRow = 0;
    let newBloc;

    switch (valeur) {
        case "2":
            nbrcase = 64;
            colRow = 8;
            break;
        case "3":
            nbrcase = 100;
            colRow = 10;
            break;
        default:
            valeur = 1;
            nbrcase = 16;
            colRow = 4;
            break;
    }
    matchedPairs = 0;
    totalPairs = nbrcase / 2;
    function shuffleArray(tab) {
        tab.sort(() => Math.random() - 0.5);
    }

    let tab = [];
    if (typeof nbrcase !== 'undefined') {
        while (tab.length < nbrcase) {
            let random = Math.floor(Math.random() * 50) + 1;


            if (!tab.includes(random)) {
                tab.push(random);
                tab.push(random);
            }
        }
        shuffleArray(tab);
    } else {
        console.error("Erreur : 'nbrcase' n'est pas défini !");
    }



    tab.forEach(function (item, i) {
        console.log(item);

        // Déclare `newBloc` ici pour chaque élément
        let newBloc = document.createElement('div');
        newBloc.classList.add('bloc');

        let img = document.createElement('img');
        img.classList.toggle('cacher');
        img.src = "../../assets/img/" + theme + "/" + "img" + item + ".jpg";
        img.alt = "Image Bloc";
        newBloc.setAttribute('data-id', item);
        newBloc.appendChild(img);
        gridSize.appendChild(newBloc);

        // Ajouter l'animation au clic pour chaque bloc
        newBloc.addEventListener('click', () => {
            if (!newBloc.classList.contains('animate')) {
                newBloc.classList.add('animate');
                setTimeout(() => {
                    newBloc.classList.remove('animate');
                }, 300); // Durée de l'animation
            }
        });
    });





    gridSize.style.gridTemplateColumns = 'repeat('+ colRow +', 100px)';
    gridSize.style.gridTemplateRows = 'repeat(' + colRow +', 100px)';

}

let firstCard = null;
let secondCard = null;
let score = 0;
let matchedPairs = 0; // Compteur de paires trouvées
let totalPairs = 0; // Nombre total de paires nécessaires

document.addEventListener('click', function(event) {
    let block = event.target.closest('.bloc');
    if (!block || block === firstCard) return; // Évite de cliquer deux fois sur la même carte

    let img = block.querySelector('img');

    if (!firstCard) {
        firstCard = block;
        firstCard.querySelector('img').classList.remove('cacher');
        firstCard.querySelector('img').classList.add('visible');
    } else if (!secondCard) {
        secondCard = block;
        secondCard.querySelector('img').classList.remove('cacher');
        secondCard.querySelector('img').classList.add('visible');

        console.log(firstCard.dataset.id);
        console.log(secondCard.dataset.id);


        if (firstCard.dataset.id === secondCard.dataset.id) {
            score++
            matchedPairs++;
            firstCard = null;
            secondCard = null;
            if (isGameCompleted()) {
                alert("Bravo ! Vous avez terminé la partie !");
            }
        } else {
            setTimeout(() => {
                firstCard.querySelector('img').classList.remove('visible');
                firstCard.querySelector('img').classList.add('cacher');
                secondCard.querySelector('img').classList.remove('visible');
                secondCard.querySelector('img').classList.add('cacher');

                firstCard = null;
                secondCard = null;
            }, 1000);
        }
    }
});
function isGameCompleted() {
    return matchedPairs === totalPairs;
}

