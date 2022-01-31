<?php 
function addMessages(){
    if(require("database.php")){
         $req = $access->prepare("INSERT INTO messages (messages, pseudo, date ) VALUES 
         ('$messages', '$pseudo', '$date')");
         $req->execute(array($messages, $pseudo, $date));
         $req->closeCursor(); 
    }
}
?>