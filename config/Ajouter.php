<?php
require 'commandes.php';
if(isset($_POST['send'])){
    if(isset($_POST['message']) AND isset($_POST['pseudo'])){
        if(!empty($_POST['message']) AND !empty($_POST['pseudo'])){
            $message = htmlspecialchars(strip_tags($_POST['message']));
            $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
            try{
                addMessages($message, $pseudo);
          }
          catch(Exception $e){
              $e->getMessage();
          } 
    }
}
}
?>