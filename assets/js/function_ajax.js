function ajaxGet() {
    // Créer un objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Ouvrir une connexion GET vers une URL spécifique
    xhr.open("GET", "ajax/get.php", true);

    // Définir ce qui doit se passer lorsque la réponse est prête
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Traiter la réponse JSON
            var data = JSON.parse(xhr.responseText);
            console.log(data); // Afficher les données récupérées dans la console
        }
    };

    // Envoyer la requête
    xhr.send();
}

function ajaxPost(postData,url) {
    // Créer un objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Ouvrir une connexion POST vers une URL spécifique
    xhr.open("POST", url, true);

    // Définir le type de contenu envoyé
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    // Définir ce qui doit se passer lorsque la réponse est prête
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 201) { // Status 201 signifie "Créé"
            // Traiter la réponse JSON
            var data = JSON.parse(xhr.responseText);
            console.log(data); // Afficher les données de la réponse

        }
    };

    // Envoyer la requête avec les données en JSON
    xhr.send(JSON.stringify(postData));
    document.querySelector("textarea[name='messagess']").value = "";

}