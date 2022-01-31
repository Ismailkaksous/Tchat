<?php 
require 'header.php';
require 'config/commandes.php';
?>
<body>
    <div id="container">
    <video src="css/video2.mp4" muted loop autoplay ></video>
        <div id="div1"></div>
        <div id="div2"></div>
        <div id="screen">
        
            <div id="header">ONLINE CHATTING</div>
            <div id="messageDisplaySection"></div>
            <div id="userInput">
                <input type="text" name="message" id="messages" placeholder="Type Your Message....." required>
                <input type="submit" value="Send" id="send" name="send">
            </div>
        </div>
    </div>
    <!-- Lien jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            pseudo = prompt ("Please enter your name");
            $("#messages").on("keyup",function(){

                if($("#messages").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });
        // when send button clicked
        $("#send").on("click",function(e){ //keypress 
            $userMessage = $("#messages").val();
            $appendUserMessage = ' <div class="msg1"><p>🦋</p></div><div class="chat usersMessages">'+ $userMessage +'</div>';
            $("#messageDisplaySection").append($appendUserMessage);

            // ajax 
            $.ajax({
                url: "Ajouter.php",
                type: "POST",
                // envoie data
                data: {messageValue: $userMessage},
                // reponse 
                success: function(data){
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });
    </script>
</body>
</html>