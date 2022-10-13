<?php

if(!isset($_SESSION)){
    session_start();
}
    //error manifest
    function flash($name = '', $message = '', $class = 'form-message form-message-red'):void
    {
        if(!empty($name)){//if name or message not empty and we cant find corresp data on session global available on the session
            if(!empty($message) && empty($_SESSION[$name])){
                $_SESSION[$name] = $message;//store de message 
                $_SESSION[$name.'_class'] = $class;
            }else if(empty($message) && !empty($_SESSION[$name])){//if no msg but name is
                $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : $class;//retriving class from session com ternario se existe
                echo '<div class="'.$class.'" >'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }

    
    function redirect($location){
        header("location: ".$location);
        exit();

    }
?>
