<?php   
    include 'config.php';
    session_start();
    session_unset();
    zamknijPoloczenie();
    echo '<div class="alert alert-danger" role="alert">
    <center>Zostałeś wylogowany.</center>
    </div>';
    header('Location: index.php');
?>