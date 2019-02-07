<?php
if ($_SESSION['logged']==false){
    header('Location: loginPracownik.php');
    //nie wykonuj kodu poniżej
    exit();
}
?>
<?php
    include('config.php');
    otworzPoloczenie();
    session_start();

    $idZlecenia=$_GET['idZlecenia'];
    $sql="delete from Zlecenia  WHERE idZlecenia=$idZlecenia";
    mysqli_query($polaczenie, $sql);

    if ($_SESSION['typUsera']==1){
        header('location: zleceniaKlient.php');
    }else header('location: panelPracownika.php');
    //header('location: zleceniaKlient.php');
?>