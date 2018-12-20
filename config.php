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

function hashHaslo($password) {
    // kodujemy hasło (losowe znaki można zmienić lub całkowicie usunąć
    return sha1(md5($password).'#!%Rgd64');
}

// tworzenie tabel
function utworzTabele() 
{
    global $polaczenie;
    
	$rozkaz = "CREATE TABLE Pracownicy (" .
	"idPracownika INT AUTO_INCREMENT PRIMARY KEY ," .
    "login VARCHAR(50) NOT NULL, " .
    "haslo VARCHAR(50) NOT NULL, " .
    "imie VARCHAR(50), " .
    "nazwisko VARCHAR(50), " .
    "email VARCHAR(50), " .
    "typUzytkownika INT )";
	mysqli_query($polaczenie, $rozkaz)
    or exit("Błąd w zapytaniu: ".$rozkaz);
    
	$rozkaz = "CREATE TABLE Klienci (" .
	"idKlienta INT AUTO_INCREMENT PRIMARY KEY," .
    "login VARCHAR(50) NOT NULL, " .
    "haslo VARCHAR(50) NOT NULL," .
    "imie VARCHAR(50), " .
    "nazwisko VARCHAR(50), " .
    "nazwaFirmy VARCHAR(50), " .
    "nip VARCHAR(50), " .
    "email VARCHAR(50), " .
    "ulica VARCHAR(50), " .
    "nrDomu VARCHAR(50), " .
    "miasto VARCHAR(50), " .
    "kodPocztowy VARCHAR(50), " .
    "telefon VARCHAR(50), " .
    "nazwaBanku VARCHAR(50), " .
    "kontoBankowe VARCHAR(50) )";
	mysqli_query($polaczenie, $rozkaz)
    or exit("Błąd w zapytaniu: ".$rozkaz);
    
	$rozkaz = "CREATE TABLE Zlecenia (" .
	"idZlecenia INT AUTO_INCREMENT PRIMARY KEY," .
    "idPracownika INT, " .
    "idKlienta INT, " .
    "dataDodania DATE, " .
    "dataZakonczenia DATE, " .
    "statusZlecenia VARCHAR(50), " .
    "rodzajZlecenia VARCHAR(50), " .
    "opisZlecenia VARCHAR(255), " .
    "wartoscZlecenia  DECIMAL(13, 4), " .
    "FOREIGN KEY (idPracownika) REFERENCES Pracownicy(idPracownika), " .
    "FOREIGN KEY (idKlienta) REFERENCES Klienci(idKlienta) )";
    mysqli_query($polaczenie, $rozkaz)
    or exit("Błąd w zapytaniu: ".$rozkaz);

}
?>