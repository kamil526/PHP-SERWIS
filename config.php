<?php

function otworzPoloczenie()
{
    global $polaczenie;
    $serwer = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza = "serwisDatabase";

    $polaczenie = mysqli_connect($serwer, $uzytkownik, $haslo)
        or exit("Nieudane połączenie z serwerem");
    mysqli_select_db($polaczenie, $baza)
        or exit("Nieudane połączenie z bazą");
    mysqli_set_charset($polaczenie, "utf-8");
}

function zamknijPoloczenie()
{
    global $polaczenie;
    mysqli_close($polaczenie);
}

?>