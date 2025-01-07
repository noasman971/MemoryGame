document.addEventListener("DOMContentLoaded", function () {

    let chatForm = document.getElementById("chat-form");
    let messageBox = document.querySelector(".discussion");
    let messageInput = chatForm.querySelector("textarea[name='messagess']");

    function loadMessages() {
        // Créer un objet XMLHttpRequest
        let xhr = new XMLHttpRequest();
        // Ouvrir une connexion POST vers chatbox_load.php
        xhr.open("POST", "/projet-flash-g6/utils/chatbox_load.php", true);

        // Définir ce qui doit se passer lorsque la réponse est prête
        xhr.onreadystatechange = function () {
            if (xhr.status === 200) {
                messageBox.innerHTML = xhr.responseText; // Si la requête réussit, insère les messages récupérés dans l'élément de discussion

            }
        };
        xhr.send(); // Envoie la requête sans données supplémentaires
    }



    // Recharger les messages toutes les 30 secondes
    setInterval(loadMessages, 7000);

    chatForm.addEventListener("submit", function (e) {
        e.preventDefault();

        let postData = {
            message: messageInput.value
        };


        ajaxPost(postData, "/projet-flash-g6/utils/chatbox_send.php");
        loadMessages();


    });

    // Charger les messages initialement lors du chargement de la page
    loadMessages();
});
