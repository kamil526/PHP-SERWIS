<?php
    
    include 'config.php';
    session_start();

    if(!$_SESSION['logged']) {
        echo '<p>Nie jesteś zalogowany.</p>';
    }else {
            $_SESSION['logged'] = false;
            $_SESSION['idKlienta'] = -1;
            echo '<center><p>Zostałeś wylogowany! Możesz teraz przejść na <a href="index.html">stronę główną</a>.</p></center>';;
        }
?>