<?php
    include('config.php');
    otworzPoloczenie();
    $idZlecenia=$_GET['idZlecenia'];
    $sql="delete from Zlecenia  WHERE idZlecenia=$idZlecenia";
    mysqli_query($polaczenie, $sql);

    header('location: zleceniaKlient.php');
?>