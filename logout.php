<?php
    
    include 'config.php';
    session_start();
    session_unset();
    echo 'Zostałeś wylogowany!';
?>