<head>
    <link rel="stylesheet" href="/projet-flash-g6/assets/css/chatbox.css">
    <script src="../../assets/js/function_ajax.js"></script>
    <script src="../../assets/js/chatbox.js"></script>



</head>




<input type="checkbox" id="click">
<label for="click">
    <img src="/projet-flash-g6/assets/img/rb_4104.png" width="auto" height="100px">
</label>

<div class="page">
    <div class="head-text">
        Chatbox
    </div>

    <form method="POST" id="chat-form">
        <div class="chat-box">
            <div class="discussion">


            </div>

            <div class="field">
                <textarea rows="5" cols="5" placeholder="Message" name="messagess" minlength="3" required></textarea>
            </div>

            <div class="field">
                <button id="mess" type="submit" name="sendmess">Envoyer</button>
            </div>
        </div>

    </form>

</div>

