
<?php
session_start();

if ($_SESSION['logged']==false){
    header('Location: loginPracownik.php');
    //nie wykonuj kodu poniżej
    exit();
}

include('config.php');
otworzPoloczenie();
?>

<?php

    $idZlecenia=$_GET['idZlecenia'];
    $sql="delete from Zlecenia  WHERE idZlecenia=$idZlecenia";
    mysqli_query($polaczenie, $sql);

    if ($_SESSION['typUsera']==1){
        header('location: zleceniaKlient.php');
    }else header('location: panelPracownika.php');
    //header('location: zleceniaKlient.php');
?>